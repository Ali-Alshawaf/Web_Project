<?php

include 'components/connect.php';

// check if the add car form has been submitted
if (isset($_POST['add_car'])) {

   // get the form data
   $name = $_POST['name'];
   $model = $_POST['model'];



   // insert the data into the database
   $sql ="DELETE FROM car_info  WHERE name ='$name' && model = $model ";
   if ($conn->query($sql) === TRUE) {
      // show a success message
      echo "<script>swal('Success', 'Car deleted successfully', 'success');</script>";
   } else {
      // show an error message
      echo "<script>swal('Error', 'Error deleting car: " . $conn->error . "', 'error');</script>";
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

   <h1 class="heading">Delete Car</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Car details</h3>

      <input type="text" name="name" required maxlength="50" placeholder="enter car name" class="input">

      <input type="text" name="model" required maxlength="50" placeholder="enter year of model" class="input">

      <input type="submit" value="Delete car" name="add_car" class="btn">
   </form>

</section>



<!-- sweetalert cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

</body>
</html>
