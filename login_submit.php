<?php
require("includes/common.php");

// Get the email and password from the user through the login page
$email = $_POST['e-mail'];
$email = mysqli_real_escape_string($con, $email);
$password = $_POST['password'];
$password = mysqli_real_escape_string($con, $password);
$password = MD5($password);

// Query to check if the email and password are present in the database.
$query = "SELECT id, email, is_admin FROM users WHERE email='" . $email . "' AND password='" . $password . "'";
$result = mysqli_query($con, $query) or die($mysqli_error($con));
$num = mysqli_num_rows($result);

// If the email and password are not present in the database, mysqli_num_rows returns 0, and it is assigned to $num.
if ($num == 0) {
  $error = "<span class='red'>Please enter the correct E-mail id and Password</span>";
  header('location: login.php?error=' . $error);
} else {
  $row = mysqli_fetch_array($result);

  // Set the user's email and user_id in the session
  $_SESSION['email'] = $row['email'];
  $_SESSION['user_id'] = $row['id'];

  // Check if the user is an admin and set the is_admin session variable
  if ($row['is_admin'] == 1) {
    $_SESSION['is_admin'] = true;
    header('location: admin_dashboard.php'); // Redirect admin to the admin dashboard
  } else {
    $_SESSION['is_admin'] = false;
    header('location: products.php'); // Redirect regular users to the products page
  }
}
?>
