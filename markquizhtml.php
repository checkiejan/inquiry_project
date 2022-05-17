<!DOCTYPE html>
<html lang="en" dir="ltr">
<link href= "quizpagecss.css" rel="stylesheet" />

<head>
    <meta charset="utf-8">
    <meta name="description" content="Quiz results page">
    <meta name="keywords" content="Results, Ruby on Rails">
    <meta name="author" content="Group 5">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- This is the link to bootstrap file -->
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="">
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
  require 'header.inc';
  require_once 'markquiz.php';
  // display_header;
     ?>
  <!-- navbar  -->
  <br></br>
  <h1 class="markquizheader">Quiz Completed!</h1>
<!--Student Results-->
<fieldset class="Box1">
       <div class = "StudentResults1"> 
          <P>Student Results</P></div>
       <div class = "Name1"> 
          <p>Name: </p></div> <?php echo"$firstname"; ?>
       <div class = "TotalScore1">
          <p>Total Score: </p></div> <?php echo"$score"; ?>
       <div class = "MaximumScore1">
          <p>Maximum Score: </p></div>
       <div class = "AttemptNumber1">
          <P>Attempt Number: </P></div>
       <div class = "DateAttempted1">
         <P>Date attempted: </P></div>
<!-- Link to quiz here-->
<a href="QUIZPAGE" class="QuizLink">Quiz Page</a>
</fieldset>
<br></br>
<fieldset class="Box2">
  <div class = "StudentResults2"> 
    <P>Student Results</P></div>
 <div class = "Name2"> 
    <p>Name: </p></div>
 <div class = "TotalScore2">
    <p>Total Score: </p></div>
 <div class = "MaximumScore2">
    <p>Maximum Score: </p></div>
 <div class = "AttemptNumber2">
    <P>Attempt Number: </P></div>
 <div class = "DateAttempted2">
   <P>Date attempted: </P></div>

<!-- Link to Topic here-->
<a href="TOPICPAGE" class="TopicLink">Topic Page</a>
</fieldset>
</body>


    <?php
      require 'footer.inc';
      // display_header;
    ?>

</html>