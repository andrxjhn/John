<?php
    session_start();
    if(!isset($_SESSION["user"])){
        header("Location: login.php");
    }
    $username = $_SESSION["user_name"]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="intro.css">
    <title></title>
</head>
<body>
    <main>
        <nav>
            <h1>AC</h1>
            <div class="nav-links">
                <ul>
                    <li><a href="#main-page">HOME</a></li>
                    <li><a href="#abt">ABOUT</a></li>
                    <li><a href="#over">SKILLS</a></li>
                    <li><a href="#on">CONTACT</a></li>
                    <p class="user" ><strong style=" margin-left: -740px; color:ffffff;">Welcome back, <?php echo $username; ?>!</strong></p>
                </ul>
            </div>
        </nav>
        <div class="main-page" id="main-page">
            <div class="row">
                <div class="col-1">
                    <h1>HI, WELCOME</h1>
                    <p> I'm Andrei Catu, a 2nd-year college student pursuing a degree in Bachelor of Science in Information Technology with specialization in Mobile and Internet Technology. </p>
                </div>
                <div class="col-2">
                    <img src="andrei.jpg" alt="img" />
                </div>
            </div>
        </div>

        <!-- About Section -->
        <div id="abtspace"> </div>
        <div id="bgabt">
        <h1 id="abt">ABOUT</h1>
        <div class="about-section">
            <div class="about-row">
                <div class="about-col">
                    <p> Name: Andrei John V. Catu </p>
                    <p> Nickname: Andrei, Drei or Aj </p>
                    <p> Zodiac Sign: Pisces </p>
                    <p> Chinese Zodiac Sign: Goat </p>
                    <p> Blood Type: O </p>
                    <p> Height: 5'10 </p>
                    <p> Weight: 60kg </p>
                    <p> MBTI Type: ISTJ </p>
                    <p> Nationality: Filipino </p>
                    <p><strong>EDUCATION</strong></p>
                    <p> Pre-School: Happy Little Lamb </p>
                    <p> Elementary: Holy Angel School of Caloocan Inc. </p>
                    <p> High School: Holy Angel School of Caloocan Inc. </p>
                    <p> Senior High: Holy Angel School of Caloocan Inc. </p>
                    <p> College: National University Fairview </p>
                </div>
                <div class="about-col2">
                    <img id='andrei'src="john.jpg" alt="img" />
                </div>
                <div class="about-col2">
                    <img id='andrei'src="dre.jpg" alt="img" />
                </div>
                <div class="about-col2">
                    <img id='andrei'src="jay.jpg" alt="img" />
                </div>
            </div>
        </div>
    </div>
        <div id="abtspace"> </div>
   
         <!-- Skills Section -->
        <div class="skills-section">
            <h1 id="over">SKILLS</h1>
            <div class="skills-list">
                <div class="Skill">
                    <h3 id="in">Soft Skills</h3>
                    <ul id="ti">
                        <li>Active Listening</li>
                        <li>Common Sense</li>
                        <li>Communication</li>
                        <li>Empathy</li>
                        <li>Integrity</li>
                        <li>Leadership</li>
                        <li>Positivity</li>
                        <li>Self Management</li>
                        <li>Teamwork</li>
                        <li>Time Management</li>
                    </ul>
                    <img id='v10'src="v10.jpg" alt="img" />
                </div>

         <!-- Contact Section -->
         <div class="contact-section">
            <div id="abtspace2"> </div>
            <h1 id="on">CONTACT</h1>
            <div class="contact-details">
                <p><strong>Email:</strong> <a href="mailto:andreijohncatu.email@gmail.com">andreijohncatu@gmail.com</a></p>
                <p><strong>LinkedIn:</strong> <a href="https://www.linkedin.com/in/andrei-john-catu-372b76253/" target="_blank">Andrei John Catu</a></p>
                <p><strong>Facebook:</strong> <a href="https://www.facebook.com/andrei.catu.3" target="_blank">Andrei Catu</a></p>
                <p><strong>Instagram:</strong> <a href="https://www.instagram.com/andrxjhn/" target="_blank">andrxjhn</a></p>
                <p><strong>Github:</strong> <a href="https://github.com/dashboard" target="_blank">andrxjhn</a></p>
                <p><strong>Tiktok:</strong> <a href=https://www.tiktok.com/@andrxjhn target="_blank">andrxjhn</a></p>
                <p><strong>X:</strong> <a href="https://twitter.com/andrxjhn" target="_blank">andrxjhn</a></p>
                <br>
                <div class="comment-section">
                    <h4>Leave a Comment</h4>
                    <form action="" method="post" class="comment-form">
                        <textarea name="comment" class="comment-textarea" placeholder="Your Message"></textarea>
                        <button class="comment-submit">Submit</button>
                    </form>
                </div>
                <?php
                if(isset($_POST["comment"])){
                        $message = $_POST["comment"];
                        $date = date("Y-m-d");

                        // Get the user's ID from the session
                        if(isset($_SESSION["user_id"])) {
                            $user_id = $_SESSION["user_id"];
                        } else {
                            // Handle the case where user ID is not set in session
                            die("User ID not found in session");
                        }

                        require_once("database.php");

                        $sql = "INSERT INTO user_comment(ID, DATE, MESSAGE) VALUES (?, ?, ?)";

                        $stmt = mysqli_stmt_init($conn);

                        $preparestmt = mysqli_stmt_prepare($stmt, $sql);

                        if ($preparestmt) {
                            mysqli_stmt_bind_param($stmt, "sss", $user_id, $date, $message);
                            mysqli_stmt_execute($stmt);
                            echo "<div class='alert alert-success'>Comment sent successfully!</div>";
                        } else {
                            die("Something went wrong");
                        }
                    }
                ?>
                 <a href="logout.php" class="btn-btn-warning" style="margin-left: 1134px;">LOGOUT</a>
            </div>
                <div id="abtspace5"> <h5>©2024 AndreiCatu. All rights reserved.</h5> </div>
        </div>
    </main>
</body>
</html>
