{extends file="include/header.tpl"}

{block name=head}{/block}

{block name=body}
    <div class="bitcoin-page">
        <h1>Cryptocurrencies</h1>
        <p>These are the cryptocurrencies I am currently HODLing. I intend to mine and invest in more altcoins. So keep
            visiting to check out the latest coin I am interested in.</p>

        <!-- Bitcoin -->
        <hr/>
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <h2><i class="fa fa-bitcoin"></i> Bitcoin</h2>
                </div>
                <div class="col-xs-6 text-right">

                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <a title="Send me some bitcoin!" href="bitcoin:{$btc_hash}">{$btc_hash}</a>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-xs-4 text-center">
                            <h3>&dollar;{$btc_usd|string_format:"%.2f"}</h3>
                        </div>
                        <div class="col-xs-4 text-center">
                            <h3>&pound;{$btc_gbp|string_format:"%.2f"}</h3>
                        </div>
                        <div class="col-xs-4 text-center">
                            <h3>&euro;{$btc_eur|string_format:"%.2f"}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ethereum -->
        <hr/>
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <h2>Ethereum</h2>
                </div>
                <div class="col-xs-6 text-right"></div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <a title="Send me some Ethereum!" href="#">{$eth_hash}</a>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-xs-3 text-center">
                            <h4><i class="fa fa-bitcoin"></i> {$eth_btc|string_format:"%.8f"}</h4>
                        </div>
                        <div class="col-xs-3 text-center">
                            <h4>&dollar;{$eth_usd|string_format:"%.2f"}</h4>
                        </div>
                        <div class="col-xs-3 text-center">
                            <h4>&pound;{$eth_gbp|string_format:"%.2f"}</h4>
                        </div>
                        <div class="col-xs-3 text-center">
                            <h4>&euro;{$eth_eur|string_format:"%.2f"}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Litecoin -->
        <hr/>
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <h2>Litecoin</h2>
                </div>
                <div class="col-xs-6 text-right"></div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <a title="Send me some Litecoin!" href="#">{$ltc_hash}</a>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-xs-3 text-center">
                            <h4><i class="fa fa-bitcoin"></i> {$ltc_btc|string_format:"%.8f"}</h4>
                        </div>
                        <div class="col-xs-3 text-center">
                            <h4>&dollar;{$ltc_usd|string_format:"%.2f"}</h4>
                        </div>
                        <div class="col-xs-3 text-center">
                            <h4>&pound;{$ltc_gbp|string_format:"%.2f"}</h4>
                        </div>
                        <div class="col-xs-3 text-center">
                            <h4>&euro;{$ltc_eur|string_format:"%.2f"}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Verge -->
        <hr/>
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <h2>Verge</h2>
                </div>
                <div class="col-xs-6 text-right"></div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <a title="Send me some Verge!" href="#">{$xvg_hash}</a>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-xs-3 text-center">
                            <h4><i class="fa fa-bitcoin"></i> {$xvg_btc|string_format:"%.8f"}</h4>
                        </div>
                        <div class="col-xs-3 text-center">
                            <h4>&dollar;{$xvg_usd|string_format:"%.5f"}</h4>
                        </div>
                        <div class="col-xs-3 text-center">
                            <h4>&pound;{$xvg_gbp|string_format:"%.5f"}</h4>
                        </div>
                        <div class="col-xs-3 text-center">
                            <h4>&euro;{$xvg_eur|string_format:"%.5f"}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr />
        <div class="well">
            <p class="small">*Prices displayed here are delayed by up to 60 seconds and are provided by <a
                        href="https://www.cryptocompare.com/" target="_blank">CryptoCompare</a>.</p>
        </div>
    </div>
{/block}

{block name=js}{/block}