<?php
@include 'conform.php';


 if(isset ($_POST[ 'submit' ]) and empty($_POST[ 'gender' ]) or isset ($_POST[ 'submit' ]) and empty($_POST[ 'City' ]) or isset ($_POST[ 'submit' ]) and empty($_POST[ 'car' ]) ){
    $_SESSION['status5'] = "you miss info,Try again";

}
else if(isset ($_POST[ 'submit' ]))
{
$emailb = $_POST[ 'emailb' ];
$ID = $_POST[ 'ID' ];
$numphone = $_POST[ 'numphone' ];
$gender = $_POST[ 'gender' ];
$City = $_POST[ 'City' ];
$date = date('Y-m-d', strtotime($_POST['date']));
$Time = $_POST[ 'Time' ];
$car = mysqli_real_escape_string ($con,$_POST[ 'car' ]);

$selectdate = " SELECT * FROM book_form WHERE date = '$date' && Time ='$Time' && car = '$car' && City = '$City'";
$selectid = " SELECT * FROM book_form WHERE  ID =' $ID'";

   $result = mysqli_query($con, $selectdate);
   $result2 = mysqli_query($con, $selectid);

   $IDlength= strlen($ID);
   $numlength= strlen($numphone);


   if(mysqli_num_rows($result) > 0){
    $_SESSION['status2'] = "This car is busy at this date";
    
   }else if($IDlength != 10){
    $_SESSION['status3'] = "Your ID must be 10 digits";

   }else if ( $numlength !=10 ){
    $_SESSION['status4'] = "Your number must be 10 digits";
}else if (mysqli_num_rows($result2) > 0){
    $_SESSION['status6'] ="You already have a reservation";

   }else {
    $query = "INSERT INTO book_form (emailb, ID , numphone , gender , City  , date , Time, car) VALUES ('$emailb', '$ID' , '$numphone','$gender' ,'$City', '$date', '$Time', '$car')";
    $query_run = mysqli_query($con,$query);
    $_SESSION['status'] ="The request has been received successfully";
   }
    
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Test Drive</title>
    <link rel="shortcut icon" type="x-icon" href="img/jeep2.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!--<title>Responsive Regisration Form </title>--> 

    <!--<title>for alert </title>--> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="cssbookform.css">

</head>


<body>

    <div class="container">
        <header>Book Form</header>
        
        <form action=" " method="post">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Email</label>
                            <input type="email" name="emailb" placeholder="Enter your email" required autocomplete="off">
                        </div>

                        <div class="input-field">
                            <label>ID</label>
                            <input type="number" name="ID" maxlength="10" placeholder="Enter your ID" required autocomplete="off">
                        </div>

                        <div class="input-field">
                            <label>Phone Number</label>
                            <input type="number" name="numphone" maxlength="10" placeholder="Enter Phone number" required autocomplete="off">
                        </div>

                        <div class="input-field">
                            <label>Gender</label>
                            <select name="gender" required>
                                <option disabled selected>Select gender</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>City</label>
                            <select name="City" required>
                                <option disabled selected>Select City</option>
                                <option>Alahsa</option>
                                <option>Dammam</option>
                                <option>Makah</option>
                                <option>Riyadh</option>
                                <option>Jeddah</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>pick date</label>
                            <input type="date" name="date" placeholder="Enter pick date" required>
                        </div>
                        
                        <div class="input-field">
                            <label>Time</label>
                            <select name="Time" required>
                                <option disabled selected>Select Time</option>
                                <option>Morning</option>
                                <option>Afternoon</option>
                            </select>
                        </div>
                       
                        <div class="input-field" >
                            <label>Car</label>
                            <select name="car" required>
                             <option disabled selected>Select Car</option>
                             <?php
                            // Query the database to retrieve car names
                            $car_query = "SELECT name FROM car_info";
                            $car_result = mysqli_query($con, $car_query);
            
                           // Iterate through the result set and create an option element for each car name
                           while($car_row = mysqli_fetch_assoc($car_result)) {
                            echo '<option>' . $car_row['name'] . '</option>';
              }
        ?>
    </select>
                        </div>
                        
                    </div>
                </div>
                    <button class="nextBtn" name="submit">
                        <span class="btnText">Book</span>
                    </button>

                    <button type="reset" class="nextBtn2">
                        <div class="btnText">Clear</div>
                    </button>
                    <div class="linkd">
                    <a href="../index.php"><strong>&#x2B05;home</strong> page</a>
                    <a href="deletform.php"><strong>&#128465;delete</strong> reservation </a>
                    </div>

             <div class="alert">      
        <?php
if(isset($_SESSION['status'])){
    ?>
    <div id="liveAlertPlaceholder"><div></div><div>
        <div class="alert alert-success  alert-dismissible" role="alert">
               <div> <?php echo $_SESSION['status']; ?>
            </div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    </div>
    <?php
    unset($_SESSION['status']);
    }
?>
 <?php
if(isset($_SESSION['status6'])){
    ?>
    <div id="liveAlertPlaceholder"><div></div><div>
        <div class="alert alert-warning alert-dismissible" role="alert">
               <div> <?php echo $_SESSION['status6']; ?>
            </div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    </div>
    <?php
    unset($_SESSION['status6']);
    }
?>
 <?php
if(isset($_SESSION['status2'])){
    ?>
    <div id="liveAlertPlaceholder"><div></div><div>
        <div class="alert alert-danger alert-dismissible" role="alert">
               <div>!!!!!, <?php echo $_SESSION['status2']; ?>
            </div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    </div>
    <?php
    unset($_SESSION['status2']);
    }
?>
<?php
if(isset($_SESSION['status3'])){
    ?>
    <div id="liveAlertPlaceholder"><div></div><div>
        <div class="alert alert-warning alert-dismissible" role="alert">
               <div>!!!!, <?php echo $_SESSION['status3']; ?>
            </div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    </div>
    <?php
    unset($_SESSION['status3']);
    }
?>
<?php
if(isset($_SESSION['status4'])){
    ?>
    <div id="liveAlertPlaceholder"><div></div><div>
        <div class="alert alert-danger alert-dismissible" role="alert">
               <div>!!!!, <?php echo $_SESSION['status4']; ?>
            </div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    </div>
    <?php
    unset($_SESSION['status4']);
    }
?>
<?php
if(isset($_SESSION['status5'])){
    ?>
    <div id="liveAlertPlaceholder"><div></div><div>
        <div class="alert alert-danger alert-dismissible" role="alert">
               <div>!!!!, <?php echo $_SESSION['status5']; ?>
            </div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    </div>
    <?php
    unset($_SESSION['status5']);
    }
?>

      </div>              
                </div> 
                
            </div>
        </form>
        
    </div>
</body>
</html>