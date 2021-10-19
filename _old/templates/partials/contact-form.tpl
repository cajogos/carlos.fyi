<div class="contact-form">
	<h3>Contact Form</h3>
	<form id="contact-form">
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label>Name*</label>
					<input type="text" class="form-control" id="input-name" placeholder="Bruce Wayne" required="required" />
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label>Email*</label>
					<input type="email" class="form-control" id="input-email" placeholder="not.batman@aol.com" required="required" />
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label>Subject*</label>
					<input type="text" class="form-control" id="input-subject" placeholder="My awesome new web app idea..." required="required" />
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label>Location</label>
					<input type="text" class="form-control" id="input-location" placeholder="Gotham City" />
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group">
					<label>Your Message*</label>
					<textarea class="form-control" id="input-message" rows="8" minlength="30" required="required"></textarea>
				</div>
			</div>
			<div class="col-sm-12">
				<small>*Required field.</small>
			</div>
			<div class="col-sm-8">
				<div class="alert" id="response-result" style="display:none;"></div>
			</div>
			<div class="col-sm-4 text-right">
				<button type="submit" id="contact-submit" class="btn btn-primary">
					<i class="fa fa-send"></i> Send Your Email
				</button>
			</div>
		</div>
	</form>
</div>
{literal}
<script type="text/javascript">
	var AJAX_PENDING = false;
	$(document).ready(function()
	{
		var form = $('#contact-form');
		form.submit(function(e)
		{
			// Prevent from submitting page
			e.preventDefault();

			// Data object to send in POST request
			var data = {};

			// Name
			var name = $('#input-name').val();
			name = name.trim();
			if (name === '')
			{
				return showErrorAlert('Please enter a valid name.');
			}
			data.name = name;

			// Email
			var email = $('#input-email').val();
			email = email.trim();
			if (email === '')
			{
				return showErrorAlert('Please enter a valid email address.');
			}
			data.email = email;

			// Subject
			var subject = $('#input-subject').val();
			subject = subject.trim();
			if (subject === '')
			{
				return showErrorAlert('Please enter a valid subject line.');
			}
			data.subject = subject;

			// Location
			var location = $('#input-location').val();
			location = location.trim();
			data.location = location;

			// Message
			var message = $('#input-message').val();
			message = message.trim();
			data.message = message;

			if (!AJAX_PENDING)
			{
				postContactForm(data);
			}
		});
	});

	function postContactForm(data)
	{
		var postUrl = '/api/contact.php';
		var submitBtn = $('button#contact-submit');
		var btnIcon = $('button#contact-submit > i.fa');

		// Disable the submitBtn - change to loading animation ;)
		submitBtn.prop('disabled', true);
		btnIcon.removeClass('fa-send');
		btnIcon.addClass('fa-spinner');
		btnIcon.addClass('fa-spin');
		AJAX_PENDING = true;
		$.post(postUrl, data).done(function(response)
		{
			var alertBox = $('#response-result');
			if (response.status === 'fail')
			{
				alertBox.addClass('alert-danger');
				alertBox.text(response.message);

				submitBtn.prop('disabled', false);
				btnIcon.removeClass('fa-spinner');
				btnIcon.removeClass('fa-spin');
				btnIcon.addClass('fa-send');
				AJAX_PENDING = false;
			}
			else if (response.status === 'success')
			{
				alertBox.addClass('alert-success');
				alertBox.text('Your message has been sent to me! I will get back to you ASAP! Ping me on Twitter or other contact methods if you do not hear from within 2 days.');

				submitBtn.html('<i class="fa fa-check"></i> Sent!');

				// Use formspree - just in case I miss the message
				$.ajax({
					url: 'https://formspree.io/carlosferreira@outlook.com',
					method: 'POST', data: data, dataType: 'json'
				});
			}
			alertBox.show();
		});
	}

	function showErrorAlert(message)
	{
		var alertBox = $('#response-result');
		alertBox.removeClass('alert-success');
		alertBox.addClass('alert-danger');
		alertBox.text(message);
		alertBox.show();
		return false;
	}
</script>
{/literal}