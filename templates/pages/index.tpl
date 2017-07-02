{extends file="include/header.tpl"}

{block name=head}{/block}

{block name=body}

<div class="about-page">
	<h1 class="hello-msg" title="Carlos Ferreira">Hey there, I am <span class="color-cajogos-blue">Carlos</span>. <span class="subtitle">I <i class="fa fa-heart color-global-orangered"></i> making things! :)</span></h1>
	<div class="row">
		<div class="col-sm-4" style="text-align: center">
			<img src="/assets/imgs/photo_squared_300.jpg" class="img-circle avatar" />
			<p>All Things Developer</p>
			{include file="partials/social-footer.tpl"}
			<p class="text-center">
				<a href="/contact" title="Find out more ways of contacting me.">Wanna chat?</a>
			</p>
		</div>
		<div class="col-sm-8">
			<h2>Facts</h2>

			<h3>About Me</h3>
			<p>My full name is <strong>Carlos Jorge Lima Ferreira</strong>, but my friends call me <strong class="color-cajogos-blue">Carlos</strong>. <small>(yes, you can call me Carlos)</small></p>
			<p>I was born in 1994, which makes me 23 years <del>old</del> young, I share a birthday with Cher, although she was born 48 years before me.</p>
			<p>I lived in Viseu, Portugal*, until I was 13, and I am now living in London. <small>(the one in the United Kingdom)</small></p>
			<p>I graduated with a first-class degree in BSc (Hons) Computer Science from the University of Greenwich.</p>
			<p>I studied A-Levels in Mathematics (with Statistics), ICT, Portuguese and Graphics Design.</p>
			<p class="small">*Sim, eu sei falar e escrever em Portugu&ecirc;s, <em>and English</em>.</p>

			<h3>Things I do</h3>
			<p>Drink <em>at least</em> a cup of coffee a day.</p>
			<p>I like to write and contribute to <a href="https://github.com/cajogos" title="See my Github contributions." target="_blank">open-source code</a>.</p>
			<p>I created some <a href="https://packagist.org/packages/cajogos/php-temp-cache" title="PHP TempCache" target="_blank">PHP Caching Library</a>.</p>
			<p>I have my own <a href="https://biscuit.link" title="Biscuit Link - PHP Framework for Everyone" target="_blank">PHP framework</a>, deeply inspired in my love for biscuits.</p>
			<p>Oh and a <a href="https://github.com/cajogos/seesaw" title="SEESAW JS - Always running web applications." target="_blank">JavaScript framework</a> for always running web applications.</p>
			<p>I often <a href="https://twitter.com/carlos_tweets" title="Follow Carlos Ferreira on Twitter." target="_blank">complain about my train commute</a>.</p>
			<p>I have grown a recent obsession with cryptocurrencies, mainly <a href="/bitcoin" title="Check out my mining pool!"><i class="fa fa-bitcoin"></i> Bitcoin</a>.</p>
			<p>I've been a Web Application Developer at <a href="https://uk.advfn.com/" title="ADVFN - Advanced Financial Network" target="_blank">ADVFN</a> since February 2015.</p>
			<p>I've been a Lead Mentor, <a href="https://www.instagram.com/p/BL4GdOKh0z6/" target="_blank">International Speaker</a>, and Content Creator for <a href="https://coderdojo.com" target="_blank">CoderDojo</a> since May 2013.</p>
			<p>Currently the head of development for the <a href="https://coderdojo.london" title="CoderDojo London Official Website" target="_blank">CoderDojo London</a> website.</p>

			<div class="row">
				<div class="col-xs-6">
					<h3>Things I like</h3>
					<p>Superhero Comics, Movies, TV Shows &amp; <span title="Collectables?">Collectibles</span>.</p>
					<p>Japanese culture, including Manga and Anime.</p>
					<p><a href="http://www.last.fm/user/cajogos/library/artists" target="_blank">This sort of music</a>.</p>
					<p>Learning new stuff.</p>
				</div>
				<div class="col-xs-6">
					<h3>Things I dislike</h3>
					<p>Spiders. The bigger kind.</p>
					<p>Public Transportation.</p>
				</div>
			</div>
		</div>
	</div>
</div>

{/block}

{block name=js}{/block}
