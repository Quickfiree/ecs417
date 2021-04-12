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
                // First get dates and sort them
                $query = "SELECT * FROM BLOGPOSTS";
                $res = mysqli_query($conn, $query);
                $rows = mysqli_num_rows($res);
                $dateArray = array();

                for ($i = 0; $i < $rows; $i++) {
                    $row = $res->fetch_assoc();
                    $date = strtotime($row['postDate']);
                    $dateArray[$i] = array($date, $row['postTitle'], $row['postBody']);
                    //echo $dateArray[$i][1];
                }

                function dateSorting($a, $b) {
                    return strtotime($b[0][0]) - strtotime ($a[0][0]);
                }

                usort($dateArray, 'dateSorting');


                for ($i = 0; $i < $rows; $i++) {
                    $row = $res->fetch_assoc();
                    $title = $dateArray[$i][1];
                    $body = $dateArray[$i][2];
                    echo "<section><h1>$title</h1>";
                    echo "<p>$body</p></section>";
                }
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