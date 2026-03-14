<?php

require "stripe/init.php";

\Stripe\Stripe::setApiKey("sk_test_xxx");


// try {
//     $paymentIntent = \Stripe\PaymentIntent::create([
//         'amount' => 1000, // $10.00 in cents
//         'currency' => 'usd',
//         // Add any additional options you need, such as payment methods
//     ]);

//     // Send the client_secret to the frontend to complete the payment
//     echo json_encode([
//         'client_secret' => $paymentIntent->client_secret,
//     ]);

// } catch (\Stripe\Exception\ApiErrorException $e) {
//     // Handle the error
//     echo json_encode(['error' => $e->getMessage()]);
// }




// Create a product
$product = \Stripe\Product::create([
    'name' => 'Sample Product',
]);

// Create a price for the product
$price = \Stripe\Price::create([
    'product' => $product->id,
    'unit_amount' => 1000, // 1000 cents = $10
    'currency' => 'usd',
]);

// Create a payment link
$paymentLink = \Stripe\PaymentLink::create([
    'line_items' => [
        [
            'price' => $price->id,
            'quantity' => 1,
        ],
    ],
]);

// Output the payment link URL
echo "Payment URL: " . $paymentLink->url;