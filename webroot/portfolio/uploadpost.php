<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $sql = "INSERT INTO BLOGPOSTS (postTitle, postBody, postDate)
        VALUES ('$title', '$body', date('Y-m-d H:i:s'))";

        if ($conn -> query($sql) === TRUE) {
            echo "Post added! Redirecting...";
            //header("location:http://cakephp-mysql-persistent-ecs417-jatin.apps.okd.eecs.qmul.ac.uk/portfolio/viewblog.php");
            //exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }