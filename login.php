<?php 

require_once("includes/db.php");
require_once("includes/functions.php");
require_once("includes/form_handlers/login_handler.php");


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Zarvish login page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="Zarvish Sign in">
    <meta name="description" content="Zarvish Sign in">
    <meta name="author" content="zarvish">
    <meta property="name" content="Zarvish">
    <meta property="og:image" content="http://zarvish.com/images/custom/zarvish.png" />
    <meta property="og:title" content="Zarvish">
    <meta property="twitter:title" content="Zarvish">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="//script.crazyegg.com/pages/scripts/0090/8498.js" async="async"></script>
</head>
<body style="background-color: #f5f5f5;">
<div class="container-fluid" style="background-color: #4bb5ef;">
  <h3 align="center"><a style="text-decoration:none;border-bottom: 4px solid red;font-style: italic;font-size: 1.5em;color: #fff;" href="index.php">Zarvish</a></h3>
</div>

<div class="container" style="width: 90%;height: auto;border:0.5px solid #fc636b;margin-top:30px;background-color: #fff;">
  <h2 align="center">Sign In </h2>
  <form class="form-horizontal" action="" id="formName" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email" value="">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php 
          if(isset($_SESSION['CustomerEmail'])) {
            echo $_SESSION['CustomerEmail'];
          } 
          ?>"  required="true">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required="true">
          <br>
          <?php if(in_array("Email or password was incorrect<br>", $error_array)) echo  "Email or password was incorrect<br>"; ?>
          
      </div>
    </div>
  <!--   <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="remember" onchange="document.getElementById('formName').submit()"> Remember me</label>
        </div>
      </div>
    </div> -->
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        
        <input type="submit" name="login_button" value="Login" class="btn btn-primary">
      </div>
    </div>
  </form>

  
</div>
<div align="center"><a href="register.php" style="text-decoration: underline;color: #008000;font-weight: bold;font-size: 1.2em;">New Account Sign Up here</a></div>

<br>
<br>
<br>
<hr oshade="noshade" style="border:0.2px solid #fc636b;">
<div style="margin-top: 50px;">
  <h4 style="text-align: center;">&copy; By Zarvish.Com 2019</h4>
</div>

</body>
</html>