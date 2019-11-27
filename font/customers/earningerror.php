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
                <div class="tt-tag"><a href="blog-single-post.html">Earn Upto Rs.10,000 &#128525; Per Month</a></div>
                <h2 class="tt-title"><a href="blog-single-post.html">Refer Your Friends </a></h2>
                <div class="tt-description" style="color: #191919;">
                Earn 13% commision on every purshase if your friends just signs up from your affiiate link.
                  <p >Follow Just These Steps</p>
                <ul class="">
  
  <li >Refer this by clicking on this Link <a href="refer.php?afflid=<?php echo $customer_affiliate_id; ?>" style="color:blue;text-decoration: underline;">Click Here</a></li>
  <li >If they signup through your Referral Link then you will get 13% commision if he does shopping in next 30 days.</li>
  <li >If customer will not return/cancel order after 14 days of delivery then your will recieve this cashback in your PAYTM WALLET. </li>
  <li >Enjoy 