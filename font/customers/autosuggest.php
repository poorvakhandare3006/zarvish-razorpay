<?php 
 include_once("includes/db.php");
 include_once("includes/functions.php");
 if(isset($_POST["query"]))  
 {  		
 		$searchText = test_input($_POST["query"]);
      $output = '';  
      $query = "SELECT * FROM products where (product_title LIKE '%{$searchText}%'  )  AND product_qty >0 LIMIT 6";  
      $result = mysqli_query($con, $query);  
      $output = '<ul class="list-unstyled" id="productul">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  

            {       $product_id = $row['product_id'];
                    $product_image_query = "SELECT product_image_title FROM products_image WHERE product_id='$product_id'";
                    $run_product_image_query = mysqli_query($con,$product_image_query);
                    $row_image = mysqli_fetch_assoc($run_product_image_query);
                    $product_image_title = $row_image['product_image_title'];  

                
                $output .= '<li>
                                                    <a href="../product-variable.php?p_id='.$product_id.'">
                                                        <div class="thumbnail"><img src="../images/product/'.$product_image_title.'.jpg" data-src="../images/loader.svg"  alt="'.$product_image_title.'"></div>
                                                        <div class="tt-description">
                                                            <div class="tt-title">'.$row['product_title'].'Flared Shift Bag</div>
                                                            <div class="tt-price">
                                                                <span class="new-price">'.$row['product_selling_price'].'</span>
                                                                <span class="old-price">'.$row['product_actual_price'].'</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>';
           }  
      }  
      else  
      {  
           $output .= '<li>Product Not Found</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }
 ?>