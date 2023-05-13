<?php 
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sovann_data";

// Retrieve the user's information from the session or database
$username = $_SESSION['username'];

$dsn = "mysql:host=localhost;dbname=sovann_data";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Fetch the user's data from the database, including the 'bolden' column
$stmt = $pdo->prepare("SELECT bolden FROM users WHERE username = :username");
$stmt->bindParam(':username', $username);
$stmt = $pdo->prepare("SELECT isLogin FROM users WHERE username = :username");
$userData = $stmt->fetch(PDO::FETCH_ASSOC);

// Store the value of 'bolden' in a variable

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sovann</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="https://i.postimg.cc/1Rd1Bj5s/logo.png" type="image/x-icon">
    <!-- style css -->
    <link rel="stylesheet" href="style.css">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- navigation -->
    <div class="nav">
        <div class="logo">
            <a href="index.php">
                <img src="https://i.postimg.cc/1Rd1Bj5s/logo.png" alt="logo">
                <h1>Sovann</h1>
            </a>
        </div>
        <div class="menu">
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
        <div class="menuButton" id="menuButtons">
            <a href="dashboard.php" id="profileLink"><button id="signUp" style="background-color: #F9A602;">Profile</button></a>
            <!-- <a href="signIn.html" id="signInLink"><button id="signIn">Sign In</button></a>
            <a href="signUp.html" id="signUpLink"><button id="signUp">Sign Up</button></a> -->
        </div>
    </div>

    <!-- home -->
    <section class="homeHero" id="home">
        <div class="contents">
            <h1>New Invention</h1>
            <p>
                Big news, everyone! Mr. Morm LeapSovann has just unveiled game-changing technology that eliminates the need for simple code. Say hello to streamlined, efficient programming!
            </p>
            <a href="#contact"><button>Ask Me</button></a>
        </div>
        <div class="cards">
            <div class="card active">
                <h2>Greeting!</h2>
                <p id="quote"></p>
            </div>
        </div>
    </section>

    <!-- about -->
    <section class="about" id="about">
        <h1>About</h1>
        <p>coming soon...</p>
    </section>

    <!-- services -->
    <section class="services" id="services">
        <h1>services</h1>
        <p>coming soon...</p>
    </section>

    <!-- contact -->
<section class="contact" id="contact">
    <h1>contact</h1>
    <p>coming soon...</p>
</section>

<!-- footer -->
<section class="footer">
    <div class="f-top">
        <a href="index.php">
            <img src="https://i.postimg.cc/1Rd1Bj5s/logo.png" alt="f-logo">
        </a>
        <p>
            Morm Leapsovann is a 17-year-old individual who is making their way through life with a strong sense of determination and curiosity. Whether they are exploring new ideas, pursuing their passions, or simply enjoying the simple pleasures of everyday life, Morm is always eager to learn and grow as a person.
        </p>
    </div>
    <div class="f-bottom">
        <p>
            © 2023 <a href="index.php">@Morm Leapsovann.</a> All rights reserved.
        </p>
    </div>
</section>

<!-- scroll to top -->
<button class="scroll-top-btn">
    <i class="fa fa-arrow-up"></i>
</button>
<!-- script -->
<script src="script.js"></script>
<script>
        // Check if user is logged in
    
        // Check if user is logged in
        // if(userData() != null)
        // {
            <?php
            $isLogin = $userData['isLogin'];
            ?>
        // }

        var isLogin = <?php echo isset($_SESSION['isLogin']) ? $_SESSION['isLogin'] : 'false'; ?>;
        const isLoggedIn = false; // Replace with your actual login logic
        if (isLogin == true) 
        {
            isLoggedIn = isLogin;
        }
        // Get the menu buttons and profile link
        const menuButtons = document.getElementById("menuButtons");
        const profileLink = document.getElementById("profileLink");
        const signInButton = document.getElementById("signInButton");
        const signUpButton = document.getElementById("signUpButton");

        // Get the user's profile picture
        const profilePicture = document.getElementById("profilePicture"); // Assuming you have an element with the ID "profilePicture"

        // Hide or show the buttons based on login status
        if (isLoggedIn) {
        menuButtons.style.display = "none"; // Hide login and register buttons
        profileLink.style.display = "block"; // Show profile button
        profilePicture.style.display = "block"; // Show profile picture
        profilePicture.addEventListener("click", toggleDropdownMenu);
        } else {
        menuButtons.style.display = "block"; // Show login and register buttons
        profileLink.style.display = "none"; // Hide profile button
        signInButton.style.display = "block"; // Show sign in button
        signUpButton.style.display = "block"; // Show sign up button
        }

        // Toggle dropdown menu
        function toggleDropdownMenu() {
        const dropdownMenu = document.getElementById("dropdownMenu"); // Assuming you have an element with the ID "dropdownMenu"
        dropdownMenu.classList.toggle("show");
        }

        // Close dropdown menu when clicking outside
        window.addEventListener("click", function (event) {
        const dropdownMenu = document.getElementById("dropdownMenu"); // Assuming you have an element with the ID "dropdownMenu"
        if (event.target !== profilePicture && !profilePicture.contains(event.target)) {
            dropdownMenu.classList.remove("show");
        }
        });


</script>
</body>
</html>
