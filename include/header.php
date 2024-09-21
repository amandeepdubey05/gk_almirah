
<?php
// session_start();

// Initialize $count to 0 as a default value
$count = 0;

// Check if the user is logged in and if there is a session variable for the cart
if (isset($_SESSION['email'])) {
    $cust_id = $_SESSION['id']; // Assuming user ID is stored in the session
    
    // Connect to the database
    $host = 'sql308.infinityfree.com';
    $username = 'if0_37073296';
    $password = '30EwWz6pitl2VA';
    $database = 'if0_37073296_furnitureshopmain';
    $con = mysqli_connect($host, $username, $password, $database);

    // Check for a successful connection
    if (!$con) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Query to count the number of items in the cart for the logged-in user
    $cart_query = "SELECT COUNT(*) AS cart_count FROM cart WHERE cust_id = $cust_id";
    $result = mysqli_query($con, $cart_query);

    // Fetch the result and assign it to $count
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $count = $row['cart_count'];
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G.K Almirah</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="img/logogk1.png" rel="icon">
    <link href="css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        .navbar-custom {
            background-color: #ffffff !important;
            padding-bottom: 10px !important;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
        }

        .logo-container {
            width: 80px;
        }

        .navbar-logo {
            width: 100%;
            height: auto;
        }

        .brand-text {
            margin-left: 50px;
            font-family: 'Poppins', sans-serif;
            font-size: 35px;
            font-weight: 600;
            color: #333;
        }

        .brand-text .highlight {
            /* font-family: 'Great Vibes', cursive; */
            /* font-family: 'Montserrat', sans-serif; */
            /* font-family: 'Playfair Display', serif; */
            font-family: 'Poppins', sans-serif;
            font-size: 1.2em;
            color: #ff0000;
        }

        .navbar-nav .nav-link {
            font-size: 16px;
            color: #000000 !important;
            margin-right: 20px;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #ff0000 !important;
            transform: scale(1.2);
        }

        .top-icon {
            font-size: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .badge-primary {
            background-color: #007bff;
        }

        /* Ensure the navbar-toggler is styled correctly */
        .navbar-toggler {
            border: none;
            background: none;
            padding: 5px;
            font-size: 1.25rem;
        }

        .navbar-toggler:focus {
            outline: none;
        }

        /* Media queries for mobile view */
        @media (min-width: 768px) and (max-width: 991.98px) {
            .brand-text {
                margin-left: 60px;
                font-size: 28px;
            }

            .navbar-nav .nav-link {
                font-size: 18px;
                margin-right: 15px;
            }

            .navbar-collapse {
                width: 100%;
                text-align: center;
            }

            .navbar-custom {
                padding: 5px 15px;
            }

            .logo-container {
                width: 70px;
            }
        }

        

        /* Media queries for small screens (≤ 767.98px) */
        @media (max-width: 767.98px) {
            .brand-text {
                margin-left: 10px;
                font-size: 24px;
            }

            .navbar-nav .nav-link {
                font-size: 18px;
                margin-right: 10px;
                text-align: center;
            }

            .navbar-collapse {
                width: 100%;
                text-align: center;
            }

            .navbar-custom {
                padding: 5px 15px;
            }

            .logo-container {
                width: 60px;
            }
        }

        
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-custom fixed-top">
            <div class="container-fluid">
                <a href="index.php" class="navbar-brand">
                    <div class="logo-container">
                        <img src="img/logogk1.png" class="navbar-logo" alt="GK Almirah Logo">
                    </div>
                    <span class="brand-text">G.K <span class="highlight">Almirah</span></span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapisblenav" aria-controls="collapisblenav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="collapisblenav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="product.php">Products</a></li>
                        <li class="nav-item"><a class="nav-link" href="about-us.php">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="activate-warranty.php">Activate Warranty</a></li>
                        <li class="nav-item"><a class="nav-link" href="distribution.php">Become Our Distributor</a></li>
                        
                        <?php if(!isset($_SESSION['email'])) { ?> 
                        <li class="nav-item"><a class="nav-link" href="sign-in.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="register.php"><button type="button" class="btn btn-primary btn-sm">Register</button></a></li>
                        <?php } else { ?>
                        <li class="nav-item"><a class="nav-link" href="cust.php"><i class="far fa-user top-icon"></i> Account</a></li>
                        <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">
                                <i class="fas fa-shopping-cart top-icon"></i>
                                <span class="badge badge-primary"><?php echo $count; ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
<script>
$(document).ready(function () {
    $('.navbar-toggler').click(function () {
        // Toggle the 'open' class to show/hide the side menu
        $('#collapisblenav').toggleClass('open');
    });

    // Close the side menu when clicking outside of it
    $(document).click(function (e) {
        var target = $(e.target);
        if (!target.closest('.navbar-collapse').length && !target.closest('.navbar-toggler').length) {
            $('#collapisblenav').removeClass('open');
        }
    });
});
</script>


    <!-- Include Bootstrap's JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
