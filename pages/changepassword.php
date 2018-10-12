<?php
	//header('Location: pages/inventory.php');
        include('header.php');
        include('footer.php');
?>


<!DOCTYPE html>
<html>
<head>
	<?php
		mr_head();
        mr_authenticator();
	?>
	
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>UPTOWN</b>VAPE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Change Password</p>

      <?php
  
            $get_passwd = $_SESSION['getpassword'];
            $get_user_id = $_SESSION['getid'];
      ?>
  <!--Added by renz -->
    <!-- <form action="" method="post" name="login"> -->
      <div class="form-group has-feedback">
        <label >Old Password</label>
        <input type="hidden" class="form-control get_id_password" placeholder="Enter Old Password" autofocus autocomplete="off" name="old_pass" value="<?php echo $get_user_id; ?>">
        <input type="hidden" class="form-control get_old_password" placeholder="Enter Old Password" autofocus autocomplete="off" name="old_pass" value="<?php echo $get_passwd; ?>">
        <input type="password" class="form-control old_pass" placeholder="Enter Old Password" autofocus autocomplete="off" name="old_pass">
      </div>
      <div class="form-group has-feedback">
        <label>New Password</label>
        <input type="password" class="form-control new_pass" placeholder="Enter New Password" name="new_pass" id="password">
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control new_pass_confirm" placeholder="Confirm New Password" name="new_pass_confirm" id="confirm_password">
      </div>
      <div class="form-group has-feedback">
        <p id="message"></p>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-6">
          <button name ="btn_confirm_password" type="button" class="btn btn-primary btn-block btn-flat" value="Login" id="btn_confirm_password">Confirm</button>
        </div>
        <div class="col-xs-6">
          <a href="inventory.php"  class="btn btn-secondary btn-block btn-flat">Cancel</a>
        </div>
        <!-- /.col -->
      </div>
    <!-- </form> -->
    <?php 
        mr_foot();
    ?>

 
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

</body>
</html>
