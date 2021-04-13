<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "projects.css">
    <title>Projects</title>
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
                    <a href = "http://cakephp-mysql-persistent-ecs417-jatin.apps.okd.eecs.qmul.ac.uk/portfolio/projects.php" class = "active">Projects</a>
                </li>
                <li>
                    <a href = "http://cakephp-mysql-persistent-ecs417-jatin.apps.okd.eecs.qmul.ac.uk/portfolio/viewblog.php">View blog</a>
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
        <header>
            <h1>My Projects</h1>
        </header>
        <article>
            <section id = "javaAdventure">
                <h2>
                    Programming Project - Java Adventure Game
                </h2>
                <p>
                    As part of my Object-Oriented Programming module I had the chance to create an adventure game in Java.
                </p>
                <p>
                    I spent several weeks taking this project from a simple program with only keyboard input and screen output into a 
                    complex tiled map that the player could move around on and find enemies to attack. The aim of the game was to 
                    move around the map and kill every enemy. If the player reaches 0 health, then they lose and have to restart 
                    the game. I introduced many stats for both players and enemies, including health, a damage range for each weapon type,
                    and a chance for a player or enemy to dodge an attack.
                </p>
            </section>
            <figure>
                <img src = "game_ss.png" alt = "Can't see this image. :(">
                <figcaption><i>Text based for now, GUI in progress.</i></figcaption>
            </figure>
            <section id = "minecraftBot">
                <h2>
                    Programming Project - Procedural Minecraft Helper Bot
                </h2>
                <p>
                    As part of my Procedural Programming module in Semester A of 1st Year, I had to create a minecraft help bot which acted as a guide for a user. 
                </p>
                <p>
                    This Java project was completed in small steps, starting from just getting a basic user input to trigger an output on the screen. I then worked 
                    my way up into programming a bot that could recognise a trigger word in the user's input, and send an output to the user based on that trigger.
                    The final stage was to be able to save answers to a file and then have an option to load them in when you first open the program. Undertaking this
                    project taught me many things about Java, especially when it came to file writing and handling exceptions to do with it. My overall programming style
                    became more efficient as I progressed, and I could make small edits to my code to make things easier both to understand when reading the code,
                    and to make the program execution more robust.
                </p>
            </section>
            <figure>
                <img src = "Screenshot_63.png" alt = "Can't see this image. :(">
                <figcaption><i>An example of the file input/output methods being used in the bot</i></figcaption>
            </figure>
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