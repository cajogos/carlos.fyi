<?php

use \Cajogos\TempCache as TempCache;

class CoinGeckoAPI
{
	const CACHE_VERSION = '251018-2103';

	public static function getCoinInfo($coin_id)
	{
		$cache_key = 'CoinGeckoAPI::getCoinInfo::' . $coin_id . self::CACHE_VERSION;
		$coin_info = TempCache::get($cache_key);
		if (is_null($coin_info))
		{
			$uri = "https://api.coingecko.com/api/v3/coins/$coin_id?localization=false&sparkline=false";
			$client = new GuzzleHttp\Client();
			$response = $client->get($uri);

			$body = (string) $response->getBody();

			$json_data = json_decode($body, true);

			$coin_info = array(
				'id' => $json_data['id'],
				'symbol' => $json_data['symbol'],
				'name' => $json_data['name']
			);

			$prices = array();
			$prices['btc'] = $json_data['market_data']['current_price']['btc'];
			$prices['eth'] = $json_data['market_data']['current_price']['eth'];
			$prices['usd'] = $json_data['market_data']['current_price']['usd'];
			$prices['gbp'] = $json_data['market_data']['current_price']['gbp'];
			$prices['eur'] = $json_data['market_data']['current_price']['eur'];

			$coin_info['prices'] = $prices;

			$coin_info['change_pc'] = (float) $json_data['market_data']['price_change_percentage_24h'];

			TempCache::put($cache_key, $coin_info, 60);
		}

		return $coin_info;
	}
}