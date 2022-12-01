<?php

session_start();

if(isset($_POST['submit'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sek_school";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Coś nie pykło: " . mysqli_connect_error());
    }
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $hash = sha1($pass);
    $sql = "SELECT * FROM users WHERE login='$login' and pass='$hash';";
    $result = mysqli_query($conn, $sql);
    if ($result > 0) {
        $_SESSION['login']=$login;
        header('location: index3.php');
    } else {
        echo "Error - something's wrong!";
        session_destroy();
    };
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div><form action="index2.php" method="POST" id="registration">

    <h1>Log In Form</h1><br>

    <input type="text" name="login" placeholder="Login">
    <input type="text" name="pass" placeholder="pass">
    <input type="submit" name="submit" value="submit">

</form></div>
    
</body>
</html>