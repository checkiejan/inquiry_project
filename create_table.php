<?php
require_once 'setting.php';
function create_student_table($conn) {
//   $conn= @mysqli_connect($host,$user,$pwd,$sql_db);
   if(!$conn){

     echo "<p>Database connection failure</p>";
   }
   else{
    $query= "CREATE TABLE IF NOT EXISTS student (
    stu_id INT NOT NULL PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    noa INT NOT NULL,
  )";
     // $sql="select * from supervisor where user='", $uname ,"'AND Pass='", $password ,"' limit 1";

      $result= mysqli_query($conn, $query);
      mysqli_close($conn);
   }
}
function create_attempt_table($conn) {
  // $conn= @mysqli_connect($host,$user,$pwd,$sql_db);
   if(!$conn){

     echo "<p>Database connection failure</p>";
   }
   else{
    $query= "CREATE TABLE IF NOT EXISTS attempt (
      id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
      stu_id INT NOT NULL,
      doa DATETIME  NOT NULL,
      score INT NOT NULL,
      attempt_id INT NOT NULL,
      FOREIGN KEY (stu_id) REFERENCES student(stu_id) ON DELETE CASCADE
  )";
     // $sql="select * from supervisor where user='", $uname ,"'AND Pass='", $password ,"' limit 1";

      $result= mysqli_query($conn, $query);
      mysqli_close($conn);
   }
}
function create_supervisor_table($conn) {
//   $conn= @mysqli_connect($host,$user,$pwd,$sql_db);
   if(!$conn){

     echo "<p>Database connection failure</p>";
   }
   else{
    $query= "CREATE TABLE IF NOT EXISTS supervisor (
      id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
      username	varchar(30) NOT NULL,
      pwd	varchar(30)  NOT NULL
  )";
     // $sql="select * from supervisor where user='", $uname ,"'AND Pass='", $password ,"' limit 1";

      $result= mysqli_query($conn, $query);
      mysqli_close($conn);
   }

}
 ?>
