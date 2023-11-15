<?php
// This page updates user email, password, and address
require("includes/common.php");
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}

$new_email = $_POST['new-email'];
$old_pass = $_POST['old-password'];
$new_pass = $_POST['new-password'];
$new_pass1 = $_POST['new-password1'];
$new_address = $_POST['new-address'];

$new_email = mysqli_real_escape_string($con, $new_email);

// Validation and security checks for email, password, and address go here...

$success = '';

// Update email
if (!empty($new_email)) {
    $query = "UPDATE users SET email = '$new_email' WHERE email = '" . $_SESSION['email'] . "'";
    mysqli_query($con, $query) or die(mysqli_error($con));
    $_SESSION['email'] = $new_email; // Update the session email
    $success .= "Email Updated. ";
}

// Update password
if ($new_pass == $new_pass1 && !empty($new_pass)) {
    $new_pass = MD5($new_pass);
    $query = "UPDATE users SET password = '$new_pass' WHERE email = '" . $_SESSION['email'] . "'";
    mysqli_query($con, $query) or die(mysqli_error($con));
    $success .= "Password Updated. ";
}

// Update address
if (!empty($new_address)) {
    $new_address = mysqli_real_escape_string($con, $new_address);
    $query = "UPDATE users SET address = '$new_address' WHERE email = '" . $_SESSION['email'] . "'";
    mysqli_query($con, $query) or die(mysqli_error($con));
    $success .= "Address Updated. ";
}

// Handle success and redirect accordingly.
if (!empty($success)) {
    echo '<script>alert("'.$success.'");</script>';
    header('location: settings.php');
} else {
    header('location: settings.php');
}
?>
