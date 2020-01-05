<?php 
require_once("includes/productheader.php");


if(isset($_GET['p_id'])){
    

$product_id = (int) $_GET['p_id'];
$get_product = "SELECT product_category_id,product_qty,product_title,product_code,product_color,product_actual_price,product_selling_price,product_label,product_description,main_product FROM products WHERE product_id='$product_id'";

$run_product = mysqli_query($con,$get_product);

$check_product = mysqli_num_rows($run_product);

if($check_product == 0){

echo "<script> window.open('index.php','_self') </script>";

}
else{



$row_product = mysqli_fetch_array($run_product);

$product_category_id = $row_product['product_category_id'];
$product_qty = $row_product['product_qty'];
$product_title = $row_product['product_title'];
$title_url = preg_replace('#[ -]+#', '-', $product_title);
$product_code = $row_product['product_code'];
$product_color = $row_product['product_color'];

$product_actual_price = $row_product['product_actual_price'];
$product_label = $row_product['product_label'];
$product_selling_price = $row_product['product_selling_price'];
$product_description = $row_product['product_description'];
$main_product = $row_product['main_product'];

$discount = Round((($product_actual_price-$product_selling_price)/$product_actual_price*100));


// Variation Query
if ($product_code === 'zarvish-old') {
    $product_color_variation_link = "";
}else {
 $run_variation_query = mysqli_query($con,"SELECT product_id,product_color FROM products WHERE product_code = '$product_code' ");

$product_color_variation_link ='<span style="font-size1.2em;font-weight:bold;">Color:&nbsp;</span>';
while($row = mysqli_fetch_assoc($run_variation_query)){

    $product_color = $row['product_color'];
    $variation_product_id = $row['product_id'];
// Query for getting color name
$run_color_query = mysqli_query($con,"SELECT color_name FROM colors WHERE color_id = '$product_color' ");
$row_c = mysqli_fetch_assoc($run_color_query);
$color_name = $row_c['color_name'];
$product_color_variation_link .= '<div style="font-size:1.2em;font-weight:bold;display:inline;margin-right:5px;background:#2879fe;padding:5px 10px;"><a href="product-variable.php?product_title='.$title_url.'&p_id='.$variation_product_id.'" style="color:#fff;">'.$color_name.'</a></div>';         
    
}
   
}

 

// Query for product label
$run_label_query = mysqli_query($con,"SELECT product_label_name FROM product_labels WHERE product_label_id = '$product_label' ");
$row = mysqli_fetch_assoc($run_label_query);
$product_label_name = $row['product_label_name'];

// Product active image and images query
$run_search_query = mysqli_query($con,"SELECT product_image_title FROM products_image WHERE product_id = '$product_id' ");

$product_images = '';
$product_images_pc = '';
while($row = mysqli_fetch_assoc($run_search_query)){

    $product_image_title = $row['product_image_title'];
    
  $product_images .= '<div><img src="images/product/'.$product_image_title.'.jpg" alt="'.$product_image_title.'"></div>';
   $product_images_pc .= ' <li><a href="#" data-image="images/product/'.$product_image_title.'.jpg" data-zoom-image="images/product/'.$product_image_title.'.jpg"><img src="images/product/'.$product_image_title.'.jpg" alt="'.$product_image_title.'"></a></li>';
}
$run_first_product_image_query = mysqli_query($con,"SELECT product_image_title FROM products_image WHERE product_id = '$product_id' LIMIT 1");
$row = mysqli_fetch_assoc($run_first_product_image_query);
$product_active_image = $row['product_image_title'];

}
}  else
 {
  echo "<script> window.open('index.php','_self') </script>";  
 }


?>

<style type="text/css">
    .tt-product-single-info .tt-wrapper {
        margin-top: 0px;
        margin-bottom: 0px;
    }
    
    @media only screen and (max-width: 500px){
        footer {
            display: none;
        }
    }
