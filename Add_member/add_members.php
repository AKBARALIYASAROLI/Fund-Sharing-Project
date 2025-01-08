<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    // If not logged in, redirect to the login page
    header("Location: ../admin_login.php");
    exit();
}
?>
<?php
include "member.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Members</title>
    <link rel="stylesheet" href="../Styles/add_member.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body>

<?php include "../Layout/Nav.php"; ?>
    <h1>Manage Members</h1>
    
    <p style="color: green;"><?php echo $message; ?></p>

<!-- Add Members Button -->
<button id="addMembersButton" class="open-popup">Add Members</button>

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
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Name" required>
            <label for="shares">Shares</label>
            <input type="text" name="shares" id="shares" placeholder="Shares" required>
        </div>


        <button type="submit">Submit</button>
        <button id="closePopup" class="close-popup">Close</button>
      </form>
    </div>
  </div>
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
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($members as $index => $member): ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo $member['names']; ?></td>
                    <td><?php echo $member['shares']; ?></td>
                    <td><?php echo $member['shares'] * 10000; ?></td>
                    <td>
                        <button id="edit_but"
                            onclick="editMember(
                                '<?php echo $member['id']; ?>', 
                                '<?php echo $member['names']; ?>', 
                                '<?php echo $member['shares']; ?>', 
                                '<?php echo $member['shares'] * 10000; ?>',
                            )">
                            <i class="fas fa-edit"></i>
                             Edit
                        </button>
                        <form method="POST" action="" style="display: inline;">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?php echo $member['id']; ?>">
                            <button id="delete_but" type="submit"> <i class="fas fa-trash-alt"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
    <script src='../Script/add_member.js'></script>
</body>
</html>
