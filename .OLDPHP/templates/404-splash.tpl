{extends file="include/header-splash.tpl"}

{block name=head}
<link rel="stylesheet" href="/assets/css/splash.css" />
{/block}

{block name=body}

<div class="splash" id="page-container">
	<canvas id="bg-canvas"></canvas>
	<h1>{$title}</h1>
	<p>{$subtitle}</p>

	{include file='partials/social-links.tpl'}
</div>
{/block}

{block name=js}
<script type="text/javascript" src="/assets/js/TweenLite.min.js"></script>
<script type="text/javascript" src="/assets/js/EasePack.min.js"></script>
<script type="text/javascript" src="/assets/js/rAF.js"></script>
<script type="text/javascript" src="/assets/js/splash.js"></script>
<script type="text/javascript">
	// Redirect to homepage after 10 seconds
	setTimeout(function() { window.location = '/'; }, 60000);
</script>
{/block}