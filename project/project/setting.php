<?php
  $host= "feenix-mariadb.swin.edu.au";
  $user= "s103509199";
  $pwd= "hungdeptraivl";
  $sql_db= "s103509199_db";
  function sanitise_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
 ?>
