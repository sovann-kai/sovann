<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: signIn.html");
    exit;
}

// Retrieve the user's information from the session
$username = $_SESSION['username'];

// Retrieve additional user information from your database or session storage
$full_name = ""; // Replace with the actual value from your database or session
$email = ""; // Replace with the actual value from your database or session

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | <?php echo $username; ?></title>
    <!-- favicon -->
    <link rel="shortcut icon" href="https://i.postimg.cc/1Rd1Bj5s/logo.png" type="image/x-icon">
    <!-- style css -->
    <link rel="stylesheet" href="style.css">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* Customize your dashboard styles here */
        .dashboard-container {
            text-align: center;
            padding: 50px;
            background-color: #f1f1f1;
        }

        .dashboard-avatar {
            position: relative;
            display: inline-block;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            overflow: hidden;
            cursor: pointer;
        }

        .dashboard-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .dropdown-container {
            display: inline-block;
            position: relative;
        }

        .dropdown-button {
            padding: 5px;
            cursor: pointer;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            bottom: -150px;
            right: 0;
            width: 200px;
            background-color: #f9f9f9;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            padding: 12px 16px;
            z-index: 1;
        }

        .dropdown-content img {
            width: 100%;
            margin-bottom: 5px;
            cursor: pointer;
        }

        .dropdown-container:hover .dropdown-content {
            display: block;
        }

        .dashboard-username {
            margin-top: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        .dashboard-fullname {
            font-size: 18px;
            margin-top: 10px;
            color: #666666;
        }

        .dashboard-email {
            margin-top: 10px;
            color: #666666;
        }

        .dashboard-logout {
            margin-top: 20px;
        }
    </style>
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
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php#about">About</a></li>
                <li><a href="index.php#services">Services</a></li>
                <li><a href="index.php#contact">Contact</a></li>
            </ul>
        </div>
        <div class="menuButton">
            <!-- <a href="signIn.html"><button id="signIn">Log In</button></a>
            <a href="signUp.html"><button id="signUp">Sign Up</button></a> -->
        </div>
    </div>

    <div class="dashboard-container">
        <div class="dashboard-avatar">
            <img src="<?php echo $profile_image; ?>" alt="Profile Avatar">
        </div>
        <h1 class="dashboard-username"><?php echo $username; ?></h1>
        <h2 class="dashboard-fullname"><?php echo $full_name; ?></h2>
        <p class="dashboard-email"><?php echo $email; ?></p>
        <a href="logout.php" class="dashboard-logout">Logout</a>

    </div>

</body>
</html>
