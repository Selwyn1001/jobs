<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title>Jo's Jobs - Home</title>
	</head>
	<body>
	<header>
		<?php
	require ("section.php")
		?>
	</header>
	<nav>
		<?php
		require ("menulinks.php")
		?>

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
