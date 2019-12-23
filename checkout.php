<?php 
require_once("includes/cartheader.php");
require_once("includes/form_handlers/place_order_handler.php");
// If user wants to display cart items on cart page
$cartOutput = "";
$cartO ="";
$cartTotal = 0;
$pp_checkout_btn = '';
$product_id_array = '';
if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
    $cartOutput = "<h2 align='center'>Your shopping cart is empty</h2>";
} else {
    
    // Start the For Each loop
    $i = 0; 
    foreach ($_SESSION["cart_array"] as $each_item) { 
        $item_id = $each_item['item_id'];
        $size = $each_item['size'];

        $sql = mysqli_query($con,"SELECT * FROM products_image WHERE product_id='$item_id' LIMIT 1");
        $row = mysqli_fetch_assoc($sql);
        $product_image_title = $row['product_image_title'];

        $sql = mysqli_query($con,"SELECT * FROM products WHERE product_id='$item_id' LIMIT 1");
        if (mysqli_num_rows($sql)<1) {
                    echo "<div style='padding:50px;height:400px;margin-top:25px;'><center><b>Oops! sorry, Product is not available which you want...</b></center></div>";
                    
                } 
        while ($row = mysqli_fetch_assoc($sql)) {
            $product_name = $row["product_title"];
            $price = (int) $row["product_selling_price"];
            
        }
        $pricetotal = $price * ((int) $each_item['quantity']);
        $cartTotal = $pricetotal + $cartTotal;
        // setlocale(LC_MONETARY, "en_US");
        // $pricetotal = money_format("%10.2n", $pricetotal);
        // Dynamic Checkout Btn Assembly
        $x = $i + 1;
        
        


$cartO .= '<tr>
                                    <td>
                                        
                                        
                                    </td>
                                    <td>
                                        <div class="tt-product-img">
                                            <img src="images/loader.svg" data-src="images/product/'.$product_image_title.'.jpg" alt="'.$product_image_title.'">
                                        </div>
                                    </td>
                                    <td>
                                        <h2 class="tt-title">
                                            <a href="#">'.$product_name.'</a>&nbsp;<span style="color:#b50a16;font-size:1.2em;">Size</span>&nbsp;:'.$size.'                                        </h2>
                                        <ul class="tt-list-parameters">
                                            <li>
                                                <div class="tt-price">₹
                                                    '.$price.'
                                                </div>
                                            </li>
                                            <li>
                                                <div class="detach-quantity-mobile">
                                                    Qty:'.$each_item['quantity'].'
                                                </div>
                                            </li>
                                            <li>
                                                <div class="tt-price subtotal">₹
                                                    '.$pricetotal.'
                                                </div>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <div class="tt-price">₹
                                            '.$price.'
                                        </div>
                                    </td>
                                    <td>
                                        Qty:'.$each_item['quantity'].'
                                    </td>
                                    <td>
                                        <div class="tt-price subtotal">₹
                                            '.$pricetotal.'
                                        </div>
                                    </td>
                                </tr>';

        
        
        $i++; 
    } 
    
    $cartTotal = "<div style='font-size:18px; margin-top:12px;color:#000;' align='right'>Cart Total : ₹".$cartTotal." Rupees</div>";

}

?>
<style type="text/css">
.changeBtn {
    background-color: #2879fe;
    border: none;
    color: #fff;
    padding:3px;
}
.tt-shopcart-table .tt-btn-close {
    background-color: #2879fe;
    color: #fff;
    border: none;
    margin: 5px;
    padding: 3px;
}
@media only screen and (max-width: 500px){
        footer {
            display: none;
        }
    }
</style>


