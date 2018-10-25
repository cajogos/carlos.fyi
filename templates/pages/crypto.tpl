{extends file="include/header.tpl"}

{block name=head}{/block}

{block name=body}
	<div class="bitcoin-page">
		<h1>Cryptocurrencies</h1>
		<p>These are the cryptocurrencies I am currently HODLing. I intend to mine and invest in more altcoins. So keep
			visiting to check out the latest coin I am interested in.</p>

		<hr />
		<div class="row">

			<!-- Bitcoin -->
			<div class="col-sm-4">
				<div class="panel panel-default text-center">
					<div class="panel-body">
						<h3 class="panel-title">
							<img src="/assets/imgs/cryptos/bitcoin.png"/> Bitcoin
						</h3>
					</div>
					<table class="table">
						<thead>
							<tr>
								<th class="text-center">USD</th>
								<th class="text-center">GBP</th>
								<th class="text-center">EUR</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>&dollar; {$bitcoin['prices']['usd']|string_format:"%.2f"}</td>
								<td>&pound; {$bitcoin['prices']['gbp']|string_format:"%.2f"}</td>
								<td>&euro; {$bitcoin['prices']['eur']|string_format:"%.2f"}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<!-- Ethereum -->
			<div class="col-sm-4">
				<div class="panel panel-default text-center">
					<div class="panel-body">
						<h3 class="panel-title">
							<img src="/assets/imgs/cryptos/ethereum.png"/> Ethereum
						</h3>
					</div>
					<table class="table">
						<thead>
							<tr>
								<th class="text-center">BTC</th>
								<th class="text-center">USD</th>
								<th class="text-center">GBP</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><i class="fa fa-btc"></i> {$ethereum['prices']['btc']|string_format:"%.8f"}</td>
								<td>&dollar; {$ethereum['prices']['usd']|string_format:"%.3f"}</td>
								<td>&pound; {$ethereum['prices']['gbp']|string_format:"%.3f"}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<!-- Litecoin -->
			<div class="col-sm-4">
				<div class="panel panel-default text-center">
					<div class="panel-body">
						<h3 class="panel-title">
							<img src="/assets/imgs/cryptos/litecoin.png"/> Litecoin
						</h3>
					</div>
					<table class="table">
						<thead>
							<tr>
								<th class="text-center">BTC</th>
								<th class="text-center">USD</th>
								<th class="text-center">GBP</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><i class="fa fa-btc"></i> {$litecoin['prices']['btc']|string_format:"%.8f"}</td>
								<td>&dollar; {$litecoin['prices']['usd']|string_format:"%.3f"}</td>
								<td>&pound; {$litecoin['prices']['gbp']|string_format:"%.3f"}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

		</div>

		<hr />
		<div class="row">

			<!-- Dogecoin -->
			<div class="col-sm-4">
				<div class="panel panel-default text-center">
					<div class="panel-body">
						<h3 class="panel-title">
							<img src="/assets/imgs/cryptos/dogecoin.png"/> Dogecoin
						</h3>
					</div>
					<table class="table">
						<thead>
							<tr>
								<th class="text-center">BTC</th>
								<th class="text-center">USD</th>
								<th class="text-center">GBP</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><i class="fa fa-btc"></i> {$dogecoin['prices']['btc']|string_format:"%.8f"}</td>
								<td>&dollar; {$dogecoin['prices']['usd']|string_format:"%.4f"}</td>
								<td>&pound; {$dogecoin['prices']['gbp']|string_format:"%.4f"}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<!-- PlusOneCoin -->
			<div class="col-sm-4">
				<div class="panel panel-default text-center">
					<div class="panel-body">
						<h3 class="panel-title">
							<img src="/assets/imgs/cryptos/plusonecoin.png"/> PlusOneCoin
						</h3>
					</div>
					<table class="table">
						<thead>
							<tr>
								<th class="text-center">BTC</th>
								<th class="text-center">USD</th>
								<th class="text-center">GBP</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><i class="fa fa-btc"></i> {$plusonecoin['prices']['btc']|string_format:"%.8f"}</td>
								<td>&dollar; {$plusonecoin['prices']['usd']|string_format:"%.4f"}</td>
								<td>&pound; {$plusonecoin['prices']['gbp']|string_format:"%.4f"}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<!-- Brazio -->
			<div class="col-sm-4">
				<div class="panel panel-default text-center">
					<div class="panel-body">
						<h3 class="panel-title">
							<img src="/assets/imgs/cryptos/brazio.png"/> Brazio
						</h3>
					</div>
					<table class="table">
						<thead>
							<tr>
								<th class="text-center">BTC</th>
								<th class="text-center">USD</th>
								<th class="text-center">GBP</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><i class="fa fa-btc"></i> {$brazio['prices']['btc']|string_format:"%.8f"}</td>
								<td>&dollar; {$brazio['prices']['usd']|string_format:"%.4f"}</td>
								<td>&pound; {$brazio['prices']['gbp']|string_format:"%.4f"}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

		</div>


		<hr/>
		<div class="well">
			<p class="small">
				*Prices displayed here are delayed by up to 60 seconds and are provided by <a href="https://www.coingecko.com/" target="_blank">CoinGecko</a>.<br />
				Cryptocurrency logos provided by <a href="https://www.advfn.com/cryptocurrency" target="_blank">ADVFN Cryptocurrency</a>.
			</p>
		</div>

	</div>
{/block}

{block name=js}{/block}