<?php   session_start();  ?>

<html>
  <head>
       <title> Home </title>
  </head>
  <body>
<?php
      if(!isset($_SESSION['use'])) // If session is not set then redirect to Login Page
       {
           header("Location:login.php");
       }

    

          echo "Login Success";

          echo "<a href='logout.php'> Logout</a> ";
?>
</body>
</html>
