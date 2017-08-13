<?php

class NiceHashAPI
{
//	const NICEHASH_WALLET_HASH = '1LwgVb4CNqhG7hTuyhynftsU9NxSdSFutJ';
	const NICEHASH_WALLET_HASH = '36uTBc7nkxnCF2Mq9etQkLCD8GSYqmSYE9';

	private static $instance = null;

	private $algo_info = null;
	private $current_stats = null;
	private $current_workers = null;
	private $balance_info = null;

	private $has_error = false;

	private function __construct()
	{
		try
		{
			$this->load_algo_info();
			$this->load_current_stats();
			$this->load_balance_info();
			$this->load_current_workers();
		}
		catch (Exception $e)
		{
			$this->has_error = true;
		}
	}

	public function hasError()
	{
		return $this->has_error;
	}

	public static function get()
	{
		if (is_null(self::$instance))
		{
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function getCurrentStats()
	{
		return $this->current_stats;
	}

	public function getCurrentWorkers()
	{
		return $this->current_workers;
	}

	public function getMiningBalance()
	{
		return $this->current_stats['mining_balance'];
	}

	public function getWalletConfirmedBalance()
	{
		return $this->balance_info['confirmed'];
	}

	public function getWalletPendingBalance()
	{
		return $this->balance_info['pending'];
	}

	private function load_current_stats()
	{
		$uri = 'https://api.nicehash.com/api?method=stats.provider&addr=' . self::NICEHASH_WALLET_HASH;
		$cache_key = 'nicehash_current_info_v1807b';
		$current_stats = TempCache::get($cache_key);
		if (is_null($current_stats))
		{
			$current_stats = array();
			$current_stats['mining_balance'] = 0;
			$current_stats['algos'] = array();

			$client = new GuzzleHttp\Client();
			$response = $client->get($uri);
			$body = (string)$response->getBody();

			$json_info = json_decode($body);

			$stats = $json_info->result->stats;
			foreach ($stats as $stat)
			{
				$cur_stat = array();
				$cur_stat['balance'] = (float)$stat->balance;
				$current_stats['mining_balance'] += $cur_stat['balance'];
				$cur_stat['speed'] = array(
					'rejected' => (float)$stat->rejected_speed,
					'accepted' => (float)$stat->accepted_speed
					);
				$cur_stat['algo'] = $this->getAlgoNameById($stat->algo);
				$current_stats['algos'][$stat->algo] = $cur_stat;
			}
			if (!empty($current_stats))
			{
				TempCache::put($cache_key, $current_stats, 120);
			}
		}
		$this->current_stats = $current_stats;
	}

	private function load_balance_info()
	{
		$uri = 'https://api.nicehash.com/api?method=balance&id=191317&key=1289dd4a-637d-4e3d-bc36-0425dda230ee';
		$cache_key = 'nicehash_balance_info_v2906';
		$balance_info = TempCache::get($cache_key);
		if (is_null($balance_info))
		{
			$client = new GuzzleHttp\Client();
			$response = $client->get($uri);
			$body = (string)$response->getBody();
			$json_info = json_decode($body);

			$result = $json_info->result;

			$balance_info = array(
				'pending' => $result->balance_pending,
				'confirmed' => $result->balance_confirmed
				);

			if (!empty($balance_info))
			{
				TempCache::put($cache_key, $balance_info, 300);
			}
		}
		$this->balance_info = $balance_info;
	}

	private function load_current_workers()
	{
		$cur_stats = $this->current_stats['algos'];
		$cache_key = 'nicehash_current_workers_v1807b';
		$current_workers = TempCache::get($cache_key);
		if (is_null($current_workers))
		{
			$current_workers = array();
			foreach ($cur_stats as $algo => $info)
			{
				if ($info['speed']['accepted'] > 0)
				{
					$uri = 'https://api.nicehash.com/api?method=stats.provider.workers&addr=' . self::NICEHASH_WALLET_HASH . '&algo=' . $algo;
					$client = new GuzzleHttp\Client();
					$response = $client->get($uri);
					$body = (string)$response->getBody();
					$json_info = json_decode($body);

					$workers = $json_info->result->workers;
					foreach ($workers as $worker)
					{
						if (!isset($current_workers[$worker[0]]))
						{
							$current_workers[$worker[0]] = array();
							$current_workers[$worker[0]]['total_minutes'] = 0;
							$current_workers[$worker[0]]['algos'] = array();
						}
						$current_workers[$worker[0]]['total_minutes'] += $worker[2];
						$cur_worker = array();
						$cur_worker['minutes_connected'] = $worker[2];
						$cur_worker['xnsub'] = (bool)$worker[3];
						$cur_worker['speed'] = $worker[1];
						$cur_worker['difficulty'] = $worker[4];
						$cur_worker['location'] = $this->getLocationByCode($worker[5]);
						$current_workers[$worker[0]]['algos'][$algo] = $cur_worker;
					}
				}
			}
			if (!empty($current_workers))
			{
                // Cache overall information for 1 minute
				TempCache::put($cache_key, $current_workers, 60);
			}
		}
		$this->current_workers = $current_workers;
	}

	private function load_algo_info()
	{
		$uri = 'https://api.nicehash.com/api?method=multialgo.info';
		$cache_key = 'nicehash_algoinfo_v1807a';
		$algo_info = TempCache::get($cache_key);
		if (is_null($algo_info))
		{
			$client = new GuzzleHttp\Client();
			$response = $client->get($uri);
			$body = (string)$response->getBody();
			$json_info = json_decode($body);
			$algos = $json_info->result->multialgo;
			$algo_info = array();
			foreach ($algos as $algo)
			{
				$cur_algo = array();
				$cur_algo['default_factor'] = $algo->default_factor;
				$cur_algo['name'] = $algo->name;
				$cur_algo['id'] = $algo->algo;
				$algo_info[$algo->algo] = $cur_algo;
			}
			if (!empty($algo_info))
			{
				TempCache::put($cache_key, $algo_info, TempCache::TIME_1_DAY);
			}
		}
		$this->algo_info = $algo_info;
	}

	public function getAlgoNameById($algo_id)
	{
		return $this->algo_info[$algo_id]['name'];
	}

	public function getLocationByCode($code)
	{
		$locations = array(
			0 => 'EU', 1 => 'US', 2 => 'HK', 3 => 'JP'
			);
		return $locations[$code];
	}
}
