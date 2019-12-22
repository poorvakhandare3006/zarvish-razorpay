<?php 
require_once("includes/cartheader.php");

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 1 (if user attempts to add something to the cart from the product page)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];
    $size = $_POST['size'];
    $wasFound = false;
    $i = 0;
    // If the cart session variable is not set or cart array is empty
    if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) { 
        // RUN IF THE CART IS EMPTY OR NOT SET
        $_SESSION["cart_array"] = array(0 => array("item_id" => $pid, "quantity" => 1,"size" => $size));
    } else {
        // RUN IF THE CART HAS AT LEAST ONE ITEM IN IT
        foreach ($_SESSION["cart_array"] as $each_item) { 
              $i++;
              while (list($key, $value) = each($each_item)) {
                  if ($key == "item_id" && $value == $pid) {
                      // That item is in cart already so let's adjust its quantity using array_splice()
                      array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $pid, "quantity" => $each_item['quantity'] + 1,"size" => $size)));
                      $wasFound = true;
                  } // close if condition
              } // close while loop
           } // close foreach loop
           if ($wasFound == false) {
               array_push($_SESSION["cart_array"], array("item_id" => $pid, "quantity" => 1,"size" => $size));
           }
    }
    header("location: cart.php"); 
    exit();
}
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
            $product_name = substr($product_name,0,25);
            $product_name = $product_name . "...";
            $price = (int) $row["product_selling_price"];
            
        }
        $pricetotal = $price * ((int) $each_item['quantity']);
        $cartTotal = $pricetotal + $cartTotal;
        // setlocale(LC_MONETARY, "en_US");
        // $pricetotal = money_format("%10.2n", $pricetotal);
        // Dynamic Checkout Btn Assembly
        $x = $i + 1;
        
        // Create the product array variable
        


        $cartO .= '<tr>
                                    <td>
                                        
                                        <form action="cart.php" method="post"><input name="deleteBtn' . $item_id . '" type="submit" value="X" class="tt-btn-close"/><input name="index_to_remove" type="hidden" value="' . $i . '" /></form>
                                    </td>
                                    <td>
                                        <div class="tt-product-img">
                                            <img src="images/loader.svg" data-src="images/product/'.$product_image_title.'.jpg" alt="'.$product_image_title.'">
                                        </div>
                                    </td>
                                    <td>
                                        <h2 class="tt-title">
                                            <a href="#">'.$product_name.'</a>&nbsp;<span style="color:#b50a16;font-size:1.2em;">Size</span>&nbsp;:'.$size.'
                                        </h2>
                                        <ul class="tt-list-parameters">
                                            <li>
                                                <div class="tt-price">₹
                                                    '.$price.'
                                                </div>
                                            </li>
                                            <li>
                                                <div class="detach-quantity-mobile">
                                                                                <form action="cart.php" method="post">
        <input name="quantity" type="text" value="' . $each_item['quantity'] . '" size="1" maxlength="2" />
        <input name="adjustBtn' . $item_id . '" type="submit" value="change" class="changeBtn"/>
        <input name="item_to_adjust" type="hidden" value="' . $item_id . '" />
        <input name="item_to_adjust_size" type="hidden" value="' . $size . '" />
        </form>
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
                                        <form action="cart.php" method="post">
        <input name="quantity" type="text" value="' . $each_item['quantity'] . '" size="1" maxlength="2" />
        <input name="adjustBtn' . $item_id . '" type="submit" value="change" class="changeBtn" />
        <input name="item_to_adjust" type="hidden" value="' . $item_id . '" />
        <input name="item_to_adjust_size" type="hidden" value="' . $size . '" />
        </form>
                                    </td>
                                    <td>
                                        <div class="tt-price subtotal">₹
                                            '.$pricetotal.'
                                        </div>
                                    </td>
                                </tr>';

        // Dynamic table row assembly
        $cartOutput .= "<tr>";
        $cartOutput .= '<td><a href="product.php?id=' . $item_id . '">' . $product_name . '</a><br /><img src="inventory_images/' . $item_id . '.jpg" alt="' . $product_name. '" width="40" height="52" border="1" /></td>';
        $cartOutput .= '<td>' . $price . '</td>';
        $cartOutput .= '<td>$' . $price . '</td>';
        $cartOutput .= '<td><form action="cart.php" method="post">
        <input name="quantity" type="text" value="' . $each_item['quantity'] . '" size="1" maxlength="2" />
        <input name="adjustBtn' . $item_id . '" type="submit" value="change" />
        <input name="item_to_adjust" type="hidden" value="' . $item_id . '" />
        </form></td>';
        //$cartOutput .= '<td>' . $each_item['quantity'] . '</td>';
        $cartOutput .= '<td>' . $pricetotal . '</td>';
        $cartOutput .= '<td><form action="cart.php" method="post"><input name="deleteBtn' . $item_id . '" type="submit" value="X" class="deleteBtn"/><input name="index_to_remove" type="hidden" value="' . $i . '" /></form></td>';
        $cartOutput .= '</tr>';
        $i++; 
    } 
    // setlocale(LC_MONETARY, "en_US");
    // $cartTotal = money_format("%10.2n", $cartTotal);
    $cartTotal = "<div style='font-size:18px; margin-top:12px;color:#000;' align='right'>₹".$cartTotal." Rupees</div>";

}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 4 (if user wants to remove an item from cart)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != "") {
    // Access the array and run code to remove that array index
    $key_to_remove = $_POST['index_to_remove'];
    if (count($_SESSION["cart_array"]) <= 1) {
        unset($_SESSION["cart_array"]);
        header("location: cart.php");
        exit();
    } else {
        unset($_SESSION["cart_array"]["$key_to_remove"]);
        sort($_SESSION["cart_array"]);
        header("location: cart.php");
        exit();
    }
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 3 (if user chooses to adjust item quantity)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['item_to_adjust']) && $_POST['item_to_adjust'] != "") {
    // execute some code
    $item_to_adjust = $_POST['item_to_adjust'];
    $quantity = $_POST['quantity'];
    
    $item_to_adjust_size = $_POST['item_to_adjust_size'];
    $quantity = preg_replace('#[^0-9]#i', '', $quantity); // filter everything but numbers
    if ($quantity >= 100) { $quantity = 99; }
    if ($quantity < 1) { $quantity = 1; }
    if ($quantity == "") { $quantity = 1; }
    $i = 0;
    foreach ($_SESSION["cart_array"] as $each_item) { 
              $i++;
              while (list($key, $value) = each($each_item)) {
                  if ($key == "item_id" && $value == $item_to_adjust) {
                      // That item is in cart already so let's adjust its quantity using array_splice()
                      array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $item_to_adjust, "quantity" => $quantity, "size" => $item_to_adjust_size )));

                      echo "<script>window.open('cart.php','_self')</script>";
                  } // close if condition

              } // close while loop
    } // close foreach loop

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
.btn-sm{
   width: 95%;
   font-size: 1em;
   background-color: #ffc107;
   color: #fff;
   font-weight: bold;
}
.btn-lg{
   width: 95%;
   font-size: 1em;
   background-color: #ffc107;
   color: #fff;
   font-weight: bold;
}
.tt-shopcart-table div{
    color: red;
    font-weight: bold;
}
@media only screen and (min-width: 500px) {
.btn-sm{
    display: none;

    }
}
@media only screen and (max-width: 500px){
        footer {
            display: none;
        }
    }