</style>
<div id="tt-pageContent">
    <div class="container-indent">
        <!-- mobile product slider  -->
        <!-- <div class="tt-mobile-product-slider visible-xs arrow-location-center slick-animated-show-js"> -->
        <div class="tt-mobile-product-slider visible-xs arrow-location-center slick-animated-show-js">
            <?php echo $product_images; ?>
            
        </div>
        <!-- /mobile product slider  -->
        <div class="container container-fluid-mobile">
            <div class="row">
                <div class="col-6 hidden-xs">
                    <div class="tt-product-vertical-layout">
                        <div class="tt-product-single-img">
                            <div>
                                <img class="zoom-product" src='images/product/<?php echo $product_active_image; ?>.jpg' data-zoom-image="images/product/<?php echo $product_active_image; ?>.jpg" alt="">
                                <button class="tt-btn-zomm tt-top-right"><i class="icon-f-86"></i></button>
                            </div>
                        </div>
                        <div class="tt-product-single-carousel-vertical">
                            <ul id="smallGallery" class="tt-slick-button-vertical slick-animated-show-js">
                                
                                <li><a class="zoomGalleryActive" href="#" data-image="images/product/<?php echo $product_active_image; ?>.jpg" data-zoom-image="images/product/<?php echo $product_active_image; ?>.jpg"><img src="images/product/<?php echo $product_active_image; ?>.jpg" alt=""></a></li>
                                <?php echo $product_images_pc; ?>
                                
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="tt-product-single-info">
                        <div class="tt-wrapper">
                            <div class="tt-label">
                                <div class="tt-label-new"><?php echo $product_label_name; ?></div>
                                <!-- <div class="tt-label-out-stock">Out Of Stock</div>
                                <div class="tt-label tt-label-sale">Sale 40%</div>
                                <div class="tt-label tt-label-our-fatured">Fatured</div> -->
                            </div>
                        </div>
                        <div class="tt-add-info">
                            <ul>
                                <li><span>SKU:</span> 001</li>
                                <li><span>Availability:</span> <?php echo $product_qty; ?> in Stock</li>
                            </ul>
                        </div>
                        <h1 class="tt-title"><?php echo $product_title; ?></h1>
                        <div class="tt-price">
                            <p id="demo" style="color:#dc3545;"></p>
                            <span class="new-price">₹<?php echo $product_selling_price; ?></span>
                            <span class="old-price" style="color:grey;text-decoration:line-through;font-size:0.8em;">₹<?php echo $product_actual_price; ?></span>
                            <br>
                            <span style="color:#00c853;font-size:0.9em;">Offer: <?php echo $discount."% OFF" ?></span>
                        </div>
                        <div class="tt-review">
                            <!-- <div class="tt-rating">
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star-half"></i>
                                <i class="icon-star-empty"></i>
                            </div> -->
                            <!-- <a href="#">(1 Customer Review)</a> -->
                        </div>
                        <!-- <div class="tt-wrapper">
                            Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                        </div> -->
                        <div class="tt-wrapper">
                            <div class="tt-countdown_box_02">
                                <div class="tt-countdown_inner">
                                    <!-- <div class="tt-countdown"
                                        data-date="2018-11-01"
                                        data-year="Yrs"
                                        data-month="Mths"
                                        data-week="Wk"
                                        data-day="Day"
                                        data-hour="Hrs"
                                        data-minute="Min"
                                        data-second="Sec">
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="tt-swatches-container">
                            
                            <?php echo "$product_color_variation_link"; ?>
                            <div class="tt-wrapper product-information-buttons">
                                <a data-toggle="modal" data-target="#modalProductInfo" href="#">Size Guide</a>
                                <a data-toggle="modal" data-target="#modalProductInfo-02" href="#">Shipping</a>
                            </div>
                            <!-- <div class="tt-wrapper">
                                <div class="tt-title-options">COLOR:</div>
                                <ul class="tt-options-swatch options-large">
                                    <li><a class="options-color tt-color-bg-09" href="#"></a></li>
                                    <li class="active"><a class="options-color tt-color-bg-10" href="#"></a></li>
                                    <li><a class="options-color tt-color-bg-11" href="#"></a></li>
                                    <li><a class="options-color tt-color-bg-12" href="#"></a></li>
                                    <li><a class="options-color tt-color-bg-13" href="#"></a></li>
                                </ul>
                            </div> -->
                            
                        </div>
                        <div class="tt-wrapper">
                            <div class="tt-row-custom-01">
                                <div class="col-item">
                                    <!-- <div class="tt-input-counter style-01">
                                        <span class="minus-btn"></span>
                                        <input type="text" value="1" size="5">
                                        <span class="plus-btn"></span>
                                    </div> -->
                                </div>
                                <div class="col-item">
                                    <form id="form1" name="form1" method="post" action="cart.php">
        <input type="hidden" name="pid" id="pid" value="<?php echo $product_id; ?>" />
        <div class="form-group">
       <span style="color:#2879fe;">Size:&nbsp;</span> <select name="size" required="true" class="form-control">
       <option value="">Size</option>
       <?php 

       $get_product_size = "SELECT * FROM products_size WHERE product_id='$product_id' AND size_qty > 0 ";

        $run_get_product_size = mysqli_query($con,$get_product_size);

        while ($row_label=mysqli_fetch_array($run_get_product_size)) {

        $size_name = $row_label['size_name'];

        $size_qty = $row_label['size_qty'];
        ?>
        
        <option value="<?php echo $size_name; ?>"><?php echo $size_name; ?></option>
        <?php } ?>

        </select>
    </div>
        <br>
        
        <input type="submit" name="button" id="button" value="Add to Shopping Cart" class="btn btn-lg"/>
      </form>
                                    <!-- <a href="#" class="btn btn-lg"><i class="icon-f-39"></i>ADD TO CART</a> -->
                                    <br>
                                    <br>
                                    <div class="sharethis-inline-share-buttons"></div>

                                </div>
                            </div>
                        </div>
                        
                        <div class="tt-wrapper">
                            <div class="tt-promo-brand">
                                <img src="images/custom/tt-promo-brand-desctop.png" class="visible-lg visible-md visible-sm visible-xl" alt="">
                                <img src="images/custom/tt-promo-brand-mobile.png" class="visible-xs" alt="">
                            </div>
                        </div>
                        <div class="tt-wrapper">
                            <div class="tt-add-info">
                                <br />
                                <ul>
                                    <li>Product Description</li>
                                    
                                    <li><span><?php echo $product_description; ?></span></li>
                                    
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="tt-collapse-block">
                            <!-- <div class="tt-item">
                                <div class="tt-collapse-title">DESCRIPTION</div>
                                <div class="tt-collapse-content">
                                    Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.
                                </div>
                            </div> -->
                            

                            <!-- Review portion starts here -->
                            <!-- <div class="tt-item">
                                <div class="tt-collapse-title">REVIEWS (3)</div>
                                <div class="tt-collapse-content">
                                    <div class="tt-review-block">
                                        <div class="tt-row-custom-02">
                                            <div class="col-item">
                                                <h2 class="tt-title">
                                                    1 REVIEW FOR VARIABLE PRODUCT
                                                </h2>
                                            </div>
                                            <div class="col-item">
                                                <a href="#">Write a review</a>
                                            </div>
                                        </div>
                                        <div class="tt-review-comments">
                                            <div class="tt-item">
                                                <div class="tt-avatar">
                                                    <a href="#"><img src="images/product/single/review-comments-img-01.jpg" alt=""></a>
                                                </div>
                                                <div class="tt-content">
                                                    <div class="tt-rating">
                                                        <i class="icon-star"></i>
                                                        <i class="icon-star"></i>
                                                        <i class="icon-star"></i>
                                                        <i class="icon-star-half"></i>
                                                        <i class="icon-star-empty"></i>
                                                    </div>
                                                    <div class="tt-comments-info">
                                                        <span class="username">by <span>ADRIAN</span></span>
                                                        <span class="time">on January 14, 2017</span>
                                                    </div>
                                                    <div class="tt-comments-title">Very Good!</div>
                                                    <p>
                                                        Ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="tt-item">
                                                <div class="tt-avatar">
                                                    <a href="#"><img src="images/product/single/review-comments-img-02.jpg" alt=""></a>
                                                </div>
                                                <div class="tt-content">
                                                    <div class="tt-rating">
                                                        <i class="icon-star"></i>
                                                        <i class="icon-star"></i>
                                                        <i class="icon-star"></i>
                                                        <i class="icon-star-half"></i>
                                                        <i class="icon-star-empty"></i>
                                                    </div>
                                                    <div class="tt-comments-info">
                                                        <span class="username">by <span>JESICA</span></span>
                                                        <span class="time">on January 14, 2017</span>
                                                    </div>
                                                    <div class="tt-comments-title">Bad!</div>
                                                    <p>
                                                        Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="tt-item">
                                                <div class="tt-avatar">
                                                    <a href="#"></a>
                                                </div>
                                                <div class="tt-content">
                                                    <div class="tt-rating">
                                                        <i class="icon-star"></i>
                                                        <i class="icon-star"></i>
                                                        <i class="icon-star"></i>
                                                        <i class="icon-star-half"></i>
                                                        <i class="icon-star-empty"></i>
                                                    </div>
                                                    <div class="tt-comments-info">
                                                        <span class="username">by <span>ADAM</span></span>
                                                        <span class="time">on January 14, 2017</span>
                                                    </div>
                                                    <div class="tt-comments-title">Very Good!</div>
                                                    <p>
                                                        Diusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tt-review-form">
                                            <div class="tt-message-info">
                                                BE THE FIRST TO REVIEW <span>“BLOUSE WITH SHEER &AMP; SOLID PANELS”</span>
                                            </div>
                                            <p>Your email address will not be published. Required fields are marked *</p>
                                            <div class="tt-rating-indicator">
                                                <div class="tt-title">
                                                    YOUR RATING *
                                                </div>
                                                <div class="tt-rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-half"></i>
                                                    <i class="icon-star-empty"></i>
                                                </div>
                                            </div>
                                            <form class="form-default">
                                                <div class="form-group">
                                                    <label for="inputName" class="control-label">YOUR NAME *</label>
                                                    <input type="email" class="form-control" id="inputName" placeholder="Enter your name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail" class="control-label">COUPONE E-MAIL *</label>
                                                    <input type="password" class="form-control" id="inputEmail" placeholder="Enter your e-mail">
                                                </div>
                                                <div class="form-group">
                                                    <label for="textarea" class="control-label">YOUR REVIEW *</label>
                                                    <textarea class="form-control"  id="textarea" placeholder="Enter your review" rows="8"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn">SUBMIT</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- Review portion ends here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-indent wrapper-social-icon">
        <div class="container">
            <ul class="tt-social-icon justify-content-center">
                <li><a class="icon-g-64" href="http://www.facebook.com/"></a></li>
                <li><a class="icon-h-58" href="http://www.facebook.com/"></a></li>
                <li><a class="icon-g-66" href="http://www.twitter.com/"></a></li>
                <li><a class="icon-g-67" href="http://www.google.com/"></a></li>
                <li><a class="icon-g-70" href="https://instagram.com/"></a></li>
            </ul>
        </div>
    </div>
    <div class="container-indent">
        <div class="container container-fluid-custom-mobile-padding">
            <div class="tt-block-title text-left">
                <h3 class="tt-title-small">RELATED PRODUCT</h3>
            </div>
                <div class="tt-carousel-products row arrow-location-right-top tt-alignment-img tt-layout-product-item slick-animated-show-js">
                    <?php 

                     $run_search_query = mysqli_query($con,"SELECT product_id,product_category_id,product_qty,product_title,product_actual_price,product_selling_price,product_label FROM products WHERE main_product='yes' ORDER BY RAND() LIMIT 5");
                
 
               
                  $total_rows = mysqli_num_rows($run_search_query);
               if (mysqli_num_rows($run_search_query)<1) {
                    echo "<div style='padding:50px;height:400px;margin-top:25px;'><center><b>Oops! sorry, Product is not available which you want...</b></center></div>";
                    
                } 
                $list = '';
                while($row = mysqli_fetch_assoc($run_search_query)){
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_title = wordwrap($product_title, 15);
                    $product_title = explode("\n", $product_title);
                    $product_title = $product_title[0] . '...';
                    $product_actual_price = $row['product_actual_price'];
                    $product_selling_price = $row['product_selling_price'];
                    $product_qty = $row['product_qty'];
                    $product_label = $row['product_label'];
                    $product_category_id = $row['product_category_id'];
                    $discount = Round((($product_actual_price-$product_selling_price)/$product_actual_price*100));
                    
                    $product_category_name = "SELECT product_category_name FROM product_categories WHERE product_category_id='$product_category_id'";
                    $product_category_name_query = mysqli_query($con,$product_category_name);
                    $row = mysqli_fetch_assoc($product_category_name_query);
                    $product_category_name = $row['product_category_name'];

                    $product_image_query = "SELECT product_image_title FROM products_image WHERE product_id='$product_id'";
                    $run_product_image_query = mysqli_query($con,$product_image_query);
                    $row = mysqli_fetch_assoc($run_product_image_query);
                    $product_image_title = $row['product_image_title'];
                     
                    $list .= '<div class="col-2 col-md-4 col-lg-3">
                    <div class="tt-product thumbprod-center">
                        <div class="tt-image-box">
                            <a href="product-variable.php?product_title='.$title_url.'&p_id='.$product_id.'" class="tt-btn-quickview" data-toggle="" data-target="#ModalquickView"  data-tooltip="Quick View" data-tposition="left"></a>
                            
                            <a href="product-variable.php?product_title='.$title_url.'&p_id='.$product_id.'">
                                <span class="tt-img"><img src="images/product/'.$product_image_title.'.jpg" alt="'.$product_image_title.'"></span>
                                <span class="tt-img-roll-over"><img src="images/product/'.$product_image_title.'.jpg" alt="'.$product_image_title.'"></span>
                            </a>
                        </div>
                        <div class="tt-description">
                            <div class="tt-row">
                                <ul class="tt-add-info">
                                    <li><a href="product-variable.php?product_title='.$title_url.'&p_id='.$product_id.'">'.$product_category_name.'</a></li>
                                </ul>
                                <div class="tt-rating" style="color:#00c853;font-weight:bold;">
                                        '.$discount.'% OFF
                                            
                                        </div>
                            </div>
                            <h2 class="tt-title"><a href="product-variable.php?product_title='.$title_url.'&p_id='.$product_id.'">'.$product_title.'</a></h2>
                            <div class="tt-price">
                                  &#8377; '.$product_selling_price.'&nbsp; <span style="text-decoration:line-through;color:grey;">&#8377;'.$product_actual_price.'</span>
                            </div>
                            <div class="tt-product-inside-hover">
                                <div class="tt-row-btn">
                                    <a href="product-variable.php?product_title='.$title_url.'&p_id='.$product_id.'" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                </div>
                                <div class="tt-row-btn">
                                    <a href="product-variable.php?product_title='.$title_url.'&p_id='.$product_id.'" class="tt-btn-quickview" data-toggle="" data-target="#ModalquickView"></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';

            }
            echo $list; 

                    ?>
                
               
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="tt-footer-default tt-color-scheme-02">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-9">
                    <div class="tt-newsletter-layout-01">
                        <div class="tt-newsletter">
                            <div class="tt-mobile-collapse">
                                <h4 class="tt-collapse-title">
                                    BE IN TOUCH WITH US:
                                </h4>
                                <div class="tt-collapse-content">
                                    <form id="newsletterform" class="form-inline form-default" method="post" novalidate="novalidate" action="#">
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control" placeholder="Enter your e-mail">
                                            <button type="submit" class="btn">JOIN US</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-auto">
                    <ul class="tt-social-icon">
                        <li><a class="icon-g-64" target="_blank" href="http://www.facebook.com/"></a></li>
                        <li><a class="icon-h-58" target="_blank" href="http://www.facebook.com/"></a></li>
                        <li><a class="icon-g-66" target="_blank" href="http://www.twitter.com/"></a></li>
                        <li><a class="icon-g-67" target="_blank" href="http://www.google.com/"></a></li>
                        <li><a class="icon-g-70" target="_blank" href="https://instagram.com/"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="tt-footer-col tt-color-scheme-01">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-2 col-xl-3">
                    <div class="tt-mobile-collapse">
                        <h4 class="tt-collapse-title">
                            CATEGORIES
                        </h4>
                        <div class="tt-collapse-content">
                            <ul class="tt-list">
                                <li><a href="collection.php?g-id=2">Women</a></li>
                                <li><a href="collection.php?g-id=1">Men</a></li>
                                <li><a href="collection.php?g-id=3">Child</a></li>
                                <li><a href="#">Shoes</a></li>
                                
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 col-xl-3">
                    <div class="tt-mobile-collapse">
                        <h4 class="tt-collapse-title">
                            MY ACCOUNT
                        </h4>
                        <div class="tt-collapse-content">
                            <ul class="tt-list">
                                
                                
                                
                                <li><a href="login.php">Log In</a></li>
                                <li><a href="register.php">Register</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="tt-mobile-collapse">
                        <h4 class="tt-collapse-title">
                            Tagline
                        </h4>
                        <div class="tt-collapse-content">
                            <p>
                            Observe Everything
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="tt-newsletter">
                        <div class="tt-mobile-collapse">
                            <h4 class="tt-collapse-title">
                                CONTACTS
                            </h4>
                            <div class="tt-collapse-content">
                                <address>
                                    <p><span>Address:</span> Gwalior (Madhya Pradesh)</p>
                                    <p><span>Phone:</span> +919131834837</p>
                                    <p><span>Hours:</span> We are available 24*7 all the time.</p>
                                    <p><span>E-mail:</span> <a href="mailto:help@zarvish.com">help@zarvish.com</a></p>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tt-footer-custom">
        <div class="container">
            <div class="tt-row">
                <div class="tt-col-left">
                    <div class="tt-col-item tt-logo-col">
                        <!-- logo -->
                        <a class="tt-logo tt-logo-alignment" href="index.php"><img src="images/custom/zarvish.png" alt="zarvish logo"></a>
                        <!-- /logo -->
                    </div>
                </div>
                <div class="tt-col-right">
                    <div class="tt-col-item">
                        <!-- payment-list -->
                        <ul class="tt-payment-list">
                            <li><a href="#"><span class="icon-Stripe"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span>
                            </span></a></li>
                            <li><a href="#"> <span class="icon-paypal-2">
                            <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span>
                            </span></a></li>
                            <li><a href="#"><span class="icon-visa">
                            <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
                            </span></a></li>
                            <li><a href="#"><span class="icon-mastercard">
                            <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span>
                            </span></a></li>
                            <li><a href="#"><span class="icon-discover">
                            <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span><span class="path14"></span><span class="path15"></span><span class="path16"></span>
                            </span></a></li>
                            <li><a href="#"><span class="icon-american-express">
                            <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span>
                            </span></a></li>
                        </ul>
                        <!-- /payment-list -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<a href="#" class="tt-back-to-top">BACK TO TOP</a>
