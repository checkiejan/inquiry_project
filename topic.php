<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="description" content="Ruby On Rails topic information" />
  <meta name="keywords" content="university assignment" />
  <meta name="author" content="Group 5" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ruby On Rails</title>
  <link rel="stylesheet" href="style/bootstrap.min.css">
  <link rel="stylesheet" href="style/style.css">
  <link rel="icon" href="images/favicon.ico">
   <!-- Link to Google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
	<div id="body">

		<!-- Navigation bar -->
    <?php
    require 'header.inc';
     ?>

		<!-- Landing screen -->
		<article id="topicarticle">
			<h1>Our Topic</h1>
			<h1>Ruby On Rails</h1>
		</article>


		<!-- Aside section -->
		<aside id="asidesection">
			<h1 class="headings">Table of Contents</h1>
			<a href="#sect01">Origins of Ruby on Rails</a>
			<a href="#sect02">Creator</a>
			<a href="#sect03">Functions. Features.</a>
			<a href="#sect04">Open source framework.</a>
			<a href="#sect05">Usage.</a>
			<a href="#sect06">Related technology.</a>
		</aside>

		<!-- Main article content -->
		<div class="body">

			<!-- Section 1 = Origins of Ruby on Rails -->
      <!-- https://rubyonrails.org/,https://www.codecademy.com/resources/blog/what-is-ruby-on-rails/  -->
			<section id="sect01">
				<h1 class="headings">Origins of Ruby on Rails</h1>
				<dl id="definition">
					<dt class="paragraph">Ruby on Rails</dt>
					<dd class="paragraph">Ruby on Rails is an open-source web application framework written in Ruby programming language and is one of the most popular Ruby libraries.</dd>
				</dl>
			</section>


			<!-- Section 2 = Creator -->
      <!-- https://devcamp.com/site_blogs/who-created-ruby-on-rails,  -->
			<section id="sect02">
				<h1 class="headings">Creator</h1>
				<p class="paragraph">Ruby on Rails is a framework designed by David Heinemeier Hansson. He found that the basecamp base code was too complex, and therefore created a new framework utilising Ruby language.</p>


			<!-- David's face -->
				<figure id="davidandface">
				<img id="face" src="images/davidface.jpg" alt="david face">
				<figcaption id="david">David Heinemeier Hansson</figcaption>
				</figure>
			</section>


			<!-- Section 3 = Functions and Features -->
			<article id="sect03">
				<h1 class="headings">Functions. Features.</h1>
				<p class="paragraph">Ruby on Rails contains the necessary tools to build web on both the front and the back end. This programming language supports various functions including:</p>
				<ol>
					<li class="li">Rendering HTML</li>
					<li class="li">Updating databases</li>
					<li class="li">Managing emails</li>
					<li class="li">Uploading data into clouds</li>
					<li class="li">Protecting from attacks</li>
				</ol>
			</article>


			<!-- Section 4 = Open source framework -->
      <!-- https://rubyonrails.org/, https://dhh.dk/, https://rubyonrails.org/community -->

			<article id="sect04">
				<h1 class="headings">Open source framework.</h1>
				<p class="paragraph">Ruby on Rails is an open source project which can be downloadable from its public GitHub page without any payment required. It is released under an MIT Licence, which is managed by only one group, which constantly makes updates and tweaks to the overall framework of the programming language.  </p>
			</article>

			<!-- Section 5 = Usage -->
      <!-- https://trends.builtwith.com/framework/Ruby-on-Rails, https://www.monterail.com/blog/why-ruby-on-rails-development-2021, https://syndicode.com/blog/why-is-ruby-still-our-choice-in-2020-2/ -->

			<article id="sect05">
				<h1 class="headings">Usage.</h1>
				<p class="paragraph">Their usage has been on a sharp increase throughout the last decade due to its flexibility, cost efficiency, security and most importantly, its fast time to market. However, over the years, Rails might have dropped in usage by a small amount because of scalability and performance issues.</p>
				<p class="paragraph">However, that is deceiving to the eyes. Ruby on Rails is still being used by big players, for example; AirBnb, GitHub, Shopify, Fiverr, Etsy and many more that we’ve lost count.</p>
			</article>

			<!-- Section 6 = Related Technology -->
			<article id="sect06">
		<!-- https://en.wikipedia.org/wiki/Django_(web_framework), https://en.wikipedia.org/wiki/Catalyst_(software) , https://symfony.com, https://codeigniter.com, https://en.wikipedia.org/wiki/Ruby_on_Rails -->
				<h1 class="headings">Related Technologies </h1>
				<p class="paragraph"> Ruby on Rails is one of the very first of it's kind, adopting a "'DRY' (Don't repeat yourself)" principle and following MVC Architecture framework. Ruby on Rails has influenced and shared many similarities to technologies such as; CodeIgniter, Symfony, Catalyst and Django.</p>
        <div class="">


        <table>
					<tr>
					  <th>Aspects</th>
					  <th>Ruby</th>
					  <th>CodeIgniter</th>
					  <th>Symfony</th>
					  <th>Catalyst</th>
					  <th>Django</th>
					</tr>
					<tr>
						<td>Aim/Purpose</td>
						<td>To make web development easier and adopted 'don't repeat yourself'(DRY) principle</td>
						<td>To provide starting block and minimise amount of code to build website.</td>
						<td>Speed up maintenance and replace repetitive coding.</td>
						<td>Adopted R.O.R 'DRY' principle</td>
						<td>To have less code, low couping and encourage reusability.</td>
					</tr>
					<tr>
						<td>Framework</td>
						<td>Model-view-controller (MVC)</td>
						<td>PHP</td>
						<td>PHP</td>
						<td>Model-view-controller (MVC)</td>
						<td>Model-view-controller (MVC)</td>
					</tr>
					<tr>
						<td>Components</td>
						<td>Rendering HTML templates, updating databases, security and sending and receiving emails.</td>
						<td>Controller, Model, Entity, Bootstrap, API, Cache, Config, Debug, Email, HTTP and Images.</td>
						<td>Console, Http, Foundation, Event, Debug, Routing, Process, Css and Security.</td>
						<td>Interfaces to web servers, Recieve page requests, Standardised interface for data models and Authentication.</td>
						<td>Settings, Files, anFrad data models, Create, Read, Update and Delete interface.</td>
					</tr>
				</table>
    </div>
			</article>

		</div>

	<!-- Main footer-->
  <?php require 'footer.inc' ?>
	</div>
</body>

</html>
