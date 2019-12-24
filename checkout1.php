<?php 
require_once("includes/cartheader.php");
include_once("razorpay/Razorpay.php");



?>
<html>

<body>
<form name="razorpay-form" id="razorpay-form" action="verify.php" method="POST">

<input type="hidden" name="item_name" value="My Test Product">
<input type="hidden" name="item_description" value="My Test Product Description">
<input type="hidden" name="item_number" value="3456">
<input type="hidden" name="amount" value="49.99">
<input type="hidden" name="address" value="ABCD Address">
<input type="hidden" name="currency" value="INR">
<input type="hidden" name="cust_name" value="phpzag">
<input type="hidden" name="email" value="test@phpzag.com">
<input type="hidden" name="contact" value="9999999999">
<input type="hidden" name="id" value="<?php echo $razorpayOrderId;?>">

                               
</form>


<button id="rzp-button1">Pay with Razorpay                                                      </button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "rzp_test_0CjpPEkZYUDndZ", // Enter the Key ID generated from the Dashboard
    "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise or INR 500.
    "currency": "INR",
    "name": "Acme Corp",
    "description": "A Wild Sheep Chase is the third novel by Japanese author  Haruki Murakami",
    "image": "https://example.com/your_logo",
    "order_id": "<?php echo $razorpayOrderId;?>",
     "handler": function (transaction) {
     var idd = transaction.razorpay_payment_id;
<?php $prodiid = $_GET["prodiid"];?>
var aaa = <?php echo $prodiid;?>
//document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
window.alert(idd);
window.location.href='verify.php?pid='+idd+'&prodiid='+aaa;

;        
//alert("fed");
    },
    "prefill": {
        "name": "Gaurav Kumar",
        "email": "gaurav.kumar@example.com",
        "contact": "9999999999"
    },
    "notes": {
        "address": "note value"
    },
    "theme": {
        "color": "#F37254"
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
}
</script>
</body>
</html>

<?php require_once("includes/cartfooter.php");?>