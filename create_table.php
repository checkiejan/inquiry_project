<?php
#require_once 'setting.php';
function create_student_table($conn) {
//   $conn= @mysqli_connect($host,$user,$pwd,$sql_db);
   if(!$conn){

     echo "<p>Database connection failure</p>";
   }
   else{

    $query= "CREATE TABLE IF NOT EXISTS student (
    stu_id VARCHAR(10) NOT NULL PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL
  )";
     // $sql="select * from supervisor where user='", $uname ,"'AND Pass='", $password ,"' limit 1";

      $result= mysqli_query($conn, $query);
      mysqli_close($conn);
   }
}
function set_timezone($conn){
  if(!$conn){

    echo "<p>Database connection failure</p>";
  }
  else{
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
    $query= "CREATE TABLE IF NOT EXISTS attempt (
      id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
      stu_id VARCHAR(10) NOT NULL,
      doa TIMESTAMP  NOT NULL,
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
      username	varchar(30) NOT NULL PRIMARY KEY,
      pwd	varchar(30)  NOT NULL
  )";
     // $sql="select * from supervisor where user='", $uname ,"'AND Pass='", $password ,"' limit 1";

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
        if(count($arr)==0){
          $query= "INSERT INTO supervisor (`username`, `pwd`) VALUES ('haha', '123')";
          $result= mysqli_query($conn, $query);
        }
      }
      $query = "SELECT * FROM supervisor WHERE username='henry' ";
        $result= mysqli_query($conn, $query);
        if ($result){
          $arr=mysqli_fetch_assoc($result);
          if(count($arr)==0){
            $query= "INSERT INTO `supervisor` (`username`, `pwd`) VALUES ('henry', '234')";
            $result= mysqli_query($conn, $query);
          }
        }
        $query = "SELECT * FROM supervisor WHERE username='hjk' ";
          $result= mysqli_query($conn, $query);
          if ($result){
            $arr=mysqli_fetch_assoc($result);
            if(count($arr)==0){
              $query= "INSERT INTO `supervisor` (`username`, `pwd`) VALUES ('hjk', '234')";
              $result= mysqli_query($conn, $query);
            }
          }
          mysqli_close($conn);
      // if(!mysql_fetch_array($result) ){
      //   echo "<p>yes</p>";
      // }
      // else{
      //   echo "<p>no</p>";
      // }
  }
}
 ?>
