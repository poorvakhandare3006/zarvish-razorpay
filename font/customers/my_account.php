<?php 
require_once("includes/header.php");
$c_email = test_input($_SESSION['customer_email']);
$afflid_id_query =mysqli_query($con,"SELECT customer_affiliate_id FROM customers WHERE customer_email='$c_email'");
$row = mysqli_fetch_assoc($afflid_id_query);

 $customer_affiliate_id = $row['customer_affiliate_id'];

// for getting number of orders
$get_orders_count = "SELECT * FROM orders WHERE customer_referrer_id='$customer_affiliate_id'";
$run_get_orders_count = mysqli_query($con,$get_orders_count);
 $num_orders=mysqli_num_rows($run_get_orders_count);
?>
<style type="text/css">
  .nav-stacked>li>a {
    text-align: left;
    border-bottom: 1px solid #D3D3D3;
    font-size: 1.2em;
    color: #000;
    font-weight: bold;
  }
</style>

<div class="container">
  <br />
  <ul class="nav nav-pills nav-stacked" >
    
    <li><a href="orders.php">Orders ></a></li>
    <li><a href="refer.php?afflid=<?php echo $customer_affiliate_id;?>" style="color:green;font-size:1.4em;">Refer & Earn ></a></li>
    <li><a href="earning.php">Your Earning ></a></li>
    <li><a href="editaccount.php">Edit Account ></a></li>
    <li><a href="changepwd.php">Change Password ></a></li>
    <li><a href="../signout.php">Logout ></a></li>
    
  </ul>

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
