<?php
session_start();
include("../includes/db.php");
include("../includes/sessioncheck.php");
?>
<!DOCTYPE html>
<html class="full" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome</title>
    
    <style>
      body, .row {
        color:#fff;
      }
    </style>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootswatch.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
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

 //   document.cookie="coord="+latlon;

    var img_url = "http://maps.googleapis.com/maps/api/staticmap?center="
    +latlon+"&zoom=16&size=350x200&sensor=true&markers=color:blue%7Clabel:S%7C"+latlon;
    document.getElementById("mapholder").innerHTML = "<img src='"+img_url+"'>";
    
  function notify() {
    var latlon = position.coords.latitude + "," + position.coords.longitude;
      $.ajax({
        type: "POST",
        url: "notify.php?user=<?php echo $username ?>" + "&coord="+latlon,
        context: document.body
      }).done(function() {
          console.log('success!');
      });
    };
    
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    }
}
    window.onload = getLocation;
    
$( document ).ready(function() {
      getLocation();
      /*
      $.ajax({
        url: "notify.php?user=<?php echo $username ?>" + "&coord="+"test",
        context: document.body
      }).done(function() {
          console.log('success!');
      });
      */
});
  </script>


</head>

<body class="full">

<?php
include("../includes/nav.php");
?>

<body onload="getLocation();">
  <div class="container text-center">
  <div class="hero" style="color:#fff"><h1>Welcome, <?php echo $username ?>. Don't worry, it's going to be alright.</h1></div>
   <div class="row">
  <div class="col-md-4">
     <h2>Your Resources</h2>
    <p class="text-uppercase">National Suicide Prevention Life Line</p>
    <p><strong>1-800-273-8255</strong></p>
    <hr>
    <p class="text-uppercase">Columbia University Counseling and Psychological Services</p>
    <p><strong>(212) 854-2284</strong></p>
    <hr>
    <p class="text-uppercase">Covenant House New York</p>
    <p><strong>460 West 41st Street, New York, NY 10036</strong></p>
    <p><strong>(212) 613-0300</strong></p>
    <hr>
    <p class="text-uppercase">Columbia University Office of the Chaplain</p>
    <p><strong>1160 Amsterdam Ave, New York, NY 10027</strong></p>
    <p><strong>(212) 854-1487</strong></p>
    <hr>
    <a href="http://www.7cupsoftea.com/" class="btn btn-primary btn-block">Live Chat</a>
   </div>
     <div class="col-md-4">
       
            <h2>Your Contacts</h2>
     <form action="notify.php?user=<?php echo $username ?>&coord=<?php echo $_COOKIE['coord'] ?>" method="post">
       <?php
$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($link, $sql);
$count = mysqli_num_rows($result);
if($count>0) {
while($row = mysqli_fetch_assoc($result)) {
  $name1 = $row['ec_1'];
  $name2 = $row['ec_2'];
  $name3 = $row['ec_3'];
  $email1 = $row['ec_1_email'];
  $email2 = $row['ec_2_email'];
  $email3 = $row['ec_3_email'];
  $phone1 = $row['ec_1_phone'];
  $phone2 = $row['ec_2_phone'];
  $phone3 = $row['ec_3_phone'];
?>
<table class="table">
  <thead>
    <th></th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
  </thead>
  <tbody>
    <tr>
      <td><input type="checkbox" name="contact1" value="<?php echo $name1 ?>;<?php echo $email1 ?>;<?php echo $phone1 ?>" checked></td>
      <td><?php echo $name1 ?></td>
      <td><?php echo $email1 ?></td>
      <td><?php echo $phone1 ?></td>
    </tr>
        <tr>
      <td><input type="checkbox" name="contact2" value="<?php echo $name2 ?>;<?php echo $email2 ?>;<?php echo $phone2 ?>" checked></td>
      <td><?php echo $name2 ?></td>
      <td><?php echo $email2 ?></td>
      <td><?php echo $phone2 ?></td>
    </tr>    <tr>
      <td><input type="checkbox" name="contact3" value="" checked></td>
      <td><?php echo $name3 ?></td>
      <td><?php echo $email3 ?></td>
      <td><?php echo $phone3 ?></td>
    </tr>
    <tr>
      <td colspan="4"><button type="submit" class="btn btn-primary btn-block">Notify Someone</button></td>
    </tr>
  </tbody>
</table>
       
<?php
}
} else {
?>
<p>You have no contacts yet. Would you like to <a href="../contacts/">add some?</a></p>
<?php
}
?>
     </form>

Your Coordinates: <div id="mapcaption"></div>
<div id="mapholder"></div>
     </div>
   <div class="col-md-4">
     <h2>Motivation</h2>
     <iframe src="giphy.php" seamless width="350" height="300" scrolling="no" style="border:none;overflow:hidden"></iframe>
<hr>
<?php
/*
$homepage = file_get_contents('quotes.json');
$hello = json_decode($homepage, true);
$quote = $hello['quotes']['body'][10];
$author = $hello['quotes']['source'][10];
*/
?>
<blockquote>
 
  "The two most important days in your life are the day you are born and the day you find out why." <br>--Mark Twain
</blockquote>


   </div>
  </div>
  </div>
</body>
</html>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

</body>

</html>
