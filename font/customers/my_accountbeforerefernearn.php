<?php 
require_once("includes/header.php");
$c_email = test_input($_SESSION['customer_email']);
$afflid_id_query =mysqli_query($con,"SELECT customer_affiliate_id FROM customers WHERE customer_email='$c_email'");
$row = mysqli_fetch_assoc($afflid_id_query);
 $customer_affiliate_id = $row['customer_affiliate_id'];

?>

<?php

if(isset($_POST['cancel'])){

$c_email = test_input($_SESSION['customer_email']);

$to_cancel_product_id = (int) $_POST['product_id'];

     $customer_id_query =mysqli_query($con,"SELECT customer_id FROM customers WHERE customer_email='$c_email'");
            $row = mysqli_fetch_assoc($customer_id_query);
            $customer_id = $row['customer_id'];

$sql= "UPDATE orders
SET is_cancelled = 'yes'
WHERE customer_id='$customer_id' AND product_id='$to_cancel_product_id'";
$cancel_order_query =mysqli_query($con,$sql) or die($con);

echo "<script>window.open('my_account.php?my_orders','_self')</script>";
}

if(isset($_POST['return'])){

$c_email = test_input($_SESSION['customer_email']);

$to_cancel_product_id = (int) $_POST['product_id'];

     $customer_id_query =mysqli_query($con,"SELECT customer_id FROM customers WHERE customer_email='$c_email'");
            $row = mysqli_fetch_assoc($customer_id_query);
            $customer_id = $row['customer_id'];

$sql= "UPDATE orders
SET is_return = 'yes'
WHERE customer_id='$customer_id' AND product_id='$to_cancel_product_id'";
$return_order_query =mysqli_query($con,$sql) or die($con);

echo "<script>window.open('my_account.php?my_orders','_self')</script>";
}



?>

<style type="text/css">
.nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
background-color: #2879fe;

}
.form-control {
font-size: 1.1em;

}
</style>

<div class="container">
  <br />

  <ul class="nav nav-pills  nav-justified" id="profileTabs">
    <li class="active"><a data-toggle="tab" href="#home">Orders</a></li>
    <li><a  href="refer.php?afflid=<?php echo $customer_affiliate_id; ?>">Refer & Earn</a></li>
    <li><a data-toggle="tab" href="#menu1">Edit Account</a></li>
    <li><a data-toggle="tab" href="#menu2">Change password</a></li>
    <li><a data-toggle="tab" href="#menu3">Logout</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Your orders</h3>
      <h3 style="font-style: italic;font-weight: bold;text-align: center;color: red">Your Orders </h3>
<?php 


$customer_session = htmlentities($_SESSION['customer_email']);

$get_customer = "SELECT customer_id FROM customers WHERE customer_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$get_orders = "SELECT * FROM orders WHERE customer_id='$customer_id' ORDER BY order_id DESC";

$run_orders = mysqli_query($con,$get_orders);

$i = 0;
$total = 0;

