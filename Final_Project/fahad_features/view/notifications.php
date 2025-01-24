<html>
<head>

    <link rel="stylesheet" type="text/css" href="../css/notifications.css">
    <title>Notifications</title>
</head>
<body>

    <div class="container">
        <h2 align="center">Notifications</h2>
        <table align="center" cellpadding="10" width="50%">
            <tr>
                <td>
                    <fieldset>
                        <legend>General Notifications</legend>
                        <form method="POST" action="">
                            <table align="center" cellpadding="10" width="100%">
                                <tr>
                                    <td>Notification Title:</td>
                                    <td><input type="text" name="general_title" required></td>
                                </tr>
                                <tr>
                                    <td>Message:</td>
                                    <td><textarea name="general_message" rows="5" required></textarea></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center">
                                        <input type="submit" name="submit_general" value="Send Notification">
                                        <input type="reset" value="Reset">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td>
                    <fieldset>
                        <legend>Individual Notifications</legend>
                        <form method="POST" action="">
                            <table align="center" cellpadding="10" width="100%">
                                <tr>
                                    <td>Recipient Email:</td>
                                    <td><input type="email" name="recipient_email" required></td>
                                </tr>
                                <tr>
                                    <td>Notification Title:</td>
                                    <td><input type="text" name="individual_title" required></td>
                                </tr>
                                <tr>
                                    <td>Message:</td>
                                    <td><textarea name="individual_message" rows="5" required></textarea></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center">
                                        <input type="submit" name="submit_individual" value="Send Notification">
                                        <input type="reset" value="Reset">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td>
                    <fieldset>
                        <legend>Profile Notifications</legend>
                        <form method="POST" action="">
                            <table align="center" cellpadding="10" width="100%">
                                <tr>
                                    <td>Notification Title:</td>
                                    <td><input type="text" name="profile_title" required></td>
                                </tr>
                                <tr>
                                    <td>Message:</td>
                                    <td><textarea name="profile_message" rows="5" required></textarea></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center">
                                        <input type="submit" name="submit_profile" value="Send Notification">
                                        <input type="reset" value="Reset">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </fieldset>
                </td>
            </tr>
        </table>
        <?php if (isset($statusMessage)) : ?>
            <p align="center" style="color: <?= $statusColor; ?>;"><?= $statusMessage; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
