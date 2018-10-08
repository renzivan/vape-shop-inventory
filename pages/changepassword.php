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

  <!--Added by renz -->
    <form action="" method="post" name="login">
      <div class="form-group has-feedback">
        <label >Old Password</label>
        <input type="password" class="form-control" placeholder="Enter Old Password" autofocus autocomplete="off" name="old_pass">
      </div>
      <div class="form-group has-feedback">
        <label>New Password</label>
        <input type="password" class="form-control" placeholder="Enter New Password" name="new_pass" id="password">
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Confirm New Password" name="new_pass_confirm" id="confirm_password">
      </div>
      <div class="form-group has-feedback">
        <p id="message"></p>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-6">
          <button name ="btn_confirm_password" type="submit" class="btn btn-primary btn-block btn-flat" value="Login" id="btn_confirm_password">Confirm</button>
        </div>
        <div class="col-xs-6">
          <a href="inventory.php"  class="btn btn-secondary btn-block btn-flat">Cancel</a>
        </div>
        <?php 

            if(isset($_POST['btn_confirm_password'])){
              
            $passwd = $_SESSION['getpassword'];
            $getid = $_SESSION['getid'];
                $new_password = '';
                $old_pass = $_POST['old_pass'];
                $new_pass = $_POST['new_pass'];
                $new_pass_confirm = $_POST['new_pass_confirm'];
                if($old_pass == $passwd){
                    if($new_pass == $new_pass_confirm){
                        $new_password = $new_pass_confirm;
                        $query = "UPDATE user SET password = '$new_password' WHERE id = '$getid' ";
                        if ($con->query($query) === TRUE) {
                            echo ("<SCRIPT LANGUAGE='JavaScript'>
                            window.alert('Success!');
                            window.location.href='inventory.php';
                            </SCRIPT>");
                        } else {
                            echo ("<SCRIPT LANGUAGE='JavaScript'>
                            window.alert('Failed!');
                            window.location.href='changepassword.php';
                            </SCRIPT>");
                        }
                    }
                }else {
                    echo "<script>
                            window.alert('Change Password Failed!');
                            window.location.href='changepassword.php';
                        </script>";
                }
                
            }

        ?>
        <!-- /.col -->
      </div>
    </form>
    <?php 
        mr_foot();
    ?>

 
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

</body>
</html>
