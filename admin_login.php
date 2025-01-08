<?php
include "valid_login.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="Styles/login.css">
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
        <form method="POST" action="">
            <div class="input-group">
                <label for="user-name">User Name</label>
                <input type="text" id="user-name" name="user-name" placeholder="Enter your User Name" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="login-btn">Login</button>
        </form>
        
        <!-- Customer Login Link -->
        <p class="customer-login-link">
            Not an admin? <a href="customer_login.php">Customer Login</a>
        </p>
    </div>
</body>
</html>