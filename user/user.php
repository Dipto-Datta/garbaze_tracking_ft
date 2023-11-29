<?php
// Database configuration
$servername = "your_database_host";
$username = "your_database_username";
$password = "your_database_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch garbage items from the database
function getGarbageItems() {
    global $conn;
    $sql = "SELECT * FROM garbage_items";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Example of how to use the function to get garbage items
$garbageItems = getGarbageItems();
print_r($garbageItems);

// Close the database connection
$conn->close();
?>
