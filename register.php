<?php 
require_once("includes/db.php");
require_once("includes/functions.php");
require_once("includes/form_handlers/register_handler.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Zarvish Sign Up Page</title>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="Zarvish Sign Up/Register Page">
    <meta name="description" content="Zarvish Sign Up/Register Page">
    <meta name="author" content="zarvish">
    <meta property="name" content="Zarvish">
    <meta property="og:image" content="http://zarvish.com/images/custom/zarvish.png" />
    <meta property="og:title" content="Zarvish">
    <meta property="twitter:title" content="Zarvish">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="js/jquery.messagebox.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  
  
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
<script type="text/javascript" src="//script.crazyegg.com/pages/scripts/0090/8498.js" async="async"></script>
</head>
<body style="background-color: #f5f5f5;">
<div class="container-fluid" style="background-color: #2879fe;">
	
	<h3 align="center"><a style="text-decoration:none;font-style: italic;font-size: 1.5em;color: #fff;" href="index.php">Zarvish </a></h3>
</div>
<h4 align="center" style="font-size:1.5em;color:green;font-weight:bold;">(Win 3 Free T-shirts Per Month)</h4>
<div class="container" style="width: 90%;height: auto;margin-top:30px;background-color: #fff;">
  <!--<h2 align="center">Sign Up </h2>-->
                              <form class="form-horizontal" action="" method="POST" >
   <div class="form-group">
      <label class="control-label col-sm-2" for="name"> Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" placeholder="Enter Your  Name" name="name" value="<?php 
          if(isset($_SESSION['name'])) {
            echo $_SESSION['name'];
          } 
          ?>" required="true">
          <br>
          <span style='color: #fc0a2e;'> <b>
          <?php if(in_array("Your Name can not be empty.<br>", $error_array)) echo "Your Name can not be empty.<br>"; ?>
          </span></b>
          
      </div>
    </div>
     
    
  
    <div class="form-group">
      <label class="control-label col-sm-2" for="emailAgain">Email:</label>
      <div class="col-sm-10">
          <input type="email" class="form-control" name="email" placeholder="Email" value="<?php 
          if(isset($_SESSION['email'])) {
            echo $_SESSION['email'];
          } 
          ?>" required>
          <br>
          <span style='color: #fc0a2e;'> <b>
          <?php if(in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>"; 
          else if(in_array("Invalid email format<br>", $error_array)) echo "Invalid email format<br>";
           ?>
          </span></b>
      </div>
    </div>


     <div class="form-group">
      <label class="control-label col-sm-2" for="mobileNumber">Mobile No.</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="mobileNumber" placeholder="Mobile Number " name="mobileNumber" value="<?php 
          if(isset($_SESSION['mobileNumber'])) {
            echo $_SESSION['mobileNumber'];
          } 
          ?>"  required="true">
           <br>
           <span style='color: #fc0a2e;'> <b>
          <?php if(in_array("Your Mobile number should be of 10 digit.<br>", $error_array)) echo "Your Mobile number should be of 10 digit.<br>"; ?>
          </span></b>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="password">Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" value="<?php 
          if(isset($_SESSION['password'])) {
            echo $_SESSION['password'];
          } 
          ?>" required="true">
                <input type="checkbox" onclick="myFunction()">Show Password

          
      </div>

    </div>
    

    <div class="form-group">
      <label class="control-label col-sm-2" for="password">Your Interest:</label>
      <div class="col-sm-10">
        <input type="radio" name="interest" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="1" required><span>Earning </span>&nbsp;&nbsp;
  <input type="radio" name="interest" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="2"><span>Buying</span>
      </div>
    </div>
   
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" name="register" value="Sign Up" class="btn btn-primary">
      <br>
        <?php if(in_array("<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>", $error_array)) echo "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>"; ?>
        
      </div>
    </div>
  </form>
  
</div>
<div align="center"><a href="login.php" style="text-decoration: underline;font-weight: bold;font-size: 1.2em;color: #008000;">Already Have An Account Sign In here</a></div>

<br>
<br>
<br>
<hr oshade="noshade" style="border:0.2px solid #fc636b;">
<div style="margin-top: 50px;">
	<h4 style="text-align: center;">&copy; By Zarvish.Com 2019</h4>
</div>


<script>
  function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
  </script>
</body>
</html>