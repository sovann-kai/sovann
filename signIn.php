<?php
// Establish database connection
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];

// Perform input validation
if (empty($username) || empty($password)) {
    die("Please fill in all fields");
}

// Sanitize the input
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

// Check if the user exists in the database
$sql = "SELECT * FROM users WHERE email = '$username' OR username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verify the password
    if (password_verify($password, $row['password'])) {
        // Password is correct, user is logged in
        echo "Login successful";
        // Redirect to the desired page after successful login
        // header("Location: dashboard.php");
        // exit();
    } else {
        // Invalid password
        echo "Invalid password";
    }
} else {
    // User does not exist
    echo "User does not exist";
}

// Close database connection
$conn->close();
?>
