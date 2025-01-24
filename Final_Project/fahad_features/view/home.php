<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/home.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Home Page</title>
</head>
<body>
    <div class="header">
        <div><strong>Job Publisher</strong></div>
        <div><strong>Welcome, <?= $username ?? 'Admin'; ?></strong></div>
    </div>

    <div class="container">
        <h2>Dashboard</h2>
        <ul class="menu">
        <li><a href="admitCardAndResultuser.php?page=admitCardAndResultuser">Admit Card User</a></li>
            <li><a href="admitCardAndResultemployee.php?page=admitCardAndResultemployee">Admit Card Employee</a></li>
            <li><a href="contactSupport.php?page=contactSupport">Contact Us </a></li>
            <li><a href="jobReview.php?page=jobReview">Rating Form</a></li>
            <li><a href="notifications.php?page=notifications">Notifications</a></li>
            <li><a href="signin.php">Sign in</a></li>
        </ul>

        <div class="content">
            <?= $content ?? '<h3>Welcome to the Dashboard</h3><p>Select an option from the list to manage different sections.</p>'; ?>
        </div>
    </div>

    <div class="footer">
        &copy; <?= date("Y"); ?> Job Publisher. All Rights Reserved.
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
