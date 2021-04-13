<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "projects.css">
    <title>Blog Posts</title>
</head>
<body>
        <?php
            session_start();
        ?>
        <script>
            function showLogOut() {
                document.getElementById("loginButton").innerHTML = '<a href = "http://cakephp-mysql-persistent-ecs417-jatin.apps.okd.eecs.qmul.ac.uk/portfolio/logout.php">Log Out</a>';
            }

            function showLogIn() {
                document.getElementById("loginButton").innerHTML = '<a href = "http://cakephp-mysql-persistent-ecs417-jatin.apps.okd.eecs.qmul.ac.uk/portfolio/login.html">Log In</a>';
            }
        </script>
        <nav>
            <ul class = "horizontal">
                <li>
                    <a href = "http://cakephp-mysql-persistent-ecs417-jatin.apps.okd.eecs.qmul.ac.uk/portfolio/index.php">Home</a>
                </li>
                <li>
                    <a href = "http://cakephp-mysql-persistent-ecs417-jatin.apps.okd.eecs.qmul.ac.uk/portfolio/projects.php">Projects</a>
                </li>
                <li>
                    <a href = "http://cakephp-mysql-persistent-ecs417-jatin.apps.okd.eecs.qmul.ac.uk/portfolio/viewblog.php" class = "active">View blog</a>
                </li>
                <li>
                    <a href = "http://cakephp-mysql-persistent-ecs417-jatin.apps.okd.eecs.qmul.ac.uk/portfolio/addpost.php">Add a blog post</a>
                </li>
                <li>
                    <a href = "https://www.linkedin.com/in/jatinkumar-patel-5139a8201/">Contact - LinkedIn</a>
                </li>
                <li id = "loginButton">

                </li>
            </ul>
        </nav>
        <?php
            if (isset ($_SESSION['user'])) {
            // Do if user is logged in
                echo '<script type = "text/javascript">showLogOut();</script>';
                
            } else {
                // Nobody is logged in
                echo '<script type = "text/javascript">showLogIn();</script>';
            }
        ?>
    <div class = "main">
        <article>
        <form action = "viewblog.php" method = "POST">
            <input type = "date" name = "date">
            <input type = "submit" value = "SORT" name = "sortDate">
        </form>
        <?php
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
                $new_date = date('Y-m-d', strtotime($_POST['date']));
                $timestamp = strtotime($new_date);
                $month = date("n", $timestamp);
                echo $month;
                $query = "SELECT * FROM BLOGPOSTS WHERE MONTH(postDate) = $month";
                $res = mysqli_query($conn, $query);
                $rows = mysqli_num_rows($res);
                $dateArray = array();

                for ($i = 0; $i < $rows; $i++) {
                    $row = $res->fetch_assoc();
                    $dateArray[$i] = array("date" => $row['postDate'], "time" => $row['postTime'], $row['postTitle'], $row['postBody']);
                }

                array_multisort( // Sorts according to oldest first
                    array_map('strtotime', array_column($dateArray, 'date')),
                    array_column($dateArray, 'time'),
                    $dateArray
                );

                $dateArray = array_reverse($dateArray); // Reverses the array to make the order newest first.

                for ($i = 0; $i < $rows; $i++) {
                    $title = $dateArray[$i][0];
                    $body = $dateArray[$i][1];
                    echo "<section><h1>$title</h1>";
                    echo "<p>$body</p></section>";
                }
                
            } else {
                // First get dates and sort them
                $query = "SELECT * FROM BLOGPOSTS";
                $res = mysqli_query($conn, $query);
                $rows = mysqli_num_rows($res);
                $dateArray = array();

                for ($i = 0; $i < $rows; $i++) {
                    $row = $res->fetch_assoc();
                    $dateArray[$i] = array("date" => $row['postDate'], "time" => $row['postTime'], $row['postTitle'], $row['postBody']);
                }

                array_multisort( // Sorts according to oldest first
                    array_map('strtotime', array_column($dateArray, 'date')),
                    array_column($dateArray, 'time'),
                    $dateArray
                );

                $dateArray = array_reverse($dateArray); // Reverses the array to make the order newest first.

                for ($i = 0; $i < $rows; $i++) {
                    $title = $dateArray[$i][0];
                    $body = $dateArray[$i][1];
                    echo "<section><h1>$title</h1>";
                    echo "<p>$body</p></section>";
                }
            }
            /*
            // First get dates and sort them
            $query = "SELECT * FROM BLOGPOSTS";
            $res = mysqli_query($conn, $query);
            $rows = mysqli_num_rows($res);
            $dateArray = array();

            for ($i = 0; $i < $rows; $i++) {
                $row = $res->fetch_assoc();
                $dateArray[$i] = array("date" => $row['postDate'], "time" => $row['postTime'], $row['postTitle'], $row['postBody']);
            }

            array_multisort( // Sorts according to oldest first
                array_map('strtotime', array_column($dateArray, 'date')),
                array_column($dateArray, 'time'),
                $dateArray
            );

            $dateArray = array_reverse($dateArray); // Reverses the array to make the order newest first.

            for ($i = 0; $i < $rows; $i++) {
                $title = $dateArray[$i][0];
                $body = $dateArray[$i][1];
                echo "<section><h1>$title</h1>";
                echo "<p>$body</p></section>";
            }
            */
        ?>
        </article>
        <footer>
            <p>
                <a href = "http://cakephp-mysql-persistent-ecs417-jatin.apps.okd.eecs.qmul.ac.uk/portfolio/index.php">Home</a>
                |
                <a href = "https://github.com/Quickfiree/">Github</a>
            </p>
            <p><i>Copyright &copy; 2021 Jatinkumar Patel</i></p>
        </footer>
    </div>

    
</body>
</html>