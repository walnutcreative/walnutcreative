<?php
session_start();

define('SITE_URL', 'http://localhost/sites/inox-fabrications/trunk/');
//define('SITE_URL', 'http://dev.burstingbox.com/sites/inox-fabrications/trunk/');
//define('SITE_URL', 'http://www.burstingbox.com/');

define ('ROOT_DIR', dirname(__DIR__));
define ('INCLUDES_DIR', __DIR__);

define ('CONTACT_FORM_ADDRESS_TO', 'gav@burstingbox.com');
define ('CONTACT_FORM_ADDRESS_FROM', 'gav@burstingbox.com');
//Change to newsletter@
define ('NEWSLETTER_ADDRESS_TO', 'gav@burstingbox.com');

require_once(INCLUDES_DIR . '/scripts/BurstingBox/CookieDisclaimer/BBICookieDisclaimer.php');
use BurstingBox\CookieDisclaimer\BBICookieDisclaimer;

$cookieDisclaimer = new BBICookieDisclaimer(SITE_URL . "terms/");