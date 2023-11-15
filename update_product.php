<?php
require("includes/common.php");

// Check if the user is an admin
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header('location: products.php');
}

// Check if the product ID is provided via a GET parameter
if (!isset($_GET['id'])) {
    header('location: admin_products.php');
}

// Retrieve the product ID from the GET parameter
$product_id = $_GET['id'];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the updated price from the form
    $new_price = $_POST['new_price'];

    // Validate the new price (you can add additional validation as needed)
    if (!is_numeric($new_price) || $new_price <= 0) {
        // Handle validation errors (e.g., display an error message)
        $error_message = "Please enter a valid price.";
    } else {
        // Update the product's price in the database
        $update_query = "UPDATE items SET price = $new_price WHERE id = $product_id";
        $update_result = mysqli_query($con, $update_query) or die(mysqli_error($con));

        if ($update_result) {
            // Price updated successfully, redirect back to admin_products.php
            header('location: admin_products.php');
        } else {
            // Handle any database update errors (e.g., display an error message)
            $error_message = "Error updating the price. Please try again.";
        }
    }
}

// Query the current price of the product
$query = "SELECT price FROM items WHERE id = $product_id";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);
$current_price = $row['price'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Product Price | Admin</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <h2>Update Product Price</h2>
        <?php if (isset($error_message)) { ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php } ?>
        <form method="POST" action="update_product.php?id=<?php echo $product_id; ?>">
            <div class="form-group">
                <label for="new_price">Current Price: $<?php echo $current_price; ?></label>
            </div>
            <div class="form-group">
                <label for="new_price">New Price:</label>
                <input type="number" name="new_price" id="new_price" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>

</html>
