<?php 
require_once("db.php");
require_once("includes/functions.php");

if(isset($_GET['p_id'])){
    

$product_id = (int) $_GET['p_id'];
$get_product = "SELECT product_title,product_label,product_description FROM products WHERE product_id='$product_id'";

$run_product = mysqli_query($con,$get_product);

$check_product = mysqli_num_rows($run_product);

if($check_product == 0){

echo "<script> window.open('index.php','_self') </script>";

}else{

$row_product = mysqli_fetch_array($run_product);
$product_title = $row_product['product_title'];
}
}
// If user wants to display cart items on cart page
$cartOutput = "";
$i = 0; 
$cartTotal = 0;
$pp_checkout_btn = '';
$product_id_array = '';
if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
    $cartOutput = "<h4 align='center'>Your shopping cart is empty</h4>";
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
        



        $cartOutput .= '<div class="tt-item">
                                                    <a href="product-variable.php?p_id='.$item_id.'">
                                                        <div class="tt-item-img">
                                                            <img src="images/loader.svg" data-src="images/product/'.$product_image_title.'.jpg" alt="'.$product_image_title.'">
                                                        </div>
                                                        <div class="tt-item-descriptions">
                                                            <h2 class="tt-title">'.$product_name.'</h2>
                                                            
                                                            <div class="tt-quantity">Qty:'.$each_item['quantity'].'</div> <div class="tt-price">&#8377;'.$price.'</div>
                                                        </div>
                                                    </a>
                                                    <div class="tt-item-close">
                                                        <a href="#" class="tt-btn-close"></a>
                                                    </div>
                                                </div>';

        
        $i++; 
    } 
    
    $cartTotal = "<div style='font-size:18px; margin-top:12px;color:#000;' align='right'>&#8377;".$cartTotal." Rupees</div>";

}





?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <meta name="robots" content="index, follow" />
    <title>Buy <?php echo "$product_title"; ?> t shirts for men online india @ zarvish.com</title>
    <meta name="keywords" content=" zarvish, jarvish, zarvis, jarvis, Online Shopping, online shopping india, mens t shirts, tee shirt, t shirt design, t shirts online, custom t shirts, graphic t shirts, branded t shirts. ">
    <meta name="description" content="Buy <?php echo "$product_title"; ?> t shirts for men online india @ zarvish.com mens t shirts Buy t shirts for men online.">
    <meta name="author" content="zarvish">
    <meta property="name" content="Zarvish">
    <meta property="og:image" content="http://zarvish.com/images/custom/zarvish.png" />
    <meta property="og:title" content="Zarvish">
    <meta property="twitter:title" content="Zarvish">
    
    <link rel="shortcut icon" href="zarvish.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta name="google-site-verification" content="znWPbPpdwWAGt0pmZeXx2M69VgFSrbpa7mNeVZdI-fM" />
    <meta name="msvalidate.01" content="5E797AC2580025A7F78DBAFD5640EE02" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/theme.css">
    
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-135637405-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
 
  gtag('config', 'UA-135637405-1');
</script>
<!-- Global site tag (gtag.js) - Google Analytics ends -->

<!-- Global site tag (gtag.js) - Google Ads: 738170225 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-738170225"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-738170225');
</script>
<!-- Global site tag (gtag.js) - Google Ads: 738170225 -->

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PD879PG');</script>
<!-- End Google Tag Manager -->

<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "de84915d-fe0b-4cd9-823a-5768ba3802b7",
      notifyButton: {
        enable: true,
      },
    });
  });
</script>

<!-- Sharethis Share button script-->
<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5ceabdfcba33c80012fc553c&product=gdpr-compliance-tool' async='async'></script>

<script type="text/javascript" src="//script.crazyegg.com/pages/scripts/0090/8498.js" async="async"></script>

</head>
<body>
 <div id="loader-wrapper">
    <div id="loader">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>
