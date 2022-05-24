<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Quiz results page">
    <meta name="keywords" content="Results, Ruby on Rails">
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
         <div id="bodybg">
             <!-- navbar -->
          <?php
          require 'header.inc';
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
                  <p>Name: <?php echo"$firstname $lastname"; ?></p></div> 
               <div class = "TotalScore1">
                  <p>Total Score: <?php echo"$score"; ?>%</p></div> 
               <div class = "MaximumScore1">
                  <p>Maximum Score: 100%</p></div>
               <div class = "AttemptNumber1">
                  <P>Attempt Number: <?php echo"$attemptid"; ?></P></div>
               <div class = "DateAttempted1">
                 <P>Date attempted: <?php echo"$date"; ?></P></div>
        <!-- Link to quiz here-->
        <a href="QUIZPAGE" class="QuizLink">Return to quiz page</a>
        </fieldset>
        <br></br>
        
        </body>
            <?php
              require 'footer.inc';
              // display_header;
            ?>
        </div>
        </html>


