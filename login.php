<?php
session_start();
include("includes/db.php");
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $pass = md5($_POST['pass']);
  $query = "SELECT * FROM users WHERE username='$username' AND password='$pass'";
$result = mysqli_query($link, $query);
$count = mysqli_num_rows($result);
if($count == 1) {
  $_SESSION['username'] = $_POST['username'];
 header("Location:/");
} else {
  $message = '<div class="alert alert-danger" role="alert">Invalid username/password combination!</div>';
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>What's Up? | Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
     <link href="css/style.css" rel="stylesheet">

<style type="text/css">
	
	body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 400px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  font-size: 16px;
  height: auto;
  padding: 10px;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="text"] {
  margin-bottom: -1px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
	
</style>
  </head>

  <body>
    <div class="container">

      <form class="form-signin" role="form" method="post" action="">
        <h2 class="form-signin-heading">Please sign in</h2>
        <?php echo $message ?>
        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
        <input type="password" name="pass" class="form-control" placeholder="Password" required>
        
        <div class="row">
          <div class="col-md-6"><button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button></div>
          <div class="col-md-6"><a class="btn btn-lg btn-success btn-block" href="register.php">Register</a></div>
        </div>
        
        <p>Copyright &copy;2014 What's Up? All Rights Reserved.</p>
      </form>

    </div> <!-- /container -->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
