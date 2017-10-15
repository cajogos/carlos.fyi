<?php

require_once '../../app/init.php';

$valid_methods = array(
    'bitcoinValue'
);

$result = array();
$result['status'] = 'fail';

if ($_GET)
{
    $method = Request::getGetVariable('method');
    if (!in_array($method, $valid_methods))
    {
        $result['message'] = 'Invalid method provided';
    }
    else
    {
        switch ($method)
        {
            case 'bitcoinValue':
                $bitcoin_api = BitcoinAPI::get();
                $values = array(
                    'USD' => $bitcoin_api->getMonetaryValues('BTC')['USD'],
                    'GBP' => $bitcoin_api->getMonetaryValues('BTC')['GBP'],
                    'EUR' => $bitcoin_api->getMonetaryValues('BTC')['EUR']
                );
                $result['values'] = $values;
                $result['status'] = 'success';
                break;
        }
    }
}

$api_response = new APIResponse();
$api_response->setResult($result);
$api_response->displayResult();