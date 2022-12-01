<?php

    session_start();

    $login = $_SESSION['login'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sek_school";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

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
    <style>

* {
    margin: 0;
    font-family: 'Montserrat', sans-serif;
}

body {
    display: flex;
    width: 100vw;
    height: 100vh;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    background: rgb(238,174,202);
    background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);
}

input {
    display: flex;
    border-radius: 10px;
    flex-direction: column;
    margin: 10px;
    text-align: center;
}

::placeholder {
    text-align: center;
}

#forms {
    display: flex;
    background: rgb(238,174,202);
    background: radial-gradient(circle, rgba(238,174,202,1) 37%, rgba(148,187,233,1) 100%);
    display: flex;
    justify-content: center;
    align-items: center;
    align-items: flex-start;
    flex-direction: row;
    border-radius: 50px;
    width: 65vw;
}

h1 {
    text-align: center;
}

p {
    font-size: 30px;
    font-style: italic;
}

#form {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

#userform {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

    </style>
    <title>Editor's Mode</title>
</head>
<body>
    <p>Logged In Successfully!</p><br>

<div id="forms">

    <form action="index3.php" method="POST" id="form">

        <br><h1>Class</h1><br>

        <input type="text" name="classname" placeholder="Class Name"><br><br>
        <input type="submit" value="Submit" name="bttn1">

        <?php

        if(isset($_POST['bttn1']) && isset($_POST['classname']) != '') {

            $classname = $_POST['classname'];

            $sql = "INSERT INTO class (name, added_by) VALUES ('$classname', (SELECT id FROM users WHERE login='$login'));";

            mysqli_query($conn, $sql);
        };

        $sql = "SELECT * FROM class WHERE added_by=(SELECT id FROM users WHERE login='$login');";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            echo "<br><table><tr><th colspan=3>Classes:</th></tr>";
            echo "<tr><th>ID</th><th>Name</th></tr>";

        while ($row = $result->fetch_assoc()) {

            echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td></tr>";

            };

        echo "</table>";

        };

        ?>

    </form>

    <form action="index3.php" method="POST" id="form">    

        <br><h1>Student</h1><br>

        <input type="text" name="studentname" placeholder="Student's Name"><br><br>
        <input type="text" name="studentsurname" placeholder="Student's Surname"><br><br>
        <input type="text" name="classid" placeholder="Class ID"><br><br>
        <input type="submit" value="Submit" name="bttn2">

        <?php

        if(isset($_POST['bttn2']) && isset($_POST['studentname']) != '' && isset($_POST['studentsurname']) !='' && isset($_POST['classid']) !='') {

            $studentname = $_POST['studentname'];
            $studentsurname = $_POST['studentsurname'];
            $classid = $_POST['classid'];

            $sql = "INSERT INTO student (name, surname, class_id, added_by) VALUES ('$studentname', '$studentsurname', '$classid', (SELECT id FROM users WHERE login='$login'));";
    
            mysqli_query($conn, $sql);

        };

        $sql = "SELECT * FROM student WHERE added_by=(SELECT id FROM users WHERE login='$login');";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            echo "<br><table><tr><th colspan=3>Students:</th></tr>";
            echo "<tr><th>ID</th><th>Name</th><th>Surname</th><th>Class ID</th></tr>";

        while ($row = $result->fetch_assoc()) {

            echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["surname"]."</td><td>".$row["class_id"]."</td></tr>";

            };

        echo "</table>";
        };

        ?>

    </form>


    <form action="index3.php" method="POST" id="form">

        <br><h1>Subject</h1><br>

        <input type="text" name="subjectname" placeholder="Subject's Name"><br><br>
        <input type="text" name="classidsub" placeholder="Class ID"><br><br>
        <input type="submit" value="Submit" name="bttn3">

        <?php

            if(isset($_POST['bttn3']) && isset($_POST['subjectname']) !='' && isset($_POST['classidsub']) !='') {

                $subjectname = $_POST['subjectname'];
                $classidsub = $_POST['classidsub'];

                $sql = "INSERT INTO subject (name, class_id, added_by) VALUES ('$subjectname', '$classidsub', (SELECT id FROM users WHERE login='$login'));";

                mysqli_query($conn, $sql);

            };

            $sql = "SELECT * FROM subject WHERE added_by=(SELECT id FROM users WHERE login='$login');";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    echo "<br><table><tr><th colspan=3>Subject's Name:</th></tr>";
                    echo "<tr><th>ID</th><th>Name</th><th>Class ID</th></tr>";

                while ($row = $result->fetch_assoc()) {

                    echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["class_id"]."</td></tr>";

                    };

                echo "</table>";
                };

        ?>

    </form>

    <form action="index3.php" method="POST" id="form">

        <br><h1>Teacher</h1><br>

        <input type="text" name="teachername" placeholder="Teacher's Name"><br><br>
        <input type="text" name="teachersurname" placeholder="Teacher's Surname"><br><br>
        <input type="text" name="age" placeholder="Age"><br><br>
        <input type="submit" value="Submit" name="bttn4">

        <?php

            if(isset($_POST['bttn4']) && isset($_POST['teachername']) !='' && isset($_POST['teachersurname']) !='' && isset($_POST['age']) !='') {

                $teachername = $_POST['teachername'];
                $teachersurname = $_POST['teachersurname'];
                $age = $_POST['age'];
                
                $sql = "INSERT INTO teacher (id, name, surname, age, added_by) VALUES (NULL, '$teachername', '$teachersurname', '$age', (SELECT id FROM users WHERE login='$login'));";

                mysqli_query($conn, $sql);

            };

            $sql = "SELECT * FROM teacher WHERE added_by=(SELECT id FROM users WHERE login='$login');";
            $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            echo "<br><table><tr><th colspan=3>Teachers:</th></tr>";
            echo "<tr><th>ID</th><th>Name</th><th>Surname</th><th>Age</th></tr>";

        while ($row = $result->fetch_assoc()) {

            echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["surname"]."</td><td>".$row["age"]."</td></tr>";

            };

        echo "</table>";
        };


        ?>

    </form>

    <div id="userform">

        <br><h1>User</h1><br>

        <form action="index3.php" method="POST" id="userform">

            <input type="text" name="newlogin" placeholder="Your new login"><br>
            <input type="submit" value="Submit" name="bttnlogin"><br><br>

        </form>

            <?php

                if(isset($_POST['bttnlogin']) && isset($_POST['newlogin'])) {

                    $newlogin = $_POST['newlogin'];

                    $sql = "UPDATE users SET login='$newlogin' WHERE login='" . $_SESSION['login'] . "'; ";

                    mysqli_query($conn, $sql);

                    $_SESSION['login'] = $newlogin;
                }

            ?>

        <form action="index3.php" method="POST" id="userform">

            <input type="text" name="newsurname" placeholder="Your new surname"><br>
            <input type="submit" value="Submit" name="bttnusersurname"><br><br>

            <?php

                if(isset($_POST['bttnusersurname']) && isset($_POST['newsurname'])) {

                    $newsurname = $_POST['newsurname'];

                    $sql = "UPDATE users SET surname='$newsurname' WHERE login='" . $_SESSION['login'] . "'; ";

                    mysqli_query($conn, $sql);
                }

            ?>

        </form>

        <form action="index3.php" method="POST" id="userform">

            <input type="text" name="newusername" placeholder="Your new username"><br>
            <input type="submit" value="Submit" name="bttnnewusername"><br><br>

            <?php

                if(isset($_POST['bttnnewusername']) && isset($_POST['newusername'])) {

                    $newusername = $_POST['newusername'];

                    $sql = "UPDATE users SET name='$newusername' WHERE login='" . $_SESSION['login'] . "'; ";

                    mysqli_query($conn, $sql);
                }

            ?>

        </form>

        <form action="index3.php" method="POST" id="userform">

            <input type="text" name="newpass" placeholder="Your new password"><br>
            <input type="submit" value="Submit" name="bttnnewpass"><br><br>

            <?php

                if(isset($_POST['bttnnewpass']) && isset($_POST['newpass'])) {

                    $newpass = sha1($_POST['newpass']);

                    $sql = "UPDATE users SET pass='$newpass' WHERE login='" . $_SESSION['login'] . "'; ";

                    mysqli_query($conn, $sql);
                }

            ?>

        </form>

        <form action="index3.php" method="POST" id="userform">

            <input type="text" name="newage" placeholder="Your new age"><br>
            <input type="submit" value="Submit" name="bttnnewage">

            <?php

                if(isset($_POST['bttnnewage']) && isset($_POST['newage'])) {

                    $newage = $_POST['newage'];

                    $sql = "UPDATE users SET age='$newage' WHERE login='" . $_SESSION['login'] . "'; ";

                    mysqli_query($conn, $sql);
                }

            ?>

        </form>

    </div>

</div>
</body>
</html>