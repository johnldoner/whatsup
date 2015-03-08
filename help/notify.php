<?php
session_start();
/*
error_reporting(0);
ini_set('display_errors', 0); */
include('../includes/db.php');
$user = $_GET['user'];
$coord = $_GET['coord'];

$subject = $user . ' is feeling a little down. Wanna talk?';
$message = 
"
<html>
<body>

<strong>" .
$coord . "</strong><br>
  <img src='http://maps.googleapis.com/maps/api/staticmap?center="
    . $coord . "&zoom=16&size=400x300&sensor=true&markers=color:blue%7Clabel:S%7C" . $coord ."'>
</body>
</html>

";
$headers = 'From: notifications@whatsup.com' . "\r\n" .
    'Reply-To: notifications@whatsup.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


if(isset($_POST['contact1'])) {
  $data1 = $_POST['contact1'];
  $pieces1 = explode(";", $data1);
  $to1 = $pieces1[1];
  mail($to1, $subject, $message, $headers);
}
if(isset($_POST['contact2'])) {
  $data2 = $_POST['contact2'];
  $pieces2 = explode(";", $data2);
  $to2 = $pieces2[1];
  mail($to2, $subject, $message, $headers);
}
/*
if(isset($_POST['contact3'])) {
  $data3 = $_POST['contact3'];
  $pieces3 = explode(";", $data3);
  $to3 = $pieces3[1];
  mail($to3, $subject, $message, $headers);
}
*/

    require "../twilio/Services/Twilio.php";
 
    $AccountSid = "ACe344b6fa16614502ce69fcb5dccb6c61";
    $AuthToken = "34b22326a7990fb1c1399b6638fdb3d1";
    $client = new Services_Twilio($AccountSid, $AuthToken);
 
    $people = array(
        "+15103789535" => "John Doner",
        "+18452450275" => "Nancy Minyanou"
    );
    foreach ($people as $number => $name) {
 
        $sms = $client->account->messages->sendMessage(
            "215-631-3071", 
            $number,
            "Hey $name, $user needs your help. He's at https://maps.google.com/maps?q=$coord ($coord). Could you talk to him?"
        );
    }
header("Location:../help/");
?>