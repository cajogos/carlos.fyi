<?php

use \Cajogos\Biscuit\Controller as Controller;
use \Cajogos\Biscuit\Template as Template;

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

		$bitcoin = CoinGeckoAPI::getCoinInfo('bitcoin');
		$tpl->assign('bitcoin', $bitcoin);

		$ethereum = CoinGeckoAPI::getCoinInfo('ethereum');
		$tpl->assign('ethereum', $ethereum);

		$litecoin = CoinGeckoAPI::getCoinInfo('litecoin');
		$tpl->assign('litecoin', $litecoin);

		$dogecoin = CoinGeckoAPI::getCoinInfo('dogecoin');
		$tpl->assign('dogecoin', $dogecoin);

		$plusonecoin = CoinGeckoAPI::getCoinInfo('plusonecoin');
		$tpl->assign('plusonecoin', $plusonecoin);

		$brazio = CoinGeckoAPI::getCoinInfo('brazio');
		$tpl->assign('brazio', $brazio);

		$tpl->display();
	}
}