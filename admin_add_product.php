<?php
require("includes/common.php");

// Check if the user is an admin
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header('location: products.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get product details from the form
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    // You can add more validation and error handling here

    // Insert the new product into the database
    $insert_query = "INSERT INTO items (name, price) VALUES ('$product_name', $product_price)";
    $insert_result = mysqli_query($con, $insert_query) or die(mysqli_error($con));

    if ($insert_result) {
        // Product added successfully, redirect to the admin products page
        header('location: admin_products.php');
    } else {
        // Handle any database insert errors (e.g., display an error message)
        $error_message = "Error adding the product. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Product | Admin</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <h2>Add New Product</h2>
        <?php if (isset($error_message)) { ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php } ?>
        <form method="POST" action="admin_add_product.php">
            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" name="product_name" id="product_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="product_price">Product Price:</label>
                <input type="number" name="product_price" id="product_price" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>

</html>
