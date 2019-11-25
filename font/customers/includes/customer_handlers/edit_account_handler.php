
<?php
//Declaring variables to prevent errors


$customer_phone_number = "";



$error_array = array(); //Holds error messages


if(isset($_POST['update'])){
	$customer_email = test_input($_SESSION['customer_email']);
	$get_c = "SELECT customer_phone FROM customers WHERE customer_email='$customer_email'";

$run_c = mysqli_query($con,$get_c);

$row_c = mysqli_fetch_assoc($run_c);



$customer_contact = $row_c['customer_phone'];

	


		//street name
	$customer_contact = strip_tags($_POST['c_contact']); //Remove html tags
	
	
	$customer_contact = test_input($customer_contact);
	$_SESSION['customer_contact'] = $customer_contact; //Stores first name into session variable




	if(strlen($customer_contact) != 10 ) {
		array_push($error_array,  "Your Mobile number should be of 10 digit.<br>");
	}
	if( !preg_match('/^[0-9]+$/', $customer_contact)) {
		array_push($error_array,  "Your Mobile number should contain digits only.<br>");
	}





	if(empty($error_array)) {

		$get_customer = "SELECT customer_id  FROM customers WHERE customer_email='$customer_email'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = (int) $row_customer['customer_id'];
		

		$update_id =(int) $customer_id;

$c_name = test_input($_POST['c_name']);









$update_customer = "UPDATE customers SET customer_name='$c_name',customer_phone='$customer_contact' WHERE customer_id=$update_id";

$run_customer = mysqli_query($con,$update_customer);

if($run_customer){

echo "<script>alert('Your account has been updated please login again')</script>";

echo "<script>window.open('my_account.php','_self')</script>";

}
		




		
	}

}
?>