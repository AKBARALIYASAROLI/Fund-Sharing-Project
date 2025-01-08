<?php
include "Layout/db_connection.php";
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php"); // Redirect to login if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="Styles/admin_dashboard.css">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">
            <h2>Admin Panel</h2>
        </div>
        <div class="links">
            <a href="home.php">Home</a>
            <a href="admin_dashboard.php">Dashboard</a>
            <a href="Add_member/add_members.php">Add Members</a>
            <a href="Borrowed/borrowed_amount.php">Borrowed Amount</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
    <!-- Dashboard Content -->
    <div class="dashboard">
        <h1>Welcome, Admin!</h1>
        <p>This is the admin dashboard.</p>
    </div>
    <!-- Members Table -->
<div class="dashboard_table">
     <table>
        <thead>
            <tr>
                <th>SI.NO</th>
                <th>Name</th>
                <th>Shares</th>
                <th>Share Amount</th>
                <th>Borrowed Amount</th>
                <th>Interest Due 2 %</th>
                <th>Payment Status</th>
            </tr>
        </thead>

        <tbody>
    <?php
    $sql = "SELECT names, shares, share_amount, borrowed_amount, interest_due, payment_status FROM members";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $counter = 1; // Initialize the counter
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $counter++ . "</td> <!-- Auto-generated ID -->
                <td>" . htmlspecialchars($row['names']) . "</td>
                <td>" . htmlspecialchars($row['shares']) . "</td>
                <td>" . htmlspecialchars($row['share_amount']) . "</td>
                <td>" . htmlspecialchars($row['borrowed_amount']) . "</td>
                <td>" . htmlspecialchars($row['interest_due']) . "</td>
                <td>" . htmlspecialchars($row['payment_status']) . "</td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No items.</td></tr>";
    }
    ?>
</tbody>

    </table>
    </div>
</body>
</html>