<!-- modal (AddToCartProduct) -->
<div class="modal  fade"  id="modalAddToCartProduct" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
            </div>
            <div class="modal-body">
                <div class="tt-modal-addtocart mobile">
                    <div class="tt-modal-messages">
                        <i class="icon-f-68"></i> Added to cart successfully!
                    </div>
                    <a href="#" class="btn-link btn-close-popup">CONTINUE SHOPPING</a>
                    <a href="shopping_cart_02.html" class="btn-link">VIEW CART</a>
                    <a href="#" class="btn-link">PROCEED TO CHECKOUT</a>
                </div>
                <div class="tt-modal-addtocart desctope">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="tt-modal-messages">
                                <i class="icon-f-68"></i> Added to cart successfully!
                            </div>
                            <div class="tt-modal-product">
                                <div class="tt-img">
                                    <img src="images/loader.svg" data-src="images/product/product-01.jpg" alt="">
                                </div>
                                <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                                <div class="tt-qty">
                                    QTY: <span>1</span>
                                </div>
                            </div>
                            <div class="tt-product-total">
                                <div class="tt-total">
                                    TOTAL: <span class="tt-price">$324</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <a href="#" class="tt-cart-total">
                                There are 1 items in your cart
                                <div class="tt-total">
                                    TOTAL: <span class="tt-price">$324</span>
                                </div>
                            </a>
                            <a href="#" class="btn btn-border btn-close-popup">CONTINUE SHOPPING</a>
                            <a href="shopping_cart_02.html" class="btn btn-border">VIEW CART</a>
                            <a href="#" class="btn">PROCEED TO CHECKOUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal (quickViewModal) -->
