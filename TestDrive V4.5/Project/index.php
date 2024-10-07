<!--updated version 4.5-->
<?php
session_start();
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
</head>
<body>

    <!--Nav-->
    <?php include 'main_header.php'; ?>

    <!--Home-->
    <section class="home" id="home">

        <div class="text">
            <h1><span>Looking</span> to <br>book a car</h1>
            <p> our cars are high quality with good price and<br>it has many other featuers</p>
            <div class="app-store">
                <a href="https://apps.apple.com/us/app/jeep/id1515949178" target="_blank"><img src="img/ios.png" alt=""></a>
                <a href="https://play.google.com/store/apps/details?id=com.fca.myconnect.nafta&hl=en_US&gl=US&pli=1" target="_blank"><img src="img/512x512.png" alt=""></a>
            </div>
        </div>
    </section>
    <!--Ride-->
    <section class="ride" id="ride">
        <div class="heading">
            <span>How Its Works</span>
            <h1>Book With 3 Easy Steps</h1>
        </div>
        <div class="ride-container">
            <div class="box">
                <i class='bx bxs-map'></i>
                <h2>choose a location</h2>
                <p>selecting a test drive location</p>
            </div>

            <div class="box">
                <i class='bx bxs-calendar-check'></i>
                <h2>Pick-Up Date</h2>
                <p>Choosing a date for a test drive</p>
            </div>

            <div class="box">
                <i class='bx bxs-calendar-star'></i>
                <h2>Book a car</h2>
                <p>Booking a test drive at any time</p>
            </div>
        </div>
    </section>
    <!--Services-->
    <section class="services" id="services">
        <div class="heading">
            <span>New cars</span>
            <h1>Book the newest car</h1>
        </div>
        <div class="services-container">
            <div class="box">
                <div class="box-img">
                    <img src="img/jeep-cars2/1.jpg" alt="">
                </div>
                <p>2023</p>
                <h3>Grand Cherokee</h3>
                <h2>5.7L V8 ENGINE<span> / 360 hp</span></h2>
                <a href="bookform/form.php" class="btn">Book Now</a>
            </div>

            <div class="box">
                <div class="box-img">
                    <img src="img/jeep-cars2/5.jpg" alt="">
                </div>
                <p>2022</p>
                <h3>Cherokee</h3>
                <h2>2.4L V4 ENGINE<span> / 180 hp</span></h2>
                <a href="bookform/form.php" class="btn">Book Now</a>
            </div>

            <div class="box">
                <div class="box-img">
                    <img src="img/jeep-cars2/4.jpg" alt="">
                </div>
                <p>2022</p>
                <h3>Wrangler sport</h3>                
                <h2>6.4L V8  ENGINE<span> / 470 hp</span></h2>
                <a href="bookform/form.php" class="btn">Book Now</a>
            </div>
        </div>
    </section>
<center>
<video  id="video" loop muted autoplay >
<source src="img/vid.mov" type="video/mp4">
</video>
</center>
    <!--About-->
    <section class="about" id="about">
        <div class="heading">
        </div>
        <div class="about-container">
            <div class="about-img">
                <img src="img/about.png" alt="">
            </div>
            <div class="about-text">
                <span>About Us</span>
                <p>Jeep is a brand of American automobiles that is a division of FCA US LLC
                     (formerly Chrysler Group, LLC), a wholly owned subsidiary of Fiat Chrysler Automobiles.
                    Jeep's current product range consists solely of sport utility vehicles
                     and off-road vehicles, but has also included pickup trucks in the past.</p> 
            </div>
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
    <!--scroll reveal-->
    <script src="https://unpkg.com/scrollreveal"></script>
    
    <script src="main.js"></script>
    <script>let varName = document.getElementById("id").value;
</script>
</body>
</html>