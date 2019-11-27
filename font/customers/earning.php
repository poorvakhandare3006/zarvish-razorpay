<?php 
require_once("includes/panelheader.php");
$c_email = test_input($_SESSION['customer_email']);
$afflid_id_query =mysqli_query($con,"SELECT customer_affiliate_id FROM customers WHERE customer_email='$c_email'");
$row = mysqli_fetch_assoc($afflid_id_query);

 $customer_affiliate_id = $row['customer_affiliate_id'];

// for getting number of orders
$get_orders_count = "SELECT * FROM orders WHERE customer_referrer_id='$customer_affiliate_id'";
$run_get_orders_count = mysqli_query($con,$get_orders_count);
 $num_orders=mysqli_num_rows($run_get_orders_count);

?>
<div>
      <!-- <h3>Your orders</h3> -->
      <?php if ($num_orders < 1) { ?>
      <div id="tt-pageContent">
  <div class="container-indent">

    <div class="container container-fluid-custom-mobile-padding">
      <h1 class="tt-title-subpages noborder">Refer & Earn</h1>
      
      <br>
      <div class="row">
        <div class="col-12">
          <div class="tt-listing-post tt-half">
            <div class="tt-post">
              <div class="tt-post-img">
                <a href="#"><img src="earn-from-home.jpg" data-src="earn-from-home.jpg" alt=""></a>
              </div>
              <div class="tt-post-content">
                <div class="tt-tag"><a href="#">Earn Upto Rs.10,000 &#128525; Per Month</a></div>
                <h2 class="tt-title"><a href="#">Refer Your Friends </a></h2>
                <div class="tt-description" style="color: #191919;">
                Earn 7% commision on every purshase if your friends just signs up from your affiiate link.
                  <p >Follow Just These Steps</p>
                <ul class="">
  
  <li >Refer this by clicking on this Link <a href="refer.php?afflid=<?php echo $customer_affiliate_id; ?>" style="color:blue;text-decoration: underline;">Click Here</a></li>
  <li >If they signup through your Referral Link then you will get 7% commision if he does shopping in next 30 days.</li>
  <li >If customer will not return/cancel order after 14 days of delivery then your will recieve this cashback in your PAYTM WALLET. </li>
  <li >Enjoy 😍 and become Part time Earner.🕺</li>
</ul>

                </div>
                <div class="tt-meta">
                  <div class="tt-autor">
                    <!-- by <span>ADRIAN</span> on January 14, 2017 -->
                  </div>
                  <div class="tt-comments">
                    <!-- <a href="#"><i class="tt-icon icon-f-88"></i>7</a> -->
                  </div>
                </div>
                <div class="tt-btn">
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
      <?php } ?>

      <h3 style="font-style: italic;font-weight: bold;text-align: center;color: red">Order thorugh your affiliate links <?php echo "$num_orders"; ?> </h3>
<?php 


$customer_session = htmlentities($_SESSION['customer_email']);

$get_customer = "SELECT customer_affiliate_id FROM customers WHERE customer_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_affiliate_id = $row_customer['customer_affiliate_id'];

$get_orders = "SELECT * FROM orders WHERE customer_referrer_id='$customer_affiliate_id' ORDER BY order_id DESC";

$run_orders = mysqli_query($con,$get_orders);

$i = 0;
$total = 0;
 $num_orders=mysqli_num_rows($run_orders);

while($row_orders = mysqli_fetch_array($run_orders)){

$order_id = $row_orders['order_id'];
$product_id = $row_orders['product_id'];
$address_id = $row_orders['address_id'];
$product_size = $row_orders['product_size'];

$invoice_no = $row_orders['invoice_no'];

$qty = $row_orders['product_qty'];
$subtotal = $row_orders['subtotal'];





$order_date = substr($row_orders['order_date'],0,11);

$then = strtotime($order_date);

$now = time();
 
$difference = $now - $then;
 
$days_interval = floor($difference / (60*60*24) );

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


$Cashback_amount = ceil((0.07)* (int) $product_selling_price);


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

            <?php if ($is_delivered =='yes' && $is_return == 'none' && $days_interval < 15) {?>
              <p style="color:red;font-weight:bold;font-size:1.1em;">Your Earning : &#8377;<?php echo "$Cashback_amount"; ?>&nbsp;(Pending)</p> 
            <p style="color:green;font-weight:bold;font-size:1.0em;">This product has been delivered to  customers.If customer will not return/cancel order after 14 days of delivery then your will recieve this cashback in your PAYTM WALLET.</p>  
            <?php } else if($is_return == 'yes'){ ?>
            <p style="color:red;font-weight:bold;font-size:1.1em;">This order has been returned by customer so we can not process your cashback for this one but we are happy for your effort.</p>

            <?php }  else if ($is_return == 'done') { ?>
            <p style="color:red;font-weight:bold;font-size:1.1em;">This order has been returned by customer so we can not process your cashback for this one but we are happy for your effort.</p>              
            <?php } else if ($days_interval >=15) { ?>
              <p style="color:green;font-weight:bold;font-size:1.1em;">Congratulation Very soon we will initiate your cashback &#8377;<?php echo "$Cashback_amount"; ?> in your bank account.</p> 
            <?php } ?>
            <?php if ($is_cancelled =='no' && $is_delivered == 'no') {?>
            <p style="color:red;font-weight:bold;font-size:1.1em;">Your Earning : &#8377;<?php echo "$Cashback_amount"; ?>&nbsp;(Pending)</p> 
            <span style="color:green;font-weight:bold;font-size:1.0em;">If customer will not return/cancel order after 14 days of delivery then your will recieve this cashback in your PAYTM WALLET.</span>  
            <?php } else if ($is_delivered == 'no'){ ?>
            <p style="color:red;font-weight:bold;font-size:1.1em;">This order has been cancelled by customer so we can not process your cashback for this one but we are happy for your effort.</p>

            <?php } ?>
               <div class="delivery">
               <p>T&C</p>
               
               <?php if ($delivered == 'no') {
                echo "<span></span>";
               } else if($is_return =='none') {
                echo "<span style='color:#ff0000;font-weight:bold;'></span>";
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

<?php require_once("includes/footer.php");?>
