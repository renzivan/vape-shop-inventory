<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        include('header.php');
        include('footer.php');
        mr_head();
    ?>
</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <?php
            mr_nav();
        ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        
           
        <!-- <div id="page-content-wrapper"> -->
            <div class="container-fluid">
                <!-- Table row -->
                <div class="">
                    <div class="col-xs-8 table-responsive">
                        <table class="table" id="">
                            <thead>
                                <tr>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action='' method='POST'>
                                    <tr>
                                        <td><input type='text' class='form-control' name='add_name' autocomplete='off' value=''></td>
                                        <td><input type='text' class='form-control' name='add_category' autocomplete='off' value=''></td>
                                        <td><input type='text' class='form-control' name='add_price' autocomplete='off' value=''></td>
                                        <td><input type='text' class='form-control'  name='add_quantity' style='width:50px;' value=''></td>
                                        
                                            <!-- <button type='submit' name='' class=''>
                                                <img src='../img/edit.png'/ width=30>
                                            </button> -->

                                        <td>
                                            <button type='submit' name='add_submit' class=''>
                                                <img src='../img/save.png'/ width=30>
                                            </button>
                                        </td>
                                    </tr>
                                </form>
                            </tbody>
                        </table>

                          <?php
                                    //add new product
                                    $con = mysqli_connect("localhost","root","Hello101!","uptown");
                                    if(isset($_POST['add_submit'])){
                                        $name = $_POST['add_name'];
                                        $category = $_POST['add_category'];
                                        $price = $_POST['add_price'];
                                        $quantity = $_POST['add_quantity'];

                                        $query = "insert into product (name,category,price,quantity,quantity_sold) values ('$name','$category',$price,$quantity,0)";
                                        if ($con->query($query) === TRUE) {
                                            echo "<div class='alert alert-success alert-dismissible' style='display:inline-block;'>
                                                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                                    <strong>Succes!</strong> Added new product: " . $name . ".
                                                </div>";
                                        } else {
                                            //echo "Error: " . $query . "<br>" . $con->error;
                                            echo "<div class='alert alert-danger alert-dismissible' style='display:inline-block;'>
                                                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                                    <strong>Error!</strong> Adding product failed.
                                                </div>";
                                        }
                                    }
                                ?>
                    </div>
                </div>
            </div>
            <div class="container-fluid"><br>
                <div class="col-xs-8">
                    <input type='text' id="search_input" onkeyup="searching()" class='form-control' autocomplete='off' placeholder="Search for product or category..." >
                </div>
				<div class="table-responsive">
					<table class="table" id="myTable">
						<thead>
							<tr>
							<th>Product</th>
							<th>Category</th>
							<th>Price</th>
							<th>Quantity</th>
							<th style='display:none;' class='qty-sold'>Quantity Sold</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$con = mysqli_connect("localhost","root","Hello101!","uptown");
							$search_query_result = mysqli_query($con,"select * from product");
							   while ($data = mysqli_fetch_assoc($search_query_result)){
									echo "
										<form action='' method='POST'>
											<tr>
												<td>
                                                    <input type='hidden' class='get-id' name='product_id' autocomplete='off' value='".$data['id']."'>
                                                    <input type='hidden' class='form-control edit-mode' name='edit_name' autocomplete='off' value='".$data['name']."' id='product_name'>
                                                    <label class='display_data'>".$data['name']."</label>
                                                </td>
												<td>
                                                    <input type='hidden' class='form-control edit-mode' name='edit_category' autocomplete='off' value='".$data['category']."' id='product_category'>
                                                    <label class='display_data'>".$data['category']."</label>
                                                </td>
												<td>
                                                    <input type='hidden' class='form-control edit-mode' name='edit_price' autocomplete='off' value='".$data['price']."' id='product_price'>
                                                    <label class='display_data'>".$data['price']."</label>
                                                </td>
												<td>
                                                    <input type='hidden' class='form-control edit-mode'  name='edit_qty' style='width:50px;' value='".$data['quantity']."' id='product_qty'>
                                                    <label class='display_data'>".$data['quantity']."</label>
                                                </td>
												<td style='display:none;' class='qty-sold'>
                                                    <input type='hidden' class='form-control edit-mode qty-sold'  name='edit_qty_sold' style='width:50px;' value='0' id='product_qty_sold'>
                                                    <!-- <label class='display_data qty-sold'></label> -->
                                                </td>
												<td>
													<button type='button' name='edit_button' class='edit-button'>
														<img src='../img/edit.png'/ width=30>
													</button>
												</td>
												<td>
													<button type='submit' name='save_button' class='save-button'>
														<img src='../img/save.png'/ width=30>
													</button>
												</td>
											</tr>
										</form>
									"; 
								}
                                /*update product changes*/
                                
							?>
						</tbody>
					</table>
				</div>
            </div>
        <!-- </div> -->
        <!-- /#page-content-wrapper -->
       
        <footer>
            <?php
                mr_foot();
            ?>

        </footer>
    </div>
    <!-- /#wrapper -->
    <script>
        $(window).on("load", function(){
            $('.qty-sold').hide();
        });

        $('.edit-button').click(function(){
            $('.edit-mode').prop('type','hidden');
            $('.qty-sold').fadeIn(1000);
            $('.display_data').show();
            $(this).closest('tr').find('td > input.edit-mode').prop('type','text');
            $(this).closest('tr').find('td > .display_data').hide();
        });
        $('.save-button').click(function(){
            var xname = $('#product_name').val();
            var xcateg = $('#product_category').val();
            var xprice = $('#product_price').val();
            var xqty = $('#product_qty').val();
            var xqtys = $('#product_qty_sold').val();

            $.ajax({
                url: 'edit.php',
                type: 'POST',
                data: {
                    
                }
             });
        });
    </script>
</body>



</html>
