<?php
session_start();
include('../includes/sessioncheck.php');
include('../includes/db.php');
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Welcome, <?php echo $username ?></title></title>
	<meta name="Resource-type" content="Document" />
	
  <link href='http://fonts.googleapis.com/css?family=Open+Sans|Courgette' rel='stylesheet' type='text/css'>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <style>
  
html {
    width: 100%;
    height: 100%;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    background: -webkit-gradient(linear, top left, bottom left, from(#7baabe), to(#969ac6));
		background: -webkit-linear-gradient(#7BAABE, #969AC6);
		background: linear-gradient(#7BAABE,#969AC6);
		background-repeat: no-repeat;
  }
  
    h1, h2, h3 {
    font-family: 'Courgette', sans-serif;
    color: #fff;
    text-align: center;
    }
    body {
      font-family: 'Open Sans', sans-serif;
      color: #fff;
    }
    .container {
      text-align:center;
    }
    .top {
      width: 100%;
      text-align: center;
    }
    .column-left{ float: left; width: 33%; }
    .column-right{ float: right; width: 33%; }
    .column-center{ display: inline-block; width: 33%; }
    
    .btn {
  background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 12;
  -moz-border-radius: 12;
  border-radius: 12px;
  border: none;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}

.btn:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}
    
  </style>

	<!--[if IE]>
		<script type="text/javascript">
			 var console = { log: function() {} };
		</script>
	<![endif]-->

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
    +latlon+"&zoom=16&size=400x200&sensor=true&markers=color:blue%7Clabel:S%7C"+latlon;
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
<body onload="getLocation();">
<div class="container">
  <div class="top"><h1>Welcome, <?php echo $username ?></h1></div>
   <div class="column-center">
     <h2>Your Resources</h2>
     <form action="notify.php?user=<?php echo $username ?>&coord=<?php echo $_COOKIE['coord'] ?>" method="post">
       <?php
$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($link, $sql);
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
<table class="table table-condensed">
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
      <td><input type="checkbox" name="contact1" value="<?php echo $name2 ?>;<?php echo $email2 ?>;<?php echo $phone2 ?>" checked></td>
      <td><?php echo $name2 ?></td>
      <td><?php echo $email2 ?></td>
      <td><?php echo $phone2 ?></td>
    </tr>    <tr>
      <td><input type="checkbox" name="contact1" value="<?php echo $name3 ?>;<?php echo $email3 ?>;<?php echo $phone3 ?>" checked></td>
      <td><?php echo $name3 ?></td>
      <td><?php echo $email3 ?></td>
      <td><?php echo $phone3 ?></td>
    </tr>
    <tr>
      <td colspan="4"><button type="submit" style="width:100%" class="btn">Notify Someone</button></td>
    </tr>
  </tbody>
</table>
       
<?php
}
?>
     </form>

<div id="mapcaption"></div>
<div id="mapholder"></div>
   </div>
   <div class="column-left">
     <h2>Your Resources</h2>
     
   </div>
   <div class="column-right">
     <h2>Your Resources</h2>
     
   </div>
</div>
</body>
</html>