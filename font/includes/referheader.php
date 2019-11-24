<?php 
require_once("db.php");
require_once("includes/functions.php");
// If user wants to display cart items on cart page
$cartOutput = "";
$i=0;
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
        



        $cartOutput .= '<div class="tt-item">
                                                    <a href="../product-variable.php?p_id='.$item_id.'">
                                                        <div class="tt-item-img">
                                                            <img src="../images/loader.svg" data-src="../images/product/'.$product_image_title.'.jpg" alt="">
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
    <meta charset="utf-8">
    <title>Earn Upto Rs.10,000/month by refer & earn</title>
    <meta name="keywords" content="Earn Upto Rs.10,000/month by refer & earn">
    <meta name="description" content="Earn Upto Rs.10,000/month by refer & earn">
    <meta name="author" content="zarvish">
    <link rel="shortcut icon" href="zarvish.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta property="og:image" content="https://zarvish.com/images/promo/referimage.jpg">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="200">
<meta property="og:image:height" content="200">
  
    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/theme.css">
  

<link rel="manifest" href="/manifest.json" />
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "b5d4fad4-6f0d-4144-8503-49ce307db381",
    });
  });
</script>

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

  <!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1901752626583034');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=1901752626583034&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
<!-- Sharethis Share button script-->
<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5ceabdfcba33c80012fc553c&product=gdpr-compliance-tool' async='async'></script>
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
    <!-- tt-mobile menu -->
    <nav class="panel-menu mobile-main-menu">
        <ul>
            <li>
                <a href="../index.php">HOME</a>
                
            </li>
            <li>
                <?php if (isset($_SESSION['customer_email'])) {
                    $customer_name= getCustomerName($_SESSION['customer_email']);
                    echo '<a href="my_account.php">'.$customer_name.'</a>';
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
                    
                    <a class="tt-logo tt-logo-alignment" href="my_account.php" style="font-size: 1.3em;font-weight: bold;color: green;"> < Back</a>
                    
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
                    <a class="tt-logo tt-logo-alignment" href="my_account.php" style="font-size: 1.3em;font-weight: bold;color: green;"> < Back</a>

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
                                    <form action="../search.php?search"  method="GET">
                                        <div class="tt-col">
                                             <input type="text" class="tt-search-input" placeholder="Search products" id="search" name="searchText" required="true" autocomplete="off" autofocus>
                                            
                                            <button class="tt-btn-search" type="submit" name="search"></button>
                                        </div>
                                        <div class="tt-col">
                                            <button class="tt-btn-close icon-g-80"></button>
                                        </div>
                                        <div class="tt-info-text">
                                            What are you Looking for?
                                        </div>
                                        <div class="search-results">
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
                                                <div class="tt-cart-list">
                                                <?php echo $cartOutput; ?>
                                                
                                            </div>
                                            <div class="tt-cart-total-row">
                                                <div class="tt-cart-total-title">SUBTOTAL:</div>
                                                <div class="tt-cart-total-price"><?php echo $cartTotal; ?></div>
                                            </div>
                                            <div class="tt-cart-btn">
                                                <div class="tt-item">
                                                    <a href="../checkout.php" class="btn">PROCEED TO CHECKOUT</a>
                                                </div>
                                                <div class="tt-item">
                                                    <a href="../cart.php" class="btn-link-02 tt-hidden-mobile">View Cart</a>
                                                    <a href="../cart.php" class="btn btn-border tt-hidden-desctope">VIEW CART</a>
                                                </div>
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
                                        <li><a href="my_account.php?my_orders"><i class="icon-f-94"></i>Account</a></li>
                                        
                                        
                                        <li><a href="../checkout.php"><i class="icon-f-68"></i>Check Out</a></li>
                                        
                                        <li><a href="../signout.php"><i class="icon-f-77"></i>Sign Out</a></li>
                                        
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
                                        <a href="../index.php">HOME</a>
                                        
                                    </li>
                                    <li class="dropdown megamenu">
                                            <?php 

                                             if (isset($_SESSION['customer_email'])) {
                                                $customer_name= getCustomerName($_SESSION['customer_email']);
                                                echo '<a href="my_account.php">'.$customer_name.'</a>';
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