<?php

    namespace BurstingBox\SimpleContactForm
    {
        /**
         * Class SimpleContactForm
         *
         * @package BurstingBox\SimpleContactForm
         */
        class SimpleContactForm
        {
            /**
             * The email recipient
             *
             * @var
             */
            private $emailRecipient;

            /**
             * The subject of the email
             *
             * @var
             */
            private $subject;

            /**
             * The form name
             *
             * @var
             */
            private $formName;

            /**
             * @var ContactFormInformation
             */
            private $formInformation = null;

            /**
             * @param $emailRecipient
             * @param $subject
             * @param $formName
             */
            function __construct($emailRecipient, $subject, $formName = null)
            {
                $this->emailRecipient = $emailRecipient;
                $this->emailSubject = $subject;
                $this->formName = $formName;
            }

            /**
             * @param array $vars
             *
             * @throws \Exception
             */
            public function processForm(array $vars)
            {
                try
                {
                    //Check if the honeypot field is populated
                    if (isset($vars['qty']) && strlen($vars['qty']) != 0)
                    {
                        return;
                    }

                    // Remove the honeypot field now that we know it's not populated
                    unset($vars['qty']);

                    $this->formInformation = ContactFormInformationFactory::CreateFromArray($vars);
                    $headers = $this->generateHeaders();
                    $content = $this->generateEmailContent();

                    $this->emailSubject = str_replace('{name}', $this->formInformation->getName(), $this->emailSubject);
                    $this->emailSubject = str_replace('{email}', $this->formInformation->getEmail(), $this->emailSubject);

                    if (!@mail($this->emailRecipient, $this->emailSubject, $content, $headers))
                    {
                        throw new \Exception("Could not send an email at this time, please try again later");
                    }
                }
                catch (\Exception $e)
                {
                    throw $e;
                }
            }

            /**
             * @return string
             */
            private function generateHeaders()
            {
                $nameFrom = $this->formInformation->getName() != "N/A"
                    ? " <" . $this->emailRecipient . ">"
                    : $this->emailRecipient;

                return "From: " . $nameFrom . "\r\n" .
                    "Reply-To: " . $this->formInformation->getEmail();
            }

            /**
             * @return string
             */
            private function generateEmailContent()
            {
                $content = "You have received a message from " . $_SERVER['REMOTE_ADDR'] . "\n";

                if($this->formInformation->getName() != "N/A")
                    $content .= "\nName: " . $this->formInformation->getName();

                if($this->formInformation->getEmail() != "N/A")
                    $content .= "\nEmail: " . $this->formInformation->getEmail();

                if($this->formInformation->getMessage() != "N/A")
                    $content .= "\nMessage: " . $this->formInformation->getMessage();

                foreach ($this->formInformation->getAdditional() as $key => $value)
                {
                    $key = ucwords($key);
                    $content .= "\n$key: $value";
                }

                return $content;
            }
        }


        /**
         * Class ContactFormInformationFactory
         *
         * @package BurstingBox\SimpleContactForm
         */
        class ContactFormInformationFactory
        {
            /**
             * @param array $values
             *
             * @throws \Exception
             * @return \BurstingBox\SimpleContactForm\ContactFormInformation
             */
            public static function CreateFromArray(array $values)
            {
                if (array_key_exists("email", $values) && array_key_exists("message", $values) && array_key_exists("name", $values))
                {
                    return new ContactFormInformation(self::popAssociative($values, 'email'),
                                                      self::popAssociative($values, 'message'),
                                                      self::popAssociative($values, 'name'),
                                                      $values);
                }
                else
                {
                    throw new \Exception('Contact form was not filled in correctly');
                }
            }

            /**
             * @param $array
             * @param $key
             * @return null
             */
            private static function popAssociative(&$array, $key)
            {
                if (array_key_exists($key, $array))
                {
                    $value = $array[$key];
                    unset($array[$key]);

                    return $value;
                }
                else
                {
                    return null;
                }
            }
        }

        /**
         * Class ContactFormInformation
         *
         * @package BurstingBox\SimpleContactForm
         */
        class ContactFormInformation
        {
            /**
             * @var
             */
            private $name;
            /**
             * @var
             */
            private $email;
            /**
             * @var
             */
            private $message;
            /**
             * @var null
             */
            private $additional;

            /**
             * @param $email
             * @param $message
             * @param $name
             * @param $additional
             */
            function __construct($email, $message, $name, $additional = null)
            {
                $this->email = $email;
                $this->message = $message;
                $this->name = $name;
                $this->additional = $additional;
            }

            /**
             * @param mixed $email
             */
            public function setEmail($email)
            {
                $this->email = $email;
            }

            /**
             * @return mixed
             */
            public function getEmail()
            {
                return $this->email;
            }

            /**
             * @param mixed $message
             */
            public function setMessage($message)
            {
                $this->message = $message;
            }

            /**
             * @return mixed
             */
            public function getMessage()
            {
                return $this->message;
            }

            /**
             * @param mixed $name
             */
            public function setName($name)
            {
                $this->name = $name;
            }

            /**
             * @return mixed
             */
            public function getName()
            {
                return $this->name;
            }

            /**
             * @param null $additional
             */
            public function setAdditional($additional)
            {
                $this->additional = $additional;
            }

            /**
             * @return null
             */
            public function getAdditional()
            {
                return $this->additional;
            }
        }
    }