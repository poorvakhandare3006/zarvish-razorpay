<?php
require('config.php');
require('razorpay/Razorpay.php');
session_start();
use Razorpay\Api\Api as Razorpayapi;
$api = new Razorpayapi($keyId, $keySecret);
$orderData = [
'receipt' => 3456,
'amount' => 500 * 100,
'currency' => "INR",
'payment_capture' => 1
];
$razorpayOrder = $api->order->create($orderData);
$razorpayOrderId = $razorpayOrder['id'];
$_SESSION['razorpay_order_id'] = $razorpayOrderId;
$displayAmount = $amount = $orderData['amount'];
?>