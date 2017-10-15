<?php

class CryptoController extends Controller
{
    public static function redirect()
    {
        Request::redirect('/crypto');
    }

	public static function display()
	{
		$tpl = Template::create('pages/crypto.tpl');
		$tpl->assign('page_title', 'Everyday I am HODLing');
		$tpl->assign('page_id', 'crypto');
		$tpl->assign('social_title', 'Cryptocurrencies | Carlos Ferreira - All Crypto HODLer from London');
		$tpl->assign('social_desc', 'Name is Carlos and I like HODLing on to things.');

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



		$tpl->display();
	}
}