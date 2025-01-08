<?php
// Include database connection
include "../Add_member/db_connection.php"; 

// Initialize variables
$message = "";

// Handle form submission for Add/Update/Delete operations
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST['action'];

    if ($action === "add") {
        // Add member
        $name = $_POST['name'];
        $dates = $_POST['date'];
        $borrowed_amount = $_POST['borrowed_amount'];
        $borrowed_interest = $borrowed_amount * 0.02;

        // Insert into database
        $sql = "INSERT INTO borrowed_members (names, Dates, borrowed_amount, borrowed_interest)
                VALUES ('$name', '$dates', '$borrowed_amount', '$borrowed_interest')";

        if (mysqli_query($conn, $sql)) {
            $message = "Borrowed amount added successfully!";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
    } elseif ($action === "update") {
        // Update member
        $id = $_POST['id'];
        $name = $_POST['name'];
        $dates = $_POST['date'];
        $borrowed_amount = $_POST['borrowed_amount'];
        $borrowed_interest = $borrowed_amount * 0.02;
        // Update the database
        $sql = "UPDATE borrowed_members 
                SET names='$name', Dates='$dates', borrowed_amount='$borrowed_amount', borrowed_interest='$borrowed_interest'
                WHERE id=$id";

        if (mysqli_query($conn, $sql)) {
            $message = "Borrowed amount updated successfully!";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
    } elseif ($action === "delete") {
        // Delete member
        $id = $_POST['id'];
        $sql = "DELETE FROM borrowed_members WHERE id=$id";

        if (mysqli_query($conn, $sql)) {
            $message = "Borrowed amount deleted successfully!";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
    }
}

// Fetch all members
$members = [];
$result = mysqli_query($conn, "SELECT * FROM borrowed_members");
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $members[] = $row;
    }
}
?>
