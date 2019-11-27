<?php 
require_once("includes/panelheader.php");

?>


    <div style="padding: 20px;">
      <?php
require_once("includes/customer_handlers/edit_account_handler.php");

$customer_session = test_input($_SESSION['customer_email']);

$get_customer = "SELECT customer_id,customer_name,customer_email,customer_phone FROM customers WHERE customer_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = (int) $row_customer['customer_id'];

$customer_name = test_input($row_customer['customer_name']);

$customer_email = test_input($row_customer['customer_email']);





$customer_contact = test_input($row_customer['customer_phone']);





?>

<h1 align="center" > Edit Your Account </h1>

<form action="" method="post" enctype="multipart/form-data"  ><!--- form Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label> Customer Name: </label>

<input type="text" name="c_name" class="form-control" required value="<?php echo $customer_name; ?>">


</div><!-- form-group Ends -->

<!-- <div class="form-group" >

<label> Customer Email: </label>

<input type="text" name="c_email" class="form-control" required value="<?php echo $customer_email; ?>">


</div>
 -->




<div class="form-group" ><!-- form-group Starts -->

<label> Customer Contact: </label>

<input type="text" name="c_contact" class="form-control" required value="<?php echo $customer_contact; ?>">
    <br>
          <?php if(in_array("Your Mobile number should be of 10 digit.<br>", $error_array)) echo "Your Mobile number should be of 10 digit.<br>"; 
                if(in_array("Your Mobile number should contain digits only.<br>", $error_array)) echo "Your Mobile number should contain digits only.<br>"; 
          ?>


</div><!-- form-group Ends -->





<div class="text-center" ><!-- text-center Starts -->

<button name="update" class="btn btn-primary" >

<i class="fa fa-user-md" ></i> Update Now

</button>


</div><!-- text-center Ends -->


</form><!--- form Ends -->


      
    </div>
<?php require_once("includes/footer.php");?>
