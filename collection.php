<?php 
require_once("includes/collectionheader.php");
$paginationCtrls  = '';

if(isset($_GET['g-id'])){
  $gender_id = (int) $_GET['g-id'];
  $gender_query = "SELECT gender_name FROM genders WHERE gender_id='$gender_id'";
  $product_category_name_query = mysqli_query($con,$gender_query);
    $product_category_name_query_row = mysqli_fetch_assoc($product_category_name_query);
    $gender_name = $product_category_name_query_row['gender_name'];
    }
?>
<!--<div class="tt-breadcrumb">-->
<!--    <div class="container">-->
<!--        <ul>-->
<!--            <li><a href="index.php">Home</a></li>-->
<!--            <li>Listing</li>-->
<!--        </ul>-->
<!--    </div>-->
<!--</div>-->
<div id="tt-pageContent">
    <div class="container-indent">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-3 leftColumn aside">
                    <div class="tt-btn-col-close">
                        <a href="#">Close</a>
                    </div>
                    <div class="tt-collapse open tt-filter-detach-option">
                        <div class="tt-collapse-content">
                            <div class="filters-mobile">
                                <div class="filters-row-select">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="tt-collapse open ">-->
                    <!--    <h3 class="tt-collapse-title">SORT BY</h3>-->
                    <!--    <div class="tt-collapse-content">-->
                    <!--        <ul class="tt-filter-list">-->
                    <!--            <li class="active">-->
                    <!--                <a href="#">Shirts &amp; Tops</a>-->
                    <!--            </li>-->
                    <!--            <li>-->
                    <!--                <a href="#">XS</a>-->
                    <!--            </li>-->
                    <!--            <li>-->
                    <!--                <a href="#">White</a>-->
                    <!--            </li>-->
                    <!--        </ul>-->
                    <!--        <a href="#" class="btn-link-02">Clear All</a>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="tt-collapse open">-->
                    <!--    <h3 class="tt-collapse-title">PRODUCT CATEGORIES</h3>-->
                    <!--    <div class="tt-collapse-content">-->
                    <!--        <ul class="tt-list-row">-->
                    <!--            <li class="active"><a href="#">Dresses</a></li>-->
                    <!--            <li><a href="#">Shirts &amp; Tops</a></li>-->
                    <!--            <li><a href="#">Polo Shirts</a></li>-->
                    <!--            <li><a href="#">Sweaters</a></li>-->
                    <!--            <li><a href="#">Blazers &amp; Vests</a></li>-->
                    <!--            <li><a href="#">Jackets &amp; Outerwear</a></li>-->
                    <!--            <li><a href="#">Activewear</a></li>-->
                    <!--            <li><a href="#">Pants</a></li>-->
                    <!--            <li><a href="#">Jumpsuits &amp; Shorts</a></li>-->
                    <!--            <li><a href="#">Jeans</a></li>-->
                    <!--            <li><a href="#">Skirts</a></li>-->
                    <!--            <li><a href="#">Swimwear</a></li>-->
                    <!--        </ul>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="tt-collapse open">-->
                    <!--    <h3 class="tt-collapse-title">FILTER BY PRICE</h3>-->
                    <!--    <div class="tt-collapse-content">-->
                    <!--        <ul class="tt-list-row">-->
                    <!--            <li class="active"><a href="#">$0 — $50</a></li>-->
                    <!--            <li><a href="#">$50 — $100</a></li>-->
                    <!--            <li><a href="#">$100 — $150</a></li>-->
                    <!--            <li><a href="#">$150 —  $200</a></li>-->
                    <!--        </ul>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="tt-collapse open">-->
                    <!--    <h3 class="tt-collapse-title">FILTER BY SIZE</h3>-->
                    <!--    <div class="tt-collapse-content">-->
                    <!--        <ul class="tt-options-swatch options-middle">-->
                    <!--            <li><a href="#">4</a></li>-->
                    <!--            <li class="active"><a href="#">6</a></li>-->
                    <!--            <li><a href="#">8</a></li>-->
                    <!--            <li><a href="#">10</a></li>-->
                    <!--            <li><a href="#">12</a></li>-->
                    <!--            <li><a href="#">14</a></li>-->
                    <!--            <li><a href="#">16</a></li>-->
                    <!--            <li><a href="#">18</a></li>-->
                    <!--            <li><a href="#">20</a></li>-->
                    <!--            <li><a href="#">22</a></li>-->
                    <!--            <li><a href="#">24</a></li>-->
                    <!--        </ul>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="tt-collapse open">-->
                    <!--    <h3 class="tt-collapse-title">FILTER BY COLOR</h3>-->
                    <!--    <div class="tt-collapse-content">-->
                    <!--        <ul class="tt-options-swatch options-middle">-->
                    <!--            <li><a class="options-color tt-border tt-color-bg-08" href="#"></a></li>-->
                    <!--            <li><a class="options-color tt-color-bg-09" href="#"></a></li>-->
                    <!--            <li class="active"><a class="options-color tt-color-bg-10" href="#"></a></li>-->
                    <!--            <li><a class="options-color tt-color-bg-11" href="#"></a></li>-->
                    <!--            <li><a class="options-color tt-color-bg-12" href="#"></a></li>-->
                    <!--            <li><a class="options-color tt-color-bg-13" href="#"></a></li>-->
                    <!--            <li><a class="options-color tt-color-bg-14" href="#"></a></li>-->
                    <!--            <li><a class="options-color tt-color-bg-15" href="#"></a></li>-->
                    <!--            <li><a class="options-color tt-color-bg-16" href="#"></a></li>-->
                    <!--            <li><a class="options-color tt-color-bg-17" href="#"></a></li>-->
                    <!--            <li><a class="options-color tt-color-bg-18" href="#"></a></li>-->
                    <!--            <li><a class="options-color" href="#">-->
                    <!--                <span class="swatch-img">-->
                    <!--                    <img src="images/custom/texture-img-01.jpg" alt="">-->
                    <!--                </span>-->
                    <!--                <span class="swatch-label color-black"></span>-->
                    <!--            </a></li>-->
                    <!--        </ul>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="tt-collapse open">-->
                    <!--    <h3 class="tt-collapse-title">VENDOR</h3>-->
                    <!--    <div class="tt-collapse-content">-->
                    <!--        <ul class="tt-list-row">-->
                    <!--            <li><a href="#">Levi's</a></li>-->
                    <!--            <li><a href="#">Gap</a></li>-->
                    <!--            <li><a href="#">Polo</a></li>-->
                    <!--            <li><a href="#">Lacoste</a></li>-->
                    <!--            <li><a href="#">Guess</a></li>-->
                    <!--        </ul>-->
                    <!--        <a href="#" class="btn-link-02">+ More</a>-->
                    <!--    </div>-->
                    <!--</div>-->
                    
                    
                    <div class="tt-content-aside">
                        <a href="listing-left-column.html" class="tt-promo-03">
                            <img src="images/custom/listing_promo_img_07.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-xl-9">
                    <div class="content-indent container-fluid-custom-mobile-padding-02">
                        <div class="tt-filters-options">
                            
                            <div class="tt-btn-toggle">
                                <a href="#">FILTER</a>
                            </div>
                            <div class="tt-sor">
                                <form action="" method="GET" >
                                    <select name='sort' onchange="this.form.submit()" style="background-color: #2879fe;color: #fff;border: none;"> 
                                        <option value="" >Price filter</option>
                                        <option value='ASC'>Low to high</option>
                                        <option value='DESC'>High to low</option>
                                    </select>
                                    <input type="hidden" value="<?php echo $gender_id; ?>" name="g-id">
                                 </form>
                                
                            </div>
                            
                            <div class="tt-quantity">
                                <a href="#" class="tt-col-one" data-value="tt-col-one"></a>
                                <a href="#" class="tt-col-two" data-value="tt-col-two"></a>
                                <a href="#" class="tt-col-three" data-value="tt-col-three"></a>
                                <a href="#" class="tt-col-four" data-value="tt-col-four"></a>
                                <a href="#" class="tt-col-six" data-value="tt-col-six"></a>
                            </div>
                            <a href="#" class="tt-grid-switch icon-h-43"></a>
                        </div>
                        <div class="tt-product-listing row">
                            <?php 
                        if (!isset($_GET['sort'])) {

                         $sql = "SELECT COUNT(product_id) FROM products WHERE product_gender_id='$gender_id'";
                        $query = mysqli_query($con, $sql);
                        $row = mysqli_fetch_row($query);
                        // Here we have the total row count
                        $rows = $row[0];
                        // This is the number of results we want displayed per page
                        $page_rows = 18;
                        // This tells us the page number of our last page
                        $last = ceil($rows/$page_rows);
                        // This makes sure $last cannot be less than 1
                        if($last < 1){
                          $last = 1;
                        }
                        // Establish the $pagenum variable
                        $pagenum = 1;
                        // Get pagenum from URL vars if it is present, else it is = 1
                        if(isset($_GET['pn'])){
                          $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
                        }
                        // This makes sure the page number isn't below 1, or more than our $last page
                        if ($pagenum < 1) { 
                            $pagenum = 1; 
                        } else if ($pagenum > $last) { 
                            $pagenum = $last; 
                        }
                        // This sets the range of rows to query for the chosen $pagenum
                        $limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
                        // This is your query again, it is for grabbing just one page worth of rows by applying $limit

                        $paginationCtrls = '';
                        // If there is more than 1 page worth of results
                        if($last != 1){
                          /* First we check if we are on page one. If we are then we don't need a link to 
                             the previous page or the first page so we do nothing. If we aren't then we
                             generate links to the first page, and to the previous page. */
                          if ($pagenum > 1) {
                                $previous = $pagenum - 1;
                            $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'&g-id='.$gender_id.'">Previous</a> &nbsp; &nbsp; ';
                            // Render clickable number links that should appear on the left of the target page number
                            for($i = $pagenum-4; $i < $pagenum; $i++){
                              if($i > 0){
                                    $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'&g-id='.$gender_id.'">'.$i.'</a> &nbsp; ';
                              }
                              }
                            }
                          // Render the target page number, but without it being a link
                          $paginationCtrls .= ''.$pagenum.' &nbsp; ';
                          // Render clickable number links that should appear on the right of the target page number
                          for($i = $pagenum+1; $i <= $last; $i++){
                            $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'&g-id='.$gender_id.'">'.$i.'</a> &nbsp; ';
                            if($i >= $pagenum+4){
                              break;
                            }
                          }
                          // This does the same as above, only checking if we are on the last page, and then generating the "Next"
                            if ($pagenum != $last) {
                                $next = $pagenum + 1;
                                $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'&g-id='.$gender_id.'">Next</a> ';
                            }
                        }
                



                 $run_search_query = mysqli_query($con,"SELECT product_id,product_category_id,product_qty,product_title,product_actual_price,product_selling_price,product_label FROM products WHERE product_gender_id='$gender_id' AND main_product='yes' AND product_category_id = '1' ORDER BY product_id DESC $limit");
                
 
               
                  $total_rows = mysqli_num_rows($run_search_query);
               if (mysqli_num_rows($run_search_query)<1) {
                    echo "<div style='padding:50px;height:400px;margin-top:25px;'><center><b>Oops! sorry, Product is not available which you want...</b></center></div>";
                    
                } 
                $list = '';
                while($row = mysqli_fetch_assoc($run_search_query)){
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $title_url = preg_replace('#[ -]+#', '-', $product_title);
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
                     
                    $list .= '<div class="col-6 col-md-4 tt-col-item">
                            <div class="tt-product thumbprod-center">
                                <div class="tt-image-box">
                                    <a href="product-variable.php?product_title='.$title_url.'&p_id='.$product_id.'" class="tt-btn-quickview"  data-target="#ModalquickView"  data-tooltip="Quick View" data-tposition="left"></a>
                            
                                    <a href="product-variable.php?product_title='.$title_url.'&p_id='.$product_id.'">
                                        <span class="tt-img"><img src="images/loader.svg" data-src="images/product/'.$product_image_title.'.jpg" alt="'.$product_image_title.'"></span>
                                        <span class="tt-img-roll-over"><img src="images/loader.svg" data-src="images/product/'.$product_image_title.'.jpg" alt="'.$product_image_title.'"></span>
                                    </a>
                                </div>
                                <div class="tt-description">
                                    <div class="tt-row">
                                        <ul class="tt-add-info">
                                            <li><a href="#">'.$product_category_name.'</a></li>
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
                                        
                                    </div>
                                </div>
                            </div>
                        </div>';

            }
            echo $list; 
        }

                            ?>
                            <!-- For sort pagination -->
                            <?php 
                                if (isset($_GET['sort'])) {

                                    $sort = mysqli_real_escape_string($con,$_GET['sort']);

                                        // Experiment
                                         $sql = "SELECT COUNT(product_id) FROM products WHERE product_gender_id='$gender_id'";
                                        $query = mysqli_query($con, $sql);
                                        $row = mysqli_fetch_row($query);
                                        // Here we have the total row count
                                        $rows = $row[0];
                                        // This is the number of results we want displayed per page
                                        $page_rows = 18;
                                        // This tells us the page number of our last page
                                        $last = ceil($rows/$page_rows);
                                        // This makes sure $last cannot be less than 1
                                        if($last < 1){
                                          $last = 1;
                                        }
                                        // Establish the $pagenum variable
                                        $pagenum = 1;
                                        // Get pagenum from URL vars if it is present, else it is = 1
                                        if(isset($_GET['pn'])){
                                          $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
                                        }
                                        // This makes sure the page number isn't below 1, or more than our $last page
                                        if ($pagenum < 1) { 
                                            $pagenum = 1; 
                                        } else if ($pagenum > $last) { 
                                            $pagenum = $last; 
                                        }
                                        // This sets the range of rows to query for the chosen $pagenum
                                        $limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
                                        // This is your query again, it is for grabbing just one page worth of rows by applying $limit

                                        $paginationCtrls = '';
                                        // If there is more than 1 page worth of results
                                        if($last != 1){
                                          /* First we check if we are on page one. If we are then we don't need a link to 
                                             the previous page or the first page so we do nothing. If we aren't then we
                                             generate links to the first page, and to the previous page. */
                                          if ($pagenum > 1) {
                                                $previous = $pagenum - 1;
                                            $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'&g-id='.$gender_id.'&sort='.$sort.'">Previous</a> &nbsp; &nbsp; ';
                                            // Render clickable number links that should appear on the left of the target page number
                                            for($i = $pagenum-4; $i < $pagenum; $i++){
                                              if($i > 0){
                                                    $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'&g-id='.$gender_id.'&sort='.$sort.'">'.$i.'</a> &nbsp; ';
                                              }
                                              }
                                            }
                                          // Render the target page number, but without it being a link
                                          $paginationCtrls .= ''.$pagenum.' &nbsp; ';
                                          // Render clickable number links that should appear on the right of the target page number
                                          for($i = $pagenum+1; $i <= $last; $i++){
                                            $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'&g-id='.$gender_id.'&sort='.$sort.'">'.$i.'</a> &nbsp; ';
                                            if($i >= $pagenum+4){
                                              break;
                                            }
                                          }
                                          // This does the same as above, only checking if we are on the last page, and then generating the "Next"
                                            if ($pagenum != $last) {
                                                $next = $pagenum + 1;
                                                $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'&g-id='.$gender_id.'&sort='.$sort.'">Next</a> ';
                                            }
                                        }
                                



                                            // Experiment 

                                      $query = "SELECT product_id,product_category_id,product_qty,product_title,product_actual_price,product_selling_price,product_label FROM products WHERE product_gender_id='$gender_id' AND main_product='yes' ORDER BY product_selling_price $sort $limit";
                                    
                                     $run_search_query = mysqli_query($con,$query) or die($con);
                
 
                                   
                                      $total_rows = mysqli_num_rows($run_search_query);
                                   if (mysqli_num_rows($run_search_query)<1) {
                                        echo "<div style='padding:50px;height:400px;margin-top:25px;'><center><b>Oops! sorry, Product is not available which you want...</b></center></div>";
                                        
                                    } 
                                    $list = '';
                                    while($row = mysqli_fetch_assoc($run_search_query)){
                                        $product_id = $row['product_id'];
                                        $product_title = $row['product_title'];
                                        $product_title = substr("$product_title", 0, 7);
                    $product_title .= $product_title."...";
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
                                         
                                        $list .= '<div class="col-6 col-md-4 tt-col-item">
                                                <div class="tt-product thumbprod-center">
                                                    <div class="tt-image-box">
                                                        <a href="product-variable.php?product_title='.$title_url.'&p_id='.$product_id.'" class="tt-btn-quickview"  data-target="#ModalquickView"  data-tooltip="Quick View" data-tposition="left"></a>
                                                
                                                        <a href="product-variable.php?product_title='.$title_url.'&p_id='.$product_id.'">
                                                            <span class="tt-img"><img src="images/loader.svg" data-src="images/product/'.$product_image_title.'.jpg" alt="'.$product_image_title.'"></span>
                                                            <span class="tt-img-roll-over"><img src="images/loader.svg" data-src="images/product/'.$product_image_title.'.jpg" alt="'.$product_image_title.'"></span>
                                                        </a>
                                                    </div>
                                                    <div class="tt-description">
                                                        <div class="tt-row">
                                                            <ul class="tt-add-info">
                                                                <li><a href="#">'.$product_category_name.'</a></li>
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
                                                                <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                                                <a href="#" class="tt-btn-wishlist"></a>
                                                                <a href="#" class="tt-btn-compare"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>';

                                }
                                echo $list; 


                                }
                                    
                                 ?>

                                 <!-- For sort pagination -->
                            
                        </div>

                        <!-- This is for sorting products -->
                            <div class="tt-product-listing row">
                                

                            </div>
                            <div>
                                <center>
                                  <div id="pagination_controls" style="font-size:1.3em;color:#2879fe;font-weight:bold;margin-top:15px;"><?php echo $paginationCtrls; ?></div>              
                               </center>   
                            </div>
                        <!-- This is for sorting products -->
                        <div class="text-center tt_product_showmore">
                            <!-- <a href="#" class="btn btn-border">LOAD MORE</a> -->
                            <div class="tt_item_all_js">
                                <a href="#" class="btn btn-border01">NO MORE ITEM TO SHOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once("includes/footer.php");?>