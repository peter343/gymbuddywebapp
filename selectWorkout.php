<?php
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
session_start();
if (!isset($_SESSION['Username'])){
    header("Location: https://gymbuddyapp.net/gymBuddy/");
    //exit;
}
?>
<html>
<body>
<style type="text/css" scoped>
img.iconImage {
width:128px;height:128px;margin:0px;border-width:0px;border-color:#000000;border-style:solid;cursor: pointer;
}

ul.top {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
    align-items: center;
}

ul.bottom {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
    align-items: center;
    position: fixed;
    bottom: 0;
    width: auto;
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
    cursor: pointer;
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
.dropdown:onclick .dropdown-content {
    display: block;
}


</style>
<ul class="top">
  <li><a class="active" href="selectWorkout.php"><p class="standardFont" style="margin-top: 5px; margin-bottom: 5px;">Build A Schedule</p></a></li>
  <li><a href="viewWorkout.php"><p class="standardFont" style="margin-top: 5px; margin-bottom: 5px;">View Your Schedule</p></a></li>
   <li><a href="/gymBuddy/cgi-bin/logout.php"><p class="standardFont" style="align-self: right; margin-top: 5px; margin-bottom: 5px;">Logout</p></a></li>
</ul>


	<p id="loc" class="hidden" title=""></p>
	<div class="sectionBar"><h1 class="sectionText">Choose a Workout Location:</h1>
	</div>

	<div id="locationTableDiv" class="unhidden">
	<table align="center" border="0" cellpadding="1" cellspacing="1" id="locationTable" style="width:500px;">
		<tbody>
			<tr align="center">
				<td><img id="myimage" src="/gymBuddy/htdocs/images/home.png" type="image" onclick="javascript:showMuscleSelection('home')" class="iconImage"/></td>
				<td><img id="myimage" src="/gymBuddy/htdocs/images/gym.png" type="image" onclick="javascript:showMuscleSelection('gym')" class="iconImage"/></td>
			</tr>
		</tbody>
	</table>
	</div>
	<div id="muscleDiv" class="sectionBar hidden"><h1 class="sectionText">Select a Muscle Group:</h1></div>
	<div id="muscleDivTable" class="hidden">
		<table align="center" border="0" cellpadding="1" cellspacing="1" id="muscleTable" style="width:1000px">
			<tbody>
				<tr><td align="center" colspan="7" height="20px"></td></tr>
				<tr align="center">
					<td><img id="myimage" src="/gymBuddy/htdocs/images/Shoulder.gif" type="image" onclick="javascript:showWorkoutsFor('shoulders', 'workouts')" class="iconImage"/></td>
					<td><img id="myimage" src="/gymBuddy/htdocs/images/Chest.gif" type="image" onclick="javascript:showWorkoutsFor('chest', 'workouts')" class="iconImage"/></td>
					<td><img id="myimage" src="/gymBuddy/htdocs/images/Biceps.gif" type="image" onclick="javascript:showWorkoutsFor('biceps', 'workouts')" class="iconImage"/></td>
					<td><img id="myimage" src="/gymBuddy/htdocs/images/Triceps.gif" type="image" onclick="javascript:showWorkoutsFor('triceps', 'workouts')" class="iconImage"/></td>
					<td><img id="myimage" src="/gymBuddy/htdocs/images/Back.gif" type="image" onclick="javascript:showWorkoutsFor('back', 'workouts')" class="iconImage"/></td>
					<td><img id="myimage" src="/gymBuddy/htdocs/images/Abs.gif" type="image" onclick="javascript:showWorkoutsFor('abs', 'workouts')" class="iconImage"/></td>
					<td><img id="myimage" src="/gymBuddy/htdocs/images/Legs.gif" type="image" onclick="javascript:showWorkoutsFor('legs', 'workouts')" class="iconImage"/></td>
				</tr>
				<tr>
					<td align="center" class="standardFont smallFont">SHOULDERS</td>
					<td align="center" class="standardFont smallFont">CHEST</td>
					<td align="center" class="standardFont smallFont">BICEPS</td>
					<td align="center" class="standardFont smallFont">TRICEPS</td>
					<td align="center" class="standardFont smallFont">BACK</td>
					<td align="center" class="standardFont smallFont">ABS</td>
					<td align="center" class="standardFont smallFont">LEGS</td>
				</tr>
				<tr><td align="center" colspan="7" height="20px"></td></tr>
			</tbody>
		</table>
	</div>
<div id="workoutDiv" class="sectionBar hidden" style="margin-bottom: 30"><h1 class="sectionText">Pick Your Workouts!</h1></div>
<div id="workouts" style="margin-bottom: 140"></div>
<ul class="bottom hidden" id="submitButton">
  <!-- <li><a class="active" href="selectWorkout.php"><p class="standardFont" style="margin-top: 5px; margin-bottom: 5px;">Build A Schedule</p></a></li> -->
  <li><a id="submitForm" href="/gymBuddy/cgi-bin/setExercises.php"><p class="standardFont" style="margin-top: 5px; margin-bottom: 5px;">Submit Your Schedule!</p></a></li>
</ul>

<p id="testAdding"></p>
<script type="text/javascript">
    function unhide(divID, otherDivId) {
    	var div1 = document.getElementById(divID);
    	var div2 = document.getElementById(otherDivId);
    	if (div1) {
            div1.className=(div1.className=='hidden')?'unhidden':'hidden';
        }
    	if (div2) {
        	document.getElementById(otherDivId).className = 'hidden';
    	}
    }
</script>

<script type="text/javascript">
	function showMuscleSelection(loc) {
		var muscleDiv = document.getElementById('muscleDiv');
		var muscleDivTable = document.getElementById('muscleDivTable');
		var locType = document.getElementById('loc');
		if (locType.title != "" && locType.title != loc) {
			locType.title = loc;
			muscleDivTable.className=(muscleDivTable.className=='hidden')?'unhidden':'unhidden'; //'hidden';
			muscleDiv.className=(muscleDiv.className=='sectionBar hidden')?'sectionBar unhidden':'sectionBar unhidden'; //'sectionBar hidden';
			document.getElementById('workoutDiv').className='sectionBar hidden';
			document.getElementById('workouts').innerHTML = "";
			return;
		} else if (locType.title != "" && locType.title == loc) {
			return;
		} else if (locType.title == "") {
			locType.title = loc;
			muscleDivTable.className=(muscleDivTable.className=='hidden')?'unhidden':'uhidden'; //'hidden';
			muscleDiv.className=(muscleDiv.className=='sectionBar hidden')?'sectionBar unhidden':'sectionBar uhidden'; //'sectionBar hidden';
		}
	}
</script>

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

	// writeGridCell("", "", "Intermediate", "More");
	// writeGridCell("", "", "Beginner", "More");
	// writeGridCell("", "", "Advanced", "More");
	function showWorkoutsFor(group, id) {
		var loc = document.getElementById('loc');
		var sectionHeader = document.getElementById('workoutDiv');
		sectionHeader.className = 'sectionBar unhidden';
		if (loc.title == 'home') {
			if (group == "shoulders") {
				openGridContainer();
				writeGridCell("", "Side Lateral Raise", "Beginner", "Equipment: Dumbbells<br/><br/>Muscles Targeted: Deltoid, Trapezius");
				writeGridCell("", "Shoulder Shrugs", "Beginner", "Equipment: Dumbbells<br/><br/>Muscles Targeted: Trapezius");
				writeGridCell("", "Bent-Over Rear Delt Raise", "Intermediate", "Equipment: Dumbbells<br/><br/>Muscles Targeted: Deltoid, Trapezius");
				writeGridCell("", "Arnold Dumbbell Press", "Intermediate", "Equipment: Dumbbells<br/><br/>Muscles Targeted: Deltoid");
				writeGridCell("", "Elevated Push-Up Off Stairs", "Intermediate", "Equipment: None<br/><br/>Muscles Targeted: Deltoid, Upper Chest, Triceps");
				writeGridCell("", "Wall Handstand Push-Up", "Advanced", "Equipment: None<br/><br/>Muscles Targeted: Deltoid, Chest, Triceps");
				closeGridContainer();
				document.getElementById(id).innerHTML = gridHTML;
			} else if (group == "chest") {
				openGridContainer();
				writeGridCell("", "Wide Grip Push-ups", "Beginner", "Equipment: None<br/><br/>Muscles Targeted: Chest, Triceps, Shoulders");
				writeGridCell("", "Close Grip Push-ups", "Beginner", "Equipment: None<br/><br/>Muscles Targeted: Chest, Triceps, Shoulders");
				writeGridCell("", "Clap Push-ups", "Intermediate", "Equipment: None<br/><br/>Muscles Targeted: Chest, Triceps, Shoulders");
				writeGridCell("", "Elevated Push-Up Off Stairs", "Intermediate", "Equipment: None<br/><br/>Muscles Targeted: Upper Chest, Triceps, Shoulders");
				writeGridCell("", "One-Arm Push-ups", "Advanced", "Equipment: None<br/><br/>Muscles Targeted: Chest, Triceps, Shoulders");
				closeGridContainer();
				document.getElementById(id).innerHTML = gridHTML;
			} else if (group == "biceps") {
				openGridContainer();
				writeGridCell("", "Chin-ups", "Beginner", "Equipment: Pull Up Bar<br/><br/>Muscles Targeted: Biceps, Back");
				writeGridCell("", "Pull-ups", "Intermediate", "Equipment: Pull Up Bar<br/><br/>Muscles Targeted: Biceps, Back");
				closeGridContainer();
				document.getElementById(id).innerHTML = gridHTML;
			} else if (group == "triceps") {
				openGridContainer();
				writeGridCell("", "Dips", "Beginner", "Equipment: Chairs/Stools<br/><br/>Muscles Targeted: Triceps, Chest");
				writeGridCell("", "Bench Dip", "Beginner", "Equipment: Bench/Chair<br/><br/>Muscles Targeted: Triceps, Chest, Shoulders");
				writeGridCell("", "Close Grip Push-ups", "Beginner", "Equipment: None<br/><br/>Muscles Targeted: Triceps, Chest");
				closeGridContainer();
				document.getElementById(id).innerHTML = gridHTML;
			} else if (group == "back") {
				openGridContainer();
				writeGridCell("", "Hyperextensions", "Beginner", "Equipment: Bench/Sofa, Partner<br/><br/>Muscles Targeted: Lower Back");
				writeGridCell("", "Pull-ups", "Intermediate", "Equipment: Pull Up Bar<br/><br/>Muscles Targeted: Biceps, Back");
				closeGridContainer();
				document.getElementById(id).innerHTML = gridHTML;
			} else if (group == "abs") {
				openGridContainer();
				writeGridCell("", "Flutter Kicks", "Beginner", "Equipment: None<br/><br/>Muscles Targeted: Lower Abs");
				writeGridCell("", "Plank", "Beginner", "Equipment: None<br/><br/>Muscles Targeted: Abs");
				writeGridCell("", "Cross-Body Crunch", "Beginner", "Equipment: None<br/><br/>Muscles Targeted: Abs, Obliques");
				writeGridCell("", "Russian Twist", "Beginner", "Equipment: None<br/><br/>Muscles Targeted: Abs, Obliques");
				writeGridCell("", "Crunch", "Beginner", "Equipment: None<br/><br/>Muscles Targeted: Abs");
				closeGridContainer();
				document.getElementById(id).innerHTML = gridHTML;
			} else if (group == "legs") {
				openGridContainer();
				writeGridCell("", "Bodyweight Lunges", "Beginner", "Equipment: None<br/><br/>Muscles Targeted: Hamstrings, Quads, Glutes");
				writeGridCell("", "Bodyweight Squats", "Beginner", "Equipment: None<br/><br/>Muscles Targeted: Hamstrings, Quads, Glutes");
				writeGridCell("", "Wall Squat", "Beginner", "Equipment: None<br/><br/>Muscles Targeted: Quads, Glutes, Calves");
				writeGridCell("", "Standing Calf Raises", "Beginner", "Equipment: None<br/><br/>Muscles Targeted: Calves");
				writeGridCell("", "Jump Squats", "Intermediate", "Equipment: None<br/><br/>Muscles Targeted: Hamstrings, Quads, Glutes");
				writeGridCell("", "Box Jump", "Intermediate", "Equipment: None<br/><br/>Muscles Targeted: Hamstrings, Quads, Glutes, Calves");
				writeGridCell("", "Burpees", "Intermediate", "Equipment: None<br/><br/>Muscles Targeted: Hamstrings, Quads, Glutes, Chest, Arms, Abs");
				closeGridContainer();
				document.getElementById(id).innerHTML = gridHTML;
			}  else {
				document.getElementById(id).innerHTML = "</div><div class='grid-container'><div class='grid-cell'><div class='grid-item'>1</div><div class='grid-item'>2</div><div class='grid-item'>3</div><div class='grid-item'>4</div></div><div class='grid-cell'><div class='grid-item'>1</div><div class='grid-item'>2</div><div class='grid-item'>3</div><div class='grid-item'>4</div></div><div class='grid-cell'><div class='grid-item'>1</div><div class='grid-item'>2</div><div class='grid-item'>3</div><div class='grid-item'>4</div></div><div class='grid-cell'><div class='grid-item'>1</div><div class='grid-item'>2</div><div class='grid-item'>3</div><div class='grid-item'>4</div></div><div class='grid-cell'><div class='grid-item'>1</div><div class='grid-item'>2</div><div class='grid-item'>3</div><div class='grid-item'>4</div></div>";
			}
		} else if (loc.title == 'gym') {
			if (group == "shoulders") {
				openGridContainer();
				writeGridCell("", "Upright Barbell Row", "Beginner", "Equipment: Barbell<br/><br/>Muscles Targeted: Deltoid, Trapezius");
				writeGridCell("", "Side Lateral Raise", "Beginner", "Equipment: Dumbbells<br/><br/>Muscles Targeted: Deltoid, Trapezius");
				writeGridCell("", "Front Cable Raise", "Beginner", "Equipment: Cables<br/><br/>Muscles Targeted: Deltoid, Trapezius");
				writeGridCell("", "Cable Rear Delt Fly", "Beginner", "Equipment: Cable<br/><br/>Muscles Targeted: Posterior Deltoid");
				writeGridCell("", "Elevated Push-Up Off Stairs", "Beginner", "Equipment: None<br/><br/>Muscles Targeted: Upper Chest, Triceps, Shoulders");
				writeGridCell("", "Machine Shoulder Press", "Beginner", "Equipment: Machine<br/><br/>Muscles Targeted: Deltoid, Upper Chest, Triceps");
				writeGridCell("", "Shoulder Shrugs", "Beginner", "Equipment: Dumbbells<br/><br/>Muscles Targeted: Trapezius");
				writeGridCell("", "Dumbbell Shoulder Press", "Intermediate", "Equipment: Dumbbells, Bench<br/><br/>Muscles Targeted: Deltoid, Upper Chest, Triceps");
				writeGridCell("", "Bent-Over Rear Delt Raise", "Intermediate", "Equipment: Dumbbells, Bench<br/><br/>Muscles Targeted: Deltoid, Trapezius");
				writeGridCell("", "Upright Cable Row", "Intermediate", "Equipment: Cables<br/><br/>Muscles Targeted: Deltoid, Trapezius");
				writeGridCell("", "Arnold Dumbbell Press", "Intermediate", "Equipment: Dumbbells, Bench<br/><br/>Muscles Targeted: Deltoid");
				writeGridCell("", "Wall Handstand Push-Up", "Advanced", "Equipment: None<br/><br/>Muscles Targeted: Deltoid, Chest, Triceps");
				closeGridContainer();
				document.getElementById(id).innerHTML = gridHTML;
			} else if (group == "chest") {
				openGridContainer();
				writeGridCell("", "Machine Chest Press", "Beginner", "Equipment: Machine<br/><br/>Muscles Targeted: Chest, Triceps, Shoulders<br/><br/>Variations: Flat, Incline, Decline");
				writeGridCell("", "Dumbbell Flies", "Beginner", "Equipment: Dumbbells, Bench<br/><br/>Muscles Targeted: Chest, Triceps, Shoulders<br/><br/>Variations: Flat, Incline, Decline");
				writeGridCell("", "Dumbbell Pullover", "Beginner", "Equipment: Dumbbell, Bench<br/><br/>Muscles Targeted: Chest, Triceps, Shoulders");
				writeGridCell("", "Cable Flies", "Beginner", "Equipment: Cables<br/><br/>Muscles Targeted: Chest, Triceps, Shoulders<br/><br/>Variations: Low Pulley, High Pulley");
				writeGridCell("", "Barbell Bench Press", "Intermediate", "Equipment: Barbell, Bench<br/><br/>Muscles Targeted: Chest, Triceps, Shoulders<br/><br/>Variations: Flat, Incline, Decline");
				writeGridCell("", "Dumbbell Bench Press", "Intermediate", "Equipment: Dumbbells, Bench<br/><br/>Muscles Targeted: Chest, Triceps, Shoulders<br/><br/>Variations: Flat, Incline, Decline");
				closeGridContainer();
				document.getElementById(id).innerHTML = gridHTML;
			} else if (group == "back") {
				openGridContainer();
				writeGridCell("", "Seated Cable Row", "Beginner", "Equipment: Machine<br/><br/>Muscles Targeted: Middle Back, Lats, Biceps");
				writeGridCell("", "Lat Pull Down", "Beginner", "Equipment: Machine<br/><br/>Muscles Targeted: Lats, Biceps");
				writeGridCell("", "Single-Arm Dumbbell Rows", "Beginner", "Equipment: Dumbbell, Bench<br/><br/>Muscles Targeted: Middle Back, Lats, Biceps");
				writeGridCell("", "Pull-ups", "Beginner", "Equipment: Pull-Up Bar<br/><br/>Muscles Targeted: Lats, Biceps");
				writeGridCell("", "Barbell Deadlift", "Intermediate", "Equipment: Barbell<br/><br/>Muscles Targeted: Back, Legs, Glutes");
				writeGridCell("", "Barbell Rows", "Intermediate", "Equipment: Barbell<br/><br/>Muscles Targeted: Lats, Middle Back, Biceps");
				writeGridCell("", "T-Bar Row", "Intermediate", "Equipment: Barbell<br/><br/>Muscles Targeted: Middle Back, Biceps");
				writeGridCell("", "Back Extensions", "Intermediate", "Equipment: Extensions Bench/Machine<br/><br/>Muscles Targeted: Lower Back");
				closeGridContainer();
				document.getElementById(id).innerHTML = gridHTML;
			} else if (group == "biceps") {
				openGridContainer();
				writeGridCell("", "Incline Dumbbell Curls", "Beginner", "Equipment: Dumbbells, Bench<br/><br/>Muscles Targeted: Biceps");
				writeGridCell("", "Standing Dumbbell Curls", "Beginner", "Equipment: Dumbbells<br/><br/>Muscles Targeted: Biceps");
				writeGridCell("", "Standing Hammer Curls", "Beginner", "Equipment: Dumbbells<br/><br/>Muscles Targeted: Biceps");
				writeGridCell("", "Incline Hammer Curls", "Beginner", "Equipment: Dumbbells, Bench<br/><br/>Muscles Targeted: Biceps");
				writeGridCell("", "Standing Cable Curls", "Beginner", "Equipment: Cables<br/><br/>Muscles Targeted: Biceps");
				writeGridCell("", "Overhead Cable Curls", "Beginner", "Equipment: Cables<br/><br/>Muscles Targeted: Biceps");
				writeGridCell("", "Chin-ups", "Beginner", "Equipment: Pull Up Bar<br/><br/>Muscles Targeted: Biceps, Back");
				writeGridCell("", "Pull-ups", "Intermediate", "Equipment: Pull Up Bar<br/><br/>Muscles Targeted: Biceps, Back");
				writeGridCell("", "Standing Barbell Curls", "Intermediate", "Equipment:Barbell<br/><br/>Muscles Targeted: Biceps");
				writeGridCell("", "Preacher Curls", "Intermediate", "Equipment: Dumbbells/Bar, Preacher Bench<br/><br/>Muscles Targeted: Biceps");
				writeGridCell("", "Concentration Curls", "Intermediate", "Equipment: Dumbbell, Bench<br/><br/>Muscles Targeted: Biceps");
				closeGridContainer();
				document.getElementById(id).innerHTML = gridHTML;
			} else if (group == "triceps") {
				openGridContainer();
				writeGridCell("", "Dip Machine", "Beginner", "Equipment: Machine<br/><br/>Muscles Targeted: Triceps, Chest");
				writeGridCell("", "Bench Dip", "Beginner", "Equipment: Bench<br/><br/>Muscles Targeted: Triceps, Chest, Shoulders");
				writeGridCell("", "Dips", "Beginner", "Equipment: Dip Station<br/><br/>Muscles Targeted: Triceps, Chest");
				writeGridCell("", "Dumbbell Kickbacks", "Beginner", "Equipment: Bench<br/><br/>Muscles Targeted: Triceps<br/><br/>Variations: Dumbbell, Cable");
				writeGridCell("", "Triceps Push Down", "Beginner", "Equipment: Chairs/Stools<br/><br/>Muscles Targeted: Triceps<br/><br/>Variations: Rope, Bar, V-Bar");
				writeGridCell("", "One-Arm Overhead Extension", "Beginner", "Equipment: Dumbbell<br/><br/>Muscles Targeted: Triceps");
				writeGridCell("", "Close Grip Barbell Press", "Intermediate", "Equipment: Bench, Barbell<br/><br/>Muscles Targeted: Triceps, Chest, Shoulders");
				writeGridCell("", "Dumbbell Skullcrusher", "Intermediate", "Equipment: Bench, Dumbbells<br/><br/>Muscles Targeted: Triceps");
				closeGridContainer();
				document.getElementById(id).innerHTML = gridHTML;
			} else if (group == "abs") {
				openGridContainer();
				writeGridCell("", "Flutter Kicks", "Beginner", "Equipment: None<br/><br/>Muscles Targeted: Lower Abs");
				writeGridCell("", "Plank", "Beginner", "Equipment: None<br/><br/>Muscles Targeted: Abs");
				writeGridCell("", "Cross-Body Crunch", "Beginner", "Equipment: None<br/><br/>Muscles Targeted: Abs, Obliques");
				writeGridCell("", "Russian Twist", "Beginner", "Equipment: None<br/><br/>Muscles Targeted: Abs, Obliques");
				writeGridCell("", "Cable Crunch", "Beginner", "Equipment: Cables<br/><br/>Muscles Targeted: Abs");
				writeGridCell("", "Knee Raises", "Beginner", "Equipment: Dip Station<br/><br/>Muscles Targeted: Abs");
				writeGridCell("", "Cable Woodchop", "Beginner", "Equipment: Cables<br/><br/>Muscles Targeted: Abs, Obliques");
				writeGridCell("", "Ab Rotator", "Beginner", "Equipment: Machine<br/><br/>Muscles Targeted: Abs, Obliques");
				writeGridCell("", "Crunch Machine", "Beginner", "Equipment: Machine<br/><br/>Muscles Targeted: Abs");
				writeGridCell("", "Leg Raises", "Intermediate", "Equipment: Dip Station<br/><br/>Muscles Targeted: Abs");
				writeGridCell("", "Ab Roller", "Advanced", "Equipment: Ab Roller<br/><br/>Muscles Targeted: Abs");
				writeGridCell("", "Decline Reverse Crunch", "Advanced", "Equipment: Decline Bench<br/><br/>Muscles Targeted: Lower Abs");
				closeGridContainer();
				document.getElementById(id).innerHTML = gridHTML;
			} else if (group == "legs") {
				openGridContainer();
				writeGridCell("", "Dumbbell Lunges", "Beginner", "Equipment: Dumbbells<br/><br/>Muscles Targeted: Hamstrings, Quads, Glutes");
				writeGridCell("", "Lying Leg Curls", "Beginner", "Equipment: Machine<br/><br/>Muscles Targeted: Hamstrings, Glutes");
				writeGridCell("", "Leg Extensions", "Beginner", "Equipment: Machine<br/><br/>Muscles Targeted: Quads");
				writeGridCell("", "Standing Calf Raise", "Beginner", "Equipment: Squat Rack/Smith Machine<br/><br/>Muscles Targeted: Calves");
				writeGridCell("", "Seated Calf Raise", "Beginner", "Equipment: Machine<br/><br/>Muscles Targeted: Calves");
				writeGridCell("", "Calf Press", "Beginner", "Equipment: Machine<br/><br/>Muscles Targeted: Calves");
				writeGridCell("", "Leg Press", "Beginner", "Equipment: Machine<br/><br/>Muscles Targeted: Hamstrings, Quads, Glutes");
				writeGridCell("", "Barbell Squats", "Intermediate", "Equipment: Squat Rack, Barbell<br/><br/>Muscles Targeted: Hamstrings, Quads, Glutes");
				closeGridContainer();
				document.getElementById(id).innerHTML = gridHTML;
			} else {
				document.getElementById(id).innerHTML = "</div><div class='grid-container'><div class='grid-cell'><div class='grid-item'>1</div><div class='grid-item'>2</div><div class='grid-item'>3</div><div class='grid-item'>4</div></div><div class='grid-cell'><div class='grid-item'>1</div><div class='grid-item'>2</div><div class='grid-item'>3</div><div class='grid-item'>4</div></div><div class='grid-cell'><div class='grid-item'>1</div><div class='grid-item'>2</div><div class='grid-item'>3</div><div class='grid-item'>4</div></div><div class='grid-cell'><div class='grid-item'>1</div><div class='grid-item'>2</div><div class='grid-item'>3</div><div class='grid-item'>4</div></div><div class='grid-cell'><div class='grid-item'>1</div><div class='grid-item'>2</div><div class='grid-item'>3</div><div class='grid-item'>4</div></div>";
			}
		}
	}

</script>

<script type="text/javascript">
	var selectedWorkouts = "";

	function addRemoveWorkout(workout) {
		if (selectedWorkouts == "") {
			selectedWorkouts = workout.concat("^");
		} else if (selectedWorkouts.indexOf(workout) != -1) {
			selectedWorkouts = selectedWorkouts.replace(workout.concat("^"), "");
		} else {
			selectedWorkouts = selectedWorkouts.concat(workout.concat("^"));
		}
    if(selectedWorkouts == "") {
      document.getElementById("submitButton").className = "bottom hidden";
      document.getElementById("submitForm").href = "/gymBuddy/cgi-bin/setExercises.php?exercises=";  // ask sultan about "?"
    }
    else {
      document.getElementById("submitButton").className = "bottom unhidden";
      document.getElementById("submitForm").href = "/gymBuddy/cgi-bin/setExercises.php?exercises=";  // ask sultan about "?"
      document.getElementById("submitForm").href = document.getElementById("submitForm").href.concat(selectedWorkouts);
      document.getElementById("submitForm").href = encodeURLComponent(document.getElementById("submitForm").href.trim());
    }
	}



</script>

</body>
</html>
