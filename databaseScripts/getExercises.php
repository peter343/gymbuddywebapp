<?php
function printExer($name , $gif ,$inten ,$more ){
  $gridHTML;
  $gridHTML .= "<div class='grid-cell'>";
  $gridHTML .= "<div class='grid-item-title'>";
  $gridHTML .= $name;
  // $gridHTML .= gif;

  $gridHTML .= "</div><div class='grid-item'>";
  $gridHTML .= "<img src=\"";
  $gridHTML .= "/gymBuddy/htdocs/images/";
  $gridHTML .= $name;
  $gridHTML .= ".gif\" style=\"width:100%;height:100%;\"/>";
  //$gridHTML .= $gif ;
  // $gridHTML .= name ;
  if ($inten == "Beginner")  {
    $gridHTML .= "</div><div class='grid-item2-B'>" ;
  } else if ($inten == "Intermediate") {
    $gridHTML .= "</div><div class='grid-item2-I'>" ;
  } else if ($inten == "Advanced") {
    $gridHTML .= "</div><div class='grid-item2-A'>" ;
  } else {
    $gridHTML .= "</div><div class='grid-item'>";
  }
  $gridHTML .= $inten ;
  $gridHTML .= "</div><div class='grid-item1 dropdown'>More" ;
  $gridHTML .= "<div class='dropdown-content moreText'>" ;
  $gridHTML .= $more ;
  $gridHTML .= "</div></div></div>" ;
  echo "$gridHTML";
}
// Create connection
$con=mysqli_connect("localhost","gymbudd1_UVAdmin","Bo56H!m&","gymbudd1_webApp");

$name = $_POST['Username'];
// Check connection
if (mysqli_connect_errno())
{
  //echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//echo "Name : ".$_SESSION['Username']."\n";
$sql = "SELECT exercises FROM user where name = '".$_SESSION['Username']."' ";
$result = mysqli_query($con, $sql);
  $row = $result->fetch_object();
  //print_r($row);
  $workout = $row->exercises;
  //echo "workout: $workout";
  $nametok = array();
  $tok = strtok($workout, "^");
  while ($tok !== false) {
    array_push($nametok,$tok);
    //echo "$tok\n";
    $tok = strtok("^");
  }
  //echo "nametok :$nametok \n";
// This SQL statement selects ALL from the table Event_Prod
$sql = "SELECT * FROM workouts where 1 = 0 ";
$count = count($nametok);
if($count > 0){
  for ($i = 0; $i < $count; $i++) {
      $sql .= " or name = '$nametok[$i]'";
  }
  //print_r ($nametok);
  //echo "Count : $count\n";
  //echo "SQL : $sql\n";
  if ($result = mysqli_query($con, $sql))
  {
  	// If so, then create a results array and a temporary one
  	// to hold the data
  	$resultArray = array();
  	$tempArray = array();
	echo "</div><div class='grid-container'>";
  	// Loop through each row in the result set
  	while($row = $result->fetch_object())
  	{
  		// Add each row into our results array
  		$tempArray = $row;
        //print_r($row);
          if($row->intensity == "Beginner")
          {
            printExer($row->name , $row->img_path ,$row->intensity ,$row->more );
  	    array_push($resultArray, $tempArray);
          }
  	}
  	$result = mysqli_query($con, $sql);
  	while($row = $result->fetch_object())
  	{
  		// Add each row into our results array
  		$tempArray = $row;
        //print_r($row);
          if($row->intensity == "Intermediate")
          {
            printExer($row->name , $row->img_path ,$row->intensity ,$row->more );
  	    array_push($resultArray, $tempArray);
          }
  	}
  	$result = mysqli_query($con, $sql);
        while($row = $result->fetch_object())
  	{
  		// Add each row into our results array
  		$tempArray = $row;
        //print_r($row);
          if($row->intensity == "Advanced")
          {
            printExer($row->name , $row->img_path ,$row->intensity ,$row->more );
  	    array_push($resultArray, $tempArray);
          }
  	}
  	echo "</div>";

  	// Finally, encode the array to JSON and output the results
  	//echo json_encode($resultArray);
  }else {
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}else{
echo "<p> no workouts found for user :".$_SESSION['Username']." </p>";
}
//Close connections
mysqli_close($con);
?>