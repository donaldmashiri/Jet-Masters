<?php

require __DIR__ . "/vendor/autoload.php";

use Twilio\Rest\Client;

$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

$twilioSid    = getenv('AC31e89f981d1732b41886892bd3004020');
$twilioToken  = getenv('772708390e025741876ed83bd12a70c1');

$twilio = new Client($twilioSid, $twilioToken);

$message = $twilio->messages
                 ->create(
                     "whatsapp:+263779400263",
                     array(
                              "body" => "Greetings from Twilio :-)",
                              "from" => "whatsapp:+263779400263"
                          )
                 );

                 ?>