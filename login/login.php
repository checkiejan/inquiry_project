<?php  session_start();   // session starts with the help of this function

if(isset($_SESSION['use']))   // Checking whether the session is already there or not if
                              // true then header redirect it to the home page directly
 {
    header("Location:home.php");
 }

if(isset($_POST['login']))   // it checks whether the user clicked login button or not
{
      // $user = $_POST['user'];
      // $pass = $_POST['pass'];

    require_once '../setting.php';

     $conn= @mysqli_connect($host,$user,$pwd,$sql_db);
     if (!$conn){
       echo "<p>Database connection failure</p>";
     }
     else{
       // echo "<p>Database connection sucess</p>";


         if(isset($_POST['username']) && isset($_POST['pass']) ){

             $uname=$_POST['username'];
             $password=$_POST['pass'];
             $query="select * from supervisor where username='$uname' AND pwd='$password' ";

             // $sql="select * from supervisor where user='", $uname ,"'AND Pass='", $password ,"' limit 1";

              $result= mysqli_query($conn, $query);
              if (!$result) {
                 mysqli_close($conn);
                 exit() ;
               }
              $row=mysqli_fetch_assoc($result);
             if($row['username']==$uname && $row['pwd']==$password  && $uname != "" && $password !=""){

                 $_SESSION['use']=$_POST['username'];
                 mysqli_close($conn);
		header("location:./home.php");
                 // header("location:./home.php");
             }
             else{
                 echo "invalid UserName or Password";
                mysqli_free_result($result);
                mysqli_close($conn);
             }

         }



       }

}

 ?>

<html>
<head>

<title> Login Page   </title>

</head>

<body>

<form action="" method="post">

    <table width="200" border="0">
  <tr>
    <td>  UserName</td>
    <td> <input type="text" name="username" > </td>
  </tr>
  <tr>
    <td> PassWord  </td>
    <td><input type="password" name="pass"></td>
  </tr>
  <tr>
    <td> <input type="submit" name="login" value="LOGIN"></td>
    <td></td>
  </tr>
</table>
</form>

</body>
</html>
