<?php
// Database connection parameters
$servername = "localhost";
$username = "your_username";
$password_db = "your_password";
$dbname = "university";

// Create connection
$conn = new mysqli($servername, $username, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve students' details from the "students" table
$sql = "SELECT id, name, email FROM students";
$result = $conn->query($sql);

// Display students' details in a table
if ($result->num_rows > 0) {
    echo "<h1>Students Details</h1>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No students found!";
}

$conn->close();
?>
