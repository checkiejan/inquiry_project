<?php
require '../setting.php';
session_start();
 $conn= @mysqli_connect($host,$user,$pwd,$sql_db);
 if (!$conn){
   echo "<p>Database connection failure</p>";
 }
 else{

if (isset($_SESSION["studid"])){
  echo $_SESSION["studid"];
}
else {
  echo "none";
}
mysqli_close($conn);

}
//  header("Location:manage1.php");
 ?>
