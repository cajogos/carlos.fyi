{extends file="include/header.tpl"}

{block name=head}{/block}

{block name=body}

<div class="contact-page">
	<h1>Oh, why hello there...</h1>
	<div class="row">
		<div class="col-sm-7">
			<h2>Let's build things together!</h2>
			<p>I am always looking for new projects to work on. So, if have you got an idea that you would like to make it a reality, send me a quick email to c@rlos.rocks or fill out the form below.</p>
			<p>As long as we have a comfortable schedule. I am more than willing to discussing and maybe even work on something new! Maybe grab a chocolate frapp&eacute; in central London after work?</p>
			<div class="contact-form-container">
				{include file="partials/contact-form.tpl"}
			</div>
		</div>
		<div class="col-sm-1"></div>
		<div class="col-sm-4">
			<h2>Methods of contact</h2>
			<p>I am pretty much everywhere on the Interwebz! Mostly known online by the nickname of <strong>cajogos</strong>.</p>
			<h3>So you want to...</h3>
			<div class="contact-methods">
				<h4>
					...send me an <i class="fa fa-envelope" title="email"></i>?<br />
					<a href="mailto:c@rlos.rocks">c@rlos.rocks</a>
				</h4>
				<h4>
					...give me a <i class="fa fa-phone" title="phone call"></i>?<br />
					<a href="tel:+447779527412">(+44) 777 9527 412</a>
				</h4>
				<h4>
					...connect with me on <i class="fa fa-linkedin-square" title="LinkedIn"></i>?<br />
					<a href="https://www.linkedin.com/in/cajogos" target="_blank">Carlos Ferreira</a>
				</h4>
				<h4>
					...follow me on <i class="fa fa-twitter" title="Twitter"></i>?<br />
					<a href="https://twitter.com/carlos_tweets" target="_blank">@Carlos_Tweets</a>
				</h4>
				<h4>
					...chat to me on <i class="fa fa-skype" title="Skype"></i>?<br />
					<a href="skype:cajogos?chat" target="_blank">cajogos</a>
				</h4>
			</div>
		</div>
	</div>
</div>

{/block}

{block name=js}{/block}