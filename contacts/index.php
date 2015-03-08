<?php
session_start();
include("../includes/sessioncheck.php");
include("../includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>My Contacts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="../css/style.css" media="screen">
    <link rel="stylesheet" href="../css/bootswatch.css">
  </head>
  <body>
    
    <?php include("../includes/nav.php"); ?>


    <div class="container">

      <div class="page-header" id="banner">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <h1>My Contacts</h1>
<?php
$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($link, $sql);
$count = mysqli_num_rows($result);
if($count > 0) {
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
            
      <form class="form-horizontal" action="update.php" method="post">
  <div class="form-group">
    <label for="name1" class="col-sm-2 control-label">Contact 1</label><div class="col-sm-10"><input type="text" class="form-control" id="name1" name="name1" placeholder="Name" value="<?php echo $name1 ?>"></div></div>
    <div class="form-group"><div class="col-sm-5 col-sm-offset-2"><input type="email" class="form-control" name="email1" placeholder="Email" value="<?php echo $email1 ?>"></div>
    <div class="col-sm-5"><input type="tel" class="form-control" name="phone1" placeholder="Phone" value="<?php echo $phone1 ?>"></div>
  </div>
  <hr>
  <div class="form-group">
    <label for="name2" class="col-sm-2 control-label">Contact 2</label><div class="col-sm-10"><input type="text" class="form-control" id="name2" name="name2" placeholder="Name" value="<?php echo $name2 ?>"></div></div>
    <div class="form-group"><div class="col-sm-5 col-sm-offset-2"><input type="email" class="form-control" name="email2" placeholder="Email" value="<?php echo $email2 ?>"></div>
    <div class="col-sm-5"><input type="tel" class="form-control" name="phone2" placeholder="Phone" value="<?php echo $phone2 ?>"></div>
  </div>
  <hr>
  <div class="form-group">
    <label for="name3" class="col-sm-2 control-label">Contact 3</label><div class="col-sm-10"><input type="text" class="form-control" id="name3" name="name3" placeholder="Name" value="<?php echo $name3 ?>"></div></div>
    <div class="form-group"><div class="col-sm-5 col-sm-offset-2"><input type="email" class="form-control" name="email3" placeholder="Email" value="<?php echo $email3 ?>"></div>
    <div class="col-sm-5"><input type="tel" class="form-control" name="phone3" placeholder="Phone" value="<?php echo $phone3 ?>"></div>
  </div>
  <hr>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </div>
</form>
<?php
} 
} else {
?>
      <form class="form-horizontal" action="new.php" method="post">
  <div class="form-group">
    <label for="name1" class="col-sm-2 control-label">Contact 1</label><div class="col-sm-10"><input type="text" class="form-control" id="name1" name="name1" placeholder="Name" value="<?php echo $name1 ?>"></div></div>
    <div class="form-group"><div class="col-sm-5 col-sm-offset-2"><input type="email" class="form-control" name="email1" placeholder="Email" value="<?php echo $email1 ?>"></div>
    <div class="col-sm-5"><input type="tel" class="form-control" name="phone1" placeholder="Phone" value="<?php echo $phone1 ?>"></div>
  </div>
  <hr>
  <div class="form-group">
    <label for="name2" class="col-sm-2 control-label">Contact 2</label><div class="col-sm-10"><input type="text" class="form-control" id="name2" name="name2" placeholder="Name" value="<?php echo $name2 ?>"></div></div>
    <div class="form-group"><div class="col-sm-5 col-sm-offset-2"><input type="email" class="form-control" name="email2" placeholder="Email" value="<?php echo $email2 ?>"></div>
    <div class="col-sm-5"><input type="tel" class="form-control" name="phone2" placeholder="Phone" value="<?php echo $phone2 ?>"></div>
  </div>
  <hr>
  <div class="form-group">
    <label for="name3" class="col-sm-2 control-label">Contact 3</label><div class="col-sm-10"><input type="text" class="form-control" id="name3" name="name3" placeholder="Name" value="<?php echo $name3 ?>"></div></div>
    <div class="form-group"><div class="col-sm-5 col-sm-offset-2"><input type="email" class="form-control" name="email3" placeholder="Email" value="<?php echo $email3 ?>"></div>
    <div class="col-sm-5"><input type="tel" class="form-control" name="phone3" placeholder="Phone" value="<?php echo $phone3 ?>"></div>
  </div>
  <hr>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </div>
</form>


<?php  
}
?>
          </div>
        </div>
      </div>

   <?php include("../includes/footer.php") ?>

    </div>


    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootswatch.js"></script>
</body>
</html>
