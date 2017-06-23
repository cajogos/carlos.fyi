<?php

// Bunch of API calls for cbot
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
                    'USD' => $bitcoin_api->getUSDValue(),
                    'GBP' => $bitcoin_api->getGBPValue(),
                    'EUR' => $bitcoin_api->getEURValue()
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