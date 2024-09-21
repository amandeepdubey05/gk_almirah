<?php 
session_start();
include('include/header.php');
if(!isset($_SESSION['email'])){
    header('location: sign-in.php');
} 

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

if (isset($_SESSION['email'])) {
    $custid = $_SESSION['id'];

    if (isset($_GET['cart_id'])) {
        $p_id = $_GET['cart_id'];

        $sel_cart = "SELECT * FROM cart WHERE cust_id = $custid and product_id = $p_id ";
        $run_cart = mysqli_query($con, $sel_cart);

        if (mysqli_num_rows($run_cart) == 0) {
            $cart_query = "INSERT INTO `cart`(`cust_id`, `product_id`, quantity) VALUES ($custid, $p_id, 1)";
            if (mysqli_query($con, $cart_query)) {
                header('Location: index.php');
                exit();
            }
        } else if (mysqli_num_rows($run_cart) > 0) {
            while ($row = mysqli_fetch_array($run_cart)) {
                $exist_pro_id = $row['product_id'];
                if ($p_id == $exist_pro_id) {
                    $error = "<script>alert('⚠️ This product is already in your cart');</script>";
                }
            }
        }
    }
} else if (!isset($_SESSION['email'])) {
    echo "<script>function a(){alert('⚠️ Login is required to add this product into cart');}</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet"> <!-- Add your CSS file here -->
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        h1, h2, h4 {
            font-family: 'Playfair Display', serif;
        }

       .carousel-item img {
    width: 100%;
    height: auto; /* Maintain aspect ratio */
    max-height: 600px; /* Adjust this as needed */
}

        /* .carousel-inner img {
            margin-top: 65px !important;
            height: 600px;
            object-fit: cover;
        } */

        .carousel-item {
            transition: transform 2s ease, opacity 1s ease;
        }

        h1, h2 {
            font-weight: 700;
            color: #333;
            position: relative;
            display: inline-block;
        }

        h1::after, h2::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background: #ff5733;
            margin: 8px auto 0;
        }

        .section-heading {
            text-align: center;
            margin-bottom: 30px;
        }

        .highlight {
            color: #ff5733;
        }

        .hover-effect {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-effect:hover {
            transform: translateY(-10px);
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        }

        .card {
            border: none;
    border-radius: 8px; /* Rounded corners */
    overflow: hidden; /* Hide overflow */
        }

        .product-card {
            overflow: hidden;
            position: relative;
        }

        .product-card img {
            transition: transform 0.3s ease;
        }

        .product-card:hover img {
            transform: scale(1.1);
        }

        .product-card .card-body {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .feature-card .card-body {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .product-card h5, .product-card h6 {
            font-weight: bold;
        }

        .btn-custom {
            background-color: #ff5733;
            border-color: #ff5733;
            color: white;
        }

        .btn-custom:hover {
            background-color: #e74c3c;
            border-color: #e74c3c;
        }

        .feature-card h4 {
            color: #ff5733;
        }

        .feature-card p {
            font-size: 14px;
            color: #666;
        }

        .back-gray {
            background-color: #f9f9f9;
        }

        .back-peach{
            background-color: #fdd5b1;
        }

        .back-gray h2::after {
            background: #ff5733;
        }

        .card-icon {
            color: #ff5733;
        }

        .text-secondary {
            color: #999 !important;
        }

        .section-heading h2 {
    font-size: 2rem;
    text-align: center;
    margin-bottom: 1rem;
}

.section-heading .highlight {
    color: #ff5733; /* Highlight color */
}

/* Card Styling */
.equal-card {
    display: flex;
    flex-direction: column;
    height: 100%;
}

.card-body {
    flex: 1;
}

.card-icon {
    color: #ff5733; /* Icon color */
    transition: color 0.3s ease;
}

.card-icon:hover {
    color: #e74c3c; /* Darker icon color on hover */
}

.hover-effect {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.hover-effect:hover {
    transform: translateY(-10px); /* Lift effect on hover */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow effect */
}






        
    </style>
    <title>G.K Almirah</title>
    <style>
        .carousel-inner{
            margin-top: 100px !important; /* Adjust the value as needed */
        }

        @keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideInLeft {
    from { transform: translateX(-100%); }
    to { transform: translateX(0); }
}

@keyframes slideInRight {
    from { transform: translateX(100%); }
    to { transform: translateX(0); }
}

@keyframes zoomIn {
    from { transform: scale(0.5); }
    to { transform: scale(1); }
}

.fade-in {
    animation: fadeIn 1s ease-in-out;
}

.slide-in-left {
    animation: slideInLeft 1s ease-in-out;
}

.slide-in-right {
    animation: slideInRight 1s ease-in-out;
}

.zoom-in {
    animation: zoomIn 1s ease-in-out;
}

@media (max-width: 768px) {
    .section-heading h1 {
        font-size: 1.5rem;
    }

    .section-heading h2 {
        font-size: 1.25rem;
    }

    .card-body h5 {
        font-size: 1rem;
    }

    .card-body h6 {
        font-size: 0.9rem;
    }

    .card-img-top {
        height: auto;
        max-height: 300px;
    }
}

@media (max-width: 576px) {
    .section-heading h1 {
        font-size: 1.25rem;
    }

    .section-heading h2 {
        font-size: 1rem;
    }

    .card-body h5 {
        font-size: 0.95rem;
    }

    .card-body h6 {
        font-size: 0.85rem;
    }

    .card-img-top {
        height: auto;
        max-height: 200px;
    }

    .hover-effect:hover {
        transform: none;
        box-shadow: none;
    }
}

.carousel-indicators {
    position: absolute;
    top: 570px; /* Adjust as necessary */
    /* left: 50%; */
    /* transform: translateX(-50%);
    display: flex;
    justify-content: center; */
    /* padding-left: 0;
    margin-right: 15%;
    margin-left: 15%;
    list-style: none; */
    /* z-index: 15; */
}

    </style>
</head>
<body>

<div class="carousel slide mt-2" id="slider" data-ride="carousel" data-interval="2000">
     
    <ol class="carousel-indicators">
        <li data-target="#slider" data-slide-to="0" class="active"></li>
        <li data-target="#slider" data-slide-to="1"></li>
        <li data-target="#slider" data-slide-to="2"></li>
        <li data-target="#slider" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/WS11.jpg" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="img/slider2.jpg" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="img/slider3.jpg" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="img/slider4.jpg" class="d-block w-100"
        </div>
    </div>

        <!-- Controllers -->
        <a class="carousel-control-prev" data-slide="prev" href="#slider">
            <span class="carousel-control-prev-icon"></span>
        </a>

        <a class="carousel-control-next" href="#slider" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
</div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
    var carouselItems = document.querySelectorAll('.carousel-item');

    // Define the animation classes
    var animations = ['fade-in', 'slide-in-left', 'slide-in-right', 'zoom-in'];

    function setAnimation(item, animation) {
        item.classList.remove(...animations); // Remove any existing animations
        item.classList.add(animation);
    }

    // Initially apply animations to the active item
    var activeItem = document.querySelector('.carousel-item.active');
    setAnimation(activeItem, 'fade-in');

    // Add event listener for when the carousel slides
    $('#slider').on('slide.bs.carousel', function(e) {
        var nextIndex = $(e.relatedTarget).index();
        var nextItem = carouselItems[nextIndex];

        // Randomly select an animation for each slide
        var animation = animations[nextIndex % animations.length];
        setAnimation(nextItem, animation);
    });
});
</script>

<section class="back-peach pt-4 pb-4">
    <div class="container">
        <div class="section-heading">
            <h1>Latest <span class="highlight">Products</span></h1>
        </div>
        <div class="row">
            <?php    
            $p_query = "SELECT * FROM furniture_product ORDER BY product_id LIMIT 4";
            $p_run = mysqli_query($con, $p_query);

            if ($p_run && mysqli_num_rows($p_run) > 0) {
                while ($p_row = mysqli_fetch_array($p_run)) {
                    $pid = $p_row['product_id'];
                    $ptitle = $p_row['product_name'];
                    $p_price = $p_row['product_price'];
                    $img1 = $p_row['product_img1'];
                    $whatsapp_number = '9682021084'; // Replace with the actual phone number
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-4">
                <div class="card product-card hover-effect h-100">
                    <!-- <img src="img/<?php echo $img1; ?>" class="card-img-top" alt="<?php echo $ptitle; ?>"> -->
                   
                    <a href="product-detail.php?product_id=<?php echo $pid; ?>">
                        <img src="img/<?php echo $img1; ?>" class="card-img-top" alt="<?php echo $ptitle; ?>">
                    </a>
                    <div class="card-body">
                        <h5 class="text-truncate" title="<?php echo $ptitle;?>"><?php echo substr($ptitle, 0, 20); ?>...</h5>
                        <h6>Rs. <?php echo $p_price; ?></h6>
                        <div class="d-flex justify-content-between">
                        <a href="index.php?cart_id=<?php echo $pid;?>" class="btn btn-custom btn-sm" onclick="a()">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                        <a href="product-detail.php?product_id=<?php echo $pid;?>" class="btn btn-secondary btn-sm text-dark">
                            <i class="fas fa-info-circle"></i> View Details
                        </a>
                        <a href="https://wa.me/<?php echo $whatsapp_number; ?>" class="btn btn-success btn-sm">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                    </div>
                </div>
            </div>
            <?php  
                }
            } else {
                echo "<h3 class='text-center'> No Product Available Yet </h3>";
            }
            ?>
        </div>
    </div>
</section>

<section class="back-gray pt-4 pb-4">
    <div class="container">
        <div class="section-heading">
            <h1>Best Seller <span class="highlight">Products</span></h1>
        </div>
        <div class="row">
            <?php    
            
            // if (isset($_GET['cat_id']) && !empty($_GET['cat_id'])) {
            //     $catid = $_GET['cat_id'];
                $p_query = "
                    SELECT DISTINCT p.product_id, p.product_name, p.product_desc, p.product_price, p.product_size, p.product_img1, p.product_img2, p.product_img3 
                    FROM furniture_product p
                    JOIN product_categories pc ON p.product_id = pc.product_id
                    WHERE pc.category_id = 5
                    GROUP BY p.product_id
                    ORDER BY p.product_id DESC
                   
            "; 
                    $p_run = mysqli_query($con, $p_query);

            if ($p_run && mysqli_num_rows($p_run) > 0) {
                while ($p_row = mysqli_fetch_array($p_run)) {
                    $pid = $p_row['product_id'];
                    $ptitle = $p_row['product_name'];
                    $p_price = $p_row['product_price'];
                    $img1 = $p_row['product_img1'];
                    $whatsapp_number = '9682021084'; // Replace with the actual phone number
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-4">
                <div class="card product-card hover-effect h-100">
                    <!-- <img src="img/<?php echo $img1; ?>" class="card-img-top" alt="<?php echo $ptitle; ?>"> -->
                    <a href="product-detail.php?product_id=<?php echo $pid; ?>">
                        <img src="img/<?php echo $img1; ?>" class="card-img-top" alt="<?php echo $ptitle; ?>">
                    </a>
                    <div class="card-body">
                        <h5 class="text-truncate" title="<?php echo $ptitle;?>"><?php echo substr($ptitle, 0, 20); ?>...</h5>
                        <h6>Rs. <?php echo $p_price; ?></h6>
                        <div class="d-flex justify-content-between">
                        <a href="index.php?cart_id=<?php echo $pid;?>" class="btn btn-custom btn-sm" onclick="a()">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                        <a href="product-detail.php?product_id=<?php echo $pid;?>" class="btn btn-secondary btn-sm text-dark">
                            <i class="fas fa-info-circle"></i> View Details
                        </a>
                        <a href="https://wa.me/<?php echo $whatsapp_number; ?>" class="btn btn-success btn-sm">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
                </div>
            </div>
            <?php  
                }
            } else {
                echo "<h3 class='text-center'> No Product Available Yet </h3>";
            }
            ?>
        </div>
    </div>
</section>

<section class="best-seller-section">
    <div class="gallery-container">
        <div class="text-banner"><strong>Get Premium almirahs & accessories</strong><br>Dive into our finest creations</div>
        
        <?php    
        
        $p_query = "
            SELECT DISTINCT p.product_id, p.product_name, p.product_desc, p.product_price, p.product_size, p.product_img1, p.product_img2, p.product_img3 
            FROM furniture_product p
            JOIN product_categories pc ON p.product_id = pc.product_id
            WHERE pc.category_id = 1
            GROUP BY p.product_id
            ORDER BY p.product_id DESC
            LIMIT 3
        "; 
        $p_run = mysqli_query($con, $p_query);

        if ($p_run && mysqli_num_rows($p_run) > 0) {
            while ($p_row = mysqli_fetch_array($p_run)) {
                $pid = $p_row['product_id'];
                $ptitle = $p_row['product_name'];
                $img1 = $p_row['product_img1'];
        ?>
        <div class="gallery-item">
            <!-- <img src="img/<?php echo $img1; ?>" alt="<?php echo $ptitle; ?>"> -->
            <a href="product-detail.php?product_id=<?php echo $pid; ?>">
            <div class="img-wrapper">
                        <img src="img/<?php echo $img1; ?>" alt="<?php echo $ptitle; ?>">
                        </div>
                    </a>
            <div class="category-title"><?php echo $ptitle; ?></div>
        </div>
        <?php  
            }
        } else {
            echo "<h3 class='text-center'> No Product Available Yet </h3>";
        }
        ?>
    </div>
</section>

<section class="cust-seller-section">
    <div class="gallery-contain">
        <div class="text-bann"><strong>Get Your Products customized</strong><br>Your Product Your Choice</div>
        
        <?php    
        $p_query = "
            SELECT DISTINCT p.product_id, p.product_name, p.product_desc, p.product_price, p.product_size, p.product_img1, p.product_img2, p.product_img3 
            FROM furniture_product p
            JOIN product_categories pc ON p.product_id = pc.product_id
            WHERE pc.category_id = 4
            GROUP BY p.product_id
            ORDER BY p.product_id DESC
            LIMIT 3
        "; 
        $p_run = mysqli_query($con, $p_query);

        if ($p_run && mysqli_num_rows($p_run) > 0) {
            while ($p_row = mysqli_fetch_array($p_run)) {
                $pid = $p_row['product_id'];
                $ptitle = $p_row['product_name'];
                $img1 = $p_row['product_img1'];
                $img2 = $p_row['product_img2'];
        ?>
        
        <div class="gallery-items">
            <a href="product-detail.php?product_id=<?php echo $pid; ?>">
                <div class="img-container">
                    <img src="img/<?php echo $img1; ?>" alt="<?php echo $ptitle; ?>" class="img-left">
                     
                </div>
            </a>
            <div class="category-titles text-truncate"><?php echo $ptitle; ?></div>
        </div>
        <?php  
            }
        } else {
            echo "<h3 class='text-center'> No Product Available Yet </h3>";
        }
        ?>
    </div>
</section>

<style>
    .cust-seller-section {
        width: 100%;
        background-color: #bc987e;
        padding: 20px 0;
        color: #fff;
    }

    .gallery-contain {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        flex-wrap: wrap;
        padding: 10px;
        gap: 10px;
    }
    
    .text-bann {
        flex: 1;
        text-align: center;
        font-size: 3rem;
        color: #fff;
        margin-right: 5px;
        max-width: 70%; 
    }

    .gallery-items {
        flex: 1;
        background: #fff;
        border: 1px solid #fff;
        box-shadow: 0px 4px 8px rgba(0,0,0,.1);
        transition: transform .2s ease-in-out;
        padding: 10px;
        text-align: center;
        max-width: 250px;
        margin-left: 5px;
    }

    .img-container {
        display: flex;
        /* justify-content: space-between; */
        /* gap: 10px; */
        max-width: 280px;
        margin: 0 auto;
    }

    .img-container img {
        max-width: 100%;
        height: 50%;
        display: block;
        object-fit: contain;
    }

    .category-titles {
        width: 100%;
        background-color: #000;
        color: #fff;
        text-align: center;
        padding: .25em;
        font-size: 1rem;
        margin-top: 10px;
    }

    /* Media Queries for Responsiveness */
    @media (max-width: 768px) {
        .text-bann {
            font-size: 2.5rem;
        }

        .gallery-contain {
            flex-direction: column; /* Stack the text and image vertically on small screens */
            align-items: center;
        }

        .text-bann {
            text-align: center;
            margin-right: 0;
            margin-bottom: 20px;
        }
        
        .gallery-items {
            width: 100%; /* Full width on mobile */
        }
    }

    @media (max-width: 576px) {
        .text-bann {
            font-size: 2rem;
        }

        .img-container {
            flex-direction: column; /* Stack images on top of each other on small screens */
        }
    }
</style>
<style>
.best-seller-section {
         width: 100%;
         background-color: #000;
        padding: 20px 0;
        color: #fff;
    }
    

    .gallery-container {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
        gap: 20px;
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .text-banner {
        flex-basis: 100%;
        text-align: center;
        font-size: 2.5rem;
        color: #fff;
        margin-bottom: 40px;
    }

    .gallery-item {
        flex-basis: calc(33.333% - 20px);
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
        transition: transform .3s ease, box-shadow .3s ease;
        cursor: pointer;
        text-align: center;
    }

    .gallery-item:hover {
        transform: translateY(-10px);
        box-shadow: 0px 16px 32px rgba(0, 0, 0, 0.2);
    }

    .img-wrapper {
        position: relative;
        width: 100%;
        height: 70%;
        /* padding-top: 60%;  */
        /* padding-left: 30%;  */
        background-color: #f8f8f8; /* Fallback background color */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .img-wrapper img {
        position: relative;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        width: 100%;
        height: 50%;
        /* margin: auto; */
        object-fit: contain;
        transition: transform .3s ease;
    }

    .gallery-item:hover .img-wrapper img {
        transform: scale(1.05);
    }

    .category-title {
        width: 100%;
        background-color: #000;
        color: #fff;
        text-align: center;
        padding: 10px;
        font-size: 1rem;
        letter-spacing: 1px;
        transition: background-color .3s ease;
    }

    .gallery-link {
        text-decoration: none;
        color: inherit;
        display: block;
        height: 100%;
    }

    .gallery-item:hover .category-title {
        background-color: #444;
    }
</style>

<section class="back-peach pt-4">
    <div class="container">
        <div class="section-heading">
            <h1>Features of Our <span class="highlight">Products</span></h1>
        </div>

        <div class="row mt-4">

        <div class="col-md-4 d-flex justify-content-center mb-4">
                <div class="card feature-card hover-effect h-100">
                    <img src="img/powder-coated.jpg" class="card-img-tops" alt="Powder Coated">
                    <div class="card-body">
                        <h4 class="text-center">Powder Coated</h4>
                        <p class="text-center">100% powder coated steel wardrobes which is fully rust-resistant</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex justify-content-center mb-4">
                <div class="card feature-card hover-effect h-100">
                    <img src="img/machine.jpeg" class="card-img-tops" alt="CNC Machines">
                    <div class="card-body">
                        <h4 class="text-center">CNC Machines</h4>
                        <p class="text-center">Product is ready by CNC machines (bending and shearing machines, etc).</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex justify-content-center mb-4">
                <div class="card feature-card hover-effect h-100">
                    <img src="img/steel.jpg" class="card-img-tops" alt="Rustproof and Stainless Steel">
                    <div class="card-body">
                        <h4 class="text-center">Rustproof and Stainless Steel</h4>
                        <p class="text-center">Stainless CR sheet of top brand like TATA STEEL,BHUSHAN STEEL is used</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex justify-content-center mb-4">
                <div class="card feature-card hover-effect h-100">
                    <img src="img/warranty.jpg" class="card-img-tops" alt="Warranty up to 10 Years">
                    <div class="card-body">
                        <h4 class="text-center">Warranty up to 10 Years</h4>
                        <p class="text-center">Paint & Lockers have a warranty of up to 10 years.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex justify-content-center mb-4">
                <div class="card feature-card hover-effect h-100">
                    <img src="img/satisfaction.jpg" class="card-img-tops" alt="Client Satisfaction">
                    <div class="card-body">
                        <h4>Client Satisfaction</h4>
                        <p>High quality at an affordable price.</p>
                    </div>
                </div>
            </div>

              <div class="col-md-4 d-flex justify-content-center mb-4">
                <div class="card feature-card hover-effect h-100">
                    <img src="img/time.jpg" class="card-img-tops" alt="Given Time">
                    <div class="card-body">
                        <h4 class="text-center">Given Time</h4>
                        <p class="text-center">We provide our service within the given time.</p>
                    </div>
                </div>
            </div>

            
            

            

            
        </div>
    </div>
</section>

<style>
.back-peach {
    background-color: #fdd5b1;
}
.card-body {
    flex: 1; /* Ensures the card body takes up available space */
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
}

.card {
    border: none;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 100%; /* Adjust width for responsiveness */
    width: 300px;
    height: 330px; 
    margin: auto;
}

.card-img-tops {
    height: 220px !important;
    object-fit: cover;
}

.feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
}

.section-heading h1 {
    font-weight: bold;
    color: #333;
    text-align: center;
    margin-bottom: 1.5rem;
}

.section-heading .highlight {
    color: #ff5733;
}

/* Responsive adjustments */
/* Responsive adjustments */
/* Responsive adjustments */
@media (max-width: 768px) {
    .col-md-4 {
        flex: 1 0 50%; /* Two cards per row on medium screens */
        max-width: 50%; /* Ensure cards do not exceed 50% of container width */
    }
    .card {
        width: 100%;
        height: 250px; /* Adjust card height for smaller screens */
    }

    .card-img-tops {
        height: 120px; /* Adjust image height for smaller screens */
    }

     .card-body{
        height: 80px; /* Further reduce image height for mobile */
    }

}

@media (max-width: 576px) {
    .col-md-4 {
        flex: 1 0 50%; /* Two cards per row on small screens */
        max-width: 50%; /* Ensure cards do not exceed 50% of container width */
    }

    .section-heading h1 {
        font-size: 1 rem; /* Smaller heading for mobile devices */
    }

    

    
    .card-body{
        height: 80px; /* Further reduce image height for mobile */
    }
    .card {
        height: 250px; /* Ensure consistent card height on mobile */
    }

    .card-img-tops {
        height: 120px; /* Further reduce image height for smaller screens */
    }

    .card-body h4 {
        font-size: 1rem;
    }
}

</style>

<style>
/* Custom media query for smaller screens */
@media (max-width: 767.98px) {
    .row {
        display: flex;
        flex-wrap: wrap;
    }
    .col-sm-6 {
        flex: 0 0 50%;
        max-width: 50%;
    }
}

/* Optional: Adjust card height for smaller screens */
@media (max-width: 767.98px) {
    .card {
        margin-bottom: 1.5rem; /* Add some margin for spacing between cards */
    }
}
</style>

<section class="back-gray pt-4 pb-4">
    <div class="container">
        <div class="section-heading text-center mb-4">
            <h2>How It <span class="highlight">Works</span></h2>
        </div>
        <div class="row">
            <!-- Card 1 -->
            <div class="col-sm-6 col-md-3 p-3">
                <div class="card hover-effect equal-card h-100">
                    <div class="card-body mt-3 text-center">
                        <i class="fas fa-shopping-bag fa-3x card-icon"></i>
                        <div class="heading mt-2">
                            <h4>Product</h4>
                            <h6 class="text-secondary">Choose your own product</h6>
                        </div>
                        <p class="mt-2">Add product to cart. Enter your shipping address, then checkout.</p>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-sm-6 col-md-3 p-3">
                <div class="card hover-effect equal-card h-100">
                    <div class="card-body mt-3 text-center">
                        <i class="fas fa-thumbs-up fa-3x card-icon"></i>
                        <div class="heading mt-2">
                            <h4>Receive</h4>
                            <h6 class="text-secondary">Receive Your Product</h6>
                        </div>
                        <p class="mt-2">Your product will be delivered to you within 7 working days.</p>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-sm-6 col-md-3 p-3">
                <div class="card hover-effect equal-card h-100">
                    <div class="card-body mt-3 text-center">
                        <i class="fas fa-cogs fa-3x card-icon"></i>
                        <div class="heading mt-2">
                            <h4>Product Customization</h4>
                            <h6 class="text-secondary">Customize Your Product</h6>
                        </div>
                        <p class="mt-2">Get your product customized according to your preference.</p>
                    </div>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="col-sm-6 col-md-3 p-3">
                <div class="card hover-effect equal-card h-100">
                    <div class="card-body mt-3 text-center">
                        <i class="fas fa-wallet fa-3x card-icon"></i>
                        <div class="heading mt-2">
                            <h4>Cash</h4>
                            <h6 class="text-secondary">Cash on Delivery</h6>
                        </div>
                        <p class="mt-2">On delivery of your product, pay cash at the moment of receipt.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php 
include('include/footer.php'); 
?>

<!-- Include jQuery, Popper.js, and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
