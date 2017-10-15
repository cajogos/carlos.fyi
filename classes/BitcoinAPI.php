<?php

class BitcoinAPI
{
	const HASH_COINBASE = '1CDPwYXvNFhGVjDyp1vuit4beX2CpoAehL';

	private static $instance = null;

	// Returns the monetary values for Bitcoin in USD, EUR and GBP
	const MONETARY_VALUES_API_CALL = 'https://min-api.cryptocompare.com/data/price?fsym=BTC&tsyms=USD,EUR,GBP';

	private $usd_value = null;
	private $eur_value = null;
	private $gbp_value = null;

	private $wallet_balance = null;

	private function __construct()
	{
		$this->load_monetary_values();
	}

	public static function get()
	{
		if (is_null(self::$instance))
		{
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function getWalletBalance()
	{
		return $this->wallet_balance;
	}

	public function getBalanceInUSD()
	{
		return $this->usd_value * $this->wallet_balance;
	}

	public function getUSDValue()
	{
		return $this->usd_value;
	}

	public function getEURValue()
	{
		return $this->eur_value;
	}

	public function getGBPValue()
	{
		return $this->gbp_value;
	}

	// Gets current bitcoin value in real world currencies
	private function load_monetary_values()
	{
		$cache_key = 'btc_monetary_values_v1807';
		$values = TempCache::get($cache_key);
		if (is_null($values))
		{
			$client = new GuzzleHttp\Client();
			$response = $client->get(self::MONETARY_VALUES_API_CALL);
			$body = (string)$response->getBody();
			$json_data = json_decode($body);
			$values = (array)$json_data;
			// Cache for 60 seconds (should be enough)
			TempCache::put($cache_key, $values, 60);
		}
		if (is_array($values))
		{
			$this->usd_value = $values['USD'];
			$this->eur_value = $values['EUR'];
			$this->gbp_value = $values['GBP'];
		}
	}
}