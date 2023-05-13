<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['username']) || isset($_SESSION['email'])) {
    $_SESSION['isLogin'] = true; // Set the isLogin status to true
    header("Location: dashboard.php");
    exit;
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sovann_data";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$username = isset($_POST['username']) ? $_POST['username'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";

// Perform input validation
if (empty($username) || empty($password)) {
    echo "<script>alert('Please fill in all fields');</script>";
    exit;
}

// Check if the user exists in the database
$query = "SELECT * FROM users WHERE (email = '$username' OR username = '$username')";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row['password'];

    // Verify the password
    if (password_verify($password, $hashed_password)) {
        $_SESSION['username'] = $row['username'];
        // Redirect to the dashboard
        header("Location: dashboard.php");
        exit;
    } else {
        echo "<script>alert('Invalid username or password');</script>";
    }
} else {
    echo "<script>alert('User does not exist');</script>";
}

// Close database connection
mysqli_close($conn);
?>
