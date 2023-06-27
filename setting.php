<?php
  $host= "";
  $user= "";
  $pwd= "";
  $sql_db= "";
  function sanitise_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
 ?>
