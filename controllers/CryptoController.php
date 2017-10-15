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

        $bitcoin_api = BitcoinAPI::get();

		// Bitcoin
		$tpl->assign('btc_hash', BitcoinAPI::getWalletHash('BTC'));
		$tpl->assign('btc_usd', $bitcoin_api->getMonetaryValues('BTC')['USD']);
		$tpl->assign('btc_eur', $bitcoin_api->getMonetaryValues('BTC')['EUR']);
		$tpl->assign('btc_gbp', $bitcoin_api->getMonetaryValues('BTC')['GBP']);

		// Ethereum
        $tpl->assign('eth_hash', BitcoinAPI::getWalletHash('ETH'));
        $tpl->assign('eth_btc', $bitcoin_api->getMonetaryValues('ETH')['BTC']);
        $tpl->assign('eth_usd', $bitcoin_api->getMonetaryValues('ETH')['USD']);
        $tpl->assign('eth_eur', $bitcoin_api->getMonetaryValues('ETH')['EUR']);
        $tpl->assign('eth_gbp', $bitcoin_api->getMonetaryValues('ETH')['GBP']);

        // Litecoin
        $tpl->assign('ltc_hash', BitcoinAPI::getWalletHash('LTC'));
        $tpl->assign('ltc_btc', $bitcoin_api->getMonetaryValues('LTC')['BTC']);
        $tpl->assign('ltc_usd', $bitcoin_api->getMonetaryValues('LTC')['USD']);
        $tpl->assign('ltc_eur', $bitcoin_api->getMonetaryValues('LTC')['EUR']);
        $tpl->assign('ltc_gbp', $bitcoin_api->getMonetaryValues('LTC')['GBP']);

        // Verge
        $tpl->assign('xvg_hash', BitcoinAPI::getWalletHash('XVG'));
        $tpl->assign('xvg_btc', $bitcoin_api->getMonetaryValues('XVG')['BTC']);
        $tpl->assign('xvg_usd', $bitcoin_api->getMonetaryValues('XVG')['USD']);
        $tpl->assign('xvg_eur', $bitcoin_api->getMonetaryValues('XVG')['EUR']);
        $tpl->assign('xvg_gbp', $bitcoin_api->getMonetaryValues('XVG')['GBP']);


		$tpl->display();
	}
}