</div> 
<header>
    <!-- tt-top-panel -->
	<div class="tt-top-panel">
		<div class="container">
			<div class="tt-row">
				<div class="tt-description">
					Free delivery on all products. <a href="collection.php?g-id=1">Hurry!!!</a>
				</div>
				<button class="tt-btn-close"></button>
			</div>
		</div>
	</div>
	<!-- /tt-top-panel -->
    <!-- tt-mobile menu -->
    <nav class="panel-menu mobile-main-menu">
        <ul>
            <li>
                <a href="index.php">HOME</a>
                
            </li>
            <li>
                <?php if (isset($_SESSION['customer_email'])) {
                    $customer_name= getCustomerName($_SESSION['customer_email']);
                    echo '<a href="customers/my_account.php">'.$customer_name.'</a>';
                }
                    ?>
                

            </li>
            <li>
                <!-- <a href="blog-listing-without-col.html">BLOG</a> -->
                
            </li>
            <li>
                <!-- <a href="portfolio-col-grid-four.html">PORTFOLIO</a> -->
                
            </li>
            <li>
                <!-- <a href="about.html">PAGES</a> -->
                
            </li>
            
            
            
        </ul>
        <div class="mm-navbtn-names">
            <div class="mm-closebtn">Close</div>
            <div class="mm-backbtn">Back</div>
        </div>
    </nav>
    <!-- tt-mobile-header -->
    <div class="tt-mobile-header">
        <div class="container-fluid">
            <div class="tt-header-row">
                <div class="tt-mobile-parent-menu">
                    <div class="tt-menu-toggle">
                        <i class="icon-03"></i>
                    </div>
                </div>
                <!-- search -->
                <div class="tt-mobile-parent-search tt-parent-box"></div>
                <!-- /search -->
                <!-- cart -->
                <div class="tt-mobile-parent-cart tt-parent-box"></div>
                <!-- /cart -->
                <!-- account -->
                <div class="tt-mobile-parent-account tt-parent-box"></div>
                <!-- /account -->
                <!-- currency -->
                
                <!-- /currency -->
            </div>
        </div>
        <div class="container-fluid tt-top-line">
            <div class="row">
                <div class="tt-logo-container">
                    <!-- mobile logo -->
                    <a class="tt-logo tt-logo-alignment" href="index.php" ><img src="images/custom/zarvish.png" alt="zarvish" ></a>
                    <!-- /mobile logo -->
                </div>
            </div>
        </div>
    </div>
    <!-- tt-desktop-header -->
    <div class="tt-desktop-header">
        <div class="container">
            <div class="tt-header-holder">
                <div class="tt-obj-logo">
                    <!-- logo -->
                    <a class="tt-logo tt-logo-alignment" href="index.php"><img src="images/custom/zarvish.png" alt="zarvish"></a>

                    <!-- /logo -->
                </div>
                <div class="tt-obj-options obj-move-right">
                    <!-- tt-search -->
                    <div class="tt-desctop-parent-search tt-parent-box">
                        <div class="tt-search tt-dropdown-obj">
                            <button class="tt-dropdown-toggle" data-tooltip="Search" data-tposition="bottom">
                                <i class="icon-f-85"></i>
                            </button>
                            <div class="tt-dropdown-menu">
                                <div class="container">
                                    <form action="search.php?search"  method="GET">
                                        <div class="tt-col">
                                             <input type="text" class="tt-search-input" placeholder="Search products" id="search" name="searchText" required="true" autocomplete="off" autofocus>
                                            
                                            <button class="tt-btn-search" type="submit" name="search"></button>
                                        </div>
                                        <div class="tt-col">
                                            <button class="tt-btn-close icon-g-80"></button>
                                        </div>
                                        
                                        <div class="search-results">
                                            <!-- Here search autosuggestion -->
                                            <div id="productList" class="dropdown"></div> 
                                            
                                            <button type="button" class="tt-view-all">View all products</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /tt-search -->
                    <!-- tt-cart -->
                    <div class="tt-desctop-parent-cart tt-parent-box">
                        <div class="tt-cart tt-dropdown-obj" data-tooltip="Cart" data-tposition="bottom">
                            <button class="tt-dropdown-toggle">
                                <i class="icon-f-39"></i>
                                <span class="tt-badge-cart"><?php echo "$i"; ?></span>
                            </button>
                            <div class="tt-dropdown-menu">
                                <div class="tt-mobile-add">
                                    <h6 class="tt-title">SHOPPING CART</h6>
                                    <button class="tt-close">Close</button>
                                </div>
                                <div class="tt-dropdown-inner">
                                    <div class="tt-cart-layout">
                                        <!-- layout emty cart -->
                                        <!-- <a href="empty-cart.html" class="tt-cart-empty">
                                            <i class="icon-f-39"></i>
                                            <p>No Products in the Cart</p>
                                        </a> -->
                                        <div class="tt-cart-content">
                                            <div class="tt-cart-list">
                                                <?php echo $cartOutput; ?>
                                                
                                            </div>
                                            <div class="tt-cart-total-row">
                                                <div class="tt-cart-total-title">SUBTOTAL:</div>
                                                <div class="tt-cart-total-price"><?php echo $cartTotal; ?></div>
                                            </div>
                                            <div class="tt-cart-btn">
                                                <div class="tt-item">
                                                    <a href="checkout.php" class="btn">PROCEED TO CHECKOUT</a>
                                                </div>
                                                <div class="tt-item">
                                                    <a href="cart.php" class="btn-link-02 tt-hidden-mobile">View Cart</a>
                                                    <a href="cart.php" class="btn btn-border tt-hidden-desctope">VIEW CART</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /tt-cart -->
                    <!-- tt-account -->
                    <div class="tt-desctop-parent-account tt-parent-box">
                        <div class="tt-account tt-dropdown-obj">
                            <button class="tt-dropdown-toggle"  data-tooltip="My Account" data-tposition="bottom"><i class="icon-f-94"></i></button>
                            <div class="tt-dropdown-menu">
                                <div class="tt-mobile-add">
                                    <button class="tt-close">Close</button>
                                </div>
                                <div class="tt-dropdown-inner">
                                    <ul>
                                        <?php 

                                        if (isset($_SESSION['customer_email'])) { ?>
                                        <li><a href="customers/my_account.php?my_orders"><i class="icon-f-94"></i>Account</a></li>    
                                        <li><a href="signout.php"><i class="icon-f-77"></i>Sign Out</a></li>
                                        <?php } else { ?>
                                        <li><a href="login.php"><i class="icon-f-94"></i>Account</a></li>
                                        <li><a href="login.php"><i class="icon-f-76"></i>Sign In</a></li>
                                        <li><a href="register.php"><i class="icon-f-94"></i>Register</a></li>
                                        <?php } ?>
                                        
                                        
                                        <li><a href="checkout.php"><i class="icon-f-68"></i>Check Out</a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /tt-account -->
                    <!-- tt-langue and tt-currency -->
                    <!-- <div class="tt-desctop-parent-multi tt-parent-box">
                        <div class="tt-multi-obj tt-dropdown-obj">
                            <button class="tt-dropdown-toggle" data-tooltip="Settings" data-tposition="bottom"><i class="icon-f-79"></i></button>
                            <div class="tt-dropdown-menu">
                                <div class="tt-mobile-add">
                                    <button class="tt-close">Close</button>
                                </div>
                                <div class="tt-dropdown-inner">
                                    
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- /tt-langue and tt-currency -->
                </div>
            </div>
        </div>
        <div class="tt-color-scheme-01">
            <div class="container">
                <div class="tt-header-holder">
                    <div class="tt-obj-menu">
                        <!-- tt-menu -->
                        <div class="tt-desctop-parent-menu tt-parent-box">
                            <div class="tt-desctop-menu tt-hover-02">
                        <nav>
                                <ul>
                                    <li class="dropdown tt-megamenu-col-02 selected">
                                        <a href="index.php">HOME</a>
                                        
                                    </li>
                                    <li class="dropdown megamenu">
                                            <?php 

                                             if (isset($_SESSION['customer_email'])) {
                                                $customer_name= getCustomerName($_SESSION['customer_email']);
                                                echo '<a href="customers/my_account.php">'.$customer_name.'</a>';
                                             }
                                             ?>
                                        
                                    </li>
                                    <li class="dropdown tt-megamenu-col-01">
                                        <!-- <a href="blog-listing-without-col.html">BLOG</a> -->
                                        
                                    </li>
                                    <li class="dropdown tt-megamenu-col-01">
                                        
                                    </li>
                                    <li class="dropdown tt-megamenu-col-01">
                                        <!-- <a href="about.html">PAGES</a> -->
                                        
                                    </li>
                                    
                                    
                                    
                                </ul>
                            </nav>
                            </div>
                        </div>
                        <!-- /tt-menu -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /tt-desktop-header -->
    <!-- stuck nav -->
    <div class="tt-stuck-nav">
        <div class="container">
            <div class="tt-header-row ">
                <div class="tt-stuck-parent-menu"></div>
                <div class="tt-stuck-parent-search tt-parent-box"></div>
                <div class="tt-stuck-parent-cart tt-parent-box"></div>
                <div class="tt-stuck-parent-account tt-parent-box"></div>
                <div class="tt-stuck-parent-multi tt-parent-box"></div>
            </div>
        </div>
    </div>
</header>
