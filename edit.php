<?php
require 'setting.php';
 $conn= @mysqli_connect($host,$user,$pwd,$sql_db);
 if (!$conn){
   echo "<p>Database connection failure</p>";
 }
 else{
if(isset($_POST["score"])&& isset($_POST["try_attempt"])){ // check if user choose an attempt to change
  $score= $_POST["score"];
  $id= $_POST["try_attempt"];
$query ="UPDATE attempt SET score = '$score' WHERE id = $id "; // change the score for that attempt
$result= mysqli_query($conn, $query);
if(!$result){
  echo "<p>Something is wrong with ",$query,"</p>";
}
else{
  echo"Success";

}
mysqli_close($conn);
}
}
  header("Location:manage.php"); // direct back to manage page
 ?>
