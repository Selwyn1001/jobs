<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title>Jo's Jobs - IT Jobs</title>
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
		<?php
			require "menulinks.php";
			?>

				</ul>
			</li>
			<li><a href="/about.html">About Us</a></li>
		</ul>

	</nav>
	<img src="images/randombanner.php"/>
	<main class="sidebar">

	<section class="left">
		<ul>
		<?php
			require "categorylinks.php";
			?>
		</ul>
	</section>

	<section class="right">

		<h1>IT Jobs</h1>

	<ul class="listing">


	<?php
	$pdo = new PDO('mysql:dbname=job;host=mysql', 'student', 'student');
	$stmt = $pdo->prepare('SELECT * FROM job WHERE categoryId = 1 AND closingDate > :date');

	$date = new DateTime();

	$values = [
		'date' => $date->format('Y-m-d')
	];

	$stmt->execute($values);


	foreach ($stmt as $job) {
		echo '<li>';

		echo '<div class="details">';
		echo '<h2>' . $job['title'] . '</h2>';
		echo '<h3>' . $job['salary'] . '</h3>';
		echo '<p>' . nl2br($job['description']) . '</p>';

		echo '<a class="more" href="/apply.php?id=' . $job['id'] . '">Apply for this job</a>';

		echo '</div>';
		echo '</li>';
	}

	?>

</ul>

</section>
	</main>


	<?php

require 'foot.php';


?>
</body>
</html>

