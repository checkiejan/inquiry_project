<?php
require 'setting.php';
session_start();
 $conn= @mysqli_connect($host,$user,$pwd,$sql_db);
 if (!$conn){
   echo "<p>Database connection failure</p>";
 }
 else{

if (isset($_SESSION["studid"])){
$id= $_SESSION["studid"];
  $query="DELETE FROM student WHERE stu_id= $id"; // delete his student id and all of the attempt with this student id also be deleted
  $result= mysqli_query($conn, $query);
  if(!$result){
    echo "<p>Something is wrong with ",$query,"</p>";
  }
  else{
    echo"Success";

  }
}
else {
  echo "none";
}
mysqli_close($conn);
  header("location: manage.php"); // direct back to the manage page
}
 ?>
