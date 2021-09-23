<?php

include('connect.php');

try {

  if (isset($_POST['signup'])) {

    if (empty($_POST['email'])) {
      throw new Exception("Email cann't be empty.");
    }

    if (empty($_POST['uname'])) {
      throw new Exception("Username cann't be empty.");
    }

    if (empty($_POST['pass'])) {
      throw new Exception("Password cann't be empty.");
    }

    if (empty($_POST['fname'])) {
      throw new Exception("Username cann't be empty.");
    }
    if (empty($_POST['phone'])) {
      throw new Exception("Username cann't be empty.");
    }


    $result = mysql_query("insert into admininfo(username,password,email,fname,phone) values('$_POST[uname]','$_POST[pass]','$_POST[email]','$_POST[fname]','$_POST[phone]')");
    $success_msg = "Signup Successfully!";
  }
} catch (Exception $e) {
  $error_msg = $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">

  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

  <link rel="stylesheet" href="styles.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

  <center>
    <h1>Signup</h1>
    <div class="content">

      <div class="row">
        <?php
        if (isset($success_msg)) echo $success_msg;
        if (isset($error_msg)) echo $error_msg;
        ?>

        <form method="post" class="form-horizontal col-md-6 col-md-offset-3">

          <div class="form-group">
            <label for="input1" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-7">
              <input type="text" name="email" class="form-control" id="input1" placeholder="your email" />
            </div>
          </div>

          <div class="form-group">
            <label for="input1" class="col-sm-3 control-label">Username</label>
            <div class="col-sm-7">
              <input type="text" name="uname" class="form-control" id="input1" placeholder="choose username" />
            </div>
          </div>

          <div class="form-group">
            <label for="input1" class="col-sm-3 control-label">Password</label>
            <div class="col-sm-7">
              <input type="password" name="pass" class="form-control" id="input1" placeholder="choose a strong password" />
            </div>
          </div>

          <div class="form-group">
            <label for="input1" class="col-sm-3 control-label">Full Name</label>
            <div class="col-sm-7">
              <input type="text" name="fname" class="form-control" id="input1" placeholder="your full name" />
            </div>
          </div>

          <div class="form-group">
            <label for="input1" class="col-sm-3 control-label">Phone Number</label>
            <div class="col-sm-7">
              <input type="text" name="phone" class="form-control" id="input1" placeholder="your phone number" />
            </div>
          </div>


          <input type="submit" class="btn btn-primary col-md-2 col-md-offset-8" value="Signup" name="signup" />
        </form>
      </div>
      <br>
      <p><strong>Already have an account? <a href="index.php">Login</a> here.</strong></p>

    </div>

  </center>

</body>

</html>