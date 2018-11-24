<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        include('header.php');
        include('footer.php');
        mr_head();
        mr_authenticator();
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
                        <table class="table" id="table-add">
                            <thead>
                                <tr>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type='text' class='form-control' name='add_name' autocomplete='off' value='' id='add_name'></td>
                                    <td><select name='add_category' class='form-control' id='add_category'>
                                        <option value='MOD'>MOD</option>
                                        <option value='E Juice'>E Juice</option>
                                        <option value='Atomizer'>Atomizer</option>
                                        <option value='Cotton'>Cotton</option>
                                        <option value='Wires'>Wires</option>
                                        <option value='Battery'>Battery</option>
                                        <option value='Accessories'>Accessories</option>
                                        <option value='Beverages'>Beverages</option>
                                        <option value='Services'>Services</option>
                                    </select></td>
                                    <td><input type='text' class='form-control' name='add_price' autocomplete='off' value='' id='add_price'></td>
                                    <td><input type='text' class='form-control'  name='add_quantity' style='width:50px;' value='' id='add_quantity'></td>
                                    
                                        <!-- <button type='submit' name='' class=''>
                                            <img src='../img/edit.png'/ width=30>
                                        </button> -->

                                    <td>
                                        <button type='button' name='add_submit' class='btn btn-secondary' id='add_button'>
                                            <!-- <img src='../img/save.png'/ width=30> -->
                                            Add new product
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="container-fluid"><br>
                <div class="col-xs-8 table-responsive">
                    <table class="table">
                        <tr>
                            <td style='width:20%;'>
                                <div>
                                    <select name='filter_category' class='form-control' id='filter_category'>
                                        <option value=''></option>
                                        <option value='MOD'>MOD</option>
                                        <option value='E Juice'>E Juice</option>
                                        <option value='Atomizer'>Atomizer</option>
                                        <option value='Cotton'>Cotton</option>
                                        <option value='Wires'>Wires</option>
                                        <option value='Battery'>Battery</option>
                                        <option value='Accessories'>Accessories</option>
                                        <option value='Beverages'>Beverages</option>
                                        <option value='Services'>Services</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input type='text' id="search_input" class='form-control' autocomplete='off' placeholder="Search for product or category..." autofocus>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                
				<div class="table-responsive" id="myTable_wrapper">
					<table class="table" id="myTable">
						<thead>
							<tr>
							<th style='width: 25%;'>Product</th>
							<th style='width: 25%;'>Category</th>
							<th style='width: 15%;'>Price</th>
							<th style='width: 5%;'>Quantity</th>
                            <th style='display:none;width: 5%;' class='qty-sold col-md-1'>Sold</th>
							<th style='display:none;width: 5%;' class='qty-sold col-md-1'>Restock</th>
                            <th style='width: 15%;'></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$search_query_result = mysqli_query($con,"select * from product");
                            echo "<script>var data = [];</script>";
                             while ($data = mysqli_fetch_assoc($search_query_result)){
                                $encoded_data = json_encode($data);
                                echo "         
                                    <script>
                                        data.push($encoded_data);
                                    </script>";
									echo "
                           
										<!-- <form action='queries.php' method='POST'> -->
											<tr id='".$data['id']."' class='paginate'>
												<td>
                                                    <input type='hidden' class='get-id' name='product_id' autocomplete='off' value='".$data['id']."'>
                                                    <input type='hidden' class='form-control edit-mode product_name' name='edit_name' autocomplete='off' value='".$data['name']."' id='product_name'>
                                                    <label class='display_data'>".$data['name']."</label>
                                                </td>
												<td>
                                                    <input type='hidden' class='form-control edit-mode product_category' name='edit_category' autocomplete='off' value='".$data['category']."' id='product_category'>
                                                    <label class='display_data'>".$data['category']."</label>
                                                </td>
												<td>
                                                    <input type='hidden' class='form-control edit-mode product_price' name='edit_price' autocomplete='off' value='".$data['price']."' id='product_price'>
                                                    <label class='display_data'>".$data['price']."</label>
                                                </td>
												<td>
                                                    <input type='hidden' class='form-control edit-mode product_qty'  name='edit_qty' style='width:65px;' value='".$data['quantity']."' id='product_qty'>
                                                    <label class='display_data'>".$data['quantity']."</label>
                                                </td>
                                                <td style='display:none;' class='qty-sold'>
                                                    <input type='hidden' class='form-control edit-mode qty-sold product_qty_sold'  name='edit_qty_sold' style='width:65px;' value='' id='product_qty_sold'>
                                                    <!-- <label class='display_data qty-sold'></label> -->
                                                </td>
												<td style='display:none;' class='qty-sold'>
                                                    <input type='hidden' class='form-control edit-mode qty-sold product_restock'  name='edit_restock' style='width:65px;' value='' id='product_restock'>
                                                    <!-- <label class='display_data qty-sold'></label> -->
                                                </td>
												<td>
													<button type='button' class='edit-button btn btn-secondary'>
													   <!-- <img src='../img/edit.png'/ width=30>-->
                                                       Edit
													</button>

                                                    <button type='button' name='save_button' class='save-button btn btn-dark save_changes_button' id=''>
                                                        <!-- <img src='../img/save.png'/ width=30> -->
                                                        Save
                                                    </button>
												</td>
											</tr>

										<!-- </form> -->
									"; 

								}
                                
							?>
						</tbody>
					</table>
				</div>
                
                    <div id="page-nav-wrap">
                        <div id="page-nav">  
                        </div>
                    </div>
            </div>
        <!-- </div> -->

        <!-- /#page-content-wrapper -->
        <footer>
            <?php
                mr_foot();
            ?>
            <link type="text/css" rel="stylesheet" href="../pagination/simplePagination.css"/>.
            <script type="text/javascript" src="../pagination/jquery.simplePagination.js"></script>
            <style>
                #page-nav-wrap{
                    text-align: center;
                }
                #page-nav{
                    display: inline-block;
                }
                #page-nav ul li a, #page-nav ul li span {
                    width: 30px;
                }
                #page-nav ul li a:active {

                }
            </style>
            <script>
                
            </script>
        </footer>
    </div>
    <!-- /#wrapper -->
</body>



</html>
