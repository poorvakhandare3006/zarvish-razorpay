<?php 
require_once("includes/referheader.php");
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



<div id="tt-pageContent">
	<div class="container-indent">

		<div class="container container-fluid-custom-mobile-padding">
			<h1 class="tt-title-subpages noborder">&#128071;  Refer & Earn &#128071; </h1>
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
								<div class="tt-tag"><a href="#">Earn Upto Rs.10,000 &#128525; Per Month</a></div>
								<h2 class="tt-title"><a href="#">Refer Your Friends </a></h2>
								<div class="tt-description" style="color: #191919;">
                Earn 7% commision on every purshase if your friends just signs up from your affiiate link.
                  <p >Follow Just These Steps</p>
                <ul class="">
  
  <li >Refer this via any medium</li>
  <li >If they signup through your Referral Link then you will get 7% commision if he does shopping in next 30 days.</li>
  <li >If customer will not return/cancel order after 14 days of delivery then your will recieve this cashback in your PAYTM WALLET. </li>
  <li >Enjoy 😍 and become Part time Earner.🕺  </li>
  <li>Start Referring & Earning &#128071; &#128071; &#128071; &#128071; &#128071;</li>
</ul>

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
