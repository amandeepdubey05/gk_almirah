<?php include("include/header.php");?>
<?php
    if(!isset($_SESSION['email'])) {
        header('location: signin.php');
    }

    if(isset($_GET['del'])) {
        $del = $_GET['del'];
        $query = "DELETE FROM `furniture_product` WHERE product_id = $del";
        if(mysqli_query($con,$query)){
            echo "<script> alert('This product has been deleted');</script>";
        }
    }

    if(isset($_GET['status'])) {
        $status = $_GET['status'];
    }
?>
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-md-3">
            <?php include("include/sidebar.php");?>
        </div>
        
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-1">
                    <i class="fad fa-th-list fa-6x text-primary"></i>
                </div> 
                <div class="col-md-7">
                    <h2 class="display-4 ml-2 mt-4">View Furniture Products:</h2>
                </div> 
                <div class="col-md-4">
                    <div class="font-weight-bold mt-5 text-right" style="font-size:24px;">
                        <label>Sort: </label> 
                        <a href="furniture_pro_view.php?status=publish">Publish</a> | <a href="furniture_pro_view.php?status=draft">Draft</a>
                    </div>
                </div> 
            </div>
            <hr>
            <table class="table table-responsive table-hover ">
                <thead class="thead-light">
                    <tr>
                        <th>Product Id</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Size</th>
                        <th>Price (Pkr)</th>
                        <th>Detail</th>
                        <th colspan="4">Actions (Edit/Del)</th>
                        <th colspan="4"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $status_condition = isset($status) ? "WHERE status = '$status'" : '';
                        $pr_query = "SELECT fp.product_id, fp.product_name, fp.product_size, fp.product_price, fp.product_desc, fp.product_img1, GROUP_CONCAT(cat.category SEPARATOR ', ') AS categories 
                                     FROM furniture_product fp 
                                     LEFT JOIN product_categories pc ON fp.product_id = pc.product_id 
                                     LEFT JOIN categories cat ON pc.category_id = cat.id 
                                     $status_condition
                                     GROUP BY fp.product_id 
                                     ORDER BY fp.product_id";
                        $pr_run = mysqli_query($con, $pr_query);
                                        
                        if(mysqli_num_rows($pr_run) > 0) {
                            while($pr_row = mysqli_fetch_array($pr_run)) {
                                $pid = $pr_row['product_id'];
                                $title = $pr_row['product_name'];
                                $categories = $pr_row['categories'];
                                $size = $pr_row['product_size'];
                                $price = $pr_row['product_price'];    
                                $detail = $pr_row['product_desc'];
                                $image = $pr_row['product_img1'];
                    ?> 
                    <tr>
                        <td><?php echo $pid;?></td>
                        <td width="120px">
                            <img src="img/<?php echo $image;?>" width="100%">
                        </td>
                        <td width="150px"><?php echo $title;?></td>
                        <td><?php echo $categories;?></td>
                        <td><?php echo $size;?></td>
                        <td><?php echo $price;?></td>
                        <td><?php echo $detail;?></td>
                        <td colspan="20" class="text-center"> 
                            <a title="Edit Product" href="furniture_pro_edit.php?pid=<?php echo $pid;?>" class="btn btn-primary btn-sm">
                                <i class="fal fa-edit"></i>
                            </a>
                            <a title="Delete Product" href="furniture_pro_view.php?del=<?php echo $pid;?>" class="btn btn-danger btn-sm">X </a>  
                        </td>
                    </tr>   
                    <?php 
                            }
                        } else {
                            echo "<h2 class='text-center text-secondary'>You haven't added any product yet</h2>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("include/footer.php"); ?>
