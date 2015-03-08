<?php
session_start();
include("../includes/db.php");
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_SESSION['username'];
  $name1 = $_POST['name1'];
  $email1 = $_POST['email1'];
  $phone1 = preg_replace('/\D/', '', $_POST['phone1']);
  $name2 = $_POST['name2'];
  $email2 = $_POST['email2'];
  $phone2 = preg_replace('/\D/', '', $_POST['phone2']);
  $name3 = $_POST['name3'];
  $email3 = $_POST['email3'];
  $phone3 = preg_replace('/\D/', '', $_POST['phone3']);
  $query = "INSERT INTO users (ec_1, ec_2, ec_3, ec_1_email, ec_2_email, ec_3_email, ec_1_phone, ec_2_phone, ec_3_phone)
   VALUES ('$name1','$name2','$name3','$email1','$email2','$email3','$phone1','$phone2','$phone3')
  WHERE username='$username'";
$result = mysqli_query($link, $query);
 header("Location:../contacts/");
}
?>