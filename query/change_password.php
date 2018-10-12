 <?php 
 // if(isset($_POST['btn_confirm_password'])){
              
    include('connection.php');
                $getid = $_POST['get_id_password'];
                $passwd = $_POST['get_old_password'];
                $new_password = '';
                $old_pass = $_POST['old_pass'];
                $new_pass = $_POST['new_pass'];
                $new_pass_confirm = $_POST['new_pass_confirm'];
                if($old_pass == $passwd){
                    if($new_pass == $new_pass_confirm){
                        $new_password = $new_pass_confirm;
                        $query = "UPDATE user SET password = '$new_password' WHERE id = '$getid' ";
                        if ($con->query($query) === TRUE) {
                            // echo "<div class='alert alert-success alert-dismissible' style='display:inline-block;'>
                            //     <strong>Succes!</strong> Password changed.
                            // </div>";
                            echo true;

                        } else {
                            echo ("<SCRIPT LANGUAGE='JavaScript'>
                            window.alert('Failed!');
                            window.location.href='changepassword.php';
                            </SCRIPT>");

                        }
                    }
                }else {
                    // echo "<div class='alert alert-danger alert-dismissible' style='display:inline-block;'>
                    //     <strong>Error!</strong>
                    // </div>";
                    echo false;
                }
                
            // }
