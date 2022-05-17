<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="PHP SERVER SIDE" />
  <meta name="keywords" content="PHP SERVER SIDE" />
  <meta name="author" content="Kimlong Leng"  />
  <title>Mark quiz</title>


</head>

<body>
   <h1>Quiz Marking</h1>

   
   <?php
		require 'create_table.php';

		//Connection to database//
		require_once 'setting.php';

		//global values//
		$quizinvalid = false;
		$score = 0;
		$date = date('Y-m-d');
		$date .= " ";
		$date .= date('h:i:s');
		$errMsg = "";
		//------------//

		//if (isset ($_POST["noa"]))
		//	$attemptnum = $_POST["noa"];

		if (isset ($_POST["stu_id"]))
			$studentid = $_POST["stu_id"];


		if (isset ($_POST["firstname"]))
			$firstname = $_POST["firstname"];

		if ($firstname =="") {
			$errMsg .= "<p>You must enter your first name.</p>";
			echo "$errMsg";
			$quizinvalid = true;
		}
		else if (!preg_match("/^[a-zA-Z\s-]{0,30}$/", $firstname)) {
			$errMsg .= "<p>Only alpha letters allowed in your first name.</p>";
			echo "$errMsg";
		}


		if (isset ($_POST["lastname"]))
			$familyname = $_POST["lastname"];


		$question1 = "";
		if (isset($_POST["question1"]) && ($_POST["question1"])!=""){
			$question1 = $_POST["question1"];
			echo "<p>question 1: $question1</p>";
		}else{	
			$errMsg = "<p>Your question 1 is invalid</p>";
			echo "<p>$errMsg</p>";
			
			
		}
		
		if ($question1 == "One"){
			echo "<p>true</p>";
			$score++;
		}

		$question2 = "";
		  // v Do this v 
		if (isset($_POST["question2"]) && ($_POST["question2"])!="") {
			$question2 = $_POST["question2"];
			echo "<p>question 2: $question2</p>";
		} else {
			$errMsg = "<p>Your question 2 is invalid</p>";
			echo "<p>$errMsg</p>";
			$quizinvalid = true;
		}
		//else if ($question2 == 'False'){
			//echo "<p>correct</p>";
			//$score++;
		
		
			// v Do this v 
		$question3 = $_POST["question3"];
		if (isset ($_POST["html"]) && ($_POST["question3"])!=""){
			$question3 = $question3. "Rendering HTML";
			}
		if (isset ($_POST["videos"]))
			$question3 = $question3. "Downloading videos";
		if (isset ($_POST["databases"]))
			$question3 = $question3. "Updating Databases";
		if (isset ($_POST["distributing"]))
			$question3 = $question3. "Distributing Information";
		if (isset ($_POST["calculations"]))
			$question3 = $question3. "Calculations";

			echo "<p>question 3:  </p>";
			echo $question3[0];

		if ($question3 = "") {
			$errMsg = "<p>Your question 3 is invalid</p>";
			echo "<p>$errMsg</p>";
			$quizinvalid = true;
			// v Mark this v
		} else {
			$score++;
		}
		//if ($question3 == "Calculations")
	
		$question4 = "";
		if (isset($_POST["question4"]) && ($_POST["question4"])!=""){
			$question4 = $_POST["question4"];
			echo "<p>question 4: $question4</p>";
		}else{
			$errMsg = "<p>Your question 4 is invalid</p>";
			echo "<p>$errMsg</p>";
			$quizinvalid = true;
		}

		if ($question4 = "Shopify") {
			$score++;
		}

		$question5 = "";
		if (isset($_POST["question5"]) && ($_POST["question5"])!=""){
			$question5 = $_POST["question5"];
			echo "<p>question 5: $question5</p>";	
		} else {
			$errMsg = "<p>Your question 5 is invalid</p>";
			echo "<p>$errMsg</p>";
		}
		
		if($question5 == "5"){
			$score++;
		}


		if ($quizinvalid == true){
			echo "This quiz is invalid";
		}else {





		//-----------------------//
    $conn= @mysqli_connect($host,$user,$pwd,$sql_db);
		create_attempt_table($conn);
    $conn= @mysqli_connect($host,$user,$pwd,$sql_db);
		create_student_table($conn);

		//---connecting the student table---//
		$conn= @mysqli_connect($host,$user,$pwd,$sql_db);
		   if(!$conn){
			 echo "<p>Database connection failure</p>";
		   } else {
				$sql_table = "student";
				$query = "SELECT noa FROM student WHERE stu_id = $studentid";
				$result = mysqli_query($conn, $query);

				$student = mysqli_fetch_assoc($result);
				mysqli_free_result($result);
				mysqli_close($conn);
			}
		//------//

		$attemptnum = $student[noa];





		// v Sanitization v //
		$studentid = sanitise_input($studentid);
		$firstname = sanitise_input($firstname);
		$familyname = sanitise_input($familyname);
		$question1 = sanitise_input($question1);
		$question2 = sanitise_input($question2);
		$question3 = sanitise_input($question3);
		$question4 = sanitise_input($question4);
		$question5 = sanitise_input($question5);


		

		if ($firstname =="") {
			$errMsg .= "<p>You must enter your first name.</p>";
			echo "$errMsg";
			$quizinvalid = true;
		}
		else if (!preg_match("/^[a-zA-Z\s-]{0,30}$/", $firstname)) {
			$errMsg .= "<p>Only alpha letters allowed in your first name.</p>";
			echo "$errMsg";
		}

		if ($familyname =="") {
			$errMsg .= "<p>You must enter your family name.</p>";
			echo "$errMsg";
			$quizinvalid = true;
		}
		else if (!preg_match("/^[a-zA-Z\s-]{0,30}$/", $familyname)) {
			$errMsg .= "<p>Only alpha letters allowed in your family name.</p>";
			echo "$errMsg";
		}
		if ($studentid =="") {
			$errMsg .= "<p>You must enter your studentid.</p>";
			echo "$errMsg";
			$quizinvalid = true;
		}
		else if (!preg_match("/\d{7}|^\d{10}$/", $studentid)) {
			$errMsg .= "<p>incorrect student id</p>";
			echo "$errMsg";
		}

		if ($score == 0)
			echo "<p>Your score is 0</p>";
			$quizinvalid = true;

		// v Gate keeping it to 2 attempts v
		if ($attemptnum > 2) {
			echo "<p>You can't submit anymore shit boa</p>";

		} else {
				echo "<p>Student ID: <i>$studentid</i><br>
				Name: <i>$firstname $familyname</i><br>
				  Score: <i>$score</i><br>
				  Number of attempts: <i>$attemptnum</i>
				  </p>";

				echo "<p>You have another attempt. <a href='quiz.html'>Click here</a></p>";
			}

		if ($quizinvalid == false) {
			echo "<p>This is an unsuccessful attempt</p>";
		} else {
			//Sending data to database//
			$conn= @mysqli_connect($host,$user,$pwd,$sql_db);
		   if(!$conn){
			 echo "<p>Database connection failure</p>";
		   } else {
				$sql_table = "attempts";

				#$attemptnum = trim($_POST["noa"]);
				$studentid = trim($_POST["stu_id"]);
				$firstname = trim($_POST["firstname"]);
				$familyname = trim($_POST["lastname"]);
				#$score = trim($_POST["score"]);

				$query = "INSERT into $sql_table (doa, noa, stu_id, firstname, lastname, score) values ('$date','$attemptnum', '$studentid', '$firstname', '$familyname', '$score')";

				$result = mysqli_query($conn, $query);
				if(!$result){
					echo "<p>Something is wrong with ", $query, "</p>";
				} else {
					echo "<p>Successfully added to database</p>";
				}
				  mysqli_free_result($result);
					mysqli_close($conn);
			}

		//-----------------------//

		}




}
   ?>
</body>

</html>
