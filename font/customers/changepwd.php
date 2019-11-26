<?php 
require_once("includes/panelheader.php");

?>


    <div style="padding: 20px;">
      
<h1 align="center">Change Password </h1>

<form action="" method="post"><!-- form Starts -->

<div class="form-group"><!-- form-group Starts -->

<label>Enter Your Current Password</label>

<input type="Password" name="old_pass" class="form-control" required>

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label>Enter Your New Password</label>

<input type="Password" name="new_pass" class="form-control" required>

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label>Enter Your New Password Again</label>

<input type="Password" name="new_pass_again" class="form-control" required>

</div><!-- form-group Ends -->

<div class="text-center"><!-- text-center Starts -->

<button type="submit" name="change_password" class="btn btn-primary">

<i class="fa fa-user-md"> </i> Change Password

</button>

</div><!-- text-center Ends -->

</form><!-- form Ends -->




<?php

if(isset($_POST['change_password'])){

$c_email = test_input($_SESSION['customer_email']);

$old_pass = test_input($_POST['old_pass']);
$old_pass = md5($old_pass);

$new_pass = test_input($_POST['new_pass']);

$new_pass_again = test_input($_POST['new_pass_again']);

$sel_old_pass = "SELECT customer_id FROM customers WHERE customer_email='$c_email' AND customer_password='$old_pass'";

$run_old_pass = mysqli_query($con,$sel_old_pass);

$check_old_pass = mysqli_num_rows($run_old_pass);

if($check_old_pass==0){

echo "<script>alert('Your Current Password is not valid try again')</script>";
echo "<script>window.open('changepwd.php','_self')</script>";

exit();

}

if($new_pass!=$new_pass_again){

echo "<script>alert('Your New Password dose not match')</script>";
echo "<script>window.open('changepwd.php','_self')</script>";

exit();

}
$new_pass = md5($new_pass);

$update_pass = "UPDATE customers SET customer_password='$new_pass' WHERE customer_email='$c_email'";

$run_pass = mysqli_query($con,$update_pass);

if($run_pass){

echo "<script>alert('your Password Has been Changed Successfully')</script>";

echo "<script>window.open('changepwd.php','_self')</script>";


}




}



?>




    </div>
<?php require_once("includes/footer.php");?>
