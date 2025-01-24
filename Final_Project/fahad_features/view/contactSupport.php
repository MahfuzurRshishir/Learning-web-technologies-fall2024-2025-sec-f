<head>

    <title>Contact and Support</title>
    
</head>
<body>
    <table border="1" width="100%" cellpadding="10">
    <link rel="stylesheet" type="text/css" href="../css/contactus.css">
        <tr>
            <td>
                <table border="1" width="100%">
                    <tr>
                        <td colspan="2" align="left">
                            <strong>Job Publisher</strong>
                        </td>
                        <td align="right">
                            <strong>User</strong>
                        </td>
                    </tr>
                </table>

                <h2 align="center">Contact and Support</h2>

                <table border="1" align="center" cellpadding="10" width="50%">
                    <tr>
                        <td>
                            <fieldset>
                                <legend>Contact Us</legend>
                                <form method="POST" action="">
                                    <table align="center" cellpadding="10" width="100%">
                                        <tr>
                                            <td>Your Name:</td>
                                            <td><input type="text" name="name" required></td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td><input type="email" name="email" required></td>
                                        </tr>
                                        <tr>
                                            <td>Message:</td>
                                            <td><textarea name="message" rows="5" required></textarea></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center">
                                                <input type="submit" name="submit" value="Submit">
                                                <input type="reset" value="Reset">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                <?php
                                if (isset($success_message)) {
                                    echo "<p style='color:green; text-align:center;'>$success_message</p>";
                                } elseif (isset($error_message)) {
                                    echo "<p style='color:red; text-align:center;'>$error_message</p>";
                                }
                                ?>
                            </fieldset>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <fieldset>
                                <legend>FAQs</legend>
                                <div>
                                    <details>
                                        <summary><strong>Q:</strong> How can I publish a job notice?</summary>
                                        <p><strong>A:</strong> Use the "Job Notice Publish" form in the dashboard.</p>
                                    </details>
                                    <details>
                                        <summary><strong>Q:</strong> How do I upload an admit card?</summary>
                                        <p><strong>A:</strong> Use the "Admit Card Upload" section under the Admit Card and Result page.</p>
                                    </details>
                                    <details>
                                        <summary><strong>Q:</strong> Whom should I contact for support?</summary>
                                        <p><strong>A:</strong> Use the "Contact Us" form above to reach out to our team.</p>
                                    </details>
                                </div>
                            </fieldset>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
