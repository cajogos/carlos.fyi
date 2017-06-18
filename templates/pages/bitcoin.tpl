{extends file="include/header.tpl"}

{block name=head}{/block}

{block name=body}
    <div class="bitcoin-page">
        <div class="row">
            <div class="col-sm-4">
                <h1>My Bitcoins <i class="fa fa-bitcoin"></i></h1>
                <p><a href="bitcoin:{$bitcoin_hash}">{$bitcoin_hash}</a></p>
                <p><strong>Balance: </strong> {$balance|string_format:"%.8f"} BTC (USD
                    ${$balance_usd|string_format:"%.2f"})
                </p>
            </div>
            <div class="col-sm-8">
                <h2>Bitcoin Value</h2>
                <div class="row">
                    <div class="col-xs-4 text-center">
                        <h3>USD &dollar;{$usd_value|string_format:"%.2f"}</h3>
                    </div>
                    <div class="col-xs-4 text-center">
                        <h3>GBP &pound;{$gbp_value|string_format:"%.2f"}</h3>
                    </div>
                    <div class="col-xs-4 text-center">
                        <h3>EUR &euro;{$eur_value|string_format:"%.2f"}</h3>
                    </div>
                </div>
                <p class="small">*Prices displayed here are delayed by up to 60 seconds and are provided by <a
                            href="https://www.cryptocompare.com/" target="_blank">CryptoCompare</a>.</p>
            </div>
        </div>

        <h2>NiceHash Stats</h2>
        <p><strong>Balance: </strong>{$nicehash_balance|string_format:"%.8f"} BTC</p>
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">Breakdown by Algorithm</h3>
            </div>
            <div class="panel-body">
                {$statshtml}
            </div>
        </div>
        <div class="well">
            <p>These are the currently active workers mining on the Nicehash pool for the <a
                        href="https://www.nicehash.com/index.jsp?p=miners&addr={$nicehash_key}"
                        target="_blank">{$nicehash_key}</a> hash, feel free to join us!</p>
            {$workershtml}
        </div>
    </div>
{/block}

{block name=js}{/block}