</style>


<div id="tt-pageContent">
    <div class="container-indent">
        <div class="container">
            <h1 class="tt-title-subpages noborder">
                <?php 

                                if (isset($_SESSION['customer_email'])) {
                                ?>
                            <a href="checkout.php" class="btn btn-sm"><span class="icon icon-check_circle"></span>Proceed to Buy</a>
                            <?php }else { ?>
                            <a href="login.php" class="btn btn-sm"><span class="icon icon-check_circle"></span>Proceed to Buy</a>
                            <?php } ?>
            </h1>
             
            <div class="row">
                <div class="col-sm-12 col-xl-8">
                    <div class="tt-shopcart-table" >
                        <table >
                            <tbody >
                                <?php echo "$cartO"; ?>
                                <?php echo $cartTotal; ?>
                                
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                <div class="col-sm-12 col-xl-4">
                    <div class="tt-shopcart-wrapper">
                        <div class="tt-shopcart-box">
                            
                            
                        </div>
                        <div class="tt-shopcart-box">
                            <!-- <h4 class="tt-title">
                                NOTE
                            </h4> -->
                            <p style="color:#8ABA1E;font-size:1.2em;font-weight: bold;">Product will be delivered within 7-10 business days.</p>
                            
                        </div>
                        <div class="tt-shopcart-box tt-boredr-large">
                            <table class="tt-shopcart-table01">
                                <tbody>
                                    <tr>
                                        <th>SUBTOTAL</th>
                                        <td><?php echo $cartTotal; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td style="color:#8ABA1E;font-weight: bold;">Free shiping</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>GRAND TOTAL</th>
                                        <td> <?php echo $cartTotal; ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <?php 

                                if (isset($_SESSION['customer_email'])) {
                                ?>
                            <a href="checkout.php" class="btn btn-lg"><span class="icon icon-check_circle"></span>Proceed to Buy</a>
                            <?php }else { ?>
                            <a href="login.php" class="btn btn-lg"><span class="icon icon-check_circle"></span>Proceed to Buy</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once("includes/cartfooter.php");?>