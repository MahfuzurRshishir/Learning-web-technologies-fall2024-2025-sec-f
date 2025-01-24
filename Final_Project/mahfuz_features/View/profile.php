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
    <title>Profile</title>
    <link rel="stylesheet" href="css/profileStyles.css">
</head>
<body>
    <div class="profile-container">
        <h2>Your Profile</h2>
        <img src="<?php echo $user['profilepicpath'] ?: '../uploads/profile_pics/default.jpg'; ?>" alt="Profile Picture">
        <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <p><strong>Full Name:</strong> <?php echo $user['fullname']; ?></p>
        <p><strong>Gender:</strong> <?php echo $user['gender']; ?></p>
        <p><strong>Phone:</strong> <?php echo $user['phone']; ?></p>
        <p><strong>Address:</strong> <?php echo $user['address']; ?></p>
        <button onclick="window.location.href='edit_profile.php'">Edit Profile</button>
        <?php
           if($user['usertype']=='User'){
                 ?>
                 <button onclick="window.location.href='../View/user_homepage.php'">Back to Home</button>
                 <?php
            }else if($user['usertype']=='Employee'){
                 ?>
                 <button onclick="window.location.href='../View/employee_dashboard.php'">Back to Home</button>
                 <?php
            }

        ?>

    </div>
</body>
</html>
