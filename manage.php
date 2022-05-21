<!DOCTYPE html>
<?php
session_start();
require_once 'create_table.php';
require_once 'setting.php';
$conn= @mysqli_connect($host,$user,$pwd,$sql_db);
create_student_table($conn);
$conn= @mysqli_connect($host,$user,$pwd,$sql_db);
create_attempt_table($conn);
$conn= @mysqli_connect($host,$user,$pwd,$sql_db);
set_timezone($conn);

if(!isset($_SESSION['use'])) // If session is not set then redirect to Login Page
 {
     header("Location:login.php");
 }
 if (isset($_POST["firstname"]) )
 {
   if (isset($_POST["sort"]) && $_POST["sort"]=="name")
   {
    $_SESSION["firstname"]= $_POST["firstname"];
    unset($_SESSION["studid"]);
  }
}
if (isset($_POST["lastname"])&& isset($_POST["sort"]) && $_POST["sort"]=="name")
{
  if (isset($_POST["sort"]) && $_POST["sort"]=="name")
  {
    $_SESSION["lastname"]= $_POST["lastname"];
    unset($_SESSION["studid"]);
  }
}
if (isset($_POST["studid"]))
{
  if (isset($_POST["sort"]) && $_POST["sort"]=="id")
  {
  $_SESSION["studid"]= $_POST["studid"];
  unset($_SESSION["lastname"]);
  unset($_SESSION["firstname"]);
  }
}
if (isset($_POST["sort"])){
  if($_POST["sort"]!="name" && $_POST["sort"]!="id"){
    if(isset($_SESSION["studid"])){
      unset($_SESSION["studid"]);

    }
    if(isset($_SESSION["firstname"])){
      unset($_SESSION["firstname"]);
    }
    if(isset($_SESSION["lastname"])){
      unset($_SESSION["lastname"]);
    }
  }
}
if(isset($_POST["sort"])){

    if ($_POST["sort"]== "all"){
      $_SESSION["choice"]=0;}
    elseif ($_POST["sort"]== "allfirst") {
      $_SESSION["choice"]=1;}
  elseif ($_POST["sort"]== "half") {
      $_SESSION["choice"]=2;}
  elseif ($_POST["sort"]== "name"){
    $_SESSION["choice"]=3;}
  elseif ($_POST["sort"]== "id") {
    $_SESSION["choice"]=4;}

}


 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mark quiz</title>
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" href="images/favicon.ico">
    <!-- Link to Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

  </head>
  <body>
    <?php require_once 'header.inc'; ?>
    <main class="body-manage">

      <div class="h-manage">
        <h1>Manage attempts</h1>
        <?php   echo "<button class=\"btn btn-outline-dark\" onclick=\"document.location='logout.php'\" type=\"button\">Logout</button> "; ?>
      </div>

    <hr>

    <form class="" action="manage.php" method="post">
      <p><label for="firstname">First name</label>
		<input type="text" name="firstname" value= "<?php if(isset($_SESSION["firstname"])) { echo $_SESSION["firstname"]; } ?>"   maxlength="30" id="firstname" size="20" />
	</p>

  <p><label for="lastname">Last name</label>
		<input type="text" name="lastname" value= "<?php if(isset($_SESSION["lastname"])) { echo $_SESSION["lastname"]; } ?>" maxlength="30" id="lastname" size="20"  />
	 </p>
   <p><label for="studid">Student Id</label>
		<input type="text"  name="studid" value= "<?php if(isset($_SESSION["studid"])) { echo $_SESSION["studid"]; } ?>"  id="studid" size="20"  />
	 </p>
   <p>
		<label for="sort">How to sort</label>
		<select name="sort" id="sort" >
			<!-- <option value="none">Please select</option> -->

      <option value="all"
      <?php if(isset($_SESSION["choice"]))
     {if ($_SESSION["choice"]==0) echo "selected"; }
       ?>
      >All attempt</option>
			<option value="allfirst" <?php if(isset($_SESSION["choice"]))
      {if ($_SESSION["choice"]==1) echo "selected"; }
        ?>
      >Sort by 100% on first attempt</option>
			<option value="half"
      <?php if(isset($_SESSION["choice"]))
     {if ($_SESSION["choice"]==2) echo "selected"; }
       ?>
      >Sort by under 50% on second attempt</option>
			<option value="name"
      <?php if(isset($_SESSION["choice"]))
     {if ($_SESSION["choice"]==3) echo "selected"; }
       ?>
      >Sort by name</option>
			<option value="id"
      <?php if(isset($_SESSION["choice"]))
     {if ($_SESSION["choice"]==4) echo "selected"; }
       ?>
      >Sort by Student Id</option>
		</select>
	</p>
   <input class=" btn-secondary btn-sm" type="submit" name="submit" value="Filter" />
     </form>
     <hr>

    <?php
  if(isset($_POST['submit'])&& isset($_POST["sort"])&& $_POST["sort"]!="none"){

        // if (isset($_POST["sort"])&& $_POST["sort"]!="none" ){
        //   $tmp=$_POST["sort"];
        //   echo "<p>$tmp</p>";
        // }
        if ($_POST["sort"]=="all") {
         $conn= @mysqli_connect($host,$user,$pwd,$sql_db);
         if (!$conn){
           echo "<p>Database connection failure</p>";
         }
         else{

           // $query="select * from attempt ";
           $query ="SELECT student.firstname, student.lastname, student.stu_id, attempt.doa, attempt.score, attempt.attempt_id, attempt.id
                    FROM student
                    INNER JOIN attempt ON student.stu_id = attempt.stu_id";
           $result= mysqli_query($conn, $query);
           if(!$result){
             echo "<p>Something is wrong with ",$query,"</p>";
           }
           else{
             echo "<table >\n";
             echo "<tr>\n"
                 ."<th scope=\"col\">Student Id</th>\n"
                 ."<th scope=\"col\">First name</th>\n"
                 ."<th scope=\"col\">Last name</th>\n"
                 ."<th scope=\"col\">Date of attempt</th>\n"
              //   ."<th scope=\"col\">Number of attempt</th>\n"
                 ."<th scope=\"col\">Attempt order</th>\n"
                 ."<th scope=\"col\">Score</th>\n"
                 ."<th scope=\"col\">Edit</th>\n"
                 ."</tr>\n";
             while ($row=mysqli_fetch_assoc($result)){
               echo "<tr>\n";
               echo "<td>",$row["stu_id"],"</td>\n";
               echo "<td>",$row["firstname"],"</td>\n";
               echo "<td>",$row["lastname"],"</td>\n";
               echo "<td>",$row["doa"],"</td>\n";
              // echo "<td>",$row["noa"],"</td>\n";
               echo "<td>",$row["attempt_id"],"</td>\n";
               echo "<form  action=\"edit.php\" method=\"post\">";
               echo "<input name =\"try_attempt\" type=\"hidden\" value= ",$row["id"],">";
               echo "<td><input type=\"number\" value= ",$row["score"]," id=\"score\" name=\"score\" min=\"0\" max=\"5\"></td>\n";
               echo "<td> <input type='submit' value='Edit'> </td>";
               echo "</form>";
               echo "</tr>\n";
             }
             echo "</table>\n";
             mysqli_free_result($result);
           }
           mysqli_close($conn);
         }
       }
       elseif ($_POST["sort"]=="allfirst"){
         $conn= @mysqli_connect($host,$user,$pwd,$sql_db);
         if (!$conn){
           echo "<p>Database connection failure</p>";
         }
         else{

           // $query="select * from attempt ";
           $query ="SELECT student.firstname, student.lastname, student.stu_id, attempt.doa, attempt.score, attempt.attempt_id
                    FROM student
                    INNER JOIN attempt ON student.stu_id = attempt.stu_id WHERE attempt.attempt_id=1 and attempt.score=5";
           $result= mysqli_query($conn, $query);
           if(!$result){
             echo "<p>Something is wrong with ",$query,"</p>";
           }
           else{
             echo "<table >\n";
             echo "<tr>\n"
             ."<th scope=\"col\">Student Id</th>\n"
             ."<th scope=\"col\">First name</th>\n"
             ."<th scope=\"col\">Last name</th>\n"
             ."<th scope=\"col\">Date of attempt</th>\n"
          //   ."<th scope=\"col\">Number of attempt</th>\n"
             ."<th scope=\"col\">Attempt order</th>\n"
             ."<th scope=\"col\">Score</th>\n"
             ."</tr>\n";
             while ($row=mysqli_fetch_assoc($result)){
               echo "<tr>\n";
               echo "<td>",$row["stu_id"],"</td>\n";
               echo "<td>",$row["firstname"],"</td>\n";
               echo "<td>",$row["lastname"],"</td>\n";
                echo "<td>",$row["doa"],"</td>\n";
                 echo "<td>",$row["attempt_id"],"</td>\n";
                  echo "<td>",$row["score"],"</td>\n";
               echo "</tr>\n";
             }
             echo "</table>\n";
             mysqli_free_result($result);
           }
           mysqli_close($conn);
         }
       }

       elseif ($_POST["sort"]=="half"){
         $conn= @mysqli_connect($host,$user,$pwd,$sql_db);
         if (!$conn){
           echo "<p>Database connection failure</p>";
         }
         else{

           // $query="select * from attempt ";
           $query ="SELECT student.firstname, student.lastname,  student.stu_id, attempt.doa, attempt.score, attempt.attempt_id
                    FROM student
                    INNER JOIN attempt ON student.stu_id = attempt.stu_id WHERE attempt.attempt_id=2 and attempt.score<3";
           $result= mysqli_query($conn, $query);
           if(!$result){
             echo "<p>Something is wrong with ",$query,"</p>";
           }
           else{
             echo "<table>\n";
             echo "<tr>\n"
             ."<th scope=\"col\">Student Id</th>\n"
             ."<th scope=\"col\">First name</th>\n"
             ."<th scope=\"col\">Last name</th>\n"
             ."<th scope=\"col\">Date of attempt</th>\n"
          //   ."<th scope=\"col\">Number of attempt</th>\n"
             ."<th scope=\"col\">Attempt order</th>\n"
             ."<th scope=\"col\">Score</th>\n"
             ."</tr>\n";
             while ($row=mysqli_fetch_assoc($result)){
               echo "<tr>\n";
               echo "<td>",$row["stu_id"],"</td>\n";
               echo "<td>",$row["firstname"],"</td>\n";
               echo "<td>",$row["lastname"],"</td>\n";
                echo "<td>",$row["doa"],"</td>\n";
                 echo "<td>",$row["attempt_id"],"</td>\n";
                  echo "<td>",$row["score"],"</td>\n";
               echo "</tr>\n";
             }
             echo "</table>\n";
             mysqli_free_result($result);
           }
           mysqli_close($conn);
         }
       }
       elseif ($_POST["sort"]=="name") {
         // $_SESSION=$_POST["firstname"];
         // $_SESSION=$_POST["lastname"];
         $check=true;
          $firstname=$_POST["firstname"];
           $lastname=$_POST["lastname"];
         if($_POST["firstname"]==""){
           echo "<p>You have to input the first name</p>";
           $check=false;
         }
         elseif (!preg_match("/^[a-zA-z\s-]*$/",$firstname)){
           echo "<p>Only alpha letters and hyphen allowed in your first name.</p>";
              $check=false;
         }
         else {
           $firstname=sanitise_input($_POST["firstname"]);
         }
         if($_POST["lastname"]==""){
           echo "<p>You have to input the last name</p>";
              $check=false;
         }
         elseif (!preg_match("/^[a-zA-z\s-]*$/",$lastname)){
           echo "<p>Only alpha letters and hyphen allowed in your last name.</p>";
              $check=false;
         }
         else {
           $lastname=sanitise_input($_POST["lastname"]);
       }
       if ($check){
         $conn= @mysqli_connect($host,$user,$pwd,$sql_db);
         if (!$conn){
           echo "<p>Database connection failure</p>";
         }
         else{

           // $query="select * from attempt ";
           $query ="SELECT student.firstname, student.lastname,  student.stu_id, attempt.doa, attempt.score, attempt.attempt_id, attempt.id
                    FROM student
                    INNER JOIN attempt ON student.stu_id = attempt.stu_id WHERE student.firstname=\"$firstname\" and  student.lastname=\"$lastname\"";
           $result= mysqli_query($conn, $query);
           if(!$result){
             echo "<p>Something is wrong with ",$query,"</p>";
           }
           else{
             echo "<table >\n";
             echo "<tr>\n"
             ."<th scope=\"col\">Student Id</th>\n"
             ."<th scope=\"col\">First name</th>\n"
             ."<th scope=\"col\">Last name</th>\n"
             ."<th scope=\"col\">Date of attempt</th>\n"
          //   ."<th scope=\"col\">Number of attempt</th>\n"
             ."<th scope=\"col\">Attempt order</th>\n"
             ."<th scope=\"col\">Score</th>\n"
             ."<th scope=\"col\">Edit</th>\n"
             ."</tr>\n";
             while ($row=mysqli_fetch_assoc($result)){
               echo "<tr>\n";
               echo "<td>",$row["stu_id"],"</td>\n";
               echo "<td>",$row["firstname"],"</td>\n";
               echo "<td>",$row["lastname"],"</td>\n";
               echo "<td>",$row["doa"],"</td>\n";
              // echo "<td>",$row["noa"],"</td>\n";
               echo "<td>",$row["attempt_id"],"</td>\n";
               echo "<form  action=\"edit.php\" method=\"post\">";
               echo "<input name =\"try_attempt\" type=\"hidden\" value= ",$row["id"],">";
               echo "<td><input type=\"number\" value= ",$row["score"]," id=\"score\" name=\"score\" min=\"0\" max=\"5\"></td>\n";
               echo "<td> <input type='submit' value='Edit'> </td>";
               echo "</form>";
               echo "</tr>\n";
             }
             echo "</table>\n";
             mysqli_free_result($result);
           }
           mysqli_close($conn);
         }

       }
     }

     elseif ($_POST["sort"]=="id"){
      // $_SESSION["list"]=array();
      //  $_SESSION["studid"]=$_POST["studid"];
       $check=true;
        $studentid= $_POST["studid"];
       if ($_POST["studid"]==""){
         echo "<p>You have to input the student ID</p>";
         $check=false;
       }
       elseif (!preg_match("/^([0-9]{7}|[0-9]{10})$/",$studentid)){
         echo "<p>Please input number with the length of 7 or 10 numbers.</p>";
            $check=false;
       }
       else {
         $studentid=sanitise_input($_POST["studid"]);
       }
       if ($check){
         $conn= @mysqli_connect($host,$user,$pwd,$sql_db);
         if (!$conn){
           echo "<p>Database connection failure</p>";
         }
         else{

           // $query="select * from attempt ";
           $query ="SELECT student.firstname, student.lastname,  student.stu_id, attempt.doa, attempt.score, attempt.attempt_id, attempt.id
                    FROM student
                    INNER JOIN attempt ON student.stu_id = attempt.stu_id WHERE student.stu_id=\"$studentid\" ";
           $result= mysqli_query($conn, $query);
           if(!$result){
             echo "<p>Something is wrong with ",$query,"</p>";
           }
           else{
             echo "<table >\n";
             echo "<tr>\n"
             ."<th scope=\"col\">Student Id</th>\n"
             ."<th scope=\"col\">First name</th>\n"
             ."<th scope=\"col\">Last name</th>\n"
             ."<th scope=\"col\">Date of attempt</th>\n"
          //   ."<th scope=\"col\">Number of attempt</th>\n"
             ."<th scope=\"col\">Attempt order</th>\n"
             ."<th scope=\"col\">Score</th>\n"
             ."<th scope=\"col\">Edit</th>\n"
             ."</tr>\n";

             while ($row=mysqli_fetch_assoc($result)){
               echo "<tr>\n";
               echo "<td>",$row["stu_id"],"</td>\n";
               echo "<td>",$row["firstname"],"</td>\n";
               echo "<td>",$row["lastname"],"</td>\n";
               echo "<td>",$row["doa"],"</td>\n";
              // echo "<td>",$row["noa"],"</td>\n";
              //array_push($_SESSION["list"],$row["stu_id"]);
               echo "<td>",$row["attempt_id"],"</td>\n";
               echo "<form  action=\"edit.php\" method=\"post\">";
               echo "<input name =\"try_attempt\" type=\"hidden\" value= ",$row["id"],">";
               echo "<td><input type=\"number\" value= ",$row["score"]," id=\"score\" name=\"score\" min=\"0\" max=\"5\"></td>\n";
               echo "<td> <input type='submit' value='Edit'> </td>";
               echo "</form>";
               echo "</tr>\n";
             }
             echo "</table>\n";
             mysqli_free_result($result);
           }
           mysqli_close($conn);
         }

         echo "<form action=\"delete.php\" method=\"post\">";
         echo "<input class=\"btn-secondary btn-sm\" type=\"submit\" name=\"delete\" value=\"delete\">";
         echo "</form>";
       }


     }





     }
     ?>
       </main>
     <?php
     require 'footer.inc';
     ?>
  </body>
</html>
