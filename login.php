<?php  session_start();   // session starts with the help of this function
require_once 'create_table.php';
  require_once 'setting.php';
$conn= @mysqli_connect($host,$user,$pwd,$sql_db);
create_supervisor_table($conn);
$conn= @mysqli_connect($host,$user,$pwd,$sql_db);
create_account($conn);
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
    header("Location:manage.php");
 }

 ?>
<!DOCTYPE html>
<html  lang="en" dir="ltr">
<head>

<title> Login Page   </title>
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

<div class="login-bd">

<div class="login-page">
  <div class="form">
    <div class="login">
      <div class="login-header">
      <h3>LOGIN</h3>
      <p>Please enter your credentials below.</p>
      </div>
    </div>
    <?php
    if(isset($_POST['login']))   // it checks whether the user clicked login button or not
    {
          // $user = $_POST['user'];
          // $pass = $_POST['pass'];



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

                 $uname=sanitise_input($_POST['username']);
                 $password= sanitise_input($_POST['pass']);
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
    		             header("location:./manage.php");
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
                     echo "<p class=\"err\">Invalid UserName or Password</p>";}
                    mysqli_free_result($result);
                    mysqli_close($conn);
                 }

             }

           }

           }

    }

     ?>
    <form class="login-form" action="login.php" method="post">
      <input type="text" name="username"  required placeholder="Username"/>
    <input type="password" name="pass" required placeholder="Password"/>
    <input type="submit"  class="btn-form" name="login" value="LOGIN">
    <!-- <button class="btn-form">login</button> -->
  </form>
</div>
</div>
</div>
<?php require_once 'footer.inc'; ?>
</body>
</html>
