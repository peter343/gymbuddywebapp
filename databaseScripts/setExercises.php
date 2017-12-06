<?php
$servername = "localhost";
$username = "gymbudd1_UVAdmin";
$password = "Bo56H!m&";
$dbname = "gymbudd1_webApp";
session_start();
$exercises = $_GET['exercises'];
$name = $_SESSION['Username'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE user set exercises = '$exercises' where name = '".$_SESSION['Username']."'";

if ($conn->query($sql) === TRUE) {
    echo "<script>
    alert('Your schedule is ready.');
    window.location.href='https://gymbuddyapp.net/gymBuddy/viewWorkout.php';
    </script>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
?>
