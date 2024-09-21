<?php 
session_start();
include('include/header.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G.K Almirah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="img/logogk.jpg" rel="icon">
    
    <style>
        /* Custom Styles */
        .navbar-custom {
            /* background-color: #28a745 !important; */
            padding-bottom: 20px !important;
        }
        .carousel-item img {
            height: 500px;
            object-fit: cover;
            transition: transform 0.2s ease-in-out;
        }
        .carousel-item img:hover {
            transform: scale(1.1);
        }
        .share-btn-group {
            margin-top: 20px;
        }
        .share-btn {
            margin-right: 10px;
            margin-bottom: 10px;
        }
        .share-btn i {
            margin-right: 5px;
        }
        .hero-image {
            width: 100%;
            height: auto;
            border-radius: 4px;
        }
        .jumbotron {
            background: #d0f0c0 !important;
            margin-bottom: 3rem;
            padding-bottom: 20px !important;
        }
        .jumbotron h2 {
            font-size: 2.5rem;
            padding-bottom: 30px !important;
            padding-top: 20px !important;
        }
        .card {
            margin-top: 2rem;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            padding: 2rem;
        }
        .form-control {
            border-radius: 0;
        }
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            filter: invert(1);
        }
        .review {
            margin-top: 1.5rem;
        }
        .quantity-input {
            display: flex;
            align-items: center;
        }
        .quantity-input input {
            text-align: center;
            width: 70px;
            margin: 0 5px;
        }
        .copy-link-btn {
            margin-top: 10px;
        }
        .jumbotron-custom {
            position: relative;
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
            background: rgba(0, 0, 0, 0.5);
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
        .thumbnail {
            width: 80px;
            height: auto;
            margin-bottom: 5px;
        }
        .main-image-container {
            text-align: left;
        }
        .main-image-container img {
            max-width: 100%;
            height: 500px;
        }
        .list-group-item.active,
        .list-group-item {
            border: none;
        }
        .feedback-section {
            margin-top: 30px;
        }
        .feedback-card {
            margin-bottom: 15px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .feedback-card .card-body {
            padding: 20px;
        }
        .feedback-form {
            margin-top: 20px;
        }
    </style>
</head>
<body>
   

    <div class="jumbotron jumbotron-custom text-white">
        <div class="container text-center">
            <h2 class="display-4 my-5">Explore Our Exclusive Products</h2>
            <p class="lead">You can order customized sizes and colors for each product, with various options available</p>
        </div>
    </div>

    <main>
        <div class="container">
            <center>
                <div class="w-50">
                    <?php if (isset($msg)) { echo $msg; } ?>
                </div>
            </center>

            <section class="my-6">
                <div class="row">
                    
                    <?php 
                    // session_start();
                    // include('include/header.php'); 
                    
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

                    if (isset($_GET['product_id'])) {
                        $p_id = $_GET['product_id'];

                        // Fetch product details
                        $pdetail_query = "SELECT * FROM furniture_product WHERE product_id = $p_id";
                        $pdetail_run = mysqli_query($con, $pdetail_query);

                        if (mysqli_num_rows($pdetail_run) > 0) {
                            $pdetail_row = mysqli_fetch_array($pdetail_run);
                            $pid = $pdetail_row['product_id'];
                            $title = $pdetail_row['product_name'];
                            $detail = $pdetail_row['product_desc'];
                            $price = $pdetail_row['product_price'];
                            $size = $pdetail_row['product_size'];
                            $img1 = $pdetail_row['product_img1'];
                            $img2 = $pdetail_row['product_img2'];
                            $img3 = $pdetail_row['product_img3'];
                            $mat = $pdetail_row['product_mat'];
                            $model = $pdetail_row['product_model'];
                            $warranty = $pdetail_row['product_warranty'];
                            $door = $pdetail_row['product_door'];
                            $drawer = $pdetail_row['product_drawer'];
                            $paint = $pdetail_row['product_paint'];
                            $feature = $pdetail_row['product_feature'];


                            // Fetch category
                            $cat_query = "SELECT c.category FROM categories c 
                                          JOIN product_categories pc ON c.id = pc.category_id 
                                          WHERE pc.product_id = $p_id LIMIT 1";
                            $cat_run = mysqli_query($con, $cat_query);
                            if (mysqli_num_rows($cat_run) > 0) {
                                $cat_row = mysqli_fetch_array($cat_run);
                                $category = ucfirst($cat_row['category']);
                            }
                        } else {
                            echo "<h3 class='text-center'>Product not found</h3>";
                            exit;
                        }
                    }
                    ?>

                    <!-- Define the phone number for WhatsApp inquiries -->
                    <?php $whatsapp_number = '9682021084'; ?>
                    <!-- Product URL -->
                    <?php $product_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>

                 


<div class="row">
    <div class="col-md-2 mb-4 mb-md-0">
        <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#" role="tab" aria-controls="home">
                <img src="img/<?php echo $img1; ?>" class="img-fluid thumbnail" alt="Thumbnail 1" data-main="img/<?php echo $img1; ?>">
            </a>
            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#" role="tab" aria-controls="profile">
                <img src="img/<?php echo $img2; ?>" class="img-fluid thumbnail" alt="Thumbnail 2" data-main="img/<?php echo $img2; ?>">
            </a>
            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#" role="tab" aria-controls="messages">
                <img src="img/<?php echo $img3; ?>" class="img-fluid thumbnail" alt="Thumbnail 3" data-main="img/<?php echo $img3; ?>">
            </a>
        </div>
    </div>
    <div class="col-md-9">
        <div class="main-image-container">
            <img id="mainImage" src="img/<?php echo $img1; ?>" class="img-fluid" alt="Main Image" data-action="zoom">
        </div>
    </div>
</div>


<!-- Include the CSS and JS here -->

<style>
    * {box-sizing: border-box;}

.thumbnail {
    width: 80px; /* Set your desired width for thumbnails */
    height: auto; /* Maintain aspect ratio */
    margin-bottom: 5px; /* Add some spacing between thumbnails */
}

.main-image-container {
    text-align: left; /* Center the main image */
    position: relative;
    width: 100%;
    height: auto;
    overflow: hidden;
}

/* .main-image-container img {
    max-width: 100%;
    height: 500px; 
    transition: transform 0.5s ease;
} */

.list-group-item.active {
    border: none; /* Remove the border when a thumbnail is active */
}

.list-group-item {
    border: none; /* Remove the border when a thumbnail is active */
}

/* Zoomed area styling */
.zoom-lens {
    position: absolute;
    border: 1px solid #d4d4d4;
    width: 100px;
    height: 100px;
    visibility: visible; /* Ensure the lens is visible */
}

.main-image-container {
    position: relative;
    width: 500px;
}

.zoom-result {
    position: absolute;
    border: 1px solid #000; /* Black border for visibility */
    width: 200px;
    height: 200px;
    left: 105%;
    top: 0;
    overflow: hidden;
    display: none;
    background-repeat: no-repeat;
    z-index: 999;
}



/* .zoom-result img {
    position: absolute;
    max-width: none;
} */

/* Responsive adjustments for screens smaller than 767px */
@media (max-width: 767px) {
    /* Thumbnail adjustments */
    .thumbnail {
        width: 80px; /* Fixed width for thumbnails */
        margin: 0 5px; /* Horizontal spacing between thumbnails */
        display: inline-block; /* Keep thumbnails inline */
    }

    /* Center the main image */
    .main-image-container {
        text-align: center; /* Center the main image */
        position: relative;
        width: 100%;
        height: auto;
        overflow: hidden;
    }

    .main-image-container img {
        max-width: 100%;
        height: auto; /* Adjust image height for small screens */
        transition: transform 0.5s ease;
    }

    /* Layout adjustments */
    .row {
        flex-direction: column; /* Stack thumbnails below the main image */
        align-items: center; /* Center the content */
    }

    .col-md-2, .col-md-9 {
        max-width: 100%; /* Full width for thumbnails and main image */
        padding: 0 15px; /* Padding for better spacing */
    }

    .col-md-2 {
        order: 2; /* Move thumbnails below the main image */
        margin-top: 15px; /* Space between main image and thumbnails */
        text-align: center; /* Center thumbnails on mobile */
    }

    .col-md-9 {
        order: 1; /* Main image appears above thumbnails */
    }
}

/* Additional adjustments for very small screens (max-width: 576px) */
@media (max-width: 576px) {
    .main-image-container img {
        height: auto; /* Adjust image height for very small screens */
    }

    .thumbnail {
        width: 60px; /* Smaller thumbnails for extra small screens */
    }
}



</style>       

                            <div class="col-md-5">
    <h1 class="font-weight-light"><?php echo $title; ?></h1>
    <p class="text-muted"><strong>Category: </strong><?php echo $category; ?></p>

<div class="col-md-5">
    <ul style="list-style-type: disc; padding-left: 20px; margin: 0;">
        <li style="margin: 0; padding: 0; display: inline-block; white-space: nowrap;">
            <span class="text-muted"><strong>Material: </strong><?php echo $mat; ?></span>
        </li>
    </ul>
</div>
    <div class="col-md-5">
    <ul style="list-style-type: disc; padding-left: 20px; margin: 0;">
        <li style="margin: 0; padding: 0; display: inline-block; white-space: nowrap;">
            <span class="text-muted"><strong>Model Type: </strong><?php echo $model; ?></span>
        </li>
    </ul>
</div>
    <div class="col-md-5">
    <ul style="list-style-type: disc; padding-left: 20px; margin: 0;">
        <li style="margin: 0; padding: 0; display: inline-block; white-space: nowrap;">
            <span class="text-muted"><strong>Warranty: </strong><?php echo $warranty; ?></span>
        </li>
    </ul>
</div>
    <div class="col-md-5">
    <ul style="list-style-type: disc; padding-left: 20px; margin: 0;">
        <li style="margin: 0; padding: 0; display: inline-block; white-space: nowrap;">
            <span class="text-muted"><strong>No. of Doors: </strong><?php echo $door; ?></span>
        </li>
    </ul>
</div>
    <div class="col-md-5">
    <ul style="list-style-type: disc; padding-left: 20px; margin: 0;">
        <li style="margin: 0; padding: 0; display: inline-block; white-space: nowrap;">
            <span class="text-muted"><strong>No. of Drawers: </strong><?php echo $drawer; ?></span>
        </li>
    </ul>
</div>
    <div class="col-md-5">
    <ul style="list-style-type: disc; padding-left: 20px; margin: 0;">
        <li style="margin: 0; padding: 0; display: inline-block; white-space: nowrap;">
            <span class="text-muted"><strong>Paint type: </strong><?php echo $paint; ?></span>
        </li>
    </ul>
</div>
<div class="col-md-5">
    <ul style="list-style-type: disc; padding-left: 20px; margin: 0;">
        <li style="margin: 0; padding: 0; display: inline-block; white-space: nowrap;">
            <span class="text-muted"><strong> </strong><?php echo $feature; ?></span>
        </li>
    </ul>
</div>


<div class="color-palette">
    <span>BODY COLOR : </span>
    <div class="colors">
        <div class="color-item">
            <div class="color-circle selected" style="background-color: #A0ADAC;"><p class="color-letter">P</p></div> 
        </div>
        <div class="color-item">
            <div class="color-circle selected" style="background-color: #FFFFFF;"><p class="color-letter">W</p></div>
        </div>
    </div>
</div>

<div class="color-palette">
    <span>DOOR COLOR : </span>
    <div class="colors">
        <div class="color-item">
            <div class="color-circle selected" style="background-color: #6f4e37;"><p class="color-letter">F</p></div>    
        </div>
        <div class="color-item">
            <div class="color-circle selected" style="background-color: #E61D2B;"><p class="color-letter">C</p></div>   
        </div>
        <div class="color-item">
            <div class="color-circle selected" style="background-color: #800000;"><p class="color-letter">M</p></div>   
        </div>
        <div class="color-item">
            <div class="color-circle selected" style="background-color: #ff0000;"><p class="color-letter">R</p></div>   
        </div>
    </div>
</div>

<div>
    <p class="color-letter">P-Prince Gray W-White F-Coffee C-Coka M-Maroon R-Red</p>
</div>


<style>
.color-palette {
    display: flex;
    align-items: center;
}

.colors {
    display: flex;
    gap: 10px;
}

.color-item {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.color-circle {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    margin-bottom: 5px;
}

.color-letter {
    margin: 0;
    font-size: 16px;
    text-align: center;
}
</style>

        
                            <h2 class="text-success font-weight-bold">Rs.<?php echo $price; ?></h2>
                            <p><strong>Size: </strong><?php echo $size; ?></p>

                            <div class="quantity-input mb-3">
                                <label for="quantity"><strong>Quantity:</strong></label>
                                <button type="button" class="btn btn-outline-secondary" onclick="decrementQuantity()">-</button>
                                <input type="number" id="quantity" name="qty" class="form-control" value="1" min="1">
                                <button type="button" class="btn btn-outline-secondary" onclick="incrementQuantity()">+</button>
                            </div>
                            <!-- Add to Cart Form -->


<form action="" method="POST">
    <input type="hidden" name="form_type" value="add_to_cart">
    <input type="hidden" name="qty" value="1">
    <button type="submit" name="submit" class="btn btn-primary btn-md mr-1 mb-2">Add to cart</button>
</form>


             

                            <div class="share-btn-group">
                            <a href="https://wa.me/<?php echo $whatsapp_number; ?>" class="btn btn-success btn-md mr-1 mb-2 hover-effect">
                                <i class="fab fa-whatsapp"></i> Inquire
                            </a>
                                <button class="btn btn-primary share-btn" onclick="copyToClipboard()"><i class="fa fa-link"></i> Copy Link</button>

                                <button class="btn btn-success share-btn" onclick="shareOnWhatsApp('<?php echo $product_url; ?>')">
        <i class="fab fa-whatsapp"></i> Share on WhatsApp</button>
                                <button class="btn btn-info share-btn" onclick="shareOnFacebook('<?php echo $product_url; ?>')"><i class="fab fa-facebook"></i> Share on Facebook</button>
                                <button class="btn btn-secondary share-btn" onclick="shareOnTwitter('<?php echo $product_url; ?>')"><i class="fab fa-twitter"></i> Share on Twitter</button>
                                <button class="btn btn-danger share-btn" onclick="shareOnPinterest('<?php echo $product_url; ?>')"><i class="fab fa-pinterest"></i> Share on Pinterest</button>
                                
                            </div>
                            

                            <!-- <div class="quantity-input mt-3">
                                <label for="quantity" class="mr-2">Quantity:</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1">
                            </div> -->
                            
                            

<!-- Add to Cart Form -->

                            
                            
                        </div>
                    </div>
                    <!-- Inquire button -->
                    

                    <script>


document.addEventListener('DOMContentLoaded', function() {
    new Zooming().listen('img[data-action="zoom"]');
});




                        // Copy product link to clipboard
                        function copyToClipboard() {
                            var dummy = document.createElement('textarea');
                            dummy.value = window.location.href;
                            document.body.appendChild(dummy);
                            dummy.select();
                            document.execCommand('copy');
                            document.body.removeChild(dummy);
                            alert('Product link copied to clipboard');
                        }

                        // Share on WhatsApp
                        function shareOnWhatsApp(url) {
        var encodedURL = encodeURIComponent(url); // Encode the URL properly
        var whatsappUrl = "https://wa.me/?text=" + encodedURL; // WhatsApp sharing URL with the product URL

        window.location.href = whatsappUrl; // Redirect to the WhatsApp URL
    }

                        // Share on Facebook
                        function shareOnFacebook(productUrl) {
                            var facebookUrl = 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(productUrl);
                            window.open(facebookUrl, '_blank');
                        }

                        // Share on Twitter
                        function shareOnTwitter(productUrl) {
                            var message = 'Check out this product!';
                            var twitterUrl = 'https://twitter.com/intent/tweet?text=' + encodeURIComponent(message) + '&url=' + encodeURIComponent(productUrl);
                            window.open(twitterUrl, '_blank');
                        }

                        // Share on Pinterest
                        function shareOnPinterest(productUrl) {
                            var pinterestUrl = 'https://pinterest.com/pin/create/button/?url=' + encodeURIComponent(productUrl);
                            window.open(pinterestUrl, '_blank');
                        }

                        // Change main image on thumbnail click
                        document.querySelectorAll('.thumbnail').forEach(thumbnail => {
                            thumbnail.addEventListener('click', function() {
                                document.getElementById('mainImage').src = this.getAttribute('data-main');
                            });
                        });

                        $(document).ready(function () {
            $('.thumbnail').on('click', function () {
                var newSrc = $(this).data('main');
                $('#mainImage').attr('src', newSrc);
            });
        });

        function incrementQuantity() {
            var quantity = parseInt(document.getElementById('quantity').value);
            document.getElementById('quantity').value = quantity + 1;
        }

        function decrementQuantity() {
            var quantity = parseInt(document.getElementById('quantity').value);
            if (quantity > 1) {
                document.getElementById('quantity').value = quantity - 1;
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
    const mainImage = document.getElementById('mainImage');
    const zoomLens = document.createElement('div');
    const zoomResult = document.createElement('div');
    const zoomedImage = new Image();

    zoomLens.classList.add('zoom-lens');
    zoomResult.classList.add('zoom-result');

    zoomResult.appendChild(zoomedImage);
    mainImage.parentElement.appendChild(zoomLens);
    mainImage.parentElement.appendChild(zoomResult);

    function getCursorPos(e) {
        const rect = mainImage.getBoundingClientRect();
        const x = e.pageX - rect.left - window.pageXOffset;
        const y = e.pageY - rect.top - window.pageYOffset;
        return { x, y };
    }

    function moveLens(e) {
        e.preventDefault();

        const pos = getCursorPos(e);
        let x = pos.x - zoomLens.offsetWidth / 2;
        let y = pos.y - zoomLens.offsetHeight / 2;

        if (x > mainImage.width - zoomLens.offsetWidth) x = mainImage.width - zoomLens.offsetWidth;
        if (x < 0) x = 0;
        if (y > mainImage.height - zoomLens.offsetHeight) y = mainImage.height - zoomLens.offsetHeight;
        if (y < 0) y = 0;

        zoomLens.style.left = x + 'px';
        zoomLens.style.top = y + 'px';

        const zoomRatioX = zoomedImage.width / mainImage.width;
        const zoomRatioY = zoomedImage.height / mainImage.height;

        zoomedImage.style.left = -x * zoomRatioX + 'px';
        zoomedImage.style.top = -y * zoomRatioY + 'px';
    }

    mainImage.addEventListener('mouseenter', function () {
        zoomLens.style.visibility = 'visible';
        zoomResult.style.display = 'block';
        zoomedImage.src = mainImage.src;
    });

    mainImage.addEventListener('mousemove', moveLens);
    mainImage.addEventListener('mouseleave', function () {
        zoomLens.style.visibility = 'hidden';
        zoomResult.style.display = 'none';
    });
});

    
   
document.addEventListener('DOMContentLoaded', function () {
    const mainImage = document.getElementById('mainImage');
    const zoomLens = document.createElement('div');
    const zoomResult = document.createElement('div');
    const zoomedImage = new Image();

    zoomLens.classList.add('zoom-lens');
    zoomResult.classList.add('zoom-result');

    zoomResult.appendChild(zoomedImage);
    mainImage.parentElement.appendChild(zoomLens);
    mainImage.parentElement.appendChild(zoomResult);

    function getCursorPos(e) {
        const rect = mainImage.getBoundingClientRect();
        const x = e.pageX - rect.left - window.pageXOffset;
        const y = e.pageY - rect.top - window.pageYOffset;
        return { x, y };
    }

    function moveLens(e) {
        e.preventDefault();

        const pos = getCursorPos(e);
        let x = pos.x - zoomLens.offsetWidth / 2;
        let y = pos.y - zoomLens.offsetHeight / 2;

        if (x > mainImage.width - zoomLens.offsetWidth) x = mainImage.width - zoomLens.offsetWidth;
        if (x < 0) x = 0;
        if (y > mainImage.height - zoomLens.offsetHeight) y = mainImage.height - zoomLens.offsetHeight;
        if (y < 0) y = 0;

        zoomLens.style.left = x + 'px';
        zoomLens.style.top = y + 'px';

        const zoomRatioX = zoomedImage.width / mainImage.width;
        const zoomRatioY = zoomedImage.height / mainImage.height;

        zoomedImage.style.left = -x * zoomRatioX + 'px';
        zoomedImage.style.top = -y * zoomRatioY + 'px';
    }

    mainImage.addEventListener('mouseenter', function () {
        zoomLens.style.visibility = 'visible';
        zoomResult.style.display = 'block';
        zoomedImage.src = mainImage.src;
    });

    mainImage.addEventListener('mousemove', moveLens);
    mainImage.addEventListener('mouseleave', function () {
        zoomLens.style.visibility = 'hidden';
        zoomResult.style.display = 'none';
    });
});


                    </script>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $form_type = $_POST['form_type'];

    if ($form_type == 'add_to_cart') {
        // Handle Add to Cart
        if (isset($_SESSION['email'])) {
            $custid = $_SESSION['id'];
            $qty = isset($_POST['qty']) ? (int)$_POST['qty'] : 1;

            if (isset($p_id)) {
                $sel_cart = "SELECT * FROM cart WHERE cust_id = $custid AND product_id = $p_id";
                $run_cart = mysqli_query($con, $sel_cart);

                if (mysqli_num_rows($run_cart) == 0) {
                    $cart_query = "INSERT INTO cart(cust_id, product_id, quantity) VALUES ($custid, $p_id, $qty)";
                    if (mysqli_query($con, $cart_query)) {
                        header("Location: product-detail.php?product_id=$p_id");
                        exit();
                    } else {
                        echo "<div class='alert alert-danger text-center'>Failed to add product to cart. Please try again.</div>";
                    }
                } else {
                    echo "<script>alert('⚠️ This product is already in your cart');</script>";
                }
            } else {
                echo "<div class='alert alert-danger text-center'>Product ID is missing.</div>";
            }
        } else {
            echo "<div class='alert alert-danger text-center'>You must be logged in to add products to the cart.</div>";
        }
    } elseif ($form_type == 'submit_feedback') {
        // Handle Feedback Submission
        $p_id = $_POST['product_id'];
        $feedback_text = mysqli_real_escape_string($con, $_POST['feedback_text']);
        $feedback_date = date('Y-m-d H:i:s');
        $customer_name = mysqli_real_escape_string($con, $_POST['customer_name']);
        $rating = intval($_POST['rating']);

        $insert_feedback_query = "INSERT INTO product_feedback (product_id, feedback_text, feedback_date, customer_name, rating) 
                                  VALUES ('$product_id', '$feedback_text', '$feedback_date', '$customer_name', '$rating')";

        if (mysqli_query($con, $insert_feedback_query)) {
            echo "<script>alert('Feedback has been submitted successfully!');</script>";
            echo "<script>window.location.href = 'product-detail.php?product_id=$p_id';</script>";
            exit;
        } else {
            echo "<script>alert('Failed to submit feedback. Please try again later.');</script>";
        }
    }
}
?>


<style>
        .feedback-slider {
    position: relative;
    overflow: hidden;
    width: 100%;
    max-width: 800px;
    margin: 0 auto;
}

.feedback-slider .slides {
    display: flex;
    transition: transform 0.5s ease;
}

.feedback-slider .slide {
    min-width: 100%;
    box-sizing: border-box;
}

.feedback-slider .nav-button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: #ddd;
    border: none;
    cursor: pointer;
    padding: 0px;
}

.feedback-slider .nav-button.prev {
    left: 10px;
}

.feedback-slider .nav-button.next {
    right: 10px;
}

.star-rating {
    display: flex;
    direction: row-reverse;
    justify-content: center;
    font-size: 1.5rem;
}

.star-rating input {
    display: none;
}

.star-rating label {
    color: #ddd;
    cursor: pointer;
}

.star-rating input:checked ~ label {
    color: #f39c12;
}

.star-rating label:hover,
.star-rating label:hover ~ label {
    color: #f39c12;
}

.color-palette {
    display: flex;
    align-items: center;
}

.color-palette span {
    font-size: 16px;
    margin-right: 10px;
}

.colors {
    display: flex;
    align-items: center;
}

.color-circle {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    margin: 0 5px;
    cursor: pointer;
    border: 2px solid transparent;
}

.color-circle.selected {
    border-color: gold;
}
    </style>

    <section class="bac-gray pt-4 pb-4">
    <div class="container">
        <div class="section-heading">
            <h1>Related <span class="highlight">Products</span></h1>
        </div>
        <div class="row">
            <?php    
            if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
                $current_product_id = $_GET['product_id'];
                
                // Fetch the category ID of the current product
                $cat_query = "SELECT category_id FROM product_categories WHERE product_id = '$current_product_id' LIMIT 1";
                $cat_run = mysqli_query($con, $cat_query);
                
                if ($cat_run && mysqli_num_rows($cat_run) > 0) {
                    $cat_row = mysqli_fetch_assoc($cat_run);
                    $category_id = $cat_row['category_id'];
                    
                    // Fetch products from the same category excluding the current product
                    $related_query = "
                        SELECT DISTINCT p.product_id, p.product_name, p.product_desc, p.product_price, p.product_size, p.product_img1, p.product_img2, p.product_img3 
                        FROM furniture_product p
                        JOIN product_categories pc ON p.product_id = pc.product_id
                        WHERE pc.category_id = '$category_id' AND p.product_id != '$current_product_id'
                        GROUP BY p.product_id
                        ORDER BY p.product_id DESC
                        LIMIT 4
                    "; 
                    
                    $related_run = mysqli_query($con, $related_query);

                    if ($related_run && mysqli_num_rows($related_run) > 0) {
                        while ($p_row = mysqli_fetch_array($related_run)) {
                            $pid = $p_row['product_id'];
                            $ptitle = $p_row['product_name'];
                            $p_price = $p_row['product_price'];
                            $img1 = $p_row['product_img1'];
                            $whatsapp_number = '9682021084'; // Replace with the actual phone number
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-4">
                <div class="card product-card hover-effect h-100">
                    <a href="product-detail.php?product_id=<?php echo $pid; ?>">
                        <img src="img/<?php echo $img1; ?>" class="card-img-top" alt="<?php echo $ptitle; ?>">
                    </a>
                    <div class="card-body">
                        <h5 class="text-truncate" title="<?php echo $ptitle;?>"><?php echo substr($ptitle, 0, 20); ?>...</h5>
                        <h6>Rs. <?php echo $p_price; ?></h6>
                        <div class=" justify-content-between">
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
                        echo "<h3 class='text-center'> No Related Products Available </h3>";
                    }
                }
            }
            ?>
        </div>
    </div>
</section>

<style>
/* General Section Styling */
.bac-gray {
    background-color: #b2beb5;
    padding-top: 40px;
    padding-bottom: 40px;
}

/* Section Heading */
.section-heading {
    text-align: center;
    margin-bottom: 30px;
}

.section-heading h1 {
    font-size: 2.5rem;
    font-weight: bold;
    color: #333;
}

.section-heading .highlight {
    color: #ff6b6b; /* Example highlight color, adjust to match your theme */
}

/* Product Card Styling */
.product-card {
    border: none;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    position: relative;
    background-color: #ffffff;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
}

/* Product Image */
.product-card .card-img-top {
    width: 100%;
    height: auto;
    max-height: 200px; /* Limit the max height for consistent card size */
    object-fit: cover;
    transition: opacity 0.3s ease;
}

.product-card:hover .card-img-top {
    opacity: 0.9;
}

/* Card Body */
.product-card .card-body {
    padding: 15px;
    text-align: center;
}

.product-card h5 {
    font-size: 1rem;
    margin-bottom: 10px;
    color: #333;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}

.product-card h6 {
    font-size: 1.1rem;
    color: #ff6b6b;
    margin-bottom: 15px;
}

/* Button Styling */
.product-card .btn-custom {
    background-color: #ff6b6b;
    color: white;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.product-card .btn-custom:hover {
    background-color: #e55b5b;
    color: white;
}

.product-card .btn-secondary {
    background-color: #f1f1f1;
    color: #333;
    border-radius: 5px;
}

.product-card .btn-secondary:hover {
    background-color: #e1e1e1;
    color: #333;
}

.product-card .btn-success {
    background-color: #25d366; /* WhatsApp green color */
    color: white;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.product-card .btn-success:hover {
    background-color: #1ebe5d;
}

/* Button Icon Styling */
.product-card .btn i {
    margin-right: 5px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .section-heading h1 {
        font-size: 2rem;
    }

    .product-card .card-body {
        padding: 10px;
    }

    .product-card h5 {
        font-size: 0.9rem;
    }

    .product-card h6 {
        font-size: 1rem;
    }
}
</style>



<!-- <section class="back-gray pt-4 pb-4">
    <div class="feedback-section">
        <h3>Customer Feedback</h3>
        <div class="feedback-slider">
            <div class="slides">
                <?php
                
                $product_id = $_GET['product_id'];
                $feedback_query = "SELECT * FROM product_feedback WHERE product_id = $product_id ORDER BY feedback_date DESC";
                $feedback_run = mysqli_query($con, $feedback_query);

                if (mysqli_num_rows($feedback_run) > 0) {
                    while ($feedback_row = mysqli_fetch_array($feedback_run)) {
                        $rating = $feedback_row['rating'];
                        echo '
                        <div class="slide">
                            <div class="card feedback-card">
                                <div class="card-body">
                                    <h5 class="card-title">' . htmlspecialchars($feedback_row['customer_name']) . '</h5>
                                    <p class="card-text">' . htmlspecialchars($feedback_row['feedback_text']) . '</p>
                                    <div class="star-rating">';
                                    for ($i = 5; $i >= 1; $i--) {
                                        $checked = ($i <= $rating) ? 'checked' : '';
                                        echo '<input type="radio" id="star' . $i . '-' . $feedback_row['feedback_id'] . '" name="rating" value="' . $i . '" disabled ' . $checked . '>';
                                        echo '<label for="star' . $i . '-' . $feedback_row['feedback_id'] . '" title="' . $i . ' stars">&#9733;</label>';
                                    }
                                    echo '</div>
                                </div>
                            </div>
                        </div>';
                    }
                } else {
                    echo '<p>No feedback available for this product.</p>';
                }
                ?>
            </div>
            <button class="nav-button prev" onclick="moveSlide(-1)">&#10094;</button>
            <button class="nav-button next" onclick="moveSlide(1)">&#10095;</button>
        </div>
        <div class="feedback-form">
            <h4>Leave Your Feedback</h4>
            <form action="" method="POST" onsubmit="return showAlert()">
                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                <div class="form-group">
                    <label for="customer_name">Name</label>
                    <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                </div>
                <div class="form-group">
                    <label for="feedback_text">Feedback</label>
                    <textarea class="form-control" id="feedback_text" name="feedback_text" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label>Rating</label>
                    <div class="star-rating">
                        <input type="radio" id="star1" name="rating" value="1">
                        <label for="star1" title="1 stars">&#9733;</label>
                        <input type="radio" id="star2" name="rating" value="2">
                        <label for="star2" title="2 stars">&#9733;</label>
                        <input type="radio" id="star3" name="rating" value="3">
                        <label for="star3" title="3 stars">&#9733;</label>
                        <input type="radio" id="star4" name="rating" value="4">
                        <label for="star4" title="4 stars">&#9733;</label>
                        <input type="radio" id="star5" name="rating" value="5">
                        <label for="star5" title="5 star">&#9733;</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit Feedback</button>
            </form>
        </div>
    </div>
</section> -->

<!-- <section class="back-gray pt-4 pb-4">
    <div class="feedback-section">
        <h3>Customer Feedback</h3>
        <div class="feedback-list">
            <?php
            
            $product_id = $_GET['product_id'];
            $feedback_query = "SELECT * FROM product_feedback WHERE product_id = $product_id ORDER BY feedback_date DESC";
            $feedback_run = mysqli_query($con, $feedback_query);

            if (mysqli_num_rows($feedback_run) > 0) {
                while ($feedback_row = mysqli_fetch_array($feedback_run)) {
                    $feedback_id = $feedback_row['feedback_id'];
                    $rating = $feedback_row['rating'];

                    // Debug: Print rating value
                    echo '<p>Debug: Rating Value: ' . htmlspecialchars($rating) . '</p>';

                    echo '
                    <div class="slide">
                        <div class="card feedback-card">
                            <div class="card-body">
                                <h5 class="card-title">' . htmlspecialchars($feedback_row['customer_name']) . '</h5>
                                <p class="card-text">' . htmlspecialchars($feedback_row['feedback_text']) . '</p>
                                <div class="star-rating">';
                                for ($i = 5; $i >= 1; $i--) {
                                    $checked = ($i <= $rating) ? 'checked' : '';
                                    echo '<input type="radio" id="star' . $i . '-' . $feedback_id . '" name="rating" value="' . $i . '" disabled ' . $checked . '>';
                                    echo '<label for="star' . $i . '-' . $feedback_id . '" title="' . $i . ' stars">&#9733;</label>';
                                }
                                echo '</div>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo '<p>No feedback available for this product.</p>';
            }
            ?>
        </div>
        <div class="feedback-form">
            <h4>Leave Your Feedback</h4>
            <form action="" method="POST" onsubmit="return showAlert()">
                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                <div class="form-group">
                    <label for="customer_name">Name</label>
                    <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                </div>
                <div class="form-group">
                    <label for="feedback_text">Feedback</label>
                    <textarea class="form-control" id="feedback_text" name="feedback_text" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="rating">Rating</label>
                    <select id="rating" name="rating" class="form-control">
                        <option value="1">1 Star</option>
                        <option value="2">2 Stars</option>
                        <option value="3">3 Stars</option>
                        <option value="4">4 Stars</option>
                        <option value="5">5 Stars</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit Feedback</button>
            </form>
        </div>
    </div>
</section> -->
<section class="back-gray pt-4 pb-4">
    <div class="feedback-section">
        <h3>Customer Feedback</h3>
        <div class="feedback-slider">
            <div class="slides">
        <!-- <div class="feedback-list"> -->
            <?php
            // Fetch feedback from the database
            $product_id = $_GET['product_id'];
            $feedback_query = "SELECT * FROM product_feedback WHERE product_id = $product_id ORDER BY feedback_date DESC";
            $feedback_run = mysqli_query($con, $feedback_query);

            if (mysqli_num_rows($feedback_run) > 0) {
                while ($feedback_row = mysqli_fetch_array($feedback_run)) {
                    $feedback_id = $feedback_row['feedback_id'];
                    $rating = $feedback_row['rating'];

                    // Debug: Print rating value
                    // echo '<p>Debug: Rating Value: ' . htmlspecialchars($rating) . '</p>';

                    echo '
                    <div class="slide">
                        <div class="card feedback-card">
                            <div class="card-body">
                                <h5 class="card-title">' . htmlspecialchars($feedback_row['customer_name']) . '</h5>
                                <p class="card-text">' . htmlspecialchars($feedback_row['feedback_text']) . '</p>
                                <div class="star-rating">';
                                for ($i = 5; $i >= 1; $i--) {
                                    $checked = ($i == $rating) ? 'checked' : '';
                                    echo '<input type="radio" id="star' . $i . '-' . $feedback_id . '" name="rating-' . $feedback_id . '" value="' . $i . '" disabled ' . $checked . '>';
                                    echo '<label for="star' . $i . '-' . $feedback_id . '" title="' . $i . ' stars">&#9733;</label>';
                                }
                                echo '</div>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo '<p style="text-align: center;">No feedback available for this product.</p>';
            }
            ?>
            </div>
            <button class="nav-button prev" onclick="moveSlide(-1)">&#10094;</button>
            <button class="nav-button next" onclick="moveSlide(1)">&#10095;</button>
        </div>
        </div>
        <div class="feedback-form">
            <h4>Leave Your Feedback</h4>
            <form action="" method="POST" onsubmit="return showAlert()">
                <input type="hidden" name="form_type" value="submit_feedback">
                <div class="form-group">
                    <label for="customer_name">Name</label>
                    <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                </div>
                <div class="form-group">
                    <label for="feedback_text">Feedback</label>
                    <textarea class="form-control" id="feedback_text" name="feedback_text" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="rating">Rating</label>
                    <select id="rating" name="rating" class="form-control">
                        <option value="1">1 Star</option>
                        <option value="2">2 Stars</option>
                        <option value="3">3 Stars</option>
                        <option value="4">4 Stars</option>
                        <option value="5">5 Stars</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit Feedback</button>
            </form>
        </div>
    </div>
</section>




<style>
.star-rating {
    direction: rtl !important;
    display: inline-block;
}

.star-rating input[type="radio"] {
    display: none;
}

.star-rating label {
    color: #ccc;
    font-size: 20px;
    padding: 0;
    cursor: pointer;
}

.star-rating input[type="radio"]:checked ~ label,
.star-rating input[type="radio"]:checked ~ label ~ label {
    color: #ffcc00;
}
</style>


<script>
    let slideIndex = 0;

    function showSlides(n) {
        let slides = document.querySelectorAll('.feedback-slider .slide');
        if (n >= slides.length) { slideIndex = 0 }
        if (n < 0) { slideIndex = slides.length - 1 }
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = 'none';
        }
        slides[slideIndex].style.display = 'block';
    }

    function moveSlide(n) {
        showSlides(slideIndex += n);
    }

    document.addEventListener('DOMContentLoaded', function() {
        showSlides(slideIndex);
    });
</script>


<?php 
include('include/footer.php'); 
?>

          
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zooming/2.1.1/zooming.min.js"></script>
          
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

   
</body>
</html>
