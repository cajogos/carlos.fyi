<?php

use \Cajogos\TempCache as TempCache;

class BitcoinAPI
{
    private static $wallet_hashes = array(
        'BTC' => '1CDPwYXvNFhGVjDyp1vuit4beX2CpoAehL',
        'ETH' => '0x4d82d24C6b2439463463E91d1BF0de2E73CbEDBF',
        'LTC' => 'LW3iVBUmT2VP7G1bHLfdckG8JEjNPNJsuG',
        'XVG' => 'DDCuFnNa24RkdsLNN2YWr3aaUBji819jWE'
    );
    public static function getWalletHash($coin = null)
    {
        if (is_null($coin))
        {
            return self::$wallet_hashes;
        }
        return self::$wallet_hashes[$coin];
    }

    private $monetary_values = array();

    private static $instance = null;

    // Returns the monetary values for All coins in USD, EUR and GBP
    const MONETARY_VALUES_API_CALL = 'https://min-api.cryptocompare.com/data/pricemulti';

    private static $coins = array('BTC', 'ETH', 'LTC', 'XVG');

    public static function getCoins()
    {
        return self::$coins;
    }

    private static $conversions = array('USD', 'EUR', 'GBP', 'BTC');

    public static function getConversions()
    {
        return self::$conversions;
    }

    private function get_monetary_values_api_uri()
    {
        $url = self::MONETARY_VALUES_API_CALL . '?';
        $url .= 'fsyms=' . implode(',', self::getCoins());
        $url .= '&tsyms=' . implode(',', self::getConversions());
        return $url;
    }

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

    public function getMonetaryValues($coin = null)
    {
        if (is_null($coin))
        {
            return $this->monetary_values;
        }
        return $this->monetary_values[$coin];
    }

    // Gets current bitcoin value in real world currencies
    private function load_monetary_values()
    {
        $cache_key = 'monetary_values_v15101134';
        $values = TempCache::get($cache_key);
        if (is_null($values))
        {
            $client = new GuzzleHttp\Client();
            $response = $client->get($this->get_monetary_values_api_uri());
            $body = (string)$response->getBody();
            $json_data = (array)json_decode($body);
            $values = array();
            foreach ($json_data as $data => $curr)
            {
                if (!isset($values[$data]))
                {
                    $values[$data] = array();
                }
                foreach ($curr as $key => $value)
                {
                    $values[$data][$key] = $value;
                }
            }
            TempCache::put($cache_key, $values, 60);
        }
        $this->monetary_values = $values;
    }
}