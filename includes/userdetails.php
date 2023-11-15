<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details | Lifestyle Store</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <div class="container" id="content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h2>User Details</h2>
                <!-- Display user details here, e.g., name, email, contact, address -->
                <p><strong>Name:</strong> John Doe</p>
                <p><strong>Email:</strong> john@example.com</p>
                <p><strong>Contact:</strong> 1234567890</p>
                <p><strong>Address:</strong> 123 Main St, City, Country</p>

                <!-- Add an option to edit user details -->
                <a href="edit_user.php" class="btn btn-primary">Edit User Details</a>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
