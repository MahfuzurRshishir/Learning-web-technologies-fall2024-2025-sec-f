<?php
session_start();
require_once '../Model/userModel.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user = getUserById($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/editProfileStyles.css">
</head>
<body>
    <div class="form-container">
        <h2>Edit Profile</h2>
        <form id="editProfileForm" method="POST" action="../Controller/updateProfileController.php" enctype="multipart/form-data">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" value="<?php echo htmlspecialchars($user['fullname']); ?>"><br><br>
            <label for="gender">Gender:</label>
            <select id="gender" name="gender">
                <option value="Male" <?php echo $user['gender'] === 'Male' ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo $user['gender'] === 'Female' ? 'selected' : ''; ?>>Female</option>
                <option value="Other" <?php echo $user['gender'] === 'Other' ? 'selected' : ''; ?>>Other</option>
            </select><br><br>
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>"><br><br>
            <label for="address">Address:</label>
            <textarea id="address" name="address"><?php echo htmlspecialchars($user['address']); ?></textarea><br><br>
            <label for="profilepic">Profile Picture:</label>
            <input type="file" id="profilepic" name="profilepic"><br><br>
            <button type="submit">Update Profile</button>
        </form>
        <button onclick="window.location.href='profile.php'">Cancel</button>
    </div>
</body>
</html>
