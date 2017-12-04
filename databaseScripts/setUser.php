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
    echo "<script>
    alert('User Created Successfully');
    window.location.href='https://gymbuddyapp.net/gymBuddy/';
    </script>";
} else {
    $sql = "Select name, password from user where name='$name' and password='$password2'";
    $result = $conn->query($sql);
    if(!$result || $result->num_rows <= 0)
    {
      echo "<script>
      alert('The username or password does not match');
      window.location.href='https://gymbuddyapp.net/gymBuddy/';
      </script>";
      }else {
        $_SESSION['Username'] = $name;
        header("location: https://gymbuddyapp.net/gymBuddy/selectWorkout.html");

      }
    //echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
