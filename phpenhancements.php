<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Enhancement 2 of the page">
    <meta name="keywords" content="Primary Code, Login">
    <meta name="author" content="Group 5">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- This is the link to bootstrap file -->
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" href="images/favicon.ico">
    <!-- Link to Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Ruby on Rails</title>
  </head>

<body class="bodybg">
     <!-- navbar -->
 <?php
require 'header.inc'; ?>
  <!-- navbar  -->
  <br>
  <h1 class="enhancementheader">Enhancements</h1>
 <main class="main-2">


<!--First Enhancements Box-->
<fieldset class="Box1">
       <div class = "firsttitle">
          <P> Normalisation</P></div>
       <div class = "Enhance1">
          <p>Primary keys are mainly used to uniquely identify each record in a table.</p>
          <p>Foreign keys are used to prevent actions that would destroy links between tables.</p>
          <!--Source: https://www.w3schools.com/sql/sql_foreignkey.asp-->
          <p>The attempt table created has the foreign key, and the student tables have the primary keys.
             The key for both of them is the student ID, and thus has to be unique. </p>
          <p>The student ID needs to be created with the student table first, to prevent errors from occuring.</p></div>
          <!-- <img src="primarycode.png" alt="Ruby login page" class="primarycode"> -->
</fieldset>
<br>
<!--Second Enhancements Box-->
<fieldset class="Box2">
  <div class = "SecondE">
    <P>Login and session</P></div>
 <div class = "Enhance2">
    <p>This enhancement stores user information and allows it
      to be used across multiple pages, such as usernames.
    </p>
    <p>Essentially, it holds information about a singular user,
      and all pages can access said information.
    </p>
    <p>The session used for our quiz temporarily stores numbers of attempts to login 
        and if failed after a certain threshold, prompts the user to wait 10 seconds before retrying.
    </p>
    <p>The login information is stored within the database, rather than processes of hard coding.
    </p></div>
    <!-- <img src="rubylogin.png" alt="Ruby login page" class="loginpng"> -->
</fieldset>
 </main>


 <?php
  require 'footer.inc'; ?>
</body>

</html>
