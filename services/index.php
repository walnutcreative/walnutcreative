<?php require_once('../inc/core.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>Fabrication Services | Inox Fabrications</title>
	<meta name="Description" content="Inox Fabrications can offer their customers a range of cutting-edge foodservice fabrication services which guarantee innovation and attention to detail."/>
	<?php include("../inc/global.php"); ?>
</head>

<body>
	<?php include_once(INCLUDES_DIR . '/cookie-disclaimer.php'); ?>
	<?php include("../inc/side-menu.php"); ?>
	<?php include("../inc/menu.php"); ?>


	<section class="page-header ph-services">
		<div class="owl-carousel">
		  <div id="services-1">
		  </div>
		  <div id="services-2">
		  </div>
		  <div id="services-3">
		  </div>
		</div>
	</section>

	<section class="main padded">
		<div class="full">
			<div class="padded-content">
				<h1 class="uppercase">Services Inox Fabrications Provides</h1>
				<p>Inox Fabrications can offer their customers a range of cutting-edge services which guarantee innovation and attention to detail. No matter which of their services you are looking for, you will be rest assured with a high quality and competitively priced offering.</p>
			</div>
		</div>
	</section>


	<section class="blue-cad">
		<div class="main padded">

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

	</section>



	<?php include("../inc/footer.php"); ?>

</body>
</html>
