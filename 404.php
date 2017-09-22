<?php require_once('inc/core.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>404 | Inox Fabrications</title>
	<meta name="Description" content="Sorry we can't find the page you are looking for, please use the following options to get back on track."/>
	<meta name="robots" content="noindex">
	<?php include("inc/global.php"); ?>
</head>

<body>
	<?php include_once(INCLUDES_DIR . '/cookie-disclaimer.php'); ?>
	<?php include("inc/header.php"); ?>


	<section class="page-header ph-about"></section>

	<section class="main padded">
		<div class="full">
			<h1 class="uppercase">It looks like that page doesn't exist</h1>
			<p>Sorry about that, we couldn't find the file you were looking for. It's possible that the page you were looking for may have been moved, updated or deleted.</p>
			<div class="break"></div>
			<div class="third">
				<a class="button-full" href="<?php echo SITE_URL; ?>services/">Services</a>
			</div>
			<div class="third">
				<a class="button-full" href="<?php echo SITE_URL; ?>case-studies/">Case Studies</a>
			</div>
			<div class="third">
				<a class="button-full" href="<?php echo SITE_URL; ?>contact/">Contact</a>
			</div>
		</div>		
	</section>
	

	<?php include("inc/footer.php"); ?>

</body>
</html>
