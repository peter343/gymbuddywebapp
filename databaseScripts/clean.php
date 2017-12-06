<?php
$servername = "localhost";
$username = "gymbudd1_UVAdmin";
$password = "Bo56H!m&";
$dbname = "gymbudd1_webApp";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE user set exercises = ''";

$conn->query($sql);

$conn->close();
?>
