<?php

function handleIndexPage()
{
    $tpl = Template::create('pages/index.tpl');
    $tpl->assign('page_title', 'Welcome');
    $tpl->assign('page_id', 'index');
    $tpl->assign('social_title', 'Carlos Ferreira - All Things Developer from London');
    $tpl->assign('social_desc', 'Name is Carlos and I like making things. Check out my website to know what I can do.');
    $tpl->display();
}

function handleContactPage()
{
    $tpl = Template::create('pages/contact.tpl');
    $tpl->assign('page_title', 'Get In Touch');
    $tpl->assign('page_id', 'contact');
    $tpl->assign('social_title', 'Contact Carlos Ferreira - All Things Developer from London');
    $tpl->assign('social_desc', 'Name is Carlos and I like making things. Check out my website to know what I can do.');
    $tpl->display();
}

function handleSkillsPage()
{
    $tpl = Template::create('pages/skills.tpl');
    $tpl->assign('page_title', 'What I can do');
    $tpl->assign('page_id', 'skills');
    $tpl->assign('social_title', 'What I Can Do');
    $tpl->assign('social_desc', 'Name is Carlos and I like making things. Check out my website to know what I can do.');
    $tpl->display();
}

function handleTimelinePage()
{
    $tpl = Template::create('pages/timeline.tpl');
    $tpl->assign('page_title', 'My Life Events');
    $tpl->assign('page_id', 'timeline');
    $tpl->assign('social_title', 'My Life Events | Carlos Ferreira - All Things Developer from London');
    $tpl->assign('social_desc', 'Name is Carlos and I like making things. Check out my website to know what I can do.');
    $tpl->display();
}

function handleBitcoinPage()
{
    $tpl = Template::create('pages/bitcoin.tpl');
    $tpl->assign('page_title', 'My Bitcoins');
    $tpl->assign('page_id', 'bitcoin');

    // Bitcoin
    $bitcoin_api = BitcoinAPI::get();
    $tpl->assign('bitcoin_hash', BitcoinAPI::HASH_COINBASE);

    $tpl->assign('balance', $bitcoin_api->getWalletBalance());
    $tpl->assign('balance_usd', $bitcoin_api->getBalanceInUSD());

    // Monetary Values
    $usd_value = $bitcoin_api->getUSDValue();
    $eur_value = $bitcoin_api->getEURValue();
    $gbp_value = $bitcoin_api->getGBPValue();
    $tpl->assign('usd_value', $usd_value);
    $tpl->assign('eur_value', $eur_value);
    $tpl->assign('gbp_value', $gbp_value);

    // NiceHash
    $nicehash_api = NiceHashAPI::get();

    $tpl->assign('nicehash_key', NiceHashAPI::NICEHASH_WALLET_HASH);
    $tpl->assign('nicehash_balance', $nicehash_api->getCurrentTotalBalance());

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
            $workers_html .= '<br /><strong>Speed: </strong>' . $results['speed']->a;
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

/** 404 Page **/
function handle404Page()
{
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    $tpl = Template::create('404 - splash . tpl');
    $tpl->assign('page_title', '404 Not Found - Carlos Ferreira - All Things Developer');
    $tpl->assign('title', '404 - Not Found :(');
    $tpl->assign('subtitle', 'Oops!Looks like whatever you were looking for can not be found... Please try again later . You will be redirected in 10 seconds...');
    $tpl->display();
}

/** Handle Routing **/
function handleRouting(AltoRouter $router)
{
    $match = $router->match();
    if ($match && is_callable($match['target']))
    {
        call_user_func_array($match['target'], $match['params']);
    }
    else
    {
        handle404Page();
    }
}