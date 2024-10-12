{extends file="include/header.tpl"}

{block name=head}
	<link rel="stylesheet" href="/assets/css/rubiks.css">
{/block}

{block name=body}
	<div class="rubiks-cube-page">
		<h1 class="text-center"><i class="fa fa-cube"></i> How to solve a 3x3 Rubik's Cube <i class="fa fa-cube"></i></h1>

		<h2>Face Rotations</h2>
		<p>The system to solve a Rubik's cube uses a simple face rotation schema. You will find that the whole face will rotate either clockwise or
			anti-clockwise. Below is an example of all the face rotations you might need to make:</p>
		<ul class="cube-algo">
			<li data-move="R"></li>
			<li data-move="Ri"></li>
			<li data-move="L"></li>
			<li data-move="Li"></li>
			<li data-move="B"></li>
			<li data-move="Bi"></li>
			<li data-move="D"></li>
			<li data-move="Di"></li>
			<li data-move="F"></li>
			<li data-move="Fi"></li>
			<li data-move="U"></li>
			<li data-move="Ui"></li>
		</ul>

		<div class="well">
			<h2>Step 1: Daisy</h2>
			<p>Create a daisy shape using the yellow-side of the cube.</p>
		</div>

		<div class="well">
			<h2>Step 2: White Cross</h2>
			<p>Turn the sides around so that the edges match the centre pieces.</p>
		</div>

		<div class="well">
			<h2>Step 3: White Corners</h2>
			<p>Match the white corners with the edge and centre pieces.</p>
		</div>

		<div class="well">
			<h2>Step 4: Second Layer</h2>
			<p>Move the pieces into their correct positions by using a right and left algorithm.</p>
			<h3 class="text-center">Right Edge Algorithm</h3>
			<ul class="cube-algo">
				<li data-move="U"></li>
				<li data-move="R"></li>
				<li data-move="Ui"></li>
				<li data-move="Ri"></li>
				<li data-move="Ui"></li>
				<li data-move="Fi"></li>
				<li data-move="U"></li>
				<li data-move="F"></li>
			</ul>
			<h3 class="text-center">Left Edge Algorithm</h3>
			<ul class="cube-algo">
				<li data-move="Ui"></li>
				<li data-move="Li"></li>
				<li data-move="U"></li>
				<li data-move="L"></li>
				<li data-move="U"></li>
				<li data-move="F"></li>
				<li data-move="Ui"></li>
				<li data-move="Fi"></li>
			</ul>
		</div>

		<div class="well">
			<h2>Step 5: Yellow Cross</h2>
			<p>Do the following to reach the yellow cross:</p>
			<ul class="cube-algo">
				<li data-move="F"></li>
				<li data-move="R"></li>
				<li data-move="U"></li>
				<li data-move="Ri"></li>
				<li data-move="Ui"></li>
				<li data-move="Fi"></li>
			</ul>
			<div class="alert alert-warning">
				<strong>Center Dot</strong>&nbsp;&nbsp;
				<i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp;
				<strong>Reverse L shape</strong>&nbsp;&nbsp;
				<i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp;
				<strong>Line</strong>&nbsp;&nbsp;
				<i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp;
				<strong>Cross</strong>
			</div>
		</div>

		<div class="well">
			<h2>Step 6: Yellow Edges</h2>
			<p>Use the following algorithm to swap two wrong yellow edges.</p>
			<ul class="cube-algo">
				<li data-move="R"></li>
				<li data-move="U"></li>
				<li data-move="Ri"></li>
				<li data-move="U"></li>
				<li data-move="R"></li>
				<li data-move="U"></li>
				<li data-move="U"></li>
				<li data-move="Ri"></li>
				<li data-move="U"></li>
			</ul>
		</div>

		<div class="well">
			<h2>Step 7: Yellow Corners</h2>
			<p>Look for a yellow corner which is on the right position, then hold the cube in your hands with this one in the front-right-top and execute the
				algorithm below.</p>
			<ul class="cube-algo">
				<li data-move="U"></li>
				<li data-move="R"></li>
				<li data-move="Ui"></li>
				<li data-move="Li"></li>
				<li data-move="U"></li>
				<li data-move="Ri"></li>
				<li data-move="Ui"></li>
				<li data-move="L"></li>
			</ul>
			<p class="alert alert-warning">
				If the pieces didn't get where they belong do the algorithm one more time.<br/>
				Sometimes you <strong>can't find a piece in the correct spot</strong>. In this case utilize the <strong>same algorithm for any random
					corner</strong> to bring one to the correct position.
			</p>
		</div>

		<div class="well">
			<h2>Step 8: Orient the corners</h2>
			<p>Hold the cube in your hand so the upper piece you want to orient is on the FRT corner, then do this algorithm twice or four times. </p>
			<ul class="cube-algo">
				<li data-move="Ri"></li>
				<li data-move="Di"></li>
				<li data-move="R"></li>
				<li data-move="D"></li>
			</ul>
			<p class="alert alert-danger"><strong>Warning:</strong> DO NOT skip the last D turn as soon as you see the yellow sticker facing up at the top. Keep
				going until the whole algorithm is done.</p>
		</div>

	</div>
{/block}

{block name=js}
	<script type="text/javascript" src="/assets/js/rubiks.js"></script>
{/block}
