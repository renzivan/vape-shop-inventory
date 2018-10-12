<?php
include('connection.php');
    date_default_timezone_set('Asia/Hong_Kong');

/* add new product */
    // if(isset($_POST['add_submit'])){
	// if($_POST['clickedBtn'] == 'add_button'){
        $name = $_POST['name'];
        $category = $_POST['categ'];
        $price = $_POST['price'];
        $quantity = $_POST['qty'];

        $query = "insert into product (name,category,price,quantity,quantity_sold) values ('$name','$category',$price,$quantity,0)";
        $date = date("F jS Y h:i",time());
        if ($con->query($query) === TRUE) {
           	echo "<div class='alert alert-success alert-dismissible' style='display:inline-block;'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong>Succes!</strong> Added new product: " . $name . ".
                    </div>";
		    $log_query = "INSERT INTO log (description,product,quantity,price,date)
    					values ('Added New Product','$name',$quantity,$price,'$date')";
   			$con->query($log_query);

            // $html = '<tr>';
            // $html .= '<td>CHAR</td>';
            // $html .= '</tr>';

            // echo $html;
        } else {
            echo "<div class='alert alert-danger alert-dismissible' style='display:inline-block;'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong>Error!</strong> Adding product failed.
                    </div>";
        }
    // }