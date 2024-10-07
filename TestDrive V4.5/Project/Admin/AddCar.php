<?php

include 'components/connect.php';

// check if the add car form has been submitted
if (isset($_POST['add_car'])) {

   // get the form data
   $name = $_POST['name'];
   $model = $_POST['model'];
   $engine = $_POST['engine'];
   $horsepower = $_POST['horsepower'];

   $file = $_FILES['file'];

   $fileName = $_FILES['file']['name'];
   $fileTmpName = $_FILES['file']['tmp_name'];
   $fileSize = $_FILES['file']['size'];
   $fileError = $_FILES['file']['error'];
   $fileType = $_FILES['file']['type'];

   $fileExt = explode('.', $fileName);
   $fileActualExt = strtolower(end($fileExt));

   $allowed = array('jpg','jpeg','png');

   if(in_array($fileActualExt, $allowed)){
       if($fileError === 0){
           if($fileSize < 1000000){
               $fileNameNew = uniqid('',true).".".$fileActualExt;
               $fileDestination = '../uploads/'.$fileNameNew;
               move_uploaded_file($fileTmpName, $fileDestination);
               $sql = "INSERT INTO car_info (name, model, engine, hp, image) VALUES ('$name', '$model', '$engine', '$horsepower', '$fileNameNew')";
               if ($conn->query($sql) === TRUE) {
                  // show a success message
                  echo "<script>swal('Success', 'Car added successfully', 'success');</script>";
               } else {
                  // show an error message
                  echo "<script>swal('Error', 'Error adding car: " . $conn->error . "', 'error');</script>";
               }
               header("Location: /Project/Admin/AddCar.php");
           }else{
               echo "your file is too big";
           }
       }else{
           echo "There was an error uploading file!";
       }
   }else{
       echo "You cannot upload files of this type!";
   }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="shortcut icon" type="x-icon" href="/Project/img/jeep2.png">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'components/header.php'; ?>
<!-- header section ends -->

<!-- add product section starts  -->

<section class="add-product">

   <h1 class="heading">Add Car</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Car details</h3>

      <input type="text" name="name" required maxlength="50" placeholder="enter car name" class="input">

      <input type="text" name="model" required maxlength="50" placeholder="enter year of model" class="input">

      <input type="text" name="engine" required maxlength="50" placeholder="enter car engine (2.4L V4)" class="input">

      <input type="text" name="horsepower" required maxlength="10" placeholder="enter horsepower of the car" class="input">

      <input type="file"  name="file" class="input">
      <input type="submit" value="add car" name="add_car" class="btn">
   </form>

</section>



<!-- sweetalert cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

</body>
</html>
