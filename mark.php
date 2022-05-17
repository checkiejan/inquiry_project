<?php
    require_once 'create_table.php';
    require_once 'setting.php';
    $conn= @mysqli_connect($host,$user,$pwd,$sql_db);
    create_student_table($conn);
    $conn= @mysqli_connect($host,$user,$pwd,$sql_db);
    create_attempt_table($conn);
    $errMsg = "";
    $flag=true;
    $firsttime=false;
    ////
    if ($_POST["stu_id"]=="")
    {
        $errMsg .="<p>You must input your student id</p>";
        $flag=false;
    }
    elseif(!preg_match("/^([0-9]{7}|[0-9]{10})$/",$_POST["stu_id"])){
      $errMsg .="<p>your student id must contain 7 or 10 digits</p>";
      $flag=false;
    }
    else{
      $studentid=sanitise_input($_POST["stu_id"]);
    }
    //////
    if ($_POST["firstname"]=="")
    {
        $errMsg .="<p>You must input your first name</p>";
        $flag=false;
    }
    elseif (!preg_match("/^[a-zA-z\s-]*$/",$_POST["firstname"])){
      $errMsg .="<p>Only alpha letters and hyphen allowed in your first name.</p>";
      $flag=false;
    }
    else{
      $firstname=sanitise_input($_POST["firstname"]);
    }
    ///////
    if ($_POST["lastname"]=="")
    {
        $errMsg .="<p>You must input your last name</p>";
        $flag=false;
    }
    elseif (!preg_match("/^[a-zA-z\s-]*$/",$_POST["lastname"])){
      $errMsg .="<p>Only alpha letters and hyphen allowed in your last name.</p>";
      $flag=false;
    }
    else{
      $lastname=sanitise_input($_POST["lastname"]);
    }
    ///////
    if(!$flag){
      print $errMsg;
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
        print "<p>you have reached your limit of 2 attempts</p>";
      }
      else{
          $query = "SELECT * FROM student WHERE stu_id=$studentid";
          $result= mysqli_query($conn, $query);
          if ($result){
            $arr=mysqli_fetch_assoc($result);
            if(count($arr)==0){
              $firsttime=true;
              mysqli_free_result($result);
              $query= "INSERT INTO student (`stu_id`, `firstname`, `lastname`) VALUES ($studentid, '$firstname', '$lastname')";
              $result= mysqli_query($conn, $query);
            }
          }
          if($_POST["question1"]==""){
            $errMsg .= "<p>you must answer question 1</p>";
            $flag= false;
          }
          if(!isset($_POST["question2"])){
            $errMsg .= "<p>you must answer question 2</p>";
            $flag= false;
          }
          if(!isset($_POST["question3"])){
            $errMsg .= "<p>you must answer question 3</p>";
            $flag= false;
          }
          if($_POST["question4"]=="Please Select"){
            $errMsg .= "<p>you must answer question 4</p>";
            $flag= false;
          }
          if(!$flag){
            if($firsttime){
              $query="DELETE FROM student WHERE stu_id=$studentid";
              $result= mysqli_query($conn, $query);
            }
            echo $errMsg;
          }
          else{
            // where to check if the answer is correct
            $question1= sanitise_input($_POST["question1"]);
            $question2= sanitise_input($_POST["question2"]);
            $question3= $_POST["question3"];
            $question4= sanitise_input($_POST["question4"]);
            $question5= sanitise_input($_POST["question5"]);
            /// you will start from here to mark
            $score=5;





            // below part will update the score into the databases

            if($firsttime){
              $attemptid=1;
            } else{
              $attemptid=2;
            }
        
            $query= "INSERT INTO attempt (`stu_id`,`doa`, `score`, `attempt_id`) VALUES ($studentid, UTC_TIMESTAMP(), $score, $attemptid)";
            $result= mysqli_query($conn, $query);
          }
      }
    }
 ?>
