 
<?php 

function totalProductInCart(){
    global $ip;
    global $con;
    $cart_query = "SELECT * FROM cart WHERE ip_add = '$ip'";
    $run_cart_query = mysqli_query($con,$cart_query);
    $total_cart_product = mysqli_num_rows($run_cart_query);
    echo "$total_cart_product";

}
function test_input($data) {
    global $con;
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = mysqli_real_escape_string($con,$data);
  return $data;
}



  function getRelatedProducts(){
    global $con;
     
                $search_query = "SELECT product_id,seller_id,product_title,product_actual_price,product_selling_price,status,product_label,city,product_img1 FROM products";
                $run_search_query = mysqli_query($con,$search_query);

               
                while($row = mysqli_fetch_assoc($run_search_query)){
                    $product_id = $row['product_id'];
                    $seller_id = $row['seller_id'];
                    $product_title = $row['product_title'];
                    $product_actual_price = $row['product_actual_price'];
                    $product_selling_price = $row['product_selling_price'];
                    $product_label = $row['product_label'];
                    $product_img1 = $row['product_img1'];

                    $seller_query = "SELECT * FROM sellers WHERE seller_id='$seller_id'";
                    $run_seller_query = mysqli_query($con,$seller_query);
                    $row = mysqli_fetch_assoc($run_seller_query);
                    $seller_title = $row['seller_title'];
                

               
               
                   echo  "<div class='col-md-3 product-men'>
                                <div class='men-pro-item simpleCart_shelfItem'>
                                    <div class='men-thumb-item'>
                                        <a href='singleproduct.php?p_id=<?php echo '$product_id'; ?>'><img src='images/<?php echo '$product_img1'; ?>' alt='' class='pro-image-front'></a>
                                        <a href='singleproduct.php?p_id=<?php echo '$product_id'; ?>'><img src='images/<?php echo '$product_img1'; ?>' alt='' class='pro-image-back'></a>
                                            <div class='men-cart-pro'>
                                                <div class='inner-men-cart-pro'>
                                                    <a href='singleproduct.php?p_id=<?php echo '$product_id'; ?>' class='link-product-add-cart'>Quick View</a>
                                                </div>
                                            </div>
                                            <span class='product-new-top'><?php echo '$product_label'; ?></span>
                                            
                                    </div>
                                    <div class='item-info-product '>
                                        <h4><a href='singleproduct.php?p_id=<?php echo '$product_id'; ?>'><?php echo '$product_title'; ?></a></h4>
                                        <a href='singleproduct.php?s_id=<?php echo '$seller_id'; ?>'>Go to Shop - <?php echo '$seller_title'; ?></a>
                                        <div class='info-product-price'>
                                            <span class='item_price'>&#8360;<?php echo $product_selling_price; ?></span>
                                            <del>&#8360;<?php echo $product_actual_price; ?></del>
                                        </div>
                                        <div class='snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2'>
                                                            <form action='#' method='post'>
                                                                <fieldset>
                                                                    <input type='hidden' name='cmd' value='_cart' />
                                                                    <input type='hidden' name='add' value='1' />
                                                                    <input type='hidden' name='business' value='' />
                                                                    <input type='hidden' name='item_name' value='<?php echo $product_title; ?>' />
                                                                    <input type='hidden' name='amount' value='<?php echo $product_selling_price; ?>' />
                                                                    <input type='hidden' name='discount_amount' value='1.00' />
                                                                    
                                                                    <input type='hidden' name='return' value='' />
                                                                    <input type='hidden' name='cancel_return' value='' />
                                                                   <a href='singleproduct.php?p_id=<?php echo '$product_id'; ?>'><input type='submit' name='submit' value='Add to cart' class='button /></a>
                                                                </fieldset>
                                                            </form>
                                                        </div>
                                                                            
                                    </div>
                                </div>
                            </div>";
                          }
                             
  }

// total_price function Starts //

function total_price(){

global $con;

$ip_add = getIp();

$total = 0;

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$select_cart);

while($record=mysqli_fetch_array($run_cart)){

$pro_id = $record['p_id'];

$pro_qty = $record['qty'];


$sub_total = $record['p_price']*$pro_qty;

$total += $sub_total;






}

echo "$" . $total;



}


 function getCustomerId($value='')
{
    global $con;
       $customer_email = htmlentities($value);
            $customer_id_query =mysqli_query($con,"SELECT customer_id FROM customers WHERE customer_email='$customer_email'");
            $row = mysqli_fetch_assoc($customer_id_query);
            $customer_id = $row['customer_id'];
            return $customer_id;
}

 function getCustomerName($value='')
{
    global $con;
       $customer_email = htmlentities($value);
            $customer_id_query =mysqli_query($con,"SELECT customer_name FROM customers WHERE customer_email='$customer_email'");
            $row = mysqli_fetch_assoc($customer_id_query);
            $customer_name = $row['customer_name'];
            return $customer_name;
}
 ?>