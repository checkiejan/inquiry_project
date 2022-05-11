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
  <link rel="stylesheet" href="style/styles.css">
   <!-- Link to Google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
 <title> Login Page   </title>
</head>

<body>
	<body>
		<div class="login-page">
			<div class="form">
				<div class="login">
					<div class"login-header">
					<h3>LOGIN</h3>
					<p>Please enter your credentials below.</p>

					</div>
				</div>
				<form class="login-form">
					<input type="text"
			placeholder="username"/>
				<input type="password"
			placeholder="password"/>
				<button>login</button>
			</form>
		</div>
	</div>
</body>
</body>
</html>
