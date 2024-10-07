<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];
   $slct = $_POST['select'];
   $ans = mysqli_real_escape_string($conn,$_POST['answer']);


   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type ,question,answer ) VALUES('$name','$email','$pass','$user_type','$slct','$ans')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" type="x-icon" href="img/jeep2.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Register</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>


      <input type="text" name="name" required autocomplete="off"  placeholder="enter your name">
      <input type="email" name="email" required autocomplete="off" placeholder="enter your email">
      <input type="password" name="password" required autocomplete="off" id="password" placeholder="enter your password">
      <input type="password" name="cpassword" required autocomplete="off" id="password2" placeholder="confirm your password">
      <input type="text" name="user_type" value="user" hidden>
      <select name="select" id="">
                                <option disabled selected>Select the question</option>
                                <option>What was your first car?</option>
                                <option>What elementary school did you attend?</option>
                                <option>What is the name of your first pet?</option>

      </select>
      <input type="text" name="answer" id="answer1" required autocomplete="off" placeholder="Enter your answer" >

      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="login_form.php">login now</a></p>
   </form>

</div>

</body>
</html>
