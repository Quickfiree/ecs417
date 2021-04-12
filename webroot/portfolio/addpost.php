<?php
    session_start();
    if (!isset ($_SESSION['user'])) {
        header("location:http://cakephp-mysql-persistent-ecs417-jatin.apps.okd.eecs.qmul.ac.uk/portfolio/login.html");
    }
?>
<html>
    <head>
        <title> Add a blog post </title>
        <meta name = "viewport" content = "width = device-width, initial-scale = 1, shrink-to-fit = no">
        <link rel = "stylesheet" href = "addpost.css">
    </head>
    <body>
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
                    <a href = "http://cakephp-mysql-persistent-ecs417-jatin.apps.okd.eecs.qmul.ac.uk/portfolio/addpost.php" class = "active">Add a blog post</a>
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
        <div class = "padding"></div>
        <form method = "POST" id = "addPost" action = "uploadpost.php">
            <h2>
                New Blog Post
            </h2>
                <div>
                    <h3>
                        Title
                    </h3>
                    <input type = "text" id = "title" name = "title" class = "title" placeholder = "Enter title" required>
                </div>
                <div>
                    <h3>
                        Body
                    </h3>
                    <textarea class = "blogBody" id = "body" name = "body" placeholder = "Enter text" required></textarea>
                </div>
                <div class = "buttons">
                    <input type = "submit" class = "button" id = "submit" value = "Post" onclick = "check()">
                    <script>
                        function check() {
                            if (document.getElementById("title").value == "" && document.getElementById("body").value == "") {
                                alert("Cannot submit, you have empty boxes!");
                                document.getElementById("title").style.border = "0.1em solid #FF0000";
                                document.getElementById("body").style.border = "0.1em solid #FF0000";
                                event.preventDefault();
                            } else if (document.getElementById("title").value == "") {
                                alert("Cannot submit, you have empty boxes!");
                                document.getElementById("title").style.border = "0.1em solid #FF0000";
                                event.preventDefault();
                            } else if (document.getElementById("body").value == "") {
                                alert("Cannot submit, you have empty boxes!");
                                document.getElementById("body").style.border = "0.1em solid #FF0000";
                                event.preventDefault();
                            }

                            // Reset border colours when they are clicked
                            document.getElementById("title").addEventListener("click", resetTitle);
                            document.getElementById("body").addEventListener("click", resetBody);
                            function resetTitle() {
                                document.getElementById("title").style.border = null;
                            }
                            function resetBody() {
                                document.getElementById("body").style.border = null;
                            }
                        }
                    </script>
                    <input type = "button" class = "button" onclick = "previewPost()" value = "Preview post">
                    <script>
                        function previewPost() {
                            document.getElementById("preview").style.display = "block";
                            document.getElementById("previewTitle").value = document.getElementById("title");
                            document.getElementById("previewBody").value = document.getElementById("body");
                        }
                    </script>
                    <input type = "button" class = "button" onclick = "clearPost()" value = "Reset">
                    <script>
                        function clearPost() {
                            // Clear post and highlighting
                            var r = confirm("Are you sure you want to clear your post?");
                            if (r == true) document.getElementById("addPost").reset();
                            document.getElementById("title").style.border = null;
                            document.getElementById("body").style.border = null;
                        }
                    </script>
                </div>
        </form>
        <aside id = "preview">
            <h1 id = "previewTitle"></h1>
            <p id = "previewBody"></p>
        </aside>
    </body>
</html>