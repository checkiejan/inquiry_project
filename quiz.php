<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>
<!doctype HTML>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Quiz based on Ruby on Rails" />
  <meta name="keywords" content="HTML, CSS, Form, tags" />
  <meta name="author" content="Group 5" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz for Ruby on Rails</title>
  <link rel="stylesheet" href="style/bootstrap.min.css">
  <link rel="stylesheet" href="style/style.css">
  <link rel="icon" href="images/favicon.ico">
  <!-- Link to Google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
  <?php
  require 'header.inc'; ?>

  <div id="quiz-body">
    <div class="heading-quiz">
      <h1 class="h1"> Ruby on Rails Quiz </h1>
      <p>Here's a short quiz to learn about Ruby on Rails!</p>
    </div>
      <!-- ronan change below-->
    <form id="Quiz" method="post" action="markquiz.php" novalidate>
        <!-- end -->
      <fieldset id="stud-details">
        <legend>Student details</legend>
        <div class="studentid">
          <label for="stu_id">Student ID:</label>
          <p> <input type="text" pattern="^\d{7}|^\d{10}$" name="stu_id" id="stu_id" value="<?php if(isset($_SESSION["studentid"])) echo $_SESSION["studentid"]; ?>" required="required"></p>
        </div>
        <div class="first-name">

          <label for="firstname">First name:</label>
          <p><input type="text" name="firstname" id="firstname" required="required" maxlength="30" pattern="^[a-zA-Z\s-]+$" value="<?php if(isset($_SESSION["f_name"])) echo $_SESSION["f_name"]; ?>"></p>

        </div>
        <div class="family-name">

          <label for="lastname">Family name:</label>
          <input type="text" name="lastname" id="lastname" required="required" maxlength="30" pattern="^[a-zA-Z\s-]+$" value="<?php if(isset($_SESSION["l_name"])) echo $_SESSION["l_name"]; ?>">
        </div>
      </fieldset>
      <fieldset>
        <legend>Question 1 </legend>
        <p><label for="question1">Finish the sentence: 'Ruby on Rails is a ......... designed by David Heinemeier Hansson.' </label></p>
        <p><textarea id="question1" name="question1"  rows="4" placeholder="Please answer the question" cols="40" required="required" maxlength="100"></textarea></p>
      </fieldset>
      <hr>
      <fieldset >
        <legend>Question 2</legend>
        <P>Ruby on Rails was created by Yukihiro "Matz" Matsumoto </p>
        <input type="radio" name="question2" id="question2-true" value="True" /> <label for="question2-true">True</label>
        <input type="radio" name="question2" id="question2-false" value="False" /> <label for="question2-false">False</label> 
      </fieldset>
      <hr>
      <fieldset>
        <legend>Question 3</legend>
        <p>Which one of these are NOT functions of the Ruby on Rails network?</p>
        <p><label for="html">Rendering HTML</label>
          <input type="checkbox" id="html" name="question3[]" value="Rendering HTML" />
          <label for="videos">Downloading videos</label>
          <input type="checkbox" id="videos" name="question3[]" value="Downloading Videos" />
          <label for="databases">Updating databases</label>
          <input type="checkbox" id="databases" name="question3[]" value="Updating Databases" />
          <label for="sing">Sing</label>
          <input type="checkbox" id="sing" name="question3[]" value="Sing" />
          <label for="calculations">Calculations</label>
          <input type="checkbox" id="calculations" name="question3[]" value="Calculations" />
        </p>

      </fieldset>
      <hr>
      <fieldset>
        <legend>Question 4 </legend>
        <p><label for="List">Which of the following companies use the Ruby on Rails network?</label>
          <select name="question4" id="List">
            <option value="Please Select">Please Select</option>
            <option value="Shopify">Shopify</option>
            <option value="Amazon">Amazon</option>
            <option value="Facebook">Facebook</option>
            <option value="Instagram">Instagram</option>
            <option value="YouTube">YouTube</option>
            <option value="Google">Google</option>
          </select>
        </p>
      </fieldset>
      <hr>
      <fieldset>
        <legend>Question 5 </legend>
        <p><label for="question5">How many characteristics are associated with the Ruby on Rails network?</label>
          <input type="number" id="question5" name="question5" min="0" max="10" value="5" />
        </p>
      </fieldset>
      <p class="btn">
        <input class="submit-t submit-t-white submit-t-animated" type="submit" value="Submit" />
        <input class="submit-t submit-t-white submit-t-animated" type="reset" value="Reset Form" />
      </p>

    </form>

    </div>
  <?php
  require 'footer.inc'; ?>
</body>

</html>
