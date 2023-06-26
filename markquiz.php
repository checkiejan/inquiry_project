<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Quiz results page">
    <meta name="keywords" content="Results, Ruby on Rails">
    <meta name="author" content="Group 5">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- This is the link to bootstrap file -->
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" href="images/favicon.ico">
    <!-- Link to Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Ruby on Rails</title>
  </head>
 <body class="bodybg">
  <?php
  require 'header.inc';
  // display_header;
     ?>
 <main class="body-manage">
<?php
if(isset($_POST["stu_id"])){
  $_SESSION["studentid"]=$_POST["stu_id"];
}
if(isset($_POST["firstname"])){
  $_SESSION["f_name"]=$_POST["firstname"];
}
if(isset($_POST["lastname"])){
  $_SESSION["l_name"]=$_POST["lastname"];
}
 ?>

<?php
    // Establishing Connection to database
    require_once 'create_table.php';
    require_once 'setting.php';
    $conn= @mysqli_connect($host,$user,$pwd,$sql_db);
    create_student_table($conn);
    $conn= @mysqli_connect($host,$user,$pwd,$sql_db);
    create_attempt_table($conn);
    $conn= @mysqli_connect($host,$user,$pwd,$sql_db);
    set_timezone($conn);
    $errMsg = "";
    $flag=true;
    $firsttime=false;

    $date = date('Y-m-d');
	$date .= " ";
	$date .= date('H:i:s');
    ////Error Checking
    if (!isset($_POST["stu_id"])||$_POST["stu_id"]=="")
    {
        $errMsg .="<p>You must input your student id</p>";
        $flag=false;
    }
    elseif(!preg_match("/^([0-9]{7}|[0-9]{10})$/",$_POST["stu_id"])){
      $errMsg .="<p>Your student id must contain 7 or 10 digits</p>";
      $flag=false;
    }
    else{
      $studentid = sanitise_input($_POST["stu_id"]);
    }
    //////
    if (!isset($_POST["firstname"])||$_POST["firstname"]=="")
    {
        $errMsg .="<p>You must input your first name</p>";
        $flag=false;
    }
    elseif (!preg_match("/^[a-zA-z\s-]{1,30}$/",$_POST["firstname"])){
      $errMsg .="<p>Only alpha letters and hyphen allowed in your first name.</p>";
      $flag=false;
    }
    else{
      $firstname = sanitise_input($_POST["firstname"]);
    }
    ///////
    if (!isset($_POST["lastname"])||$_POST["lastname"]=="")
    {
        $errMsg .="<p>You must input your last name</p>";
        $flag=false;
    }
    elseif (!preg_match("/^[a-zA-z\s-]{1,30}$/",$_POST["lastname"])){
      $errMsg .="<p>Only alpha letters and hyphen allowed in your last name.</p>";
      $flag=false;
    }
    else{
      $lastname = sanitise_input($_POST["lastname"]);
    }
    ///////Displaying Error Message Webpage
    if(!$flag){

      echo "<h1 class=\"markquizheader\">Error!</h1>";
    echo "<fieldset id=\"err-notice\" class=\"Box1 \">";
          echo "<div class = \"StudentResults1\">";
            echo  "<P>Error</P></div>";
          echo $errMsg;
    echo "<a href=\"quiz.php\" class=\"QuizLink\">Return to quiz page</a>";
    echo "</fieldset>";
    }
    else{
      
      $conn= @mysqli_connect($host,$user,$pwd,$sql_db);
      if($conn){
        $query = "SELECT * FROM attempt WHERE stu_id=$studentid and attempt_id=2 ";
        $result= mysqli_query($conn, $query);
        if ($result){
          $arr=mysqli_fetch_assoc($result);
          if(count($arr)!=0){
            $result= mysqli_query($conn, $query);
            mysqli_free_result($result);
            $flag=false;
          }
        }
      }
      if(!$flag){

        echo "<h1 class=\"markquizheader\">Error!</h1>";
      echo "<fieldset id=\"err-notice\" class=\"Box1 \">";
            echo "<div class = \"StudentResults1\">";
              echo  "<P>Error</P></div>";
          print "<p>You have reached your limit of 2 attempts</p>";
      echo "<a href=\"quiz.php\" class=\"QuizLink\">Return to quiz page</a>";
      echo "</fieldset>";
      }
      else{
        //Inserting into Student table
          $query = "SELECT * FROM student WHERE stu_id=$studentid";
          $result= mysqli_query($conn, $query);
          if ($result){
            $arr=mysqli_fetch_assoc($result);
            if(count($arr)==0){
              $firsttime=true;
              mysqli_free_result($result);
              $query= "INSERT INTO student (`stu_id`, `firstname`, `lastname`) VALUES ('$studentid', '$firstname', '$lastname')";
              $result= mysqli_query($conn, $query);
            }
          }
          if($_POST["question1"]==""){
            $errMsg .= "<p>You must answer question 1</p>";
            $flag= false;
          }
          if(!isset($_POST["question2"])){
            $errMsg .= "<p>You must answer question 2</p>";
            $flag= false;
          }
          if(!isset($_POST["question3"])){
            $errMsg .= "<p>You must answer question 3</p>";
            $flag= false;
          }
          if($_POST["question4"]=="Please Select"){
            $errMsg .= "<p>You must answer question 4</p>";
            $flag= false;
          }
          if(!$flag){
            if($firsttime){
              $query="DELETE FROM student WHERE stu_id=$studentid";
              $result= mysqli_query($conn, $query);
            }
            echo "<h1 class=\"markquizheader\">Error!</h1>";
          echo "<fieldset id=\"err-notice\" class=\"Box1 \">";
                echo "<div class = \"StudentResults1\">";
                  echo  "<P>Error</P></div>";
                echo $errMsg;
          echo "<a href=\"quiz.php\" class=\"QuizLink\">Return to quiz page</a>";
          echo "</fieldset>";
          }
          else{
            //Sanitising Inputs
           
            $question1= sanitise_input($_POST["question1"]);
            $question2= sanitise_input($_POST["question2"]);
            $question3= $_POST["question3"];
            $question4= sanitise_input($_POST["question4"]);
            $question5= sanitise_input($_POST["question5"]);
            //Marking the quiz
            $score=0;

            //Q1
            if (($question1 == "framework") || ($question1 == "Framework")){
			    $score++;
		    }
            //Q2
            if ($question2 == 'False'){
			    $score++;
            }
            //Q3
                if ((isset($question3[1])) && ($question3[1] == "Calculations") && ($question3[0] = "Sing")){
                    $score++;
                }
            //Q4
            if ($question4 == "Shopify") {
			    $score++;
		    }
            //Q5
            if($question5 == "5"){
			    $score++;
		    }
            
            // below part will update the score into the databases
            //Inserting into attempt table
            if($firsttime){
              $attemptid=1;
            } else{
              $attemptid=2;
            }


            $query= "INSERT INTO attempt (`stu_id`,`doa`, `score`, `attempt_id`) VALUES ('$studentid', CURRENT_TIMESTAMP, $score, $attemptid)";
            $result= mysqli_query($conn, $query);

          }
      }
    }
 ?>

 <?php

    if(!$flag){

    }else{
    ?>



             <!-- navbar -->

          <!-- navbar  -->
          <br></br>
          <h1 class="markquizheader">Quiz Completed!</h1>
        <!--Student Results-->
        <fieldset class="Box1">
               <div class = "StudentResults1">
                  <P>Student Results</P></div>
                  <div class="">
                    <p>Student id: <?php echo $studentid; ?></p>
                  </div>
               <div class = "Name1">
                  <p>Name: <?php echo"$firstname $lastname"; ?></p></div>
               <div class = "TotalScore1">
                  <p>Total Score: <?php echo"$score"; ?></p></div>
               <div class = "MaximumScore1">
                  <p>Maximum Score: 5</p></div>
               <div class = "AttemptNumber1">
                  <P>Attempt Number: <?php echo"$attemptid"; ?></P></div>
               <div class = "DateAttempted1">
                 <P>Date attempted: <?php echo"$date"; ?></P></div>
        <!-- Link to quiz here-->
        <a href="quiz.php" class="QuizLink">Return to quiz page</a>
        </fieldset>
        <br></br>
        <?php
        }
      ?>
       </main>
        <?php
          require 'footer.inc';
          // display_header;
        ?>
      </body>

        </html>
