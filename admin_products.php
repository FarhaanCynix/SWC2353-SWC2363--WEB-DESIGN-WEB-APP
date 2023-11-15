<?php
require("includes/common.php");

// Check if the user is an admin
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header('location: products.php');
}

// Query to retrieve a list of products from the "items" table
$query = "SELECT id, name, price FROM items";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Product Management</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <?php include 'includes/header.php'; ?>
    <div id="content">
        <div class="container">
            <h2>Product Management</h2>
            <!-- Add Product button -->
            <a href="admin_add_product.php" class="btn btn-primary">Add Product</a>
            <table class="table table-bordered" style="margin-top: 20px;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td>
                                <a href="edit_product.php?id=<?php echo $row['id']; ?>">Edit</a> |
                                <a href="update_product.php?id=<?php echo $row['id']; ?>">Update</a> |
                                <a href="delete_product.php?id=<?php echo $row['id']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>

</html>
