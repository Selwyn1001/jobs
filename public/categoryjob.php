<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title>Jo's Jobs - Jobs</title>
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
		<?php 
		require"menulinks.php";
		?>
	</nav>
	<img src="images/randombanner.php"/>
	<main class="sidebar">

	<section class="left">
		<ul>
		<?php 
		require"categorylinks.php";
		?>
		</ul>
	</section>

	<section class="right">

		<h1>IT Jobs</h1>

	<ul class="listing">


	<?php
	$cat_id=0;

	if(isset($_GET["id"]) && !empty(trim($_GET["id"])))
	{
		$cat_id = trim($_GET["id"]);
	}

	$pdo = new PDO('mysql:dbname=job;host=mysql', 'student', 'student');
	if ($cat_id>0){
		$stmt = $pdo->prepare('SELECT * FROM job WHERE categoryId = '.$cat_id.' AND closingDate > :date');
	}
	else{
		$stmt = $pdo->prepare('SELECT * FROM job WHERE closingDate > :date');
	}

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

		echo '<a class="more" href="/jobs/public/apply.php?id=' . $job['id'] . '">Apply for this job</a>';

		echo '</div>';
		echo '</li>';
	}

	?>

</ul>

</section>
	</main>


	<?php
require "foot.php";
?>
</body>
</html>