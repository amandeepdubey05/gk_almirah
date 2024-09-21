

<?php 
session_start();
include('include/header.php'); 
// require_once('include/dbcon.php');

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $serial_number = isset($_POST['serial_number']) ? $_POST['serial_number'] : '';
    
    if (isset($_SESSION['id'])) {
        // User is logged in
        $cust_id = $_SESSION['id'];
        $cust_name = $_SESSION['name'];
        $cust_email = $_SESSION['email'];
        $cust_add = $_SESSION['add'];
        $cust_city = $_SESSION['city'];
        $cust_pcode = $_SESSION['pcode'];
        $cust_number = $_SESSION['number'];

        // Insert data into the database
        $query = "INSERT INTO warranty_activations (name, address, contact_number, email, serial_number, city, postalcode) VALUES ('$cust_name', '$cust_add', '$cust_number', '$cust_email', '$serial_number', '$cust_city', '$cust_pcode')";
        if (mysqli_query($con, $query)) {
            echo "<script>alert('Warranty activated successfully.');</script>";
        } else {
            echo "<script>alert('Error: Could not activate warranty.');</script>";
        }
    } else {
        // User is not logged in, collect all details
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $contact_number = isset($_POST['contact_number']) ? $_POST['contact_number'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $city = isset($_POST['city']) ? $_POST['city'] : '';
        $postalcode = isset($_POST['postalcode']) ? $_POST['postalcode'] : '';

        // Insert data into the database
        $query = "INSERT INTO warranty_activations (name, address, contact_number, email, serial_number, password, city, postalcode) VALUES ('$name', '$address', '$contact_number', '$email', '$serial_number', '$password', '$city', '$postalcode')";
        if (mysqli_query($con, $query)) {
            // Sign up user automatically
            $user_query = "INSERT INTO customer (cust_name, cust_email, cust_pass, cust_add, cust_city, cust_postalcode, cust_number) VALUES ('$name', '$email', '$password', '$address', '$city', '$postalcode', '$contact_number')";
            mysqli_query($con, $user_query);

            echo "<script>alert('Warranty activated and account created successfully.');</script>";
        } else {
            echo "<script>alert('Error: Could not activate warranty.');</script>";
        }
    }
}
?>

<style>
    .warranty-container {
        padding: 60px;
        background-color: #e3dac9;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 0 auto;
        max-width: 700px;
        animation: fadeInUp 1s ease-out;
    }

    .barcode-image {
        display: block;
        margin: 20px auto;
        width: 100px;
        height: auto;
        transition: transform 0.2s;
    }

    .barcode-image:hover {
        transform: scale(1.1);
    }

    .submit-button {
        display: block;
        margin: 20px auto;
        width: 100%;
        font-size: 1.25rem;
        padding: 10px;
        background-color: #007bff;
        border: none;
        color: white;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .submit-button:hover {
        background-color: #0056b3;
    }

    .form-control {
        border-radius: 5px;
        border-color: #ced4da;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .form-group label {
        font-weight: bold;
        color: #333;
    }

    h2.text-center {
        margin-bottom: 30px;
        color: #333;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translate3d(0, 100%, 0);
        }
        to {
            opacity: 1;
            transform: translate3d(0, 0, 0);
        }
    }
</style>

<div class="container mt-5">
    <div class="warranty-container">
        <h2 class="text-center my-5">Activate Your Warranty</h2>
        <form method="POST">
            <?php if (!isset($_SESSION['id'])): ?>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>
                <div class="form-group">
                    <label for="postalcode">Postalcode</label>
                    <input type="text" class="form-control" id="postalcode" name="postalcode" required>
                </div>
                <div class="form-group">
                    <label for="contact_number">Contact Number</label>
                    <input type="text" class="form-control" id="contact_number" name="contact_number" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
            <?php endif; ?>
            <div class="form-group">
                <label for="serial_number">Serial Number from the Barcode</label>
                <input type="text" class="form-control" id="serial_number" name="serial_number" required>
            </div>
            <div class="form-group text-center">
                <label for="barcode_image">Barcode Image for Your Reference</label><br>
                <img src="img/barcode1.jpeg" alt="Barcode Image" class="barcode-image">
            </div>
            <button type="submit" class="btn btn-primary submit-button">Submit</button>
        </form>
    </div>
</div>

<?php include('include/footer.php'); ?>


