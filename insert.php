<?php  
 //insert.php  
 require_once("includes/db.php");
 if(isset($_POST["name"]))  
 {  
      $name = mysqli_real_escape_string($con, $_POST["name"]);  
      $phone = mysqli_real_escape_string($con, $_POST["phone"]);
      $description = mysqli_real_escape_string($con, $_POST["description"]);  
      $date = date("Y-m-d"); //Current date
      $sql = "INSERT INTO bulk_lead (Name,Phone,Requirement,register_date) VALUES ('$name', '$phone','$description','$date')";  
      if(mysqli_query($con, $sql))  
      {  
           echo "Thankyou for contacting us we will get to you soon &#128522;";  
      }  
 }  
 ?> 