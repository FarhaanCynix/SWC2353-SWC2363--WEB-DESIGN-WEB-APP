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

// Check if the form is submitted (delete confirmation)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
        // Delete the product from the database
        $delete_query = "DELETE FROM items WHERE id = $product_id";
        $delete_result = mysqli_query($con, $delete_query) or die(mysqli_error($con));

        if ($delete_result) {
            // Product deleted successfully, redirect back to admin_products.php
            header('location: admin_products.php');
        } else {
            // Handle any database delete errors (e.g., display an error message)
            $error_message = "Error deleting the product. Please try again.";
        }
    }
}

// Query the product details for confirmation
$query = "SELECT id, name FROM items WHERE id = $product_id";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);

// Display a confirmation message
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delete Product | Admin</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <h2>Delete Product</h2>
        <?php if (isset($error_message)) { ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php } ?>
        <form method="POST" action="delete_product.php?id=<?php echo $product_id; ?>">
            <p>Are you sure you want to delete the product "<?php echo $row['name']; ?>" (ID: <?php echo $row['id']; ?>)?</p>
            <button type="submit" name="delete" class="btn btn-danger">Delete</button>
            <a href="admin_products.php" class="btn btn-default">Cancel</a>
        </form>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>

</html>