<div class="modal  fade"  id="ModalquickView" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
            </div>
            <div class="modal-body">
                <div class="tt-modal-quickview desctope">
                    <div class="row">
                        <div class="col-12 col-md-5 col-lg-6">
                            <div class="tt-mobile-product-slider arrow-location-center">
                                <div><img src="images/loader.svg" data-src="images/product/product-01.jpg" alt=""></div>
                                <div><img src="images/loader.svg" data-src="images/product/product-01-02.jpg" alt=""></div>
                                <div><img src="images/loader.svg" data-src="images/product/product-01-03.jpg" alt=""></div>
                                <div><img src="images/loader.svg" data-src="images/product/product-01-04.jpg" alt=""></div>
                                <div>
                                    <div class="tt-video-block">
                                        <a href="#" class="link-video"></a>
                                        <video class="movie" src="video/video.mp4" poster="video/video_img.jpg"></video>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-7 col-lg-6">
                            <div class="tt-product-single-info">
                                <div class="tt-add-info">
                                    <ul>
                                        <li><span>SKU:</span> 001</li>
                                        <li><span>Availability:</span> 40 in Stock</li>
                                    </ul>
                                </div>
                                <h2 class="tt-title">Cotton Blend Fleece Hoodie</h2>
                                <div class="tt-price">
                                    <span class="new-price">$29</span>
                                    <span class="old-price"></span>
                                </div>
                                <div class="tt-review">
                                    <div class="tt-rating">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star-half"></i>
                                        <i class="icon-star-empty"></i>
                                    </div>
                                    <!-- <a href="#">(1 Customer Review)</a> -->
                                </div>
                                <!-- <div class="tt-wrapper">
                                    Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                                </div> -->
                                <div class="tt-swatches-container">
                                    <div class="tt-wrapper">
                                        <div class="tt-title-options">SIZE</div>
                                        <form class="form-default">
                                            <div class="form-group">
                                                <select class="form-control">
                                                    <option>21</option>
                                                    <option>25</option>
                                                    <option>36</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tt-wrapper">
                                        <div class="tt-title-options">COLOR</div>
                                        <form class="form-default">
                                            <div class="form-group">
                                                <select class="form-control">
                                                    <option>Red</option>
                                                    <option>Green</option>
                                                    <option>Brown</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tt-wrapper">
                                        <div class="tt-title-options">TEXTURE:</div>
                                        <ul class="tt-options-swatch options-large">
                                            <li><a class="options-color" href="#">
                                                <span class="swatch-img">
                                                    <img src="images/loader.svg" data-src="images/custom/texture-img-01.jpg" alt="">
                                                </span>
                                                <span class="swatch-label color-black"></span>
                                            </a></li>
                                            <li class="active"><a class="options-color" href="#">
                                                <span class="swatch-img">
                                                    <img src="images/loader.svg" data-src="images/custom/texture-img-02.jpg" alt="">
                                                </span>
                                                <span class="swatch-label color-black"></span>
                                            </a></li>
                                            <li><a class="options-color" href="#">
                                                <span class="swatch-img">
                                                    <img src="images/loader.svg" data-src="images/custom/texture-img-03.jpg" alt="">
                                                </span>
                                                <span class="swatch-label color-black"></span>
                                            </a></li>
                                            <li><a class="options-color" href="#">
                                                <span class="swatch-img">
                                                    <img src="images/loader.svg" data-src="images/custom/texture-img-04.jpg" alt="">
                                                </span>
                                                <span class="swatch-label color-black"></span>
                                            </a></li>
                                            <li><a class="options-color" href="#">
                                                <span class="swatch-img">
                                                    <img src="images/loader.svg" data-src="images/custom/texture-img-05.jpg" alt="">
                                                </span>
                                                <span class="swatch-label color-black"></span>
                                            </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tt-wrapper">
                                    <div class="tt-row-custom-01">
                                        <div class="col-item">
                                            <div class="tt-input-counter style-01">
                                                <span class="minus-btn"></span>
                                                <input type="text" value="1" size="5">
                                                <span class="plus-btn"></span>
                                            </div>
                                        </div>
                                        <div class="col-item">
                                            <a href="#" class="btn btn-lg"><i class="icon-f-39"></i>ADD TO CART</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modalVideoProduct -->
