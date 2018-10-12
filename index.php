<?php
	//header('Location: pages/inventory.php');
		include('pages/header.php');
		include('pages/footer.php');
		include ('query/connection.php'); //uncomment this line if live
?>


<!DOCTYPE html>
<html>
<head>
	<?php
		mr_head();
	?>
	
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
</head>
<body class="hold-transition login-page" id="login-page" style="background-color: #044a67;">
<div class="login-box">
  <div class="login-logo">
	<img class='logo' src='img/logo3.png' width=350/>
	<!-- <a href="index.php"><b>UPTOWN</b>VAPE</a> -->
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
	<p class="login-box-msg">Sign in to start your session</p>

  <!--Added by renz -->
  

  <?php
		if($_SERVER["REQUEST_METHOD"] == "POST") {

		session_start();
			// username and password sent from form 
			$myusername = @mysqli_real_escape_string($con,$_POST['username']);
			$mypassword = @mysqli_real_escape_string($con,$_POST['password']); 

			//$sql = "SELECT * FROM user WHERE BINARY ID = '$myusername' and BINARY Password = '$mypassword'";
			$sql = "SELECT * FROM user WHERE BINARY username = '$myusername' and BINARY password = '$mypassword'";
			$result = @mysqli_query($con,$sql);
			$row = @mysqli_fetch_array($result,MYSQLI_ASSOC);
			$count = @mysqli_num_rows($result);

			// If result matched $myusername and $mypassword, table row must be 1 row
			if($count == 1) {
				$_SESSION['logged_user'] = $row['name'];
			  $_SESSION['getid'] = $row['id'];
			  $_SESSION['getpassword'] = $row['password'];
				header("location: pages/inventory.php");
			}else {
				echo "<p style='color:red'>Username or password does not match.</p>";
			}
			$msg = '';
		}


  ?>


	<form action="" method="post" name="login">
	  <div class="form-group has-feedback">
		<input type="text" class="form-control" placeholder="Username" autofocus autocomplete="off" name="username">
		<!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
	  </div>
	  <div class="form-group has-feedback">
		<input type="password" class="form-control" placeholder="Password" name="password">
		<!-- <span class="glyphicon glyphicon-lock form-control-feedback"></span> -->
	  </div>
	  <div class="row">
		<!-- /.col -->
		<div class="col-xs-12">
		  <button name ="submit" type="submit" class="btn btn-primary btn-block btn-flat" value="Login">Sign In</button>
		</div>
		<!-- /.col -->
	  </div>
	</form>

 
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

</body>
</html>
