<?php
// Connect to the database
$host = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "pro_db";

// Create a connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to retrieve data from the "car_info" table
$sql = "SELECT * FROM car_info";
$result = mysqli_query($conn, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Initialize an array to store the data
    $cars = array();

    // Loop through the rows and add each one to the array
    while ($row = mysqli_fetch_assoc($result)) {
        $cars[] = $row;
    }
}

// Close the database connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Drive</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="shortcut icon" type="x-icon" href="img/jeep2.png">
    <style>
        .box {
  width: calc(33.33% - 20px);
  margin: 10px;
  display: inline-block;
  vertical-align: top;
}
.box {
  width: calc(33.33% - 20px);
  margin: 10px;
  display: inline-block;
  vertical-align: top;
}

    </style>
</head>
<body>
<?php include 'main_header.php'; ?>

    <section class="services" id="services">
        <div class="heading">
            
            <h1 id="text-cars"><span>All Cars</span></h1>
            <h1>Explore And try To Drive a car</h1>
        </div>
        <div class="services-container">
            <div id="car-list"></div>


            
<script>
// Get the car data from PHP
var cars = <?php echo json_encode($cars); ?>;

var carList = document.getElementById("car-list");

// Loop through the car data and create a new element for each car
for (var i = 0; i < cars.length; i++) {
    var car = cars[i];

    // Create a new div element for the car
    var MDiv = document.createElement("div");
    MDiv.classList.add("box");

    var imgDiv=document.createElement("div");
    imgDiv.classList.add("box-img");

    // Create a new image element for the car
    var carImg = document.createElement("img");
    carImg.src = "/Project/uploads/"+car.image;
    imgDiv.appendChild(carImg);
    MDiv.appendChild(imgDiv);


    var carModel = document.createElement("p");
    carModel.textContent = car.model;
    MDiv.appendChild(carModel);


    var carName = document.createElement("h3");
    carName.textContent = car.name;
    MDiv.appendChild(carName);



    // Create a new heading element for the car engine info
    var carEngine = document.createElement("h2");
    carEngine.textContent =   car.engine+" ENGINE";
    MDiv.appendChild(carEngine);

    var engineInfo = document.createElement("span");
    engineInfo.textContent = " / " + car.hp + " hp";
    
    carEngine.appendChild(engineInfo);
    MDiv.appendChild(carEngine);

    // Create a new button element for booking the car
    var carButton = document.createElement("a");
    carButton.href = "bookform/form.php";
    carButton.classList.add("btn");
    carButton.textContent = "Book Now";
    MDiv.appendChild(carButton);

    // Add the new car div element to the "car-list" div element
    carList.appendChild(MDiv);
}
</script>

            
            
        </div>
    </section>
    <div class="copyright">
        <p>&#169;Dev by:Group-AAHM</p>

        <div class="social">
            <a href="https://www.facebook.com/jeep/" target="_blank"><i class='bx bxl-facebook-circle'></i></a>
            <a href="https://www.instagram.com/jeep/" target="_blank"><i class='bx bxl-instagram-alt'></i></a>
            <a href="https://twitter.com/jeep" target="_blank"><i class='bx bxl-twitter'></i></a>
        </div>
    </div>
</body>
</html>