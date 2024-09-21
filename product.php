<?php 
session_start();
include('include/header.php');

// Database connection parameters
$host = 'sql308.infinityfree.com';
$username = 'if0_37073296';
$password = '30EwWz6pitl2VA';
$database = 'if0_37073296_furnitureshopmain';

// Create a connection
$con = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Determine the current page
if (isset($_GET['page'])) {
    $page_id = $_GET['page'];
} else {
    $page_id = 1;
}

// Define the number of products to display per page
$required_pro = 30;
$product_start = ($page_id - 1) * $required_pro;

if (isset($_SESSION['id'])) {
    $custid = $_SESSION['id'];

    if (isset($_GET['cart_id'])) {
        $p_id = $_GET['cart_id'];

        $sel_cart = "SELECT * FROM cart WHERE cust_id = $custid and product_id = $p_id";
        $run_cart = mysqli_query($con, $sel_cart);

        if (mysqli_num_rows($run_cart) == 0) {
            $cart_query = "INSERT INTO `cart`(`cust_id`, `product_id`, quantity) VALUES ($custid, $p_id, 1)";
            if (mysqli_query($con, $cart_query)) {
                header("location:product.php");
            }
        } else {
            while ($row = mysqli_fetch_array($run_cart)) {
                $exist_pro_id = $row['product_id'];
                if ($p_id == $exist_pro_id) {
                    $error = "<script>alert('⚠️ This product is already in your cart');</script>";
                }
            }
        }
    }
} else if (!isset($_SESSION['email'])) {
    echo "<script> function a(){alert('⚠️ Login is required to add this product into cart');}</script>";
}

// Define the phone number for WhatsApp inquiries
$whatsapp_number = '9682021084'; // Replace with the actual phone number
?>

<!-- <div class="jumbotron">
    <h2 class="text-center mt-4">Choose Products</h2>
</div> -->

<div class="jumbotron jumbotron-custom text-white">
    <div class="container text-center">
        <h2 class="display-4 my-5">Explore Our Exclusive Products</h2>
        <p class="lead">Find the best Almirahs for your home and office</p>
    </div>
</div>



        <div class="container mt-5">
    <div class="row">
        <div class="col-md-3 col-12">
            <div class="list-group list-group-custom">
                <a href='product.php' class='list-group-item list-group-item-custom active'>
                    <i class='fas fa-home'></i> Products
                </a>
                <?php  
                $cat_query = "SELECT * FROM categories ORDER BY id ASC";
                $cat_run = mysqli_query($con, $cat_query);
                if (mysqli_num_rows($cat_run) > 0) {
                    while ($cat_row = mysqli_fetch_array($cat_run)) {
                        $cid = $cat_row['id'];
                        $cat_name = ucfirst($cat_row['category']);
                        echo "<a href='product.php?cat_id=$cid' class='list-group-item list-group-item-custom'>
                                <i class='fas fa-folder'></i> $cat_name
                              </a>";
                    }
                } else {
                    echo "<a class='list-group-item list-group-item-custom'>No Category</a>";
                }
                ?>
            </div>
        </div>
        <!-- Rest of the code continues... -->


        <div class="col-md-9 col-12">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <form method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search Products">
                            <div class="input-group-append">
                                <input class="btn btn-primary rounded-left" type="submit" name="sear_submit" value="Search">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <?php 
            if (isset($msg)) {
                echo $msg;
            } else if (isset($error)) {
                echo $error;
            }
            ?>

            <!-- Product list -->
            <div class="row">
                <?php   
                if (isset($_GET['cat_id']) && !empty($_GET['cat_id'])) {
                    $catid = $_GET['cat_id'];
                    $p_query = "
                        SELECT DISTINCT p.product_id, p.product_name, p.product_desc, p.product_price, p.product_size, p.product_img1, p.product_img2, p.product_img3 
                        FROM furniture_product p
                        JOIN product_categories pc ON p.product_id = pc.product_id
                        WHERE pc.category_id = $catid
                        GROUP BY p.product_id
                        ORDER BY p.product_id DESC
                        LIMIT $product_start, $required_pro
                    ";  
                } else if (isset($_POST['sear_submit']) && !empty($_POST['search'])) {
                    $search = $_POST['search'];
                    $p_query = "
                        SELECT DISTINCT p.product_id, p.product_name, p.product_desc, p.product_price, p.product_size, p.product_img1, p.product_img2, p.product_img3 
                        FROM furniture_product p
                        WHERE p.product_name LIKE '%$search%'
                        GROUP BY p.product_id
                        ORDER BY p.product_id DESC
                        LIMIT $product_start, $required_pro
                    ";
                } else {
                    $p_query = "
                        SELECT DISTINCT p.product_id, p.product_name, p.product_desc, p.product_price, p.product_size, p.product_img1, p.product_img2, p.product_img3 
                        FROM furniture_product p
                        GROUP BY p.product_id
                        ORDER BY p.product_id DESC
                        LIMIT $product_start, $required_pro
                    ";
                }

                $p_run = mysqli_query($con, $p_query);

                if (!$p_run) {
                    // Display SQL error if query fails
                    echo "<h3 class='text-center'>Error: " . mysqli_error($con) . "</h3>";
                } else if (mysqli_num_rows($p_run) > 0) {
                    while ($p_row = mysqli_fetch_array($p_run)) {
                        $pid = $p_row['product_id'];
                        $ptitle = $p_row['product_name'];
                        $p_price = $p_row['product_price'];
                        $img1 = $p_row['product_img1'];
                        $product_url = "product-detail.php?product_id=$pid"; // URL for the product details
                ?>
                        <div class="col-md-4 mt-4 col-6">
                            <div class="product-card h-100">
                                <!-- <img src="img/<?php echo $img1; ?>" class="product-img hover-effect" width="100%" height="190px"> -->
                                <a href="product-detail.php?product_id=<?php echo $pid; ?>">
                        <img src="img/<?php echo $img1; ?>" class="card-img-top" width="100%" height="190px alt="<?php echo $ptitle; ?>">
                    </a>
                                <div class="text-center mt-3 product-info">
                                    <h5 title="<?php echo $ptitle; ?>"><?php echo substr($ptitle, 0, 30); ?></h5>
                                    <h6>Rs. <?php echo $p_price; ?></h6>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-12 text-center">
                                        <a href="product.php?cart_id=<?php echo $pid; ?>" type="submit" onclick="a()" class="btn btn-primary btn-sm hover-effect">
                                            <i class="fa fa-shopping-cart"></i>
                                        </a>
                                        <a href="product-detail.php?product_id=<?php echo $pid; ?>" class="btn btn-default btn-sm hover-effect text-dark">
                                            <i class="fas fa-info-circle"></i> View Details
                                        </a>
                                        <!-- Inquire button -->
                                        <a href="https://wa.me/<?php echo $whatsapp_number; ?>" class="btn btn-success btn-sm hover-effect">
                                            <i class="fab fa-whatsapp"></i> Inquire
                                        </a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php  
                    }
                } else {
                    echo "<h3 class='text-center'> Products Are Not Available Yet </h3>";
                }
                ?>
            </div>
            <!-- End product list -->

           

            <ul class="pagination pagination-md mt-5">
                <?php 
                $count_query = "SELECT DISTINCT COUNT(DISTINCT p.product_id) AS total_products
                                FROM furniture_product p";

                $count_result = mysqli_query($con, $count_query);
                $total_products = mysqli_fetch_assoc($count_result)['total_products'];
                $total_pages = ceil($total_products / $required_pro);
                
                for ($i = 1; $i <= $total_pages; $i++) {
                    echo "<li class='page-item" . ($page_id == $i ? ' active' : '') . "'>
                        <a class='page-link' href='product.php?page=$i'>$i</a>
                    </li>";
                }
                ?>
            </ul>
            


        </div>
    </div>
