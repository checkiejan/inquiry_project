<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="description" content=" Enhancement of the page">
  <meta name="keywords" content="responsive, animation, transition">
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
require 'header.inc'; ?>
  <div class="eh-body">


    <section class="eh-head">
      <h1>Enhancement</h1>
    </section>

    <section>
      <h2>Animation</h2>
      <p>When a web page is given animation, such as text fading in or sliding into position, it gives a feeling of dynamism that catches the eye of the user, making the site seem more interesting and lively.</p>
      <p>This needs to be done in CSS with the animation property. In order to make any element move, an animation property needs to be added in the CSS with a range of parameters including a function to show that elements should move or appear in a
        specific way, duration time, the speed during the process, and delay time for that to happen. Moreover, there is an animation-fill-mode property to make sure that the element can be filled in the right place.
      </p>
      <ol>
        <li>Enhancement: Text animation fly in from the right of the quiz page. <a href="quiz.php">Click here</a></li>
        <li>Enhancement: Text animation fly in from the bottom of the introduction page. <a href="index.php">Click here</a></li>
        <li>Enhancement: Fade in animation in the topic page <a href="topic.php">Click here</a></li>
      </ol>
    </section>

    <section>
      <h2>Transition</h2>
      <p>Transition, a CSS property, is used to give a feeling of responsiveness, with certain elements of the webpage reacting to where the user hovers their cursor. Using the "hover" condition, it's possible to have a box move out slightly from a
        position with the transition property. Similar to animation, the time for the transition can be adjusted, and each component of the transition can be different from each other. Transform property is to make the element transform in which
        direction.
      </p>
      <ol>
        <li>Enhancement: Icon rotate when we hover our mouse over the button. (Test it out on the navigation header of every page)</li>
        <li>Enhancement: The "Learn More" button when we hover our mouse over it, it does a pop up transition. <a href="index.php">Click here</a></li>
        <li>Enhancement: The question content box when we hover our mouse over it, it does a pop up transition. <a href="quiz.php">Click here</a></li>
        <li>Enhancement: The table of content elements when we hover our mouse over it, it does a pop up transition. <a href="topic.php">Click here</a></li>
      </ol>
    </section>

    <section>
      <h2>Responsive</h2>
      <p>All of our webpage are responsive, it can adapt to different range of devices including large tablet, small tablet and smartphone.</p>
      <p>Designs are responsive in that they adapt to different devices with different screen sizes and viewports automatically. To conform to desktops, tablets and phones in a presentable way, responsive web pages require certain design elements in
        HTML and CSS to do so. </p>
      <dl class="">
        <dt>HTML:</dt>
        <dd>- Using the &#60;meta&#62; tag "viewport" and setting initial-scale to 1.0, this allows the webpage to determine its width.</dd>
      </dl>
      <dl class="">
        <dt>CSS:</dt>
        <dd>- With the @media property and setting specific max-width (size of viewport) for different device screens with their viewports, this allows for having specific css effects for tablets and smartphones, ranging from changing the font size
          and swithing rows to columns.</dd>
        <dd>- Grid and flow properties can be used to make a responsive design (For example, dividing blocks to multiple columns as well as resizing to each different viewport)</dd>
      </dl>

      <dl class="">
        <dt>CSS</dt>
        <dd>All of our webpage are responsive, it can adapt to different range of devices including large tablet, small tablet and smartphone.</dd>
      </dl>
      <p>Check it out by resizing the window.</p>
    </section>

  </div>
  <?php
  require 'footer.inc' ?>
</body>

</html>
