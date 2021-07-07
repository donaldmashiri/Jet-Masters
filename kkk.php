<?php

// require_once('./paynow/vendor/autoload.php');
require_once('vendor/autoload.php');


    $paynow = new Paynow\Payments\Paynow(
    '10490',
    'c76a8f8e-652d-4f88-8ec0-1975d8253a54',
    'http://example.com/gateways/paynow/update',

    // The return url can be set at later stages. You might want to do this if you want to pass data to the return url (like the reference of the transaction)
    'http://example.com/return?gateway=paynow'
);

# $paynow->setResultUrl('');
# $paynow->setReturnUrl('');

$payment = $paynow->createPayment('Invoice 35', 'melmups@outlook.com');

$payment->add('Sadza and Beans', 1.25);

$response = $paynow->send($payment);


if($response->success()) {
    // Or if you prefer more control, get the link to redirect the user to, then use it as you see fit
    $link = $response->redirectUrl();

    $pollUrl = $response->pollUrl();


    // Check the status of the transaction
    $status = $paynow->pollTransaction($pollUrl);

}




?>