</div>



<?php include('include/footer.php'); ?>

<!-- Additional CSS for styling -->
<style>
    /* Primary Color Scheme */
    :root {
        --primary-color: #28a745; /* Example primary color */
        --secondary-color: #f8f9fa; /* Light background */
        --text-color: #333;
        --button-hover-color: #218838;
    }

    /* General Styling */
    body {
        font-family: 'Roboto', sans-serif;
        color: var(--text-color);
        background-color: var(--secondary-color);
    }

    /* Product Card */
    .product-card {
        border: 1px solid #ddd;
        border-radius: 5px;
        overflow: hidden;
        transition: transform 0.3s ease;
        margin-bottom: 20px;
    }

    .product-card:hover {
        transform: scale(1.05);
    }

    /* Buttons */
    .btn-primary {
        background-color: var(--primary-color);
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: var(--button-hover-color);
    }

    .btn-default {
        background-color: transparent;
        border: 1px solid var(--primary-color);
        color: var(--primary-color);
    }

    .btn-default:hover {
        background-color: var(--primary-color);
        color: #fff;
    }

    /* Product Image */
    .product-img {
        height: 190px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .product-img:hover {
        transform: scale(1.1);
    }

    /* Pagination */
    .pagination .page-item.active .page-link {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    /* Tooltip */
    .tooltip {
        font-size: 14px;
        background-color: var(--primary-color);
        color: #fff;
    }

    .jumbotron-custom {
        position: relative;
        /* background-image: url('path-to-your-background-image.jpg'); Replace with your background image path */
        background-size: cover;
        background-position: center;
        color: #fff;
        padding: 100px 25px;
        margin-bottom: 0;
    }

    .jumbotron-custom::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5); /* Black overlay with opacity */
        z-index: 1;
    }

    .jumbotron-custom .container {
        position: relative;
        z-index: 2;
    }

    .jumbotron-custom h2 {
        font-size: 3.5rem;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .jumbotron-custom p.lead {
        font-size: 1.5rem;
        margin-bottom: 0;
    }

    .list-group-custom {
        border: none;
        padding: 0;
    }

    .list-group-item-custom {
        border: none;
        padding: 15px 20px;
        border-radius: 5px;
        margin-bottom: 10px;
        background-color: var(--secondary-color);
        transition: background-color 0.3s ease, color 0.3s ease;
        display: flex;
        align-items: center;
    }

    .list-group-item-custom i {
        margin-right: 10px;
        font-size: 1.2rem;
    }

    .list-group-item-custom:hover, 
    .list-group-item-custom.active {
        background-color: var(--primary-color);
        color: white;
    }

    .list-group-item-custom:hover i,
    .list-group-item-custom.active i {
        color: white;
    }

    @media (max-width: 767px) {
    .product-info {
        min-height: 100px; /* Adjust this value for smaller screens */
    }
}
</style>

<!-- Additional JS for functionalities -->
<script>
    // Smooth scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Tooltip initialization
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    