<div class="container">
  
  <br>
  <!-- Nav pills -->
  <ul class="nav nav-pills" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="pill" href="#home"><i class="fa fa-map-marker"></i> Address</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#menu1">Product overview</a>
    </li>
    
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
      <div class="content">
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <!-- <label for="order_person_name">Name</label> -->
                                            <input type="text" class="form-control" id="order_person_name" name="order_person_name" required="true"  value="<?php 
          if(isset($_SESSION['order_person_name'])) {
            echo $_SESSION['order_person_name'];
          } 
          ?>" placeholder="Full name">
                                                <br>
                                               <?php if(in_array("Your Name can not be empty.<br>", $error_array)) echo "Your Name can not be empty.<br>"; ?>
           
                                        </div>
                                    </div>
                                 
                                </div>
                                <div class="row">
                                       <div class="col-sm-6">
                                        <div class="form-group">
                                            <!-- <label for="phone">phone</label> -->
                                            <input type="text" class="form-control" id="phone" name="phone" required="true"  value="<?php 
          if(isset($_SESSION['phone'])) {
            echo $_SESSION['phone'];
          } 
          ?>" placeholder="Mobile number">
                                             <br>
                                               <?php if(in_array("Your Phone number can not be empty.<br>", $error_array)) echo "Your Phone number can not be empty.<br>";

                                                if(in_array("Your Mobile number should be of 10 digit.<br>", $error_array)) echo "Your Mobile number should be of 10 digit.<br>";
                                                 if(in_array("Your Mobile number should contain digits only.<br>", $error_array)) echo "Your Mobile number should contain digits only.<br>";
                                                ?>
                                        </div>
                                    </div>
                                 
                                </div>

                                <div class="row">
                                  <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <!-- <label for="zip">ZIP</label> -->
                                            <input type="text" class="form-control" id="zip" name="zip" required="true"  value="<?php 
          if(isset($_SESSION['zip'])) {
            echo $_SESSION['zip'];
          } 
          ?>" placeholder="Pincode">
                                             <br>
                                               <?php if(in_array("Your Zip code can not be empty.<br>", $error_array)) echo "Your Zip code can not be empty.<br>"; 
                                               if(in_array("Please Enter valid zip code.<br>", $error_array)) echo "Please Enter valid zip code.<br>"; 
                                               ?>
                                        </div>
                                    </div>
                                </div>


                              
                                <div class="row">
                                   
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <!-- <label for="street">Street</label> -->
                                            <input type="text" class="form-control" id="street" name="street" required="true"  value="<?php 
          if(isset($_SESSION['street'])) {
            echo $_SESSION['street'];
          } 
          ?>" placeholder="Your Address">
                                             <br>
                                               <?php if(in_array("Your Street Name can not be empty.<br>", $error_array)) echo "Your Street Name can not be empty.<br>"; ?>
                                        </div>
                                    </div>
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                            <!-- <label for="street">City</label> -->
                                            <input type="text" class="form-control" id="city" name="city" required="true"  value="<?php 
          if(isset($_SESSION['city'])) {
            echo $_SESSION['city'];
          } 
          ?>" placeholder="City">
                                             <br>
                                               <?php if(in_array("Your City Name can not be empty.<br>", $error_array)) echo "Your City Name can not be empty.<br>"; ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    
                                    
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                             <!-- <label for="sel1">State</label> -->
                                              <select class="form-control" id="state" name="state" required="true">
                                              <option value="" >Choose State</option>
                                              <?php 
                                              $state_query = "SELECT * FROM state_list ";
                                              $run_state_query = mysqli_query($con,$state_query);
                                              while ($row = mysqli_fetch_assoc($run_state_query)) {
                                                   echo '<option value="'.$row['state_name'].'">'.$row['state_name'].'</option>'; 
                                              }
                                               ?>
                                                
                                                
                                              </select>
                                        </div>
                                    </div>
                                   



                                </div>
                                <!-- /.row -->
 <input type="submit" name="place_order" value="Place order" style="background-color: #2879fe;color: #fff;margin-bottom: 8px;padding: 10px 20px;border:none;">
                                </form>
                            </div>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
    
      <div class="col-sm-12 col-xl-8">
                    <div class="tt-shopcart-table">
                        <table>
                            <tbody>
                                <?php echo "$cartO"; ?>
                                
                                
                            </tbody>
                        </table>
                        
                    </div>
                </div>
    </div>
    
  </div>
</div>


<?php require_once("includes/cartfooter.php");?>