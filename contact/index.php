<?php
	require_once( '../inc/core.php' );
	include_once( INCLUDES_DIR . "/scripts/BurstingBox/SimpleContactForm/SimpleContactForm.php" );
	use BurstingBox\SimpleContactForm\SimpleContactForm;

	$messageAttemptedSend = false;
	$error = null;
	if(isset( $_GET[ 'a' ] ) && $_GET[ 'a' ] == "submit" && !isset( $_GET[ 'f' ] ))
	{
		$contactForm = new SimpleContactForm( CONTACT_FORM_ADDRESS_TO, "Contact Form Enquiry from {name}", 'Contact Form' );
		if(count( $_POST ) > 0)
		{
			$messageAttemptedSend = true;
			try
			{
				$contactForm->processForm( $_POST );
			} catch( Exception $e )
			{
				$error = "There was a problem sending your message. " . $e->getMessage();
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>Contact Us | Inox Fabrications</title>
	<meta name="Description" content="Our helpful team are on hand to answer any of your questions, get in touch today."/>
	<?php include("../inc/global.php"); ?>
</head>

<body id="contact-form">
	<?php include_once(INCLUDES_DIR . '/cookie-disclaimer.php'); ?>
	<?php include("../inc/side-menu.php"); ?>
	<?php include("../inc/menu.php"); ?>


	<section class="page-header ph-contact"></section>

	<section class="main padded">
		<div class="padded-content">
			<div class="half early-break">
				<h1 class="uppercase">Contact Us</h1>
				<p>To find out more about our services, please get in touch.</p>
				<br>
				<p><i class="fa fa-phone i-margin" aria-hidden="true"></i>01254 681948</p>
				<!-- <p><i class="fa fa-twitter i-margin" aria-hidden="true"></i>@inoxfabs</p> -->
				<p><i class="fa fa-location-arrow i-margin" aria-hidden="true"></i> Unit 1, Adhan Trading Estate, Newton Street, Blackburn, Lancashire BB1 1NL</p>
				<p><i class="fa fa-envelope i-margin" aria-hidden="true"></i> info@inoxfabrications.com</p>
				<div class="break"></div>
			</div>

			<div class="half early-break">
				<form action="?&a=submit" method="post">
					<?php if($messageAttemptedSend): ?>
						<?php if($error != null): ?>
							<!-- Error -->
							<div class="break"></div>
							<hr>
							<p class="error"><?php echo $error; ?></p>
							<hr>
						<?php else: ?>
							<!-- Message Successfully sent -->
							<div class="break"></div>
							<hr>
							<h2 class="align-center white">Message Received. Thank You</h2>
							<hr>
						<?php endif; ?>
					<?php endif; ?>

					<?php if(!$messageAttemptedSend || $error != null): ?>
						<input type="text" name="qty" placeholder="Quantity*" class="form-input qc-ht "/>
						<div class="half">
							<input type="text" name="name" placeholder="Your name..." class="form-input" required/>
						</div>
						<div class="half">
							<input type="tel" name="telephone" title="Telephone number" pattern="[\d ]*" placeholder="Your number..." class="form-input" required/>
						</div>
						<div class="clear"></div>

						<div class="half">
							<input type="email" name="email" placeholder="Your email..." class="form-input" required/>
						</div>

						<div class="half">
							<select id="subject" name="message" tabindex="4" class="form-select">
								<option value="Please Choose">Enquiry type...</option>
								<option value="Fabrication">Fabrication Enquiry</option>
								<option value="Bespoke">Bespoke Fabrication Enquiry</option>
								<option value="Ventilation">Ventilation Enquiry</option>
								<option value="Counters">Counter Enquiry</option>
								<option value="General">General Enquiry</option>
								<option value="Service Enquiry">Service Enquiry</option>
								<option value="Testimonial">Testimonial</option>
								<option value="Other">Other</option>
							</select>
						</div>
						<div class="clear"></div>

						<div class="full">
							<textarea name="additional" class="form-textarea" placeholder="Your enquiry*" required></textarea>
						</div>
						<br>
						<div class="half no-bottom">
							<input type="submit" value="Send" class="form-button">
						</div>
						<div class="clear"></div>
						<div class="break"></div>
						<div class="clear"></div>
					<?php endif; ?>
				</form>
			</div>
			<div class="clear"></div>
		</div>
	</section>



	<?php include("../inc/footer.php"); ?>

</body>
</html>
