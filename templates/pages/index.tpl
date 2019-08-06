{extends file="include/header.tpl"}

{block name=head}{/block}

{block name=body}

<div class="about-page">
	<h1 class="hello-msg" title="Carlos Ferreira">Hey there, I am <span class="color-cajogos-blue">Carlos</span> and <span class="subtitle">I make things <i class="fa fa-star fa-spin color-global-yellow"></i></span></h1>
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
			<h2>About Me</h2>
			<p>My full name is <strong>Carlos Jorge Lima Ferreira</strong>, but my friends call me <strong class="color-cajogos-blue">Carlos</strong>. <small>(yes, you can call me Carlos)</small></p>
			<p>Born in '94, which makes me {$age} years <del>old</del> young.</p>
			<p>I lived in Viseu, Portugal*, until I was 13, and I am now living in London. <small>(the one in the United Kingdom)</small></p>
			<p>I graduated with a first-class degree in BSc (Hons) Computer Science from the University of Greenwich.</p>
			<p>I studied A-Levels in Mathematics (with Statistics), ICT, Portuguese and Graphics Design.</p>
			<p class="small">*Sim, eu sei falar e escrever em Portugu&ecirc;s.</p>

			<h2>Things I do</h2>
			<p>Drink <em>at least</em> a cup of coffee a day.</p>
			<p>I like to write and contribute to <a href="https://github.com/cajogos" title="See my Github contributions." target="_blank">open-source code</a>.</p>
			<p>I created a <a href="https://packagist.org/packages/cajogos/php-temp-cache" title="PHP TempCache" target="_blank">PHP Caching Library</a>.</p>
			<p>I have my own <a href="https://biscuit.link" title="Biscuit Link - PHP Framework for Everyone" target="_blank">PHP framework</a>, deeply inspired in my love for biscuits.</p>
			<p>Oh and a <a href="https://github.com/cajogos/seesaw" title="SEESAW JS - Always running web applications." target="_blank">JavaScript framework</a> for always running web applications.</p>
			<p>I often complain about my commute and life biggest questions <a href="https://twitter.com/carlos_tweets" title="Follow Carlos Ferreira on Twitter." target="_blank">on my Twitter account</a>.</p>
			<p>I have an obsession with cryptocurrencies, check out <a href="/crypto" title="View my cryptocurrency stats.">what I am HODLing</a>.</p>
			<p>I've been a Lead Mentor, <a href="https://www.instagram.com/p/BL4GdOKh0z6/" target="_blank">International Speaker</a>, and Content Creator for <a href="https://coderdojo.com" target="_blank">CoderDojo</a> since May 2013.</p>

			<div class="row">
				<div class="col-xs-6">
					<h3>Things I like</h3>
					<p>Walking around and getting lost in London.</p>
					<p>Attending coding and tech events.</p>
					<p>Superhero Comics, Movies, TV Shows &amp; <span title="Collectables?">Collectibles</span>.</p>
					<p>Japanese culture, including Manga and Anime.</p>
					<p><a href="https://www.last.fm/user/cajogos/listening-report/year" target="_blank">This sort of music</a>.</p>
					<p>Learning and teaching new stuff.</p>
					<p>Solving the <a href="/rubiks-cube">3x3 Rubik's Cube</a>
					<p>I am a bit of a nerd :)</p>
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
