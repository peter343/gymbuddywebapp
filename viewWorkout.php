<?php
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
session_start();
if (!isset($_SESSION['Username'])){
    header("Location: https://gymbuddyapp.net/gymBuddy/");
    exit;
}
?>
<html>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
<meta http-equiv="Pragma" content="no-cache"/>
<meta http-equiv="Expires" content="0"/>
<body>
<style type="text/css" scoped>
img.iconImage {
width:128px;height:128px;margin:0px;border-width:0px;border-color:#000000;border-style:solid;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
    align-items: center;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}

.hidden {
	display: none;
}

.unhidden {
	display: block;
}

.grid-container {
	display: grid;
	grid-template-columns: 196px 196px 196px 196px;/*auto auto auto auto;*/
	justify-content: center;
	padding: 10px;
	grid-gap: 50px;
	margin-left: 10%;
	margin-right: 10%;
}
.grid-cell {
	display: grid;
	grid-template-columns: 196px;
	grid-template-rows: 24px 196px 24px 24px;
	text-align: center;
	vertical-align: middle;
	grid-gap: 1px;
}

.grid-item {
    background-color: rgba(255, 255, 255, 0.8);
    border: 1px solid rgba(0, 0, 0, 0.8);
    vertical-align: middle;
}

.grid-item-title {
	background-color: #ffffff;
	color: black;
    padding: 4px;
    font-family: Helvetica;
    font-size: small;
    font-weight: bold;
    text-align: center;
    vertical-align: middle;
}
.grid-item1 {
	background-color: #0099ff;
    background-image: radial-gradient(
		#4db8ff,
		#008ae6
	);
	color: white;
	text-shadow: 1px 1px 1px black;
    padding: 4px;
    font-family: Helvetica;
    font-size: small;
    text-align: center;
    vertical-align: middle;
}
.grid-item2-B {
	background-color: #00cc00;
    background-image: radial-gradient(
		#4dff4d,
		#00cc00
	);
    color: white;
	text-shadow: 1px 1px 1px black;
    padding: 4px;
    font-family: Helvetica;
    font-size: small;
    text-align: center;
    vertical-align: middle;
}
.grid-item2-I {
	background-color: #ffff00;
    background-image: radial-gradient(
		#ffff66,
		#cccc00
	);
	color: white;
	text-shadow: 1px 1px 1px black;
    padding: 4px;
    font-family: Helvetica;
    font-size: small;
    text-align: center;
    vertical-align: middle;
}
.grid-item2-A {
	background-color: #ff3333;
    background-image: radial-gradient(
		#ff6666,
		#ff3333
	);
	color: white;
	text-shadow: 1px 1px 1px black;
    padding: 4px;
    font-family: Helvetica;
    font-size: small;
    text-align: center;
    vertical-align: middle;
}

.grid-item3 {
	background-color: #b300b3;
    background-image: radial-gradient(
		#ff00ff,
		#b300b3
	);
	color: white;
	text-shadow: 1px 1px 1px black;
    padding: 4px;
    font-family: Helvetica;
    font-size: small;
    text-align: center;
    vertical-align: middle;
}

div.sectionBar {
	width: 100%;
	height: 7%;
	background-color: #555;
	overflow: auto;
	text-align: center;
	line-height: 55%;
    font-family: Helvetica;
    font-size: medium;
}

body {margin:0;}

.sectionText {
	color: #FFF;
}

table.workoutTable {
	width: 100%;
	height: 50%;
	text-align: center;
	vertical-align: middle;
}

.standardFont {
	font-family: Helvetica;
}
.smallFont {
	font-size: small;
}

.moreText {
	font-family:  Helvetica;
	font-size: small;
	font-weight: normal;
	color: black;
	text-shadow: 0px 0px 0px;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 12px 16px;
    z-index: 1;
    text-align: left;
}

.dropdown:hover .dropdown-content {
    display: block;
}


</style>
<ul>
  <li><a href="selectWorkout.php"><p class="standardFont" style="margin-top: 5px; margin-bottom: 5px;">Build A Schedule</p></a></li>
  <li><a class="active" href="viewWorkout.php"><p class="standardFont" style="margin-top: 5px; margin-bottom: 5px;">View Your Schedule</p></a></li>
   <li><a href="/gymBuddy/cgi-bin/logout.php"><p class="standardFont" style="align-self: right; margin-top: 5px; margin-bottom: 5px;">Logout</p></a></li>
</ul>

 <div id="workoutDiv" class="sectionBar unhidden" style="margin-bottom: 100"><h1 class="sectionText">Your Workouts!</h1></div>

 	<?php
 		include('/home1/gymbudd1/public_html/gymBuddy/cgi-bin/getExercises.php');
	?>

<script type="text/javascript">
	var gridHTML = "";
	function openGridContainer() {
		gridHTML = "";
		gridHTML = gridHTML.concat("</div><div class='grid-container'>");
	}

  function writeGridCell(gif, name, inten, more) {
		gridHTML = gridHTML.concat("<div class='grid-cell'>");
		gridHTML = gridHTML.concat("<div class='grid-item-title'>");
		gridHTML = gridHTML.concat(name);
		gridHTML = gridHTML.concat("</div><div class='grid-item'>");
		gridHTML = gridHTML.concat("<img src=\"");
		gridHTML = gridHTML.concat("/gymBuddy/htdocs/images/");
		gridHTML = gridHTML.concat(name);
		gridHTML = gridHTML.concat(".gif\" style=\"width:100%;height:100%;\"/>");
		if (inten == "Beginner") {
			gridHTML = gridHTML.concat("</div><div class='grid-item2-B'>");
		} else if (inten == "Intermediate") {
			gridHTML = gridHTML.concat("</div><div class='grid-item2-I'>");
		} else if (inten == "Advanced") {
			gridHTML = gridHTML.concat("</div><div class='grid-item2-A'>");
		} else {
			gridHTML = gridHTML.concat("</div><div class='grid-item'>");
		}
		gridHTML = gridHTML.concat(inten);
		gridHTML = gridHTML.concat("</div><div class='grid-item3' onclick=\"javascript:addRemoveWorkout('");
		gridHTML = gridHTML.concat(name);
		gridHTML = gridHTML.concat("'); javascript:alertSession()\">");
		gridHTML = gridHTML.concat("Add to my schedule!");

		gridHTML = gridHTML.concat("</div><div class='grid-item1 dropdown'>More");
		gridHTML = gridHTML.concat("<div class='dropdown-content moreText'>");
		gridHTML = gridHTML.concat(more);
		gridHTML = gridHTML.concat("</div></div></div>");
	}

	function closeGridContainer() {
		gridHTML = gridHTML.concat("</div>");
	}
</script>

</body>
</html>
