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
                                <th>Date</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
								<th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
									$con = mysqli_connect("localhost","root","","uptown");
									//connection();
									$search_query_result = mysqli_query($con,"select * from log order by id DESC");
                                   while ($data = mysqli_fetch_assoc($search_query_result)){
                                        echo "
                                            <form action='' method='POST'>
                                                <tr>
                                                    <td>".$data['date']."</td>
                                                    <td>".$data['product']."</td>
                                                    <td>".$data['price']."</td>
                                                    <td>".$data['quantity']."</td>
													<td>".$data['description']."</td>
                                                </tr>
                                            </form>
                                        "; 
                                    }
									mysqli_close($con);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <!-- </div> -->
        <!-- /#page-content-wrapper -->
        <footer>
            <div id='footer-wrapper'>
                <hr>
                <div id='details-wrapper'>
                    <span>
                        <strong>Copyright © DeeZee</strong> All rights reserved.
                    </span>
                    <span>
                        <strong>Version</strong> 1.0.0
                    </span>
                </div>

            </div>
            <?php
                mr_foot();
            ?>
        </footer>
    </div>
    <!-- /#wrapper -->

    

</body>


</html>
