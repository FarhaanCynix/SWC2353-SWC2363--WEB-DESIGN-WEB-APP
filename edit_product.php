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
    // Get the updated product name from the form
    $new_name = $_POST['new_name'];

    // Validate the new product name (you can add additional validation as needed)
    if (empty($new_name)) {
        // Handle validation errors (e.g., display an error message)
        $error_message = "Product name cannot be empty.";
    } else {
        // Sanitize the input (you can use mysqli_real_escape_string or prepared statements)
        $new_name = mysqli_real_escape_string($con, $new_name);

        // Update the product's name in the database
        $update_query = "UPDATE items SET name = '$new_name' WHERE id = $product_id";
        $update_result = mysqli_query($con, $update_query) or die(mysqli_error($con));

        if ($update_result) {
            // Product name updated successfully, redirect back to admin_products.php
            header('location: admin_products.php');
        } else {
            // Handle any database update errors (e.g., display an error message)
            $error_message = "Error updating the product name. Please try again.";
        }
    }
}

// Query the current product name
$query = "SELECT name FROM items WHERE id = $product_id";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);
$current_name = $row['name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Product Name | Admin</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <h2>Edit Product Name</h2>
        <?php if (isset($error_message)) { ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php } ?>
        <form method="POST" action="edit_product.php?id=<?php echo $product_id; ?>">
            <div class="form-group">
                <label for="new_name">Current Name: <?php echo $current_name; ?></label>
            </div>
            <div class="form-group">
                <label for="new_name">New Name:</label>
                <input type="text" name="new_name" id="new_name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>

</html>
