<?php
$link = mysqli_connect("db.johnldoner.com","ppsy_admin","l0gm31n!","ny2_whatsup");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>