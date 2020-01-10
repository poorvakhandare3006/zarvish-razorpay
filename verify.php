<?php

require('config.php');
require('razorpay/Razorpay.php');
session_start();
use Razorpay\Api\Api as Razorpayapi;
$api = new Razorpayapi($keyId, $keySecret);

        $pid = $_GET["pid"];
           $prodiid = $_GET["prodiid"];
        $payment = $api->payment->fetch($pid);
 $amount =  $payment->amount;
        $capture = $payment->capture(array('amount' => $amount));
        $status = $capture->status;
$conf="confirmed";
        if($status=="captured"){
include_once("includes/db.php");
$sid = $_SESSION['id'];
$query = "UPDATE orders set payment_status='confirmed' WHERE customer_id ='$sid' and  product_id='$prodiid'" ;
if( mysqli_query($con,$query))
{

header("Location:index.php");
}
else{


echo "ERROR: Could not able to execute  " . $prodiid.$sid; }
}

?>