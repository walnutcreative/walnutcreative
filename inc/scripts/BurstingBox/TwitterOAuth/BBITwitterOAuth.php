<?php
    namespace BurstingBox\TwitterOAuth;

    include_once('lib/twitteroauth/twitteroauth.php');
    use TwitterOAuth;

    /**
     * Class BBITwitterOAuth
     *
     * @package BurstingBox\TwitterOAuth
     */
    class BBITwitterOAuth
    {
        /**
         * @var string
         */
        protected $userName;

        /**
         * @var string
         */
        protected $consumerKey;

        /**
         * @var string
         */
        protected $consumerSecret;

        /**
         * @var string
         */
        protected $accessToken;

        /**
         * @var string
         */
        protected $accessTokenSecret;

        /**
         * @var string
         */
        protected $cacheFile = "tweets.dat";

        /**
         * @var string
         */
        protected $cacheTTL = "+5 minutes";

        public function __construct($userName, $consumerKey, $consumerSecret, $accessToken, $accessTokenSecret)
        {
            $this->userName = $userName;
            $this->consumerKey = $consumerKey;
            $this->consumerSecret = $consumerSecret;
            $this->accessToken = $accessToken;
            $this->accessTokenSecret = $accessTokenSecret;
        }

        /**
         * Gets the connection to the Twitter API
         *
         * @return TwitterOAuth
         */
        protected function getConnectionWithAccessToken()
        {
            $connection = new TwitterOAuth($this->consumerKey, $this->consumerSecret, $this->accessToken,
                                           $this->accessTokenSecret);

            return $connection;
        }

        /**
         * Serialise the tweets
         *
         * @param null $tweets
         */
        protected function SerialiseTweets($tweets = null)
        {
            if ($tweets == null)
            {
                $tweets = $this->GetLatestTweets();
            }

            $tweets['timestamp'] = date('Y-m-d H:i:s', strtotime($this->cacheTTL, strtotime('now')));

            file_put_contents(realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR . $this->cacheFile, serialize($tweets));

        }

        /**
         * Unserialise the tweets
         *
         * @return mixed|null
         */
        protected function UnserialiseTweets()
        {
            if (file_exists($this->cacheFile))
            {
                return unserialize(file_get_contents($this->cacheFile));
            }

            return null;
        }

        /**
         * Retrieve the latest X number of tweets from the API
         *
         * @param int $limit
         * @return \API|mixed
         */
        protected function RetrieveLatestTweets($limit = 30)
        {
            $connection = $this->getConnectionWithAccessToken();
            $tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=" . $this->userName . "&amp;count=" . $limit);

            return $tweets;
        }

        /**
         * Get the latest tweets, either cached or direct from the Twitter API
         * depending on the state of the cache TTL
         *
         * @param int $limit
         * @return \API|mixed|null
         */
        public function GetLatestTweets($limit = 30)
        {
            $tweets = $this->UnserialiseTweets();


            if ($tweets != null)
            {
                // Check if the TTL has expired
                if (array_key_exists('timestamp', $tweets))
                {
                    $timestamp = strtotime($tweets['timestamp']);
                    $now = strtotime('now');

                    if ($now >= $timestamp)
                    {
                        $tweets = $this->RetrieveLatestTweets($limit);
                        $this->SerialiseTweets($tweets);
                    }
                }
            }
            else
            {
                $tweets = $this->RetrieveLatestTweets($limit);
                $this->SerialiseTweets($tweets);
            }

            return $tweets;
        }

        /**
         * Gets the very latest tweet
         *
         * @return mixed
         */
        public function GetLatestTweet()
        {
            $tweets = $this->GetLatestTweets();

            return $tweets[0];
        }

        public function TimestampToTimeElapsedString(\DateTime $datetime)
        {
            $ptime = $datetime->getTimestamp();
            $etime = time() - $ptime;

            if ($etime < 1)
            {
                return '0 seconds';
            }

            $a = array(12 * 30 * 24 * 60 * 60 => 'Year',
                       30 * 24 * 60 * 60      => 'Month',
                       24 * 60 * 60           => 'Day',
                       60 * 60                => 'Hour',
                       60                     => 'Minute',
                       1                      => 'Second'
            );

            foreach ($a as $secs => $str)
            {
                $d = $etime / $secs;
                if ($d >= 1)
                {
                    $r = round($d);

                    return $r . ' ' . $str . ($r > 1 ? 's' : '') . ' ago';
                }
            }
        }

        public function TwitteriseMessage($message)
        {
            // URLs
            $message = preg_replace('/((http)+(s)?:\/\/[^<>\s]+)/i', '<a href="\0" target="_blank">\0</a>', $message);

            // Mentions
            $message = preg_replace('/[@]+([A-Za-z0-9-_]+)/', '<a href="http://twitter.com/1" target="_blank"></a>',
                                    $message);

            // Hashtags
            $message = preg_replace('/[#]+([A-Za-z0-9-_]+)/',
                                    '<a href="http://twitter.com/search?q=%23\1&src=hash" target="_blank">\0</a>',
                                    $message);

            return $message;
        }
    }