<!DOCTYPE html>
<html lang="en">
<head>

    <title>Rating/Review</title>
    <link rel="stylesheet" type="text/css" href="../css/jobReview.css">
</head>
<body>

    <div class="header">
        Job Publisher - Rating/Review
    </div>

    <div class="container">
        <div class="form-section">
            <fieldset>
                <legend>Job Review</legend>
                <form method="POST" action="">
                    <table>
                        <tr>
                            <td>Job Title:</td>
                            <td><input type="text" name="job_title" required></td>
                        </tr>
                        <tr>
                            <td>Rating (1-5):</td>
                            <td>
                                <select name="job_rating" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Review:</td>
                            <td><textarea name="job_review" rows="5" required></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input type="submit" name="submit_job" value="Submit Review">
                                <input type="reset" value="Reset">
                            </td>
                        </tr>
                    </table>
                </form>
                <?php if (isset($job_message)) echo $job_message; ?>
            </fieldset>
        </div>

        <div class="form-section">
            <fieldset>
                <legend>Website Review</legend>
                <form method="POST" action="">
                    <table>
                        <tr>
                            <td>Rating (1-5):</td>
                            <td>
                                <select name="website_rating" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Review:</td>
                            <td><textarea name="website_review" rows="5" required></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input type="submit" name="submit_website" value="Submit Review">
                                <input type="reset" value="Reset">
                            </td>
                        </tr>
                    </table>
                </form>
                <?php if (isset($website_message)) echo $website_message; ?>
            </fieldset>
        </div>

        <div class="form-section">
            <fieldset>
                <legend>Profile Review</legend>
                <form method="POST" action="">
                    <table>
                        <tr>
                            <td>Profile Name:</td>
                            <td><input type="text" name="profile_name" required></td>
                        </tr>
                        <tr>
                            <td>Rating (1-5):</td>
                            <td>
                                <select name="profile_rating" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Review:</td>
                            <td><textarea name="profile_review" rows="5" required></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input type="submit" name="submit_profile" value="Submit Review">
                                <input type="reset" value="Reset">
                            </td>
                        </tr>
                    </table>
                </form>
                <?php if (isset($profile_message)) echo $profile_message; ?>
            </fieldset>
        </div>
    </div>

</body>
</html>
