<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $sql = "INSERT INTO USERS (firstName, lastName, email, password)
        VALUES ('$fname', '$sname', '$email', '$password')";
        if ($conn -> query($sql) === TRUE) {
            $_SESSION['user'] = '$fname';
        //Your code
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
            $conn->close();
    }
?>