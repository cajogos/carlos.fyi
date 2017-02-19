<div class="social-links">
	<ul>
		<li>
			<a href="mailto:c@rlos.rocks" title="Get in touch via email!">
				<span class="fa-stack">
					<i class="fa fa-square-o fa-stack-2x"></i>
					<i class="fa fa-envelope-o fa-stack-1x"></i>
				</span>
			</a>
		</li>
		<li>
			<a href="https://play.google.com/store/apps/developer?id=Carlos+Ferreira" target="_blank" title="Download my Android apps!">
				<span class="fa-stack">
					<i class="fa fa-square-o fa-stack-2x"></i>
					<i class="fa fa-android fa-stack-1x"></i>
				</span>
			</a>
		</li>
		<li>
			<a href="https://twitter.com/carlos_tweets" target="_blank" title="Follow me on Twitter!">
				<span class="fa-stack">
					<i class="fa fa-square-o fa-stack-2x"></i>
					<i class="fa fa-twitter fa-stack-1x"></i>
				</span>
			</a>
		</li>
		<li>
			<a href="https://www.linkedin.com/in/cajogos" target="_blank" title="Connect with me on LinkedIn!">
				<span class="fa-stack">
					<i class="fa fa-square-o fa-stack-2x"></i>
					<i class="fa fa-linkedin fa-stack-1x"></i>
				</span>
			</a>
		</li>
		<li>
			<a href="https://github.com/cajogos" target="_blank" title="Check out my GitHub account!">
				<span class="fa-stack">
					<i class="fa fa-square-o fa-stack-2x"></i>
					<i class="fa fa-github fa-stack-1x"></i>
				</span>
			</a>
		</li>
		<li>
			<a href="skype:cajogos?chat" title="Start a Skype chat with me!">
				<span class="fa-stack">
					<i class="fa fa-square-o fa-stack-2x"></i>
					<i class="fa fa-skype fa-stack-1x"></i>
				</span>
			</a>
		</li>
	</ul>
	<p class="social-links-message"></p>
</div>
<script type="text/javascript">
	$(document).ready(function()
	{
		var messageBox = $('.social-links-message');
		var socialLinks = $('.social-links li a');
		for (var i = 0; i < socialLinks.length; i++)
		{
			var curLink = $(socialLinks[i]);
			curLink.hover(function()
			{
				var title = $(this).attr('title');
				messageBox.text(title);
			}, function ()
			{
				messageBox.text('');
			});
		}
	});
</script>