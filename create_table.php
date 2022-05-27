<?php
function create_student_table($conn) {
   if(!$conn){

     echo "<p>Database connection failure</p>";
   }
   else{
     // check if the table exists or not to create
    $query= "CREATE TABLE IF NOT EXISTS student (
    stu_id VARCHAR(10) NOT NULL PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL
  )";

      $result= mysqli_query($conn, $query);
      mysqli_close($conn);
   }
}
function set_timezone($conn){
  if(!$conn){

    echo "<p>Database connection failure</p>";
  }
  else{
    // set the timezone for the database to make sure they store data with correct time
    $query="SET time_zone= '+10:00'";
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
     // check if the table exists or not to create
    $query= "CREATE TABLE IF NOT EXISTS attempt (
      id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
      stu_id VARCHAR(10) NOT NULL,
      doa TIMESTAMP  NOT NULL,
      score INT NOT NULL,
      attempt_id INT NOT NULL,
      FOREIGN KEY (stu_id) REFERENCES student(stu_id) ON DELETE CASCADE
  )";

      $result= mysqli_query($conn, $query);
      mysqli_close($conn);
   }
}
function create_supervisor_table($conn) {
   if(!$conn){

     echo "<p>Database connection failure</p>";
   }
   else{
     // check if the table exists or not to create

    $query= "CREATE TABLE IF NOT EXISTS supervisor (
      username	varchar(30) NOT NULL PRIMARY KEY,
      pwd	varchar(30)  NOT NULL
  )";

      $result= mysqli_query($conn, $query);
      mysqli_close($conn);
   }

}
function  create_account($conn){
  if($conn){
    $query = "SELECT * FROM supervisor WHERE username='haha' ";
      $result= mysqli_query($conn, $query);
      if ($result){
        $arr=mysqli_fetch_assoc($result);
        if(count($arr)==0){ // check if this account exists or not to create the account
          $query= "INSERT INTO supervisor (`username`, `pwd`) VALUES ('haha', '123')";
          $result= mysqli_query($conn, $query);
        }
      }
      $query = "SELECT * FROM supervisor WHERE username='henry' ";
        $result= mysqli_query($conn, $query);
        if ($result){
          $arr=mysqli_fetch_assoc($result);
          if(count($arr)==0){ // check if this account exists or not to create the account
            $query= "INSERT INTO `supervisor` (`username`, `pwd`) VALUES ('henry', '234')";
            $result= mysqli_query($conn, $query);
          }
        }
        $query = "SELECT * FROM supervisor WHERE username='hjk' ";
          $result= mysqli_query($conn, $query);
          if ($result){
            $arr=mysqli_fetch_assoc($result);
            if(count($arr)==0){ // check if this account exists or not to create the account
              $query= "INSERT INTO `supervisor` (`username`, `pwd`) VALUES ('hjk', '234')";
              $result= mysqli_query($conn, $query);
            }
          }
          mysqli_close($conn);
  }
}
 ?>
