<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stew's Smoke Shack</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/stews.css">

</head>
<body>
    <?php require 'base/public/navigation.php'; ?>
    <div class="slider">
        <img class="mySlides" src="images/banner.jpg" style="width:100%">
        <img class="mySlides" src="images/carryout.jpg" style="width:100%">
        <img class="mySlides" src="images/delivery.jpg" style="width:100%">
    </div>

    <div class="service-wrapper">
        <div class="service-blocks"><a href="catering.php"><img src="images/catering.jpg" width="100%"/>
            <div class="centered">01.<br>CATERING</div></a>
        </div>
        <div class="service-blocks"><a href="#"><img src="images/carryout.jpg" width="100%"/>
            <div class="centered">02.<br>CARRY OUT</div></a>
        </div>
        <div class="service-blocks"><a href="#"><img src="images/delivery.jpg" width="100%"/>
            <div class="centered">03.<br>DELIVERY</div></a>
        </div>  
    </div>

    <div class="location-wrapper">
        <p>LOCATED IN DES MOINES, IOWA</p>
        <img src="images/store-front.jpg" alt="Stew's Smoke Shack"/>
    </div>
    <div class="cta-banner">
        <a href="#"><img src="images/banner.jpg" width="100%"/>
            <div class="centered">DELIVERY NOW AVAILABLE</div></a>
    </div>
    <div class="announcement-wrapper">
        <p>ANNOUNCEMENTS</p>

        <div class="temp"></div> <!-- temp container -->
    </div>
    <div class="about-wrapper">
        <p>WHO'S STEW?</p>
        <p>Stephen 'Stew' Stewart previously owned a patent design company before graduating from the Iowa Culinary Institute at DMACC. He then later received a scholarship for an internship at France. After his internship, Stephen returned to Iowa and worked at Edgewater retirement community in West Des Moines as a chef. Stephen is now the current owner of Smoke Shack by Stew's Que Catering formerly known as Woody's Smoke Shack.</p>
        <button class="btn"><a href="#">CONTACT STEW</a></button>

    





    </div>



    <?php require 'base/public/footer.php'; ?>
    <script src="js/slideshow.js"></script>
    
</body>
</html>