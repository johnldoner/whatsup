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
  $query = "UPDATE users SET ec_1='$name1',ec_2='$name2',ec_3='$name3',ec_1_email='$email1',ec_2_email='$email2',ec_3_email='$email3',ec_1_phone='$phone1',ec_2_phone='$phone2',ec_3_phone='$phone3' WHERE username='$username'";
$result = mysqli_query($link, $query);
 header("Location:../contacts/");
}
?>