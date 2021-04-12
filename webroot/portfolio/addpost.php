<html>
    <head>
        <title> Add a blog post </title>
        <meta name = "viewport" content = "width = device-width, initial-scale = 1, shrink-to-fit = no">
        <link rel = "stylesheet" href = "addpost.css">
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
                    <a href = "http://cakephp-mysql-persistent-ecs417-jatin.apps.okd.eecs.qmul.ac.uk/portfolio/projects.html">Projects</a>
                </li>
                <li>
                    <a href = "http://cakephp-mysql-persistent-ecs417-jatin.apps.okd.eecs.qmul.ac.uk/portfolio/addpost.php" class = "active">Add a blog post</a>
                </li>
                <li>
                    <a href = "https://www.linkedin.com/in/jatinkumar-patel-5139a8201/">Contact - LinkedIn</a>
                </li>
                <li>
                    <a href = "http://cakephp-mysql-persistent-ecs417-jatin.apps.okd.eecs.qmul.ac.uk/portfolio/login.html">Log In</a>
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
        <form method = "POST" id = "addPost" action = "viewblog.php">
            <h2>
                New Blog Post
            </h2>
                <div>
                    <h3>
                        Title
                    </h3>
                    <input type = "text" id = "title" class = "title" placeholder = "Enter title" required>
                </div>
                <div>
                    <h3>
                        Body
                    </h3>
                    <textarea class = "blogBody" id = "body" placeholder = "Enter text" required></textarea>
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
                    <input type = "button" class = "button" onclick = "clearPost()" value = "Reset">
                    <script>
                        function clearPost() {
                            var r = confirm("Are you sure you want to clear your post?");
                            if (r == true) document.getElementById("addPost").reset();
                        }
                    </script>
                </div>
        </form>
    </body>
</html>