<?php

if (isset($_POST['login'])) {
	//start of try block

	try {

		//checking empty fields
		if (empty($_POST['username'])) {
			throw new Exception("Username is required!");
		}
		if (empty($_POST['password'])) {
			throw new Exception("Password is required!");
		}
		//establishing connection with db and things
		include('connect.php');

		//checking login info into database
		$row = 0;
		$result = mysql_query("select * from admininfo where username='$_POST[username]' and password='$_POST[password]'");
		
		$row = mysql_num_rows($result);
	
		if($row>0){
			session_start();
			$_SESSION['name']="oasis";
			header('location: users.php');
		}

		else{
			throw new Exception("Username,Password or Role is wrong, try again!");
			
			header('location: login.php');
		}
	
	}

	//end of try block
	catch (Exception $e) {
		$error_msg = $e->getMessage();
	}
	//end of try-catch
}

?>

<!DOCTYPE html>
<html>

<head>

	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- Optional theme -->


	<link rel="stylesheet" href="styles.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
	<center>



		<h1>Login</h1>

		<?php
		//printing error message
		if (isset($error_msg)) {
			echo $error_msg;
		}
		?>


		<div class="content">
			<div class="row">

				<form method="post" class="form-horizontal col-md-6 col-md-offset-3">
					<div class="form-group">
						<label for="input1" class="col-sm-3 control-label">Username</label>
						<div class="col-sm-7">
							<input type="text" name="username" class="form-control" id="input1" placeholder="your username" />
						</div>
					</div>

					<div class="form-group">
						<label for="input1" class="col-sm-3 control-label">Password</label>
						<div class="col-sm-7">
							<input type="password" name="password" class="form-control" id="input1" placeholder="your password" />
						</div>
					</div>

					<input type="submit" class="btn btn-primary col-md-3 col-md-offset-7" value="Login" name="login" />
				</form>
			</div>
		</div>



		<br><br>
		<p><strong>If you don't have any account, <a href="signup.php">Signup</a> here</strong></p>

	</center>
</body>

</html>