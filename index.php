<?php
session_start();
include("includes/sessioncheck.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>What's Up?</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="css/style.css" media="screen">
    <link rel="stylesheet" href="css/bootswatch.css">
    	<script>
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    var latlon = position.coords.latitude + "," + position.coords.longitude;
    document.getElementById("mapcaption").innerHTML = latlon;

        function createCookie(name,value,days) {
            if (days) {
                var date = new Date();
                date.setTime(date.getTime()+(days*24*60*60*1000));
                var expires = "; expires="+date.toGMTString();
            }
            else var expires = "";
            document.cookie = name+"="+value+expires+"; path=/; domain=.example.com";
        }

          createCookie('coord',latlon,'22');
    </script>
  </head>
  <body>
    
    <?php include("includes/nav.php"); ?>


    <div class="container">

      <div class="page-header" id="banner">
        <div class="row">
          <div class="col-lg-8 col-md-7 col-sm-6">
            <h1>Welcome, <?php echo $username ?></h1>
            <p class="lead">What a great day!</p>
          </div>
        </div>
      </div>

   <?php include("includes/footer.php") ?>

    </div>


    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootswatch.js"></script>
</body>
</html>
