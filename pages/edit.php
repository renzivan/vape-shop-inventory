<?php 
                                if(isset($_POST['save_button'])){
                                    $product_id = $_POST['product_id'];
                                    $edit_name = $_POST['edit_name'];
                                    $edit_category = $_POST['edit_category'];
                                    $edit_price = $_POST['edit_price'];
                                    $edit_quantity = $_POST['edit_qty'];
                                    $edit_quantity_sold = $_POST['edit_qty_sold'];
                                    $edit_quantity -= $edit_quantity_sold;
                                    $edit_query = "UPDATE product SET name = '$edit_name', category='$edit_category', price='$edit_price', quantity='$edit_quantity' WHERE id='$product_id'";
                                    if ($con->query($edit_query) === TRUE) {
                                        echo "<div class='alert alert-success alert-dismissible' style='display:inline-block;'>
                                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                                <strong>Succes!</strong>
                                            </div>";
                                    } else {
                                        echo "Error: " . $edit_query . "<br>" . $con->error;
                                        echo "<div class='alert alert-danger alert-dismissible' style='display:inline-block;'>
                                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                                <strong>Error!</strong> Adding product failed.
                                            </div>";
                                    }
                                }