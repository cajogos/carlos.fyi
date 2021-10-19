<!doctype html>
<html lang="en">
<head>

	<!-- Open Graph Tags -->
	<meta property="og:type" content="profile" />
	<meta property="og:title" content="{$social_title}" />
	<meta property="og:description" content="{$social_desc}" />
	<meta property="og:image" content="https://carlos.fyi/assets/imgs/fb_share_img.png" />
	<meta property="og:image:width" content="1200" />
	<meta property="og:image:height" content="630" />
	<meta property="og:locale" content="en_GB" />

	<!-- Twitter Card Tags -->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@carlos_tweets">
	<meta name="twitter:creator" content="@carlos_tweets">
	<meta name="twitter:title" content="{$social_title}">
	<meta name="twitter:description" content="{$social_desc}">
	<meta name="twitter:image" content="https://carlos.fyi/assets/imgs/fb_share_img.png">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="/assets/css/slideout.css" />
	<link rel="stylesheet" href="/assets/css/main.css" />
{*
	{literal}
	<script type="text/javascript">
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-17954862-6', 'auto');
		ga('send', 'pageview');
	</script>
	{/literal} *}

	{block name=head}{/block}
</head>
<body>
	{* <div id="navigation-menu" style="display: none">
		{include file="partials/slideout-navbar.tpl"}
	</div> *}

	<div id="website-content">
		<button class="toggle-button"><i class="fa fa-bars"></i></button>

		<div class="container">
			{block name=body}{/block}
			{* <div class="site-footer">
				<p><a title="FYI That's me :)" href="https://carlos.fyi/">carlos.fyi</a> &copy; {date('Y')}</p>
			</div> *}
		</div>
	</div>

	<!-- Slideout Menu -->
	<script type="text/javascript">
		var slideoutOptions = {
			'menu': document.getElementById('navigation-menu'),
			'panel': document.getElementById('website-content'),
			'padding': 300,
			'tolerance': 70
		};
		var slideout = new Slideout(slideoutOptions);
		// Toggle opacity of navigation menu - fixes the issues of menu showing before page loads
		$('div#navigation-menu').css('display', 'block');
		var toggleButton = $('.toggle-button');
		toggleButton.on('click', function()
		{
			slideout.toggle();
		});
		slideout.on('beforeopen', function()
		{
			toggleButton.html('<i class="fa fa-times"></i>');
		});
		slideout.on('close', function()
		{
			toggleButton.html('<i class="fa fa-bars"></i>');
		});
	</script>
	{block name=js}{/block}
</body>
</html>