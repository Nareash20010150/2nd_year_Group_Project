<?php

@include './patient/DBconnect.php';

session_start();

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $pass =  $_POST['password'];
   // $hash = password_hash($pass, PASSWORD_DEFAULT);
   $select = "SELECT * FROM user WHERE email = '$email'";

   $result = mysqli_query($con, $select);
   $size = mysqli_num_rows($result); 
   // echo $size."<br>"."";

   // if($result){echo "Query is successful";}

   // else {echo "Qyery failed";}


   if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result);
      $password = $row["password"];
      if(password_verify($pass, $password)){
         if($row['user_role'] = 'Patient'){
            // $_SESSION['name'] = $row['name'];
            $nic = $row['nic'];
            $sql = "select patientID from patient where nic='$nic'";
            $patientIDRow = mysqli_fetch_array(mysqli_query($con, $sql))['patientID'];
            $_SESSION['patientID'] = $patientIDRow;
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $row['name'];
            header('location:/royalhospital/patient/patientdash.php');
         }
      }
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./css/style2.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="/royalhospital/registration.php">register now</a></p>
   </form>

</div>

</body>
</html>