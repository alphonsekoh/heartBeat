<?php
    require_once('vendor/autoload.php');
    \Stripe\Stripe::setApiKey('sk_test_51HtgYeEv3cr9c5tbNmkoBt6sGnxIPoAAJqOxKYJuSTrXskYbFN0yoqVM8lnaagOMO9HvcJ9rVjmMZwNU0x2clGcv00JbcOQNE9');
    $token = $_POST['stripeToken'];
    // This is a $20.00 charge in US Dollar.
    $charge = \Stripe\Charge::create(
        array(
            'amount' => 2000,
            'currency' => 'usd',
            'source' => $token
        )
    );
    print_r($charge);
?>
