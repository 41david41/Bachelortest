<?php
session_start();

// Database connection
$host = "localhost";
$dbname = "your_database";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    
    // Prevent SQL injection
    $email = $conn->real_escape_string($email);
    
    // Fetch user from database
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
    
        // Debugging Output (Remove this in production)
        echo "Stored Hash: " . $user['password'] . "<br>";
        echo "Entered Password: " . $password . "<br>";
    
        // Verify password
        if (password_verify($password, $user['password'])) {
            echo "Password verified successfully!";
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            header("Location: index.html"); // Redirect to index.html
            exit();
        } else {
            echo "<script>alert('Wrong password'); window.location.href='login.html';</script>";
        }
    }
     else {
        echo "<script>alert('User not found'); window.location.href='login.html';</script>";
    }
}
$conn->close();
?>

