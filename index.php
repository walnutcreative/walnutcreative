<?php require_once('inc/core.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>Inox Fabrications | Stainless Steel Fabrication and Extraction </title>
	<meta name="Description" content="One of the leading stainless steel fabrication and extraction companies for quality and reliability in the North West of England."/>
	<?php include("inc/global.php"); ?>
</head>

<body>
	<?php include_once(INCLUDES_DIR . '/cookie-disclaimer.php'); ?>
	<?php include("inc/side-menu.php"); ?>
	<?php include("inc/menu.php"); ?>


	<section class="hero-section">
		<div class="main">
			<div class="half">
				<div class="content">
					<h2>Welcome to</h2>
					<h1>Inox Fabrications Ltd</h1>
					<br>
					<p>One of the leading stainless steel fabrication and extraction companies for quality and reliability in the North West of England</p>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</section>

	<div class="break"></div>


	<div class="text-image-split-section">
		<div class="text-image-split tis-kitchen"></div>
		<div class="text-image-split align-center">
			<div class="padded-content padded">
				<h2>Stainless Steel Fabrication Experts</h2>
				<p>With an enviable reputation for producing high quality workmanship and providing customers with the best possible service, Inox Fabrications has rightfully earned its place as one of the finest stainless steel fabrication and extraction firms in the market.</p>
				<a class="button center" href="<?php echo SITE_URL; ?>about/">More info</a>
			</div>
		</div>
		<div class="clear"></div>
	</div>

	<section class="blue-cad">
		<div class="main padded">
			<div class="padded-content">
				<div class="full">
					<h3 class="white">Our Fabrication Services</h3>
				</div>
				<div class="two-thirds">
					<p class="white">Inox Fabrications can offer their customers a range of cutting-edge services which guarantee innovation and attention to detail.</p>
				</div>
				<div class="one-third">
					<a class="button center" href="<?php echo SITE_URL; ?>services/">View all Services</a>
				</div>
				<div class="clear"></div>
				<div class="break"></div>
			</div>


			<div id="selection">
				<div class="third">
					<div class="padded-content sel-fabrication">
						<h3>Fabrications</h3>
						<p>Our skilled engineers carefully fabricate each product for our clients to deliver the exact result they are looking for.</p>
						<a class="button-line diamond" href="<?php echo SITE_URL; ?>services/fabrications/"><span>More Info</span></a>
					</div>
				</div>

				<div class="third">
					<div class="padded-content sel-counters">
						<h3>Counters</h3>
						<p>Our counter fabrication services can be designed and manufactured to suit your every requirement.</p>
						<a class="button-line diamond" href="<?php echo SITE_URL; ?>services/counters/"><span>More Info</span></a>
					</div>
				</div>

				<div class="third">
					<div class="padded-content sel-ventilation">
						<h3>Ventilation</h3>
						<p>Using the highest quality materials, our ventilation systems are designed to fit perfectly into your catering facility.</p>
						<a class="button-line diamond" href="<?php echo SITE_URL; ?>services/ventilation/"><span>More Info</span></a>
					</div>
				</div>
				<div class="clear"></div>
				<div class="break"></div>
				<div class="break"></div>
			</div>

		</div>
	</section>

	<!-- <br>

	<section class="case-study-s">
		<div class="main padded">
			<div class="padded-content">
				<h2 class="uppercase no-bottom">Sample Case Study</h2>
				<h4 class="light-blue-s">Location: London</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim a</p>
				
				<div class="half">
					<a class="button-d float-right" href="<?php echo SITE_URL; ?>case-studies/">More info</a>	
				</div>
				<div class="half">
					<a class="button float-left" href="<?php echo SITE_URL; ?>case-studies/">View More</a>	
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</section> -->

	<br>

	<section class="twitter-section">
		<div class="main padded">
			<div class="padded-content">
				<div class="twitter-bird"></div>
				<div class="twitter-arrow"></div>
				<div class="twitter-content">
					<p>
						<?php
							require_once( INCLUDES_DIR . '/scripts/BurstingBox/TwitterOAuth/BBITwitterOAuth.php' );
							use BurstingBox\TwitterOAuth\BBITwitterOAuth;
							$oauth = new BBITwitterOAuth( "Inoxfabs", "1Fr33r8KkB1vfwKDJWnNUQ",
							"VmWia3e1kT2yhx7H4EfpgVuGhrrSkOncIy1FGjx8",
							"333886064-ApmpgiON6tWE7rII2bsaDEweok5rlJzofMUtpzFY",
							"8UDOk6rRAnv93xdQq8meZbuJbs4IJ4i2YA4m9oQ9FYQ" );
							$tweet = $oauth->GetLatestTweet();
							$createdAt = new \DateTime();
							$createdAt->setTimestamp( strtotime( $tweet->created_at ) );
							$when = $oauth->TimestampToTimeElapsedString( $createdAt );
							echo $when . " we said " . $oauth->TwitteriseMessage( $tweet->text );
						?>
					</p>
				</div>
			</div>
		</div>
	</section>


	<?php include("inc/footer.php"); ?>

</body>
</html>