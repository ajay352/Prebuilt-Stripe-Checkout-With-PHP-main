<?php
require_once('vendor/autoload.php');
require_once('/stripe-php-master/init.php');
header('Content-Type: application/json');

$stripe = new Stripe\StripeClient("sk_test_51MduieSErZbH7P9I7Rkfuk3bPwqvGn6jpB9s1LYKlZq2bDDgvoNsSBjdDNRnVW0QLZIELQVdST3kjfNzUigr3XSn00nRFw0Frp");
#$STE=\Stripe\Stripe::setApiKey('stripe_sectet_key');sk_test_51MduieSErZbH7P9I7Rkfuk3bPwqvGn6jpB9s1LYKlZq2bDDgvoNsSBjdDNRnVW0QLZIELQVdST3kjfNzUigr3XSn00nRFw0Frp
#\Stripe\Stripe::setApiKey($stripeSecret);
$session = $stripe->checkout->sessions->create([
    "success_url" => "http://localhost/Prebuilt-Stripe-Checkout-With-PHP-main/success.html",
    "cancel_url" => "http://localhost/Prebuilt-Stripe-Checkout-With-PHP-main/cancel.html",
    "payment_method_types" => ['card', 'alipay'],
    "mode" => 'payment',
    "line_items" => [
        [
           "price_data" =>[
               "currency" =>"gbp",
               "product_data" =>[
                   "name"=> "Mobile",
                   "description" => "Latest mobile 2021"
               ],
               "unit_amount" => 5000
           ],
           "quantity" => 1 
        ],

        [
            "price_data" =>[
                "currency" =>"gbp",
                "product_data" =>[
                    "name"=> "Shirt",
                    "description" => "Light summer shirt"
                ],
                "unit_amount" => 2000
            ],
            "quantity" => 2 
         ]
    ]
]);

echo json_encode($session);

?>