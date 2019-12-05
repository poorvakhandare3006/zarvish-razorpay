
<?php
//Declaring variables to prevent errors
$name = ""; //First name
$em = ""; //email
$em2 = ""; //email 2
$password = ""; //password
$password2 = ""; //password 2
$date = ""; //Sign up date 
$error_array = array(); //Holds error messages


if(isset($_POST['register'])){
	

	//Registration form values

	//First name
	$name = strip_tags($_POST['name']); //Remove html tags
	// $name = str_replace(' ', '', $name); //remove spaces
	$name = ucfirst(strtolower($name)); //Uppercase first letter
	$_SESSION['name'] = $name; //Stores first name into session variable



	//email
	$em = strip_tags($_POST['email']); //Remove html tags
	$em = str_replace(' ', '', $em); //remove spaces
	$em = strtolower($em); //Uppercase first letter
	$_SESSION['email'] = $em; //Stores email into session variable

	


		//email 2
	$phone = strip_tags($_POST['mobileNumber']); //Remove html tags
	$phone = str_replace(' ', '', $phone); //remove spaces
	$phone = ucfirst(strtolower($phone)); //Uppercase first letter
	$_SESSION['mobileNumber'] = $phone; //Stores email2 into session variable

	$password = test_input($_POST['password']); //Remove html tags
	

	$date = date("Y-m-d"); //Current date

	
		//Check if email is in valid format 
		if(filter_var($em, FILTER_VALIDATE_EMAIL)) {

			$em = filter_var($em, FILTER_VALIDATE_EMAIL);

			//Check if email already exists 
			$e_check = mysqli_query($con, "SELECT customer_email FROM customers WHERE customer_email='$em'");

			//Count the number of rows returned
			$num_rows = mysqli_num_rows($e_check);

			if($num_rows > 0) {
				array_push($error_array, "Email already in use<br>");
			}

		}
		else {
			array_push($error_array, "Invalid email format<br>");
		}


     	$cust_username = $em;
        $parts = explode("@", $cust_username);
        $cust_username = $parts[0];
        
        $affiliate_id = mt_rand(1000000000,9999999999);

		

			

			//Check if affiliate id already exists 
			$e_check = mysqli_query($con, "SELECT customer_affiliate_id FROM customers WHERE customer_affiliate_id='$affiliate_id'");

			//Count the number of rows returned
			$num_rows = mysqli_num_rows($e_check);

			if($num_rows > 0) {
				$affiliate_id = $affiliate_id."_".$cust_username;
			} else {

			}
		if (isset($_COOKIE['afflid'])) {
		   $customer_referrer_id = $_COOKIE['afflid'];
	    } else {
	    	$customer_referrer_id = 'none';
	    }

        $customer_interest = strip_tags($_POST['interest']); //Remove html tags
		





	if(empty($name)) {
		array_push($error_array, "Your Name can not be empty.<br>");
	}


	if(strlen($phone) != 10 ) {
		array_push($error_array,  "Your Mobile number should be of 10 digit.<br>");
	}
	
	

// 	if(strlen($password > 30 || strlen($password) < 5)) {
// 		array_push($error_array, "Your password must be betwen 5 and 30 characters<br>");
// 	}


	if(empty($error_array)) {
		$password = md5($password); //Encrypt password before sending to database

		//Generate username by concatenating first name and last name
		
		
		$query = mysqli_query($con, "INSERT INTO customers (customer_name,customer_email,customer_phone,customer_password,customer_affiliate_id,customer_referrer_id,customer_interest,customer_register_date) VALUES ('$name', '$em', '$phone','$password','$affiliate_id','$customer_referrer_id','$customer_interest','$date')") or die(mysqli_error($con));

		array_push($error_array, "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>");
		
		$to = "$em,mukullohia10@gmail.com";
$subject = "Registration";

$message = "
<html>
<head>
<title>Zarvish</title>
</head>
<body>
<p>Thanks for signing Up.</p>
<p>Visit our Website.</p>
<p>https://zarvish.com/</p>
<p>Thanks With Regards Zarvish</p>


</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <help@zarvish.com>' . "\r\n";
$headers .= 'Cc: help@zarvish.com' . "\r\n";

mail($to,$subject,$message,$headers);

		//Clear session variables 
		$_SESSION['name'] = "";
		$_SESSION['mobileNumber'] = "";
		$_SESSION['email'] = "";
		$_SESSION['emailAgain'] = "";
		$_SESSION['customer_email'] = $em;
		       $afflid_id_query =mysqli_query($con,"SELECT customer_affiliate_id FROM customers WHERE customer_email='$em'");
$row = mysqli_fetch_assoc($afflid_id_query);

 $customer_affiliate_id = $row['customer_affiliate_id'];




		echo "<script>alert(\"Thankyou for submitting form\")</script>";
		
		if (count($_SESSION["cart_array"]) > 0) {
				 header("Location: cart.php");	
				} else {
					header("Location: customers/refer.php?afflid=$customer_affiliate_id");
				}
	}

}
?>