<?php 
session_start();
include('include/header.php'); 
// require_once('include/dbcon.php');

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'furniture-shop-main';

// Create a connection
$con = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $serial_number = isset($_POST['serial_number']) ? $_POST['serial_number'] : '';
    
    if (isset($_SESSION['id'])) {
        // User is logged in
        $cust_id = $_SESSION['id'];
        $cust_name = $_SESSION['name'];
        $cust_email = $_SESSION['email'];
        $cust_add = $_SESSION['add'];
        $cust_city = $_SESSION['city'];
        $cust_pcode = $_SESSION['pcode'];
        $cust_number = $_SESSION['number'];

        // Insert data into the database
        $query = "INSERT INTO warranty_activations (name, address, contact_number, email, serial_number, city, postalcode) VALUES ('$cust_name', '$cust_add', '$cust_number', '$cust_email', '$serial_number', '$cust_city', '$cust_pcode')";
        if (mysqli_query($con, $query)) {
            echo "<script>alert('Warranty activated successfully.');</script>";
        } else {
            echo "<script>alert('Error: Could not activate warranty.');</script>";
        }
    } else {
        // User is not logged in, collect all details
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $contact_number = isset($_POST['contact_number']) ? $_POST['contact_number'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $city = isset($_POST['city']) ? $_POST['city'] : '';
        $postalcode = isset($_POST['postalcode']) ? $_POST['postalcode'] : '';

        // Insert data into the database
        $query = "INSERT INTO warranty_activations (name, address, contact_number, email, serial_number, password, city, postalcode) VALUES ('$name', '$address', '$contact_number', '$email', '$serial_number', '$password', '$city', '$postalcode')";
        if (mysqli_query($con, $query)) {
            // Sign up user automatically
            $user_query = "INSERT INTO customer (cust_name, cust_email, cust_pass, cust_add, cust_city, cust_postalcode, cust_number) VALUES ('$name', '$email', '$password', '$address', '$city', '$postalcode', '$contact_number')";
            mysqli_query($con, $user_query);

            echo "<script>alert('Warranty activated and account created successfully.');</script>";
        } else {
            echo "<script>alert('Error: Could not activate warranty.');</script>";
        }
    }
}
?>

<style>
    .warranty-container {
        padding: 60px;
        background-color: #e3dac9;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 0 auto;
        max-width: 700px;
        animation: fadeInUp 1s ease-out;
    }

    .barcode-image {
        display: block;
        margin: 20px auto;
        width: 100px;
        height: auto;
        transition: transform 0.2s;
    }

    .barcode-image:hover {
        transform: scale(1.1);
    }

    .submit-button {
        display: block;
        margin: 20px auto;
        width: 100%;
        font-size: 1.25rem;
        padding: 10px;
        background-color: #007bff;
        border: none;
        color: white;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .submit-button:hover {
        background-color: #0056b3;
    }

    .form-control {
        border-radius: 5px;
        border-color: #ced4da;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .form-group label {
        font-weight: bold;
        color: #333;
    }

    h2.text-center {
        margin-bottom: 30px;
        color: #333;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translate3d(0, 100%, 0);
        }
        to {
            opacity: 1;
            transform: translate3d(0, 0, 0);
        }
    }
</style>

<div class="container mt-5">
    <div class="warranty-container">
        <h2 class="text-center">Activate Your Warranty</h2>
        <form method="POST">
            <?php if (!isset($_SESSION['id'])): ?>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>
                <div class="form-group">
                    <label for="postalcode">Postalcode</label>
                    <input type="text" class="form-control" id="postalcode" name="postalcode" required>
                </div>
                <div class="form-group">
                    <label for="contact_number">Contact Number</label>
                    <input type="text" class="form-control" id="contact_number" name="contact_number" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
            <?php endif; ?>
            <div class="form-group">
                <label for="serial_number">Serial Number from the Barcode</label>
                <input type="text" class="form-control" id="serial_number" name="serial_number" required>
            </div>
            <div class="form-group text-center">
                <label for="barcode_image">Barcode Image for Your Reference</label><br>
                <img src="img/barcode1.jpeg" alt="Barcode Image" class="barcode-image">
            </div>
            <button type="submit" class="btn btn-primary submit-button">Submit</button>
        </form>
    </div>
</div>

<?php include('include/footer.php'); ?>
