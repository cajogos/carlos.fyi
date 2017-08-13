<?php

class BitcoinController extends Controller
{
	public static function display()
	{
		$tpl = Template::create('pages/bitcoin.tpl');
		$tpl->assign('page_title', 'My Bitcoin Mining');
		$tpl->assign('page_id', 'bitcoin');
		$tpl->assign('social_title', 'Bitcoin Mining | Carlos Ferreira - All Things Developer from London');
		$tpl->assign('social_desc', 'Name is Carlos and I like making things. Check out my website to know what I can do.');

		// Bitcoin
		$bitcoin_api = BitcoinAPI::get();
		$tpl->assign('bitcoin_hash', BitcoinAPI::HASH_COINBASE);

		// Monetary Values
		$usd_value = $bitcoin_api->getUSDValue();
		$eur_value = $bitcoin_api->getEURValue();
		$gbp_value = $bitcoin_api->getGBPValue();
		$tpl->assign('usd_value', $usd_value);
		$tpl->assign('eur_value', $eur_value);
		$tpl->assign('gbp_value', $gbp_value);

		// NiceHash
		$nicehash_api = NiceHashAPI::get();

		// Check that Nicehash did not have issues
		$problem = $nicehash_api->hasError();
		$tpl->assign('nicehash_error', $problem);
		if ($problem)
		{
			$tpl->display();
			exit;
		}

		$tpl->assign('nicehash_key', NiceHashAPI::NICEHASH_WALLET_HASH);
		$tpl->assign('nicehash_wallet_confirmed', $nicehash_api->getWalletConfirmedBalance());
		$tpl->assign('nicehash_wallet_pending', $nicehash_api->getWalletPendingBalance());
		$tpl->assign('nicehash_mining_balance', $nicehash_api->getMiningBalance());

		// Current NiceHash stats
		$cur_stats = $nicehash_api->getCurrentStats()['algos'];
		$stats_html = '<div class="row">';
		foreach ($cur_stats as $algo => $info)
		{
			if ($info['balance'] > 0)
			{
				$stats_html .= '<div class="col-xs-3 text-center">';
				$stats_html .= '<h5 title="Speed: Accepted(' . number_format($info['speed']['accepted'], 6) . ') | Rejected(' . number_format($info['speed']['rejected'], 6) . ')">'
					. $info['algo'] . ' <span class="label label-primary">' . number_format($info['balance'], 8) . ' BTC</span></h5>';
				$stats_html .= '</div>';
			}
		}
		$stats_html .= '</div>';
		$tpl->assign('statshtml', $stats_html);

		// NiceHash Workers information
		$workers_html = '<div class="row">';
		$cur_workers = $nicehash_api->getCurrentWorkers();
		foreach ($cur_workers as $name => $info)
		{
			$workers_html .= '<div class="col-sm-4">';
			$workers_html .= '<div class="panel panel-success">';
			$workers_html .= '<div class="panel-heading">';
			$workers_html .= '<h3 class="panel-title">' . strip_tags($name) . '</h3>';
			$workers_html .= '</div>';
			$workers_html .= '<div class="panel-body">';
			foreach ($info['algos'] as $algo => $results)
			{
				$workers_html .= '<p><strong>Algorithm: </strong>' . $nicehash_api->getAlgoNameById($algo);
				$workers_html .= '<br /><strong>Time: </strong>' . $results['minutes_connected'] . ' mins';
				$workers_html .= '<br /><strong>Difficulty: </strong>' . $results['difficulty'];
				if (isset($results['speed']->a))
				{
					$workers_html .= '<br /><strong>Speed: </strong>' . $results['speed']->a;
				}
				$workers_html .= '<br /><strong>Location: </strong>' . $results['location'];
				$workers_html .= '</p><hr />';
			}
			$workers_html .= '</div>';
			$workers_html .= '<div class="panel-footer">Active for ' . $info['total_minutes'] . ' minutes.</div>';
			$workers_html .= '</div>';
			$workers_html .= '</div>';
		}
		$workers_html .= '</div>';
		$tpl->assign('workershtml', $workers_html);

		$tpl->display();
	}
}