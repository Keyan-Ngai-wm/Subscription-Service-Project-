<?php
require_once ('authentication.php');
?>
​
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Lineup - Approve a user</title>
    <link rel="stylesheet" type="text/css" href="approve.css" />
</head>
<body>
<section>
    <h2>Lineup - Approve a user</h2>
    <?php
    if (isset($_GET['id']) && isset($_GET['first_name']) && isset($_GET['email']) && isset($_GET['username'])) {
        // Grab the score data from the GET
        $id = $_GET['id'];
        $first_name = $_GET['first_name'];
        $email = $_GET['email'];
        $username = $_GET['username'];
        $password = $_GET['password'];
    }
    else if (isset($_POST['id']) && isset($_POST['email']) && isset($_POST['username'])) {
        // Grab the score data from the POST
        $id = $_POST['id'];
        $email = $_POST['email'];
        $username = $_POST['username'];
    }
    else {
        echo '<p class="error">Sorry, no user was specified for approval.</p>';
    }
    if (isset($_POST['submit'])) {
        if ($_POST['confirm'] == 'Yes') {
            // Connect to the database
            $dbh = new PDO('mysql:host=localhost;dbname=subscription', 'root', 'root');
            // Approve the score by setting the approved column in the database
            $query = "UPDATE user_info SET approve = 1 WHERE id = $id";
            $stmt = $dbh->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
            // Confirm success with the user
            echo '<p>The user' . $username . ' for ' . $email . ' was successfully approved.';
        }
        else {
            echo '<p class="error">Sorry, there was a problem approving the user.</p>';
        }
    }
    else if (isset($id) && isset($email) && isset($first_name) && isset($username)) {
        echo '<p>Are you sure you want to approve the following user?</p>';
        echo '<p><strong>Email: </strong>' . $email . '<br /><strong>Date: </strong>' . $first_name .
            '<br /><strong>Score: </strong>' . $username . '</p>';
        echo '<form method="post" action="approveuser.php">';
        echo '<p><strong>Password:' . $password. '</strong></p><br />';
        echo '<input type="radio" name="confirm" value="Yes" /> Yes ';
        echo '<input type="radio" name="confirm" value="No" checked="checked" /> No <br />';
        echo '<input type="submit" value="Submit" name="submit" />';
        echo '<input type="hidden" name="id" value="' . $id . '" />';
        echo '<input type="hidden" name="email" value="' . $email . '" />';
        echo '<input type="hidden" name="username" value="' . $username . '" />';
        echo '</form>';
    }
    echo '<br><br>';
    echo '<p><a href="admin.php">&lt;&lt; Back to admin page</a></p>';
    ?>
    ​</section>
</body>
</html>