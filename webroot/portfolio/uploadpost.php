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

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $title = $_POST["title"];
        $body = $_POST["body"];
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO BLOGPOSTS (postTitle, postBody, postDate)
        VALUES ('$title', '$body', '$date')";

        if ($conn -> query($sql) === TRUE) {
            echo "Post added! Redirecting...";
            header("location:http://cakephp-mysql-persistent-ecs417-jatin.apps.okd.eecs.qmul.ac.uk/portfolio/viewblog.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }