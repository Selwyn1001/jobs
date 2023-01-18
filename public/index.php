<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title>Jo's Jobs - Home</title>
	</head>
	<body>
	<header>
		<section>
			<aside>
				<h3>Office Hours:</h3>
				<p>Mon-Fri: 09:00-17:30</p>
				<p>Sat: 09:00-17:00</p>
				<p>Sun: Closed</p>
			</aside>
			<h1>Jo's Jobs</h1>

		</section>
	</header>
	<nav>
		<ul>
			<li><a href="/">Home</a></li>
			<li>Jobs
				<ul>
				<?php
			require "categorylinks.php";
			?>

				</ul>
			</li>
			<li><a href="/about.php">About Us</a></li>
		</ul>

	</nav>
<img src="images/randombanner.php"/>
	<main class="home">
		<p>Welcome to Jo's Jobs, we're a recruitment agency based in Northampton. We offer a range of different office jobs. Get in touch if you'd like to list a job with us.</a></p>

		<h2>Select the type of job you are looking for:</h2>
		<ul>
		<?php
			require "categorylinks.php";
			?>

				</ul>
			</li>

	</main>


	<?php

require 'foot.php';


?>
</body>
</html>
