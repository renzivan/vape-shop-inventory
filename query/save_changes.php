<?php 
  	include('connection.php');
	/* timezone */
    date_default_timezone_set('Asia/Hong_Kong');

	/*save product changes*/
	// if(isset($_POST['save_button'])){
	    $product_id = $_POST['id'];
	    $edit_name = $_POST['name'];
	    $edit_category = $_POST['categ'];
	    $edit_price = $_POST['price'];
	    $edit_quantity = $_POST['qty'];
	    $edit_quantity_sold = $_POST['qty_sold'];
	    $edit_restock = $_POST['restock'];
	    if(!is_numeric($edit_quantity_sold) || $edit_quantity_sold==''){
	    	$edit_quantity_sold = 0;
	    }if(!is_numeric($edit_restock) || $edit_restock==''){
	    	$edit_restock = 0;
	    }
	    $edit_quantity = $edit_quantity - $edit_quantity_sold;
	    $edit_quantity = $edit_quantity + $edit_restock;
	    $edit_query = "UPDATE product SET name = '$edit_name', category='$edit_category', price='$edit_price', quantity='$edit_quantity' WHERE id='$product_id'";
	    $edit_date = date("F jS Y h:i");

	    if ($con->query($edit_query) === TRUE) {
            echo "<div class='alert alert-success alert-dismissible' style='display:inline-block;'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong>Succes!</strong> Changes saved.
                    </div>";
		    $log_query = "INSERT INTO log (description,product,quantity,price,date)
    					values ('Edited','$edit_name',$edit_quantity,$edit_price,'$edit_date')";
		   	$con->query($log_query);
	    } else {
          	echo "<div class='alert alert-danger alert-dismissible' style='display:inline-block;'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong>Error!</strong> Changes not saved.
                    </div>";
	    }
	// }
