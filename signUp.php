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
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$com_password = $_POST['com_password'];

// Perform input validation
if (empty($full_name) || empty($email) || empty($password) || empty($com_password)) {
    die("Please fill in all fields");
}

if ($password !== $com_password) {
    die("Passwords do not match");
}

// Sanitize the input
$full_name = mysqli_real_escape_string($conn, $full_name);
$email = mysqli_real_escape_string($conn, $email);

// Check if the user already exists
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    die("User already exists");
}

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert data into the database
$sql = "INSERT INTO users (full_name, email, password) VALUES ('$full_name', '$email', '$hashed_password')";
if ($conn->query($sql) === TRUE) {
    echo "Registration successful";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>
