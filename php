<?php
// db.php - Connect to the database and fetch data

$servername = "localhost";
$username = "root";  // default username for MySQL in XAMPP
$password = "";      // default password is empty for XAMPP
$dbname = "projectDB"; // the name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function getPurchases() {
    global $conn;
    $sql = "SELECT * FROM purchases";
    $result = $conn->query($sql);

    // Check if there are any results
    if ($result->num_rows > 0) {
        $purchases = [];
        while ($row = $result->fetch_assoc()) {
            $purchases[] = $row;
        }
        return json_encode($purchases);
    } else {
        return json_encode([]);  // Return empty array if no records are found
    }
}

// Return the data in JSON format
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo getPurchases();
}

$conn->close();
?>
