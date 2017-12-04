<?php
$servername = "localhost";
$username = "gymbudd1_UVAdmin";
$password = "Bo56H!m&";
$dbname = "gymbudd1_webApp";

$exercises = $_POST['exercises'];
$name = $_SESSION['username'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE user set exercises = '$exercises' where name = $name";

if ($conn->query($sql) === TRUE) {
    echo "<script>
    alert('Exercises are set.');
    window.location.href='https://gymbuddyapp.net/gymBuddy/';
    </script>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
?>
