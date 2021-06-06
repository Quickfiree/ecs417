<?php
    session_start();
    session_unset();
    session_destroy();

    header("location:http://cakephp-mysql-persistent-ecs417-jatin.apps.okd.eecs.qmul.ac.uk/portfolio/index.php");
    exit();
?>