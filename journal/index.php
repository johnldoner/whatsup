<?php
session_start();
include("../includes/sessioncheck.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>My Journal</title>
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
            <h1>Journal</h1>
            <iframe width="100%" height="600" style="border:none;" seamless src="https://john123.typeform.com/to/N4Oxqu?username=<?php echo $_SESSION['username'] ?>"></iframe>
          </div>
        </div>
      </div>

   <?php include("../includes/footer.php") ?>

    </div>


    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootswatch.js"></script>
</body>
</html>
