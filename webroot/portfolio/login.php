<?php
    session_start();

    $dbhost = getenv("MYSQL_SERVICE_HOST");
    $dbport = getenv("MYSQL_SERVICE_PORT");
    $dbuser = getenv("DATABASE_USER");
    $dbpwd = getenv("DATABASE_PASSWORD");
    $dbname = getenv("DATABASE_NAME");

    // Creates connection to database
    $conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);

    // Checks connection
    if ($conn -> connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    

    // To verify the login
    $email = $_POST["email"];
    $password = $_POST["password"];
    $query = "SELECT * FROM USERS WHERE email = '$email' AND password = '$password'";

    $res = mysqli_query($conn, $query);
    if (mysqli_num_rows($res) == 1) {
        $row = $result -> fetch_assoc();
        echo "Email: ". row["email"] . "- Password: " . $row["password"];
    } else {
        echo "0 results";
    }
?>