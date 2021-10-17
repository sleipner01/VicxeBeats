<?php
session_start();

require '../../database-login/dbh.inc.php';

//Retrieve customer details
$sql = "SELECT * FROM users WHERE userId=?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../../client/index.php?error=sqlError");
    exit();
}
else {
    mysqli_stmt_bind_param($stmt, "s", $_SESSION['userId']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
  while($row = mysqli_fetch_assoc($result)) {
    $email = $row['email'];
  }
}

//Make an array of items to send to Stripe based on Session Cart
$cart = array();

for($i = 0; $i < count($_SESSION['cart']); $i++) {

  $sql = "SELECT * FROM beats WHERE beatId=?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../../client/index.php?error=sqlError");
      exit();
  }
  else {
      mysqli_stmt_bind_param($stmt, "s", $_SESSION['cart'][$i]);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
    while($row = mysqli_fetch_assoc($result)) {
      $title = $row['title'];
      $price = $row['price'] * 100;
    }
  }

  $beatInfo = [
    'price_data' => [
      'currency' => 'usd',
      'unit_amount' => $price,
      'product_data' => [
        'name' => $title,
        'images' => ["https://i.imgur.com/EHyR2nP.png"],
      ],
    ],
    'quantity' => 1,
  ];

  array_push($cart, $beatInfo);
}

$res = array([
  'price_data' => [
    'currency' => 'usd',
    'unit_amount' => 2000,
    'product_data' => [
      'name' => 'Stubborn Attachments',
      'images' => ["https://i.imgur.com/EHyR2nP.png"],
    ],
  ],
  'quantity' => 1,
]);

require 'vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_51Ha2bDKDv87jG37EYrClC2x9FNP5Ajk0dTGZv5vpwzxz5IN6wJtskmbfTQWAePX06aAFyZ7DBE61tOmyNi2z3vSP00pRv3FLhG');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost:80';

$checkout_session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'customer_email' => "$email",
  'line_items' => [ $cart ],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/prosjekter/VicxeBeats/client/payment-success.php',
  'cancel_url' => $YOUR_DOMAIN . '/prosjekter/VicxeBeats/client/payment-cancelled.php',
]);

echo json_encode(['id' => $checkout_session->id]);