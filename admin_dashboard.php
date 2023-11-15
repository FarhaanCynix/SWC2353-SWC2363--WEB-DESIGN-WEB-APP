<?php
require("includes/common.php");

// Check if the user is an admin
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header('location: products.php');
}

// Query to retrieve order data
$query = "SELECT user_item.id, user_item.user_id, user_item.item_id, user_item.status, user_item.date_time, users.email
          FROM user_item
          JOIN users ON user_item.user_id = users.id";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!--instructs browser on how to control the page's dimensions and scaling-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Title of index page-->
    <title>Welcome | Life Style Store</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <?php include 'includes/header.php'; ?>
    <div id="content">
        <div class="container">
            <h2>Admin Dashboard</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Email</th>
                        <th>Order Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['date_time']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <!-- Add a button to navigate to admin_products.php -->
            <a href="admin_products.php" class="btn btn-primary">Manage Products</a>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>

</html>
