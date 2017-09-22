<?php require_once('../inc/core.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>Sitemap | Inox Fabrications</title>
	<meta name="Description" content="Find the content you are looking for with this handy sitemap."/>
	<?php include("../inc/global.php"); ?>
</head>

<body>
	<?php include_once(INCLUDES_DIR . '/cookie-disclaimer.php'); ?>
	<?php include("../inc/side-menu.php"); ?>
	<?php include("../inc/menu.php"); ?>


	<section class="page-header ph-services"></section>

	<section class="main padded">
		<div class="full">
			<div class="padded-content">
				<h1>Sitemap</h1>
				<ul class="sitemap">
					<li ><a href="<?php echo SITE_URL; ?>">Home</a></li>
					<li><a href="<?php echo SITE_URL; ?>about/">About</a></li>
					<li><a href="<?php echo SITE_URL; ?>services/">Services</a>
						<ul>
							<li><a href="<?php echo SITE_URL; ?>services/fabrications/">Fabrications</a></li>
							<li><a href="<?php echo SITE_URL; ?>services/counters/">Counters</a></li>
							<li><a href="<?php echo SITE_URL; ?>services/ventilation/">Ventilation</a></li>
						</ul>
					</li>
					<li><a href="<?php echo SITE_URL; ?>case-studies/">Case Studies</a></li>
					<li><a href="<?php echo SITE_URL; ?>contact/">Contact Us</a></li>
				</ul>
			</div>
		</div>
	</section>


	

	<?php include("../inc/footer.php"); ?>

</body>
</html>
