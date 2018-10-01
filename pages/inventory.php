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
                <!-- <img src="img/nikx.jpg" alt="" width=200> -->
                <!-- <h1>Setsuna</h1>
                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure fugiat assumenda, debitis hic tenetur ab dolore recusandae sint, perferendis ullam vero, accusantium enim magni modi dignissimos molestias, eos atque aliquid. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta qui atque ab vel recusandae ipsa praesentium maxime facilis officia consequuntur facere quasi cumque, illum, dolor totam officiis perferendis. Obcaecati, quod.</p>
                <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p> -->
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
                                <?php

                                   // while ($data = mysqli_fetch_assoc($search_query_result)){
                                        echo "
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
                                        "; 
                                    //}
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
                                                    <strong>Successfully Added:</strong> " . $name . ".
                                                </div>";
                                        } else {
                                            echo "Error: " . $query . "<br>" . $con->error;
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
				<div class="col-xs-8">
                    <input type='text' id="SEARCH" onkeyup="searching()" class='form-control' autocomplete='on'>
                </div>
				<div class="col-xs-8 table-responsive">
					<table class="table" id="myTable">
						<thead>
							<tr>
							<th>Product</th>
							<th>Category</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Quantity Sold</th>
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
												<td><input type='hidden' class='form-control' name='trans_name' autocomplete='off' value='".$data['name']."'>".$data['name']."</td>
												<td><input type='hidden' class='form-control' name='trans_name' autocomplete='off' value='".$data['category']."'>".$data['category']."</td>
												<td><input type='hidden' class='form-control' name='trans_price' autocomplete='off' value='".$data['price']."'>".$data['price']."</td>
												<td><input type='hidden' class='form-control'  name='trans_qty' style='width:50px;' value='".$data['quantity']."'>".$data['quantity']."</td>
												<td><input type='hidden' class='form-control'  name='trans_qty' style='width:50px;' value='".$data['quantity_sold']."'>".$data['quantity_sold']."</td>
												<td>
													<button type='submit' name='' class=''>
														<img src='../img/edit.png'/ width=30>
													</button>
												</td>
												<td>
													<button type='submit' name='' class=''>
														<img src='../img/save.png'/ width=30>
													</button>
												</td>
											</tr>
										</form>
									"; 
								}
							?>
						</tbody>
					</table>
				</div>
            </div>
        <!-- </div> -->
        <!-- /#page-content-wrapper -->
        <footer>
            <!-- <div id='footer-wrapper'>
                <hr>
                <div id='details-wrapper'>
                    <span>
                        <strong>Copyright © DeeZee</strong> All rights reserved.
                    </span>
                    <span>
                        <strong>Version</strong> 1.0.0
                    </span>
                </div>

            </div> -->
            <?php
                mr_foot();
            ?>
        </footer>
    </div>
    <!-- /#wrapper -->

    

</body>
<script>
function searching() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("SEARCH");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
	td2 = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else if (td2.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>

</html>