<div class="modal fade"  id="modalVideoProduct" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-video">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
            </div>
            <div class="modal-body">
                <div class="modal-video-content">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal (ModalSubsribeGood) -->
<div class="modal  fade"  id="ModalSubsribeGood" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
            </div>
            <div class="modal-body">
                <div class="tt-modal-subsribe-good">
                    <i class="icon-f-68"></i> You have successfully signed!
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal (size guid) -->
<div class="modal  fade"  id="modalProductInfo" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
            </div>
            <div class="modal-body">
                <div class="tt-layout-product-info">
                    <h6 class="tt-title">SIZE GUIDE</h6>
                    This is an approximate conversion table to help you find your size.
                    <div class="tt-table-responsive-md">
                        <table class="tt-table-modal-info">
                            <thead>
                                <tr>
                                    <th>Body Chest Measurement</th>
                                    <th>You should go for</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>35"-36"</td>
                                    <td>S</td>
                                </tr>
                                <tr>
                                    <td>37"-38"</td>
                                    <td>M</td>
                                    
                                    
                                    
                                    
                                    
                                </tr>
                                <tr>
                                    <td>39"-40"</td>
                                    <td>L</td>
                                </tr>
                                <tr>
                                    <td>41"-42"</td>
                                    <td>XL</td>
                                    
                                </tr>
                                <tr>
                                    <td>43"-44"</td>
                                    <td>XXL</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal (size guid) -->
