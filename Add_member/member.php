<?php
// Include database connection
include "../Layout/db_connection.php";

// Initialize variables
$message = "";

// Handle form submission for Add/Update/Delete operations
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST['action'];

    if ($action === "add") {
        // Add member
        $name = $_POST['name'];
        $shares = $_POST['shares'];
        $share_amount = $shares * 10000;

        // Insert into database
        $sql = "INSERT INTO add_members (names, shares, share_amount) 
                VALUES ('$name', '$shares', '$share_amount')";

        if (mysqli_query($conn, $sql)) {
            $message = "Member added successfully!";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
    } elseif ($action === "update") {
        // Update member
        $id = $_POST['id'];
        $name = $_POST['name'];
        $shares = $_POST['shares'];
        $share_amount = $shares * 10000;

        // Update the database
        $sql = "UPDATE add_members 
                SET names='$name', shares='$shares', share_amount='$share_amount'
                WHERE id=$id";

        if (mysqli_query($conn, $sql)) {
            $message = "Member updated successfully!";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
    } elseif ($action === "delete") {
        // Delete member
        $id = $_POST['id'];
        $sql = "DELETE FROM add_members WHERE id=$id";

        if (mysqli_query($conn, $sql)) {
            $message = "Member deleted successfully!";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
    }
}

// Fetch all members
$members = [];
$result = mysqli_query($conn, "SELECT * FROM add_members");
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $members[] = $row;
    }
}
?>
