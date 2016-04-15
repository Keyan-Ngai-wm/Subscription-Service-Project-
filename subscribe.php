<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="subscribe.css">
    <link href='https://fonts.googleapis.com/css?family=Cinzel' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="jquery-2.1.4.min%20(1).js"></script>
    <script type="text/javascript" src="home.js"></script>
    <meta charset="UTF-8">
    <title> Line Up </title>
</head>
<style>
    element.style{
        color: azure;
    }
</style>
<body>
<div class="hover-space">
    <header>
        <div class="logo">Line Up</div>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="#" class="active">Chapter 1</a></li>
                <li><a href="#">Chapter 2</a></li>
                <li><a href="#">Chapter 3</a></li>
                <li><a href="#">Chapter 4</a></li>
                <li><a href="#">Chapter 5</a></li>
                <li><a href="#">Chapter 6</a></li>
                <li><a href="#">Contact </a></li>
                <li><a href="#">FAQ</a></li>
            </ul>
        </nav>
    </header>
</div>
<div class="textbox">
    Subscribe to LineUp
</div>
<center>

    <?php
    $dbh = new PDO('mysql:host=localhost;dbname=subscription', 'root', 'root');
    if(isset($_POST['submit'])) {
        $first_name = $_POST['first_name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];


        $query = "INSERT INTO user_info (first_name, email, username, password, approve)" .
            "VALUES(:first_name, :email, :username, :email, 0)";

        $stmt = $dbh->prepare($query);
        $result = $stmt->execute(
            array(
                'first_name' => $first_name,
                'email' => $email,
                'username' => $username,
                'password' => $password
            )
        );
        if (isset($_POST['submit'])) {
            echo '<p class="subContent">Thank you for subscribing to LineUp.</p>';
            echo '<p class="subContent">Your name is ' . $first_name . '</p>';
            echo '<p class="subContent">Your email ' . $email . '</p>';
            echo '<p class="subContent"> Your username ' . $username . '</p>';
            echo '<p class="subContent"> Your password is ' . $password . '</p>';
        }
    }
    ?>
    <form method="post" action="subscribe.php" class="form">
        <label for="first_name" style="color: white">First & Last Name: </label>
        <input type="text" id="first_name" name="first_name"/><br>
        <label for="email" style="color: white">Email: </label>
        <input type="text" id="email" name="email"/><br>
        <label for="username" style="color: white">Username: </label>
        <input type="text" id="username" name="username"/><br>
        <label for="password" style="color: white">Password: </label>
        <input type="password" id="password" name="password"/><br>
        <input type="submit" value="Submit" name="submit"/>
    </form>
</center>
<footer>
    <a href="http://lineup.com" target="_blank">lineup.com</a>
    <br/>
</footer>
</body>
</html>