<?php 
 // require_once("includes/functions.php");
?>
<?php
//Declaring variables to prevent errors
$order_person_name = ""; //First name
$street = ""; //email
$city = ""; //email 2
$zip = ""; //password
$state = ""; //password 2
$phone = ""; //Sign up date 
$error_array = array(); //Holds error messages


if(isset($_POST['place_order'])){



	
        
       
        if(isset($_SESSION['customer_email'])){
             
  
    

	$customer_email = htmlentities($_SESSION['customer_email']);
	$customer_id_query = "SELECT customer_id,customer_referrer_id FROM customers WHERE customer_email ='$customer_email'";
	$run_customer_id_query = mysqli_query($con,$customer_id_query);
	$row = mysqli_fetch_assoc($run_customer_id_query);
	$customer_id = (int) $row['customer_id'];
	$customer_referrer_id = $row['customer_referrer_id'];

	$order_person_name = test_input($_POST['order_person_name']);
    
    $street = test_input($_POST['street']);
    $city = test_input($_POST['city']);
    $zip = test_input($_POST['zip']);
    $state = test_input($_POST['state']);
    $phone = test_input($_POST['phone']);

	
	$order_person_name = strip_tags($order_person_name); 
	$order_person_name = ucfirst(strtolower($order_person_name)); 
	$_SESSION['order_person_name'] = $order_person_name; 





	$street = strip_tags($street); 
	$street = ucfirst(strtolower($street)); 
	$_SESSION['street'] = $street; 



	$city = strip_tags($city); 
	$city = ucfirst(strtolower($city)); 
	$_SESSION['city'] = $city; 



	$zip = strip_tags($zip); 

	$_SESSION['zip'] = $zip; 



	$state = strip_tags($state); 
	$state = strtoupper($state); 
	$_SESSION['state'] = $state; 



	$phone = strip_tags($phone); 
	
	$_SESSION['phone'] = $phone; 




	


	if(empty($order_person_name)) {
		array_push($error_array, "Your Name can not be empty.<br>");
	}



	if(empty($street)) {
		array_push($error_array, "Your Street Name can not be empty.<br>");
	}



	if(empty($city)) {
		array_push($error_array, "Your City Name can not be empty.<br>");
	}



	if(empty($zip)) {
		array_push($error_array, "Your Zip code can not be empty.<br>");
	}



	if(empty($phone)) {
		array_push($error_array, "Your Phone number can not be empty.<br>");
	}


	if(!preg_match('/^[1-9][0-9]{5}$/', $zip)) {
			array_push($error_array, "Please Enter valid zip code.<br>");
		}


	if(strlen($phone) != 10 ) {
		array_push($error_array,  "Your Mobile number should be of 10 digit.<br>");
	}
	if( !preg_match('/^[0-9]+$/', $phone)) {
		array_push($error_array,  "Your Mobile number should contain digits only.<br>");
	}

	if(empty($error_array)) {
		
       include_once("pay.php");
		   $query_insert_address = "INSERT INTO order_address (street,city,state,zip,customer_email,customer_phone) VALUES ('$street','$city','$state','$zip','$customer_email','$phone')";
    $run_insert_address = mysqli_query($con,$query_insert_address);
    $insert_address_id = mysqli_insert_id($con);
    // $get_address_id_query = "SELECT  address_id FROM address  WHERE address_email = '$customer_email' ORDER BY address_id DESC LIMIT 1";
    // $run_get_address_id_query = mysqli_query($con,$get_address_id_query);
    // $row = mysqli_fetch_assoc($run_get_address_id_query);
    // $insert_address_id = $row['address_id'];

  
$status = 'pending';
$invoice_no = mt_rand();

$cartTotal = 0;
$i = 0; 
    foreach ($_SESSION["cart_array"] as $each_item) { 
        $item_id = $each_item['item_id'];

        $qty = $each_item['quantity'];
        $size = $each_item['size'];

        $sql = mysqli_query($con,"SELECT product_qty,product_selling_price FROM products WHERE product_id='$item_id' LIMIT 1");
        if (mysqli_num_rows($sql)<1) {
                    echo "<div style='padding:50px;height:400px;margin-top:25px;'><center><b>Oops! sorry, Product is not available which you want...</b></center></div>";
                    
                } 
        while ($row = mysqli_fetch_assoc($sql)) {
            $product_qty = $row["product_qty"];
            $price = (int) $row["product_selling_price"];
            
        }

        $pricetotal = $price * ((int) $each_item['quantity']);
        $cartTotal = $pricetotal + $cartTotal;
        
        $current_products = $product_qty - $each_item['quantity'];

        $update_product_qty = "UPDATE products
SET product_qty = $current_products
 WHERE product_id='$item_id' LIMIT 1";
$run_update_product_qty = mysqli_query($con,$update_product_qty);
        
        $insert_customer_order = "INSERT INTO orders (order_person_name,customer_id,customer_referrer_id,product_id,product_size,product_color,product_qty,subtotal,address_id,invoice_no,order_date,payment_status,payment_type,is_delivered,is_cancelled,is_return) values ('$order_person_name',$customer_id,'$customer_referrer_id',$item_id,'$size','red','$qty','$pricetotal','$insert_address_id','$invoice_no',Now(),'$status',1,'no','no','none')" or die(mysqli_error($con));

$run_customer_order = mysqli_query($con,$insert_customer_order);
        



        
        $i++; 
    }  

	header("Location:checkout1.php?prodiid=".$item_id);
	
$to = "$customer_email,mukullohia10@gmail.com";
$subject = "Thanks";

$message = "
<html>
<head>
<title>Zarvish</title>
</head>
<body>
<p>Thanks Your order has been placed.</p>
<p>Visit Your Account by signing Up.</p>
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
        $_SESSION['order_person_name']  ="";
        
		$_SESSION['city'] = "";
		$_SESSION['street'] = "";
		$_SESSION['zip'] = "";
		$_SESSION['state'] = "";
		$_SESSION['phone'] = "";
		



		unset($_SESSION['cart_array']);
		echo "<script>alert(\"Thankyou Your order has been placed\")</script>";
		// echo "<script>window.open('customers/my_account.php?my_orders','_self')</script>";
		 echo "<script>window.open('customers/orders.php','_self')</script>";
		

	
} }else {
        header("Location: login.php?checkoutl=". urlencode($_SERVER['REQUEST_URI']));
    }}
?>