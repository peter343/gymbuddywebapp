<?php
$servername = "localhost";
$username = "gymbudd1_UVAdmin";
$password = "Bo56H!m&";
$dbname = "gymbudd1_webApp";

$name = $_POST['name'];
$password2 = $_POST['password'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO user (name, password)
VALUES ('$name', '$password2')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
