<?php  session_start();   // session starts with the help of this function
if(isset($_SESSION['attempt_again'])){
  $now = time();
  if($now >= $_SESSION['attempt_again']){
      unset($_SESSION['error']);
    unset($_SESSION['attempt']);
    unset($_SESSION['attempt_again']);
  }
}
if(!isset($_SESSION['attempt'])){
			$_SESSION['attempt'] = 0;
		}
if(isset($_SESSION['use']))   // Checking whether the session is already there or not if
                              // true then header redirect it to the home page directly
 {
    header("Location:manage1.php");
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

       if($_SESSION['attempt'] == 3){
         echo $_SESSION['error'];
       } else {
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
                 unset($_SESSION['attempt']);
                 unset($_SESSION['error']);
                 unset($_SESSION['attempt_again']);
                 mysqli_close($conn);
		header("location:./manage1.php");
                 // header("location:./home.php");
             }
             else{

					//this is where we put our 3 attempt limit
					$_SESSION['attempt'] += 1;
          if(isset($_SESSION['attempt'])&&$_SESSION['attempt']<3)
          {
            $tmp=3-$_SESSION['attempt'];
            echo "<p>you have $tmp try left</p>";


          }
					//set the time to allow login if third attempt is reach
					if($_SESSION['attempt'] == 3){
            $_SESSION['error']= "<p>please wait 10 seconds before try again</p>";
						$_SESSION['attempt_again'] = time() + 10;
						//note 5*60 = 5mins, 60*60 = 1hr, to set to 2hrs change it to 2*60*60
					}
          if($_SESSION['attempt']<3){
                 echo "<p>invalid UserName or Password</p>";}
                mysqli_free_result($result);
                mysqli_close($conn);
             }

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
