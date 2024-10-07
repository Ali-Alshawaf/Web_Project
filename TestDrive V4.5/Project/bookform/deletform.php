<?php
@include 'conform.php';

if(isset ($_POST[ 'submit' ]) and empty($_POST[ 'car' ])){
    $_SESSION['statusd2'] = "You have an error";

}
if(isset ($_POST[ 'submit' ]))
{
$ID = $_POST[ 'ID' ];
$car = mysqli_real_escape_string ($con,$_POST[ 'car' ]);

$selectc = " SELECT * FROM book_form WHERE  ID =' $ID' and car ='$car'";
$result = mysqli_query($con, $selectc);

    if (mysqli_num_rows($result) > 0){
        $sql ="DELETE FROM book_form  WHERE ID =' $ID' and car ='$car' ";
        $_SESSION['statusd'] = "Your reservation has been successfully deleted";
        $query_run = mysqli_query($con,$sql);
    }else{
      // show an error message
      $_SESSION['statusd2'] = "You have an error";
    }

}
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

    <link rel="stylesheet" href="cssdform.css">

</head>


<body>

    <div class="container">
        <header>delete  Form</header>

        <form action=" " method="post">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                       
                        <div class="input-field">
                            <label>ID</label>
                            <input type="number" name="ID" maxlength="10" placeholder="Enter your ID" required autocomplete="off">
                        </div>
                        <div class="input-field" >
                            <label>Car</label>
                            <select name="car" required>
                             <option disabled selected>Select Car</option>
                             <?php
                            // Query the database to retrieve car names
                            $d_query = "SELECT name FROM car_info";
                            $d_result = mysqli_query($con, $d_query);
            
                           // Iterate through the result set and create an option element for each car name
                           while($car_row = mysqli_fetch_assoc($d_result)) {
                            echo '<option>' . $car_row['name'] . '</option>';
              }
        ?>
    </select>
                        </div>
                        </div>
                    <button class="nextBtnd" name="submit">
                        <span class="btnText">delete</span>
                    </button>
                    <div class="linkdd"></div>

                    <a href="../index.php" ><strong> &#x2B05;home page</strong></a>


<div class="alert">
                    <?php
if(isset($_SESSION['statusd'])){
    ?>
    <div id="liveAlertPlaceholder"><div></div><div>
        <div class="alert alert-success alert-dismissible" role="alert">
               <div> <?php echo $_SESSION['statusd']; ?>
            </div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    </div>
    <?php
    unset($_SESSION['statusd']);
    }
?>
 <?php
if(isset($_SESSION['statusd2'])){
    ?>
    <div id="liveAlertPlaceholder"><div></div><div>
        <div class="alert alert-danger alert-dismissible" role="alert">
               <div>!!!!!, <?php echo $_SESSION['statusd2']; ?>
            </div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    </div>
    <?php
    unset($_SESSION['statusd2']);
    }
?>
</div>

                    </div> 
                
            </div>
        </form>
        
    </div>

</body>
</html>