<div class="modal  fade"  id="modalProductInfo-02" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
            </div>
            <div class="modal-body">
                <div class="tt-layout-product-info-02">
                    <h6 class="tt-title">SHIPPING</h6>
                    <ul>
                        <li>Product will be delivered within 2 to 3 business days</li>
                        
                        
                        
                        <li>See the delivery FAQs for details on shipping methods, costs and delivery times</li>
                    </ul>
                    <h6 class="tt-title">RETURNS AND EXCHANGES</h6>
                    <ul>
                        <li>Easy and complimentary, within 14 days</li>
                        <li>See conditions and procedure in our return FAQs</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="external/jquery/jquery.min.js"></script>
<script src="external/bootstrap/js/bootstrap.min.js"></script>
<script src="external/elevatezoom/jquery.elevatezoom.js"></script>
<script src="external/slick/slick.min.js"></script>
<script src="external/panelmenu/panelmenu.js"></script>
<script src="external/countdown/jquery.plugin.min.js"></script>
<script src="external/countdown/jquery.countdown.min.js"></script>
<script src="external/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="external/lazyLoad/lazyload.min.js"></script>
<script src="js/main.js"></script>
<!-- form validation and sending to mail -->
<script src="external/form/jquery.form.js"></script>
<script src="external/form/jquery.validate.min.js"></script>
<script src="external/form/jquery.form-init.js"></script>

<script>
// Set the date we're counting down to
var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML =  hours + "h "
  + minutes + "m " + seconds + "s (Ending Soon)";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
</body>
</html>