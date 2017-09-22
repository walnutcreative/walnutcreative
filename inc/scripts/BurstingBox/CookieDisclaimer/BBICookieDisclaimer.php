<?php

    namespace BurstingBox\CookieDisclaimer;

    /**
     * Simple cookie disclaimer for EU cookie law using implied consent
     */
    class BBICookieDisclaimer
    {
        private $cookiePolicyURL;
        protected $classDirectory = null;
        protected $displayDisclaimer = true;

        public function __construct($policyURL)
        {
            $this->cookiePolicyURL = $policyURL;
            $this->classDirectory = dirname(__FILE__);

            if (isset($_GET['cookieaccept']) || $this->checkCookieSet())
            {
                setcookie('cookie', true, time() + (86400 * 30), '/');
                $_SESSION['cookie'] = true;

                $this->displayDisclaimer = false;
            }
        }

        /**
         * Outputs the disclaimer modal
         */
        public function outputDisclaimer()
        {
            if ($this->displayDisclaimer)
            {
                $policyUrl = $this->cookiePolicyURL;
                include(realpath($this->classDirectory . DIRECTORY_SEPARATOR . 'tpl/disclaimer.php'));
            }
        }

        public function checkCookieSet()
        {
            return isset($_COOKIE['cookie']) || isset($_SESSION['cookie']);
        }
    }
