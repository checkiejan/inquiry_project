<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mark quiz</title>
  </head>
  <body>
    <h1>Manage attempts</h1>
    <hr>
    <form class="" action="manage.php" method="post">
      <p><label for="firstname">First name</label>
		<input type="text" name="firstname" maxlength="30" id="firstname" size="20" />
	</p>

  <p><label for="lastname">Last name</label>
		<input type="text" name="lastname" maxlength="30" id="lastname" size="20"  />
	 </p>
   <p><label for="studid">Student Id</label>
		<input type="text" name="studid" id="studid" size="20"  />
	 </p>
   <p>
		<label for="sort">How to sort</label>
		<select name="sort" id="sort">
			<option value="none">Please select</option>
      <option value="all">All attempt</option>
			<option value="allfirst">Sort by 100% on first attempt</option>
			<option value="half">Sort by 50% on second attempt</option>
			<option value="name">Sort by name</option>
			<option value="id">Sort by Student Id</option>
		</select>
	</p>
   <input type="submit" name="submit" value="Filter" />
     </form>
     <hr>

    <?php
      require 'setting.php';
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
           $query ="SELECT student.firstname, student.lastname, student.noa, student.stu_id, attempt.doa, attempt.score
                    FROM student
                    INNER JOIN attempt ON student.stu_id = attempt.stu_id";
           $result= mysqli_query($conn, $query);
           if(!$result){
             echo "<p>Something is wrong with ",$query,"</p>";
           }
           else{
             echo "<table border=\"1\">\n";
             echo "<tr>\n"
                 ."<th scope=\"col\">Student Id</th>\n"
                 ."<th scope=\"col\">First name</th>\n"
                 ."<th scope=\"col\">Last name</th>\n"
                 ."<th scope=\"col\">Date of attempt</th>\n"
                 ."<th scope=\"col\">Number of attempt</th>\n"
                 ."<th scope=\"col\">Score</th>\n"
                 ."</tr>\n";
             while ($row=mysqli_fetch_assoc($result)){
               echo "<tr>\n";
               echo "<td>",$row["stu_id"],"</td>\n";
               echo "<td>",$row["firstname"],"</td>\n";
               echo "<td>",$row["lastname"],"</td>\n";
                echo "<td>",$row["doa"],"</td>\n";
                 echo "<td>",$row["noa"],"</td>\n";
                  echo "<td>",$row["score"],"</td>\n";
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
           $query ="SELECT student.firstname, student.lastname, student.noa, student.stu_id, attempt.doa, attempt.score
                    FROM student
                    INNER JOIN attempt ON student.stu_id = attempt.stu_id WHERE student.noa=1 and attempt.score=12";
           $result= mysqli_query($conn, $query);
           if(!$result){
             echo "<p>Something is wrong with ",$query,"</p>";
           }
           else{
             echo "<table border=\"1\">\n";
             echo "<tr>\n"
                 ."<th scope=\"col\">Student Id</th>\n"
                 ."<th scope=\"col\">First name</th>\n"
                 ."<th scope=\"col\">Last name</th>\n"
                 ."<th scope=\"col\">Date of attempt</th>\n"
                 ."<th scope=\"col\">Number of attempt</th>\n"
                 ."<th scope=\"col\">Score</th>\n"
                 ."</tr>\n";
             while ($row=mysqli_fetch_assoc($result)){
               echo "<tr>\n";
               echo "<td>",$row["stu_id"],"</td>\n";
               echo "<td>",$row["firstname"],"</td>\n";
               echo "<td>",$row["lastname"],"</td>\n";
                echo "<td>",$row["doa"],"</td>\n";
                 echo "<td>",$row["noa"],"</td>\n";
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
           $query ="SELECT student.firstname, student.lastname, student.noa, student.stu_id, attempt.doa, attempt.score
                    FROM student
                    INNER JOIN attempt ON student.stu_id = attempt.stu_id WHERE student.noa=1 and attempt.score>=6";
           $result= mysqli_query($conn, $query);
           if(!$result){
             echo "<p>Something is wrong with ",$query,"</p>";
           }
           else{
             echo "<table border=\"1\">\n";
             echo "<tr>\n"
                 ."<th scope=\"col\">Student Id</th>\n"
                 ."<th scope=\"col\">First name</th>\n"
                 ."<th scope=\"col\">Last name</th>\n"
                 ."<th scope=\"col\">Date of attempt</th>\n"
                 ."<th scope=\"col\">Number of attempt</th>\n"
                 ."<th scope=\"col\">Score</th>\n"
                 ."</tr>\n";
             while ($row=mysqli_fetch_assoc($result)){
               echo "<tr>\n";
               echo "<td>",$row["stu_id"],"</td>\n";
               echo "<td>",$row["firstname"],"</td>\n";
               echo "<td>",$row["lastname"],"</td>\n";
                echo "<td>",$row["doa"],"</td>\n";
                 echo "<td>",$row["noa"],"</td>\n";
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
        // code...
         function sanitise_input($data){
            $data= trim($data);
            $data= stripslashes($data);
            $data=htmlspecialchars($data);
            return $data;
          }
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
           $query ="SELECT student.firstname, student.lastname, student.noa, student.stu_id, attempt.doa, attempt.score
                    FROM student
                    INNER JOIN attempt ON student.stu_id = attempt.stu_id WHERE student.firstname=\"$firstname\" and  student.lastname=\"$lastname\"";
           $result= mysqli_query($conn, $query);
           if(!$result){
             echo "<p>Something is wrong with ",$query,"</p>";
           }
           else{
             echo "<table border=\"1\">\n";
             echo "<tr>\n"
                 ."<th scope=\"col\">Student Id</th>\n"
                 ."<th scope=\"col\">First name</th>\n"
                 ."<th scope=\"col\">Last name</th>\n"
                 ."<th scope=\"col\">Date of attempt</th>\n"
                 ."<th scope=\"col\">Number of attempt</th>\n"
                 ."<th scope=\"col\">Score</th>\n"
                 ."</tr>\n";
             while ($row=mysqli_fetch_assoc($result)){
               echo "<tr>\n";
               echo "<td>",$row["stu_id"],"</td>\n";
               echo "<td>",$row["firstname"],"</td>\n";
               echo "<td>",$row["lastname"],"</td>\n";
                echo "<td>",$row["doa"],"</td>\n";
                 echo "<td>",$row["noa"],"</td>\n";
                  echo "<td>",$row["score"],"</td>\n";
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
           $query ="SELECT student.firstname, student.lastname, student.noa, student.stu_id, attempt.doa, attempt.score
                    FROM student
                    INNER JOIN attempt ON student.stu_id = attempt.stu_id WHERE student.stu_id=\"$studentid\" ";
           $result= mysqli_query($conn, $query);
           if(!$result){
             echo "<p>Something is wrong with ",$query,"</p>";
           }
           else{
             echo "<table border=\"1\">\n";
             echo "<tr>\n"
                 ."<th scope=\"col\">Student Id</th>\n"
                 ."<th scope=\"col\">First name</th>\n"
                 ."<th scope=\"col\">Last name</th>\n"
                 ."<th scope=\"col\">Date of attempt</th>\n"
                 ."<th scope=\"col\">Number of attempt</th>\n"
                 ."<th scope=\"col\">Score</th>\n"
                 ."</tr>\n";
             while ($row=mysqli_fetch_assoc($result)){
               echo "<tr>\n";
               echo "<td>",$row["stu_id"],"</td>\n";
               echo "<td>",$row["firstname"],"</td>\n";
               echo "<td>",$row["lastname"],"</td>\n";
                echo "<td>",$row["doa"],"</td>\n";
                 echo "<td>",$row["noa"],"</td>\n";
                  echo "<td>",$row["score"],"</td>\n";
               echo "</tr>\n";
             }
             echo "</table>\n";
             mysqli_free_result($result);
           }
           mysqli_close($conn);
         }


       }
     }





     }
         // else{
         //   $lastname= sanitise_input($_POST["lastname"]);
         //   $fistname= sanitise_input($_POST["firstname"]);
         //   $student_id= sanitise_input($_POST["studid"]);
         //   if ($lastname =="" && $firstname==""&& $student_id=="" ){
         //
         //   }
         //   elseif(){
         //
         //   }
         // }
     ?>
  </body>
</html>
