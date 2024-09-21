<?php 
session_start();
include('include/header.php'); 

if(!isset($_SESSION['email'])){
    header('location: sign-in.php');
}
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

?>

<style>
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

</style>

<div class="jumbotron jumbotron-custom text-white">
    <div class="container text-center">
        <h2 class="display-4">My Account</h2>
        <p class="lead">Edit your profile settings</p>
    </div>
</div>
     
<div class="container mt-4 mb-5">
    <div class="row">
        <div class="col-md-3">
            <?php include('include/sidebar.php');?>
        </div>
        <div class="col-md-9">
            <!-- <h3>My Account:</h3><hr> -->

            <a href="orders.php"> <h6 class="text-primary">ORDERS</h6></a>
            <p>Check the status and information regarding your online orders</p>

            <a href="personal-detail.php"> <h6 class="text-primary"> EDIT PERSONAL DETAILS</h6></a>
            <p>You can access and modify your personal details (name, billing address, telephone number, etc.) in order to speed up your future purchases and notify us of changes in your contact details.</p>

            <a href="access-detail.php"> <h6 class="text-primary">ACCESS DETAILS</h6></a>
            <p>You can change your access details (password).</p>
        </div>
    </div>
</div>

<?php include('include/footer.php') ?>
