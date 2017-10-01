{extends file="include/header.tpl"}

{block name=head}
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<link rel="stylesheet" href="/assets/minesweeper/sweeper.min.css"/>
	<script type="text/javascript" src="/assets/minesweeper/sweeper.min.js"></script>
{/block}

{block name=body}
	<div class="mine-game container-fluid">
		<div class="row">
			<div class="col-sm-6">
				<h1><i class="fa fa-bomb"></i> Minesweeper!</h1>
				<p>A very simple HTML minesweeper game which runs on most modern browsers!</p>
			</div>
			<div class="col-sm-6">
				<div class="row">
					<div class="col-xs-6">
						<a class="github-button" href="https://github.com/cajogos/minesweeper/fork" target="_blank"
						   data-size="large" data-show-count="true" aria-label="Fork cajogos/minesweeper on GitHub">Fork</a>
						<a class="github-button" href="https://github.com/cajogos/minesweeper" target="_blank"
						   data-icon="octicon-star" data-size="large" data-show-count="true"
						   aria-label="Star cajogos/minesweeper on GitHub">Star</a>
					</div>
					<div class="col-xs-6 text-right">
						<button type="button" class="btn btn-success" id="start-btn">
							<i class="fa fa-flag"></i> Start
						</button>
						<button type="button" class="btn btn-primary" id="reset-btn">
							<i class="fa fa-refresh"></i> Reset
						</button>
					</div>
				</div>
				<hr/>
				<div class="row config-area">
					<div class="col-xs-3">
						<label class="small" for="num-rows">Num Rows: <span id="num-rows-value"></span></label>
						<input type="range" id="num-rows" min="8" max="50" step="2" value="16"/>
					</div>
					<div class="col-xs-3">
						<label class="small" for="num-cols">Num Cols: <span id="num-cols-value"></span></label>
						<input type="range" id="num-cols" min="8" max="50" step="2" value="16"/>
					</div>
					<div class="col-xs-6">
						<label class="small" for="num-mines">Num Mines: <span id="num-mines-value"></span></label>
						<input type="range" id="num-mines" min="8" max="12" step="1" value="28"/>
					</div>
				</div>
			</div>
		</div>
		<hr/>
		<div id="game-area">
			<h1 class="text-center">Press Start to play!</h1>
		</div>
	</div>
{/block}

{block name=js}
	<script type="text/javascript">
        // Initialise once document loads
        $(document).ready(function () {
            var sweeperOptions = {
                gameArea: $('#game-area'),
                buttons: {
                    start: $('#start-btn'),
                    reset: $('#reset-btn')
                },
                inputs: {
                    rows: $('#num-rows'),
                    cols: $('#num-cols'),
                    mines: $('#num-mines')
                }
            };
            SWEEPER.init(sweeperOptions);
        });
	</script>
	<!-- Place this tag in your head or just before your close body tag. -->
	<script async defer src="https://buttons.github.io/buttons.js"></script>
{/block}
