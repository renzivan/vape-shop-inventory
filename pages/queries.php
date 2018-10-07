<?php 
  	include('connection.php');
	/* timezone */
    date_default_timezone_set('Asia/Hong_Kong');

	/* add new product */
    if(isset($_POST['add_submit'])){
        $name = $_POST['add_name'];
        $category = $_POST['add_category'];
        $price = $_POST['add_price'];
        $quantity = $_POST['add_quantity'];
        $query = "insert into product (name,category,price,quantity,quantity_sold) values ('$name','$category',$price,$quantity,0)";
        $date = date("F jS Y h:i",time());
        if ($con->query($query) === TRUE) {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
		    window.alert('Success!');
		    window.location.href='inventory.php';
		    </SCRIPT>");
		    $log_query = "INSERT INTO log (description,product,quantity,price,date)
    					values ('Added New Product','$name',$quantity,$price,'$date')";
   			$con->query($log_query);
        } else {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
		    window.alert('Failed!');
		    window.location.href='inventory.php';
		    </SCRIPT>");
        }
    }

	/*save product changes*/
	if(isset($_POST['save_button'])){
	    $product_id = $_POST['product_id'];
	    $edit_name = $_POST['edit_name'];
	    $edit_category = $_POST['edit_category'];
	    $edit_price = $_POST['edit_price'];
	    $edit_quantity = $_POST['edit_qty'];
	    $edit_quantity_sold = $_POST['edit_qty_sold'];
	    $edit_restock = $_POST['edit_restock'];
	    if($edit_quantity_sold==NULL){
	    	$edit_quantity_sold = 0;
	    }elseif($edit_restock==NULL){
	    	$edit_restock = 0;
	    }
	    $edit_quantity -= $edit_quantity_sold;
	    $edit_quantity += $edit_restock;
	    $edit_query = "UPDATE product SET name = '$edit_name', category='$edit_category', price='$edit_price', quantity='$edit_quantity' WHERE id='$product_id'";
	    $edit_date = date("F jS Y h:i");

	    if ($con->query($edit_query) === TRUE) {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
			    window.alert('Success!');
			    window.location.href='inventory.php';
			    </SCRIPT>");
		    $log_query = "INSERT INTO log (description,product,quantity,price,date)
    					values ('Edited','$edit_name',$edit_quantity,$edit_price,'$edit_date')";
		   	$con->query($log_query);
	    } else {
          	echo ("<SCRIPT LANGUAGE='JavaScript'>
			    window.alert('Failed!');
			    window.location.href='inventory.php';
			    </SCRIPT>");
	    }
	}
