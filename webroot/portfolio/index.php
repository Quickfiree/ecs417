<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "portfolio_index.css">
    <title> Home - Jatinkumar Patel </title>
</head>
<body>
    <script>
        function showLogOut() {
            document.getElementById("loginButton").innerHTML = '<a href = "http://cakephp-mysql-persistent-ecs417-jatin.apps.okd.eecs.qmul.ac.uk/portfolio/login.html">Log Out</a>';
        }
    </script>
    <?php
    session_start();

    if (isset ($_SESSION['user'])) {
    // Do if user is logged in
        //echo "showLogOut();";
        
    } else {
        // Nobody is logged in
    }
    ?>
    <nav>
        <ul class = "horizontal">
            <li>
                <a href = "http://cakephp-mysql-persistent-ecs417-jatin.apps.okd.eecs.qmul.ac.uk/portfolio/index.php" class = "active">Home</a>
            </li>
            <li>
                <a href = "http://cakephp-mysql-persistent-ecs417-jatin.apps.okd.eecs.qmul.ac.uk/portfolio/projects.html">Projects</a>
            </li>
            <li>
                <a href = "http://cakephp-mysql-persistent-ecs417-jatin.apps.okd.eecs.qmul.ac.uk/portfolio/addpost.html">Add a blog post</a>
            </li>
            <li>
                <a href = "https://www.linkedin.com/in/jatinkumar-patel-5139a8201/">Contact - LinkedIn</a>
            </li>
            <li id = "loginButton">
                <script> showLogOut(); </script>
            </li>
        </ul>
    </nav>
    <div class = "main">
        
        <header>
            <hgroup> 
                <h2>
                    Jatinkumar Patel
                </h2>
                <h3>
                    BSc Computer Science - Queen Mary University of London
                </h3>
            </hgroup>
        </header>
        <article>
            <section id = "aboutMyself">
                <figure>
                    <img src = "http://cakephp-mysql-persistent-ecs417-jatin.apps.okd.eecs.qmul.ac.uk/topic2/Jatin_profilepic.jpg" alt = "Can't see this image. :(" width = "222" height = "262">
                    <figcaption>Aspiring Game Developer</figcaption>
                </figure>
                <h2> 
                    About myself
                </h2>
                <p>
                    My name is Jatinkumar Patel and I am a student at Queen Mary University of London, studying Computer Science with a Year in Industry. My interests mainly lie in game and web development, 
                    however other fields such as AI and Data Science are also intriguing to go into.
                </p>
            </section>
            <section id = "skills">
                <h2 id>
                    Skills and achievements
                </h2>
                <p>
                    My top  skills are:
                    <ul>
                        <li>
                            Java programming
                        </li>
                        <li>
                            HTML/CSS
                        </li>
                    </ul>
                </p>
            </section>
            <section id = "education">
                <h2 id> 
                    Education
                </h2>
                <h4>Queen Mary University of London: September 2020 - present</h4>
                <p>
                    BSc Computer Science - Current modules are:
                    <ul class = "modules">
                        <li>
                            Object-Oriented Programming
                        </li>
                        <li>
                            Information Systems Analysis
                        </li>
                        <li>
                            Automata and Formal Languages
                        </li>
                        <li>
                            Fundamentals of Web Technology
                        </li>
                    </ul>
                </p>
                <h4>London Academy of Excellence Tottenham: September 2017 – June 2020</h4>
                <p>
                    Completed A-Levels in:
                    <ul class = "modules">
                        <li>
                            Maths
                        </li>
                        <li>
                            Computer Science
                        </li>
                        <li>
                            Design Technology Engineering
                        </li>
                        <li>
                            Gujarati
                        </li>
                    </ul>
                </p>
                <h4>Heartlands High School: September 2012 - June 2017</h4>
                <p>
                    Completed GCSEs 3 As, 7 Bs, 2 Cs including Maths (A) and English (A)
                </p>
            </section>
            <section id = "experience">
                <h2>Experience</h2>
                <h4>HAIL Tottenham: March 2016</h4>
                <p>
                    Undertook admin work in the main office and completed graphic design for the company website.
                </p>
                <h4>Volunteering at BAPS Swaminarayan Sunday School: September 2015 – February 2018</h4>
                <p>
                    Teaching Gujarati to children in various year groups ranging from foundation to GCSE level. Started as an assistant teacher and slowly worked my way up to teaching my own class.
                </p>
                <h4>Community Hub Haringey: June 2016 – August 2016</h4>
                <p>
                    Completing administrative work in the office.
                </p>
            </section>
        </article>
        <aside>
            <div class = "blog">
                <h1> Blog placeholder </h1>
            </div>
        </aside>
        <footer>
            <p>
                <a href = "http://cakephp-mysql-persistent-ecs417-jatin.apps.okd.eecs.qmul.ac.uk/portfolio/index.html">Home</a>
                |
                <a href = "https://github.com/Quickfiree/">Github</a>
            </p>
            <p><i>Copyright &copy; 2021 Jatinkumar Patel</i></p>
        </footer>
    </div>
</body>
</html>