<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="description" content="introductory page">
  <meta name="keywords" content="introductory, Ruby on Rails">
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

<body>
    <?php
  require 'header.inc';
  // display_header;
     ?>
  <!-- content of the page -->
  <section class="t">
    <div class="text-ruby">
      <h1>Ruby on Rails</h1>
      <p>A popular web application framework, used by sites such as Twitch, AirBnb and GitHub. Since its inception in 2003 by David Hansson, it has gone on to be the baseline of many webpages for its intuitiveness and convenience.</p>
    </div>
    <button onclick="document.location='topic.php'" type="button">
      <!-- button link to topic.html -->
      Learn more
    </button>
    <!-- button links to the group video -->
    <button onclick="document.location='https://youtu.be/MdYvke6b2XQ'" type="button">Our video</button>
  </section>

  <?php
  require 'footer.inc'
   ?>
</body>

</html>
