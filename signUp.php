<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sovann_data";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$full_name = isset($_POST['full_name']) ? $_POST['full_name'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$username = isset($_POST['username']) ? $_POST['username'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";

// Perform input validation
if (empty($full_name) || empty($email) || empty($username) || empty($password)) {
    die("Please fill in all fields");
}

// Check if the user already exists
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
$stmt->bind_param("ss", $email, $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "User already exists";
} else {
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO users (full_name, email, username, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $full_name, $email, $username, $hashed_password);

    if ($stmt->execute()) {
        echo '<script>window.location.href = "index.php";</script>';
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Close database connection
$stmt->close();
$conn->close();
?>