while($row_orders = mysqli_fetch_array($run_orders)){

$order_id = $row_orders['order_id'];
$product_id = $row_orders['product_id'];
$address_id = $row_orders['address_id'];
$product_size = $row_orders['product_size'];

$invoice_no = $row_orders['invoice_no'];

$qty = $row_orders['product_qty'];
$subtotal = $row_orders['subtotal'];





$order_date = substr($row_orders['order_date'],0,11);

$payment_status = $row_orders['payment_status'];
$delivered = $row_orders['is_delivered'];
$is_cancelled = $row_orders['is_cancelled'];
$is_delivered = $row_orders['is_delivered'];
$is_return = $row_orders['is_return'];


$i++;

if($payment_status=='pending'){

$payment_status = "Unpaid";

}
else{

$payment_status = "Paid";

}

$get_address = "SELECT * FROM order_address WHERE address_id='$address_id'";

$run_get_address = mysqli_query($con,$get_address);

$row_run_get_address = mysqli_fetch_assoc($run_get_address);

$street = $row_run_get_address['street'];
$city = $row_run_get_address['city'];
$state = $row_run_get_address['state'];
$zip = $row_run_get_address['zip'];


$get_products = "SELECT product_image_title FROM products_image WHERE product_id=$product_id";

$run_products = mysqli_query($con,$get_products);

$row_products = mysqli_fetch_assoc($run_products);

$product_image_title = $row_products['product_image_title'];



$get_products = "SELECT product_title,product_selling_price FROM products WHERE product_id=$product_id";

$run_products = mysqli_query($con,$get_products);

$row_products = mysqli_fetch_assoc($run_products);

$product_title = $row_products['product_title'];


$product_selling_price = $row_products['product_selling_price'];





?>
 

    
     
     
     



       
        
       <div class="cart-header">
          
         <div class="cart-sec simpleCart_shelfItem">
            <div class="cart-item cyc" style="float:left;width:30%;">
               <img src="../images/product/<?php echo $product_image_title; ?>.jpg" class="img-responsive" alt="" style="width:100px;height:100px;display:block;margin:auto;"/>
            </div>
             <div class="cart-item-info" style="float:right;width:70%;">
            <b><p><a href="../product-variable.php?p_id=<?php echo $product_id;  ?>" style="font-size:1.1em;color:#000;"><?php echo $product_title; ?></a>
            
            <br>
            Unit Price: &#8360; <?php echo $product_selling_price; ?>
            <br>
            Size:  <?php echo $product_size; ?>

            </p>
            </b>
            <i style="float: right;color: #000;">Order Date:<?php echo $order_date; ?></i><br />
            <i style="float: left;color: #000;">Street:<?php echo $street; ?></i><br />
            <i style="float: left;color: #000;">City:<?php echo $city; ?></i><br />
            <i style="float: left;color: #000;">State:<?php echo $state; ?></i><br />
            <i style="float: left;color: #000;">Zip:<?php echo $zip; ?></i><br />
            
            
            
              
            <?php  ?>
            
      
            
              <b style="color:#d64308;">Qty: </b> <?php echo $qty; ?>&nbsp; &nbsp;
            
            <b style="color:#d64308;">SubTotal:</b> &#8360; &nbsp;<?php echo $subtotal; ?>

            <?php if ($is_delivered =='yes' && $is_return == 'none') {?>
            <form action="" method="post">
                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
               <input type="submit" value="return" name="return" style="background-color: #2879fe;color: #fff;outline: none;border: none;margin-top:6px;">
            </form>  
            <?php } else if($is_return == 'yes'){ ?>
            <p style="color:red;font-weight:bold;font-size:1.1em;">Your Request for Product return has been accepted.We will reach you soon.</p>

            <?php }  else if ($is_return == 'done') { ?>
            <p style="color:red;font-weight:bold;font-size:1.1em;">Your product has been returned.</p>              
            <?php } ?>

            <?php if ($is_cancelled =='no' && $is_delivered == 'no') {?>
            <form action="" method="post">
                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
               <input type="submit" value="cancel" name="cancel" style="background-color: #2879fe;color: #fff;outline: none;border: none;margin-top:6px;">
            </form>  
            <?php } else if ($is_delivered == 'no'){ ?>
            <p style="color:red;font-weight:bold;font-size:1.1em;">Cancelled</p>

            <?php } ?>
               <div class="delivery">
               <p>Service Charges : Rs.0.00</p>
               
               <?php if ($delivered == 'no') {
                echo "<span>Delivered in 2-3 bussiness days</span>";
               } else if($is_return =='none') {
                echo "<span style='color:#ff0000;font-weight:bold;'>Your product has been delivered.</span>";
               }
                ?>
               <div class="clearfix"></div>
                  
                </div>  
              
             </div>
             <div style="clear:both; font-size:1px;"></div>
             <div class="clearfix"></div>
             <hr>
                      
          </div>
       </div>
      
       <?php  }?>
        
      
    </div>
    <div id="menu1" class="tab-pane fade">
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
    <div id="menu2" class="tab-pane fade">
      
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
echo "<script>window.open('my_account.php?change_pass','_self')</script>";

exit();

}

if($new_pass!=$new_pass_again){

echo "<script>alert('Your New Password dose not match')</script>";
echo "<script>window.open('my_account.php?change_pass','_self')</script>";

exit();

}
$new_pass = md5($new_pass);

$update_pass = "UPDATE customers SET customer_password='$new_pass' WHERE customer_email='$c_email'";

$run_pass = mysqli_query($con,$update_pass);

if($run_pass){

echo "<script>alert('your Password Has been Changed Successfully')</script>";

echo "<script>window.open('my_account.php?my_orders','_self')</script>";


}




}



?>




    </div>
    <div id="menu3" class="tab-pane fade">
      <br>
      <br>
      <br>
      <h4>For sign out </h4>
      <a href="../signout.php" style="color:#2879fe;font-size:1.3em;">Click here</a>
      <br>
      <br>
      <br>
    </div>
  </div>
</div>


<?php require_once("includes/footer.php");?>
<script type="text/javascript">
$(document).ready(function(){
    $('#profileTabs').on('show.bs.tab', function(e) {
        localStorage.setItem('profileactiveTab', $(e.target).attr('href'));
    });
    var profileactiveTab = localStorage.getItem('profileactiveTab');
    if(profileactiveTab){
        $('#profileTabs a[href="' + profileactiveTab + '"]').tab('show');        
    }
    $('#charts-tab').on('show.bs.tab', function(e) {
        localStorage.setItem('chartsactiveTab', $(e.target).attr('href'));
    });
    var chartsactiveTab = localStorage.getItem('chartsactiveTab');
    if(chartsactiveTab){
        $('#charts-tab a[href="' + chartsactiveTab + '"]').tab('show');        
    }     
});
</script>