<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../admin_login.php");
    exit();
}

// Include database connection
include "borrowed.php";
// include "../Layout/db_connection.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrowed Amount</title>
    <link rel="stylesheet" href="../Styles/add_member.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
  <?php include "../Layout/Nav.php"; ?>

    <h1>Borrowed Amount</h1>
    <p style="color: green;"><?php echo htmlspecialchars($message); ?></p>

    <!-- Add Borrowed Amount Button -->
    <button id="addMembersButton" class="open-popup">Add Borrowed Amount</button>

    <!-- Overlay -->
<div id="overlay"></div>

<!-- Modal -->
<div id="modal">
    <div class="form-popup">
        <div class="form-content">
            <form method="POST" action="">
                <input type="hidden" name="action" id="action" value="add">
                <input type="hidden" name="id" id="id">

                <div class="form-row">
                    <select id="name" name="name" required>
                        <option value="">Select Name</option>
                        <?php
                        $sql="SELECT id,names FROM add_members";
                        $result=$conn->query($sql);
                        // print_r($result);
                        if($result && $result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                echo "<option value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['names']) . "</option>";
                            }
                        } else{
                            echo "<option value =''>Not fount</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-row">
                    <input type="date" name="date" id="date" required>
                </div>

                <div class="form-row">
                    <input type="number" step="0.01" name="borrowed_amount" id="borrowed_amount" placeholder="Borrowed Amount" required>
                </div>

                <div class="form-row">
                    <input type="number" step="0.01" name="borrowed_interest" id="borrowed_interest" placeholder="Borrowed Interest (2%)" readonly>
                </div>

                <button type="submit">Submit</button>
                <button id="closePopup" class="close-popup">Close</button>
            </form>
        </div>
    </div>
</div>

    <!-- Borrowed Amount Table -->
    <div class="dashboard_table">
        <table>
            <thead>
                <tr>
                    <th>SI.NO</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Borrowed Amount</th>
                    <th>Borrowed Interest</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($borrowedMembers as $index => $borrowedMembers): ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo htmlspecialchars($borrowedMembers['Dates']); ?></td>
                        <td><?php echo htmlspecialchars($borrowedMembers['names']); ?></td>
                        <td><?php echo htmlspecialchars($borrowedMembers['borrowed_amount']); ?></td>
                        <td><?php echo htmlspecialchars($borrowedMembers['borrowed_amount'] * 0.02); ?></td>
                        <td>
                            <button onclick="editMember(
                                '<?php echo $borrowedMembers['id']; ?>', 
                                '<?php echo htmlspecialchars($borrowedMembers['names']); ?>', 
                                '<?php echo htmlspecialchars($borrowedMembers['Dates']); ?>', 
                                '<?php echo htmlspecialchars($borrowedMembers['borrowed_amount']); ?>'
                            )">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <form method="POST" action="" style="display: inline;">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?php echo $borrowedMembers['id']; ?>">
                                <button type="submit"><i class="fas fa-trash-alt"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src='../Script/borrowed.js'></script>
</body>
</html>
