<?php
session_start();

// Predefined admin credentials
$admin_username = "admin";
$admin_password = "12345"; // Change this to a strong password!

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user-name'];
    $password = $_POST['password'];

    // Validate credentials
    if ($username === $admin_username && $password === $admin_password) {
        // Successful login, set session
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin_dashboard.php"); // Redirect to admin page
        exit();
    } else {
        // Invalid credentials
        $error = "Incorrect Username or Password!";
    }
}
?>
