<?php 
require_once("includes/header.php");
if (isset($_SESSION['customer_email'])) {
	
}else {
	if (isset($_GET['afflid'])) {
	$cookie_name = "afflid";
	$cookie_value = $_GET['afflid'];	
	}
	

setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
	header("Location: ../index.php");
}

?>
<?php 









 ?>



<div id="tt-pageContent">
	<div class="container-indent">

		<div class="container container-fluid-custom-mobile-padding">
			<h1 class="tt-title-subpages noborder">Refer & Earn</h1>
			<div class="sharethis-inline-share-buttons"></div>
			<br>
			<div class="row">
				<div class="col-12">
					<div class="tt-listing-post tt-half">
						<div class="tt-post">
							<div class="tt-post-img">
								<a href="#"><img src="refer-and-earn.jpg" data-src="refer-and-earn.jpg" alt=""></a>
							</div>
							<div class="tt-post-content">
								<div class="tt-tag"><a href="blog-single-post.html">Earn Upto Rs.10,000 Per Month</a></div>
								<h2 class="tt-title"><a href="blog-single-post.html">Refer Your Friends </a></h2>
								<div class="tt-description">
								Earn 13% commision on every purshase if your friends just signs up from your affiiate link.

								</div>
								<div class="tt-meta">
									<div class="tt-autor">
										<!-- by <span>ADRIAN</span> on January 14, 2017 -->
									</div>
									<div class="tt-comments">
										<!-- <a href="#"><i class="tt-icon icon-f-88"></i>7</a> -->
									</div>
								</div>
								<div class="tt-btn">
									<div class="sharethis-inline-share-buttons"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br>
<br>

<?php require_once("includes/footer.php");?>
