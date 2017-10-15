{extends file="include/header.tpl"}

{block name=head}{/block}

{block name=body}
    <div class="bitcoin-page">
        <div class="row">
            <div class="col-sm-4">
                <h1>Cryptocurrencies <i class="fa fa-bitcoin"></i></h1>
                <p><a href="bitcoin:{$bitcoin_hash}">{$bitcoin_hash}</a></p>
                <p class="small">I accept donations :)</p>
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
    </div>
{/block}

{block name=js}{/block}