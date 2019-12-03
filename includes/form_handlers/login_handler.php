<?php


$error_array=array();
if(isset($_POST['login_button'])) {

	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); //sanitize email

	$_SESSION['log_email'] = $email; //Store email into session variable 
	$password = test_input($_POST['pwd']); //Get password
	
	
	$password = md5($password); //Get password

	$check_database_query = mysqli_query($con, "SELECT customer_id,customer_email FROM customers WHERE customer_email='$email' AND customer_password='$password'");
	$check_login_query = mysqli_num_rows($check_database_query);

	if($check_login_query == 1) {
	    $row = mysqli_fetch_assoc($check_database_query);
		$customer_email = $row['customer_email'];
        $customer_id = $row['customer_id'];
        $afflid_id_query =mysqli_query($con,"SELECT customer_affiliate_id FROM customers WHERE customer_email='$customer_email'");
$row = mysqli_fetch_assoc($afflid_id_query);

 $customer_affiliate_id = $row['customer_affiliate_id'];
		$_SESSION['customer_email'] = $customer_email;
$_SESSION['id']=$customer_id;
				
				if (count($_SESSION["cart_array"]) > 0) {
              
				 header("Location: cart.php");	
				} else {
					header("Location: customers/refer.php?afflid=$customer_affiliate_id");
				}
		
	// 	    if(isset($_GET['location'])) {
 //             $redirectTo = urldecode($_GET['location']);
	// 	    	header("Location: shop.php?s_id=".$seller_id);
 //            } elseif($_GET['checkoutl']){
 //            	   $redirectTo = urldecode($_GET['checkoutl']);
	// 	    	header("Location: checkout.php");
 //            }else {

	// 		header("Location: customers/my_account.php?my_orders");
	// 	exit();
	// }
}
	
	else {
		array_push($error_array, "Email or password was incorrect<br>");
		
		


	}


}

?>