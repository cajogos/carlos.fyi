<?php

require_once '../../app/init.php';



$nicehash_api = NiceHashAPI::get();

$current_stats = $nicehash_api->getCurrentStats();

/*
array(2) {
  ["mining_balance"]=>
  float(0.00046228)
  ["algos"]=>
  array(9) {
    [8]=>
    array(3) {
      ["balance"]=>
      float(0)
      ["speed"]=>
      array(2) {
        ["rejected"]=>
        float(0)
        ["accepted"]=>
        float(0)
      }
      ["algo"]=>
      string(9) "NeoScrypt"
    }

*** BRAIN DUMP
 * FIND OUT THE PREVIOUS BALANCE STORED
 *** SUBTRACT THE PREVIOUS FROM CURRENT
 * GET ALL BALANCES PER ALGORITHM
 * FIND OUT WHO IS DOING WHICH ALGORITHM
 * AGGREGATE THE SPEED VALUES TO CALCULATE PERCENTAGE OF WORK
 * SUM WORKLOAD OF ALGORITHMS - AFTER PERCENTAGE OF COINAGE

SCRIPT RUNS EVERY 5 MINUTES

ALGOA - BALANCE 0.0023455
WORKER1 SPEED = 230
WORKER2 SPEED = 140

TOTAL SPEED = 370
WORKER1 SPEED PC = WORKER1SPEED * 100 / TOTALSPEED
WORKER2 SPEED PC = WORKER2SPEED * 100 / TOTALSPEED


*/

$current_workers = $nicehash_api->getCurrentWorkers();

/*
{
    "method":"stats.provider.workers",
    "result":{
        "addr":"17a212wdrvEXWuipCV5gcfxdALfMdhMoqh",
        "algo":3,
        "workers":[[
                "rigname", // name of the worker
                {"a":"11.02","rs":"0.54"}, // speed object
                15, // time connected (minutes)
                1, // 1 = xnsub enabled, 0 = xnsub disabled
                "0.1", // difficulty
                0, // connected to location (0 for EU, 1 for US, 2 for HK and 3 for JP)
            ],
            ... // other workers here
        ]
    }
}

worker name
- total minutes
- algos
-- minutes
-- xnsub
-- speed
--- a (accepted)
--- rs (rejected)
-- difficulty
-- location



array(1) {
  ["Serhat"]=>
  array(2) {
    ["total_minutes"]=>
    int(1)
    ["algos"]=>
    array(1) {
      [24]=>
      array(5) {
        ["minutes_connected"]=>
        int(1)
        ["xnsub"]=>
        bool(true)
        ["speed"]=>
        object(stdClass)#10 (1) {
          ["a"]=>
          string(5) "43.52"
        }
        ["difficulty"]=>
        string(3) "256"
        ["location"]=>
        string(2) "EU"
      }
    }
  }
}
*/

var_dump($current_workers);