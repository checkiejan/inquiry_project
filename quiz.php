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

    <form id="Quiz" method="post" action="http://mercury.swin.edu.au/it000000/formtest.php">
      <fieldset id="stud-details">
        <legend>Student details</legend>
        <div class="studentid">
          <label for="studentid">Student ID:</label>
          <p> <input type="text" pattern="^\d{7}|^\d{10}$" name="studentid" id="studentid" value="" required="required" title="Please input number with the length of 7 or 10 numbers"></p>
        </div>
        <div class="first-name">

          <label for="firstname">First name:</label>
          <p><input type="text" name="firstnname" id="firstname" required="required" maxlength="30" pattern="^[a-zA-Z\s-]+$" value=""></p>

        </div>
        <div class="family-name">

          <label for="familyname">Family name:</label>
          <input type="text" name="familyname" id="familyname" required="required" maxlength="30" pattern="^[a-zA-Z\s-]+$" value="">
        </div>
      </fieldset>
      <hr>
      <fieldset>
        <legend>Question 1 </legend>
        <p><label for="Question1">In 100 characters or less, explain the difference between Ruby and Ruby on Rails.</label></p>
        <p><textarea id="Question1" name="Question 1" rows="4" placeholder="Please answer the question" cols="40" required="required" maxlength="100"></textarea></p>
      </fieldset>
      <hr>
      <fieldset>
        <legend>Question 2</legend>
        <P>Ruby on Rails was created by Yukihiro "Matz" Matsumoto </p>
        <label><input type="radio" name="Question 2" value="True" required="required" /> True </label>
        <label><input type="radio" name="Question 2" value="False" required="required" /> False </label>
      </fieldset>
      <hr>
      <fieldset>
        <legend>Question 3</legend>
        <p>Which one of these are NOT functions of the Ruby on Rails network?</p>
        <p><label for="HTML">Rendering HTML</label>
          <input type="checkbox" id="HTML" name="Question 3" value="Rendering HTML" />
          <label for="Videos">Downloading videos</label>
          <input type="checkbox" id="Videos" name="Question 3" value="Downloading Videos" />
          <label for="Databases">Updating databases</label>
          <input type="checkbox" id="Databases" name="Question 3" value="Updating Databases" />
          <label for="Distributing">Distributing information</label>
          <input type="checkbox" id="Distributing" name="Question 3" value="Distributing Information" />
          <label for="Calculations">Calculations</label>
          <input type="checkbox" id="Calculations" name="Question 3" value="Calculations" />
        </p>

      </fieldset>
      <hr>
      <fieldset>
        <legend>Question 4 </legend>
        <p><label for="List">Which of the following companies use the Ruby on Rails network?</label>
          <select name="Question 4" id="List">
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
        <p><label for="Question5">From 1-10, how likely are you to use Ruby on Rails in the future?</label>
          <input type="number" id="Question5" name="Question 5" min="0" max="10" value="5" />
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