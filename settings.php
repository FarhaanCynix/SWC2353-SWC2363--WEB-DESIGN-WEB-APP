<?php
require_once("includes/common.php");
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Settings | Life Style Store</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'includes/header.php'; ?>
<div class="container-fluid" id="content">
    <div class="col-lg-4 col-md-6">
        <img src="img/settings.jpg">
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6" id="settings-container">
            <h4>Change Email/Password/Address</h4>
            <form action="settings_script.php" method="POST">
                <div class="form-group">
                    <input type="email" class="form-control" name="new-email" placeholder="New Email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="old-password" placeholder="Old Password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="new-password" placeholder="New Password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="new-password1" placeholder="Re-type New Password">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="new-address" placeholder="New Address"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <?php if(isset($_GET['error'])) echo $_GET['error']; ?>
            </form>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>
</body>
</html>
