<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Registration Form</title>
</head>
<body>

<div><form action="index.php" method="POST" id="registration">

    <h1>Registration</h1><br>

    <input type="text" name="login" placeholder="Login" required>
    <input type="text" name="pass" placeholder="Pass" required>
    <input type="text" name="username" placeholder="Name" required>
    <input type="text" name="usersurname" placeholder="Surname" required>
    <input type="text" name="userage" placeholder="Age" required>
    <input type="submit" name="add" value="submit" required>

</form></div>

<?php

if(isset($_POST['add'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sek_school";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
    die("Coś nie pykło: " . mysqli_connect_error());
    }
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $username = $_POST['username'];
    $usersurname = $_POST['usersurname'];
    $userage = $_POST['userage'];
    $hash = sha1($pass);
    $sql = "INSERT INTO users (login, pass, name, surname, age) VALUES ('$login', '$hash', '$username', '$usersurname', '$userage')";
    if (mysqli_query($conn, $sql)) {
    echo "Dodane xD";
    header('location: index2.php');
    } else {
    echo "Nie dziaua : " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>
    
</body>
</html>


