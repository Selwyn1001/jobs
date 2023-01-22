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
		require "menulinks.php";
		?>
	</nav>
	<img src="images/randombanner.php"/>
	<main class="sidebar">


	<section class="right">

		<h1>IT Jobs</h1>

	<ul class="listing">

	<?php

	$locationSearch="";
	if($_SERVER["REQUEST_METHOD"] == "POST"){

	$locationSearch = trim($_POST["location"]);
	}
	
	$cat_id=0;

	if(isset($_GET["id"]) && !empty(trim($_GET["id"])))
	{
		$cat_id = trim($_GET["id"]);
	}

	?>

		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<input type = "hidden" name = "id" value = "<?php echo $cat_id; ?>">
		<label>Location</label>
		<input type="text" name="location" class="form-control" value="<?php echo $locationSearch; ?>">
		<input type="submit" class="btn btn-primary" value="Submit">
		</form>

		<?php

	$pdo = new PDO('mysql:dbname=job;host=mysql', 'student', 'student');
	$q = 'SELECT * FROM job WHERE (dis is NULL or dis = 0) AND closingDate > :date';
	if ($cat_id>0){
		$q = $q.' AND categoryid = '.$cat_id;
	}

	if (!isset($locationSearch)	 || empty($locationSearch)	||	is_null($locationSearch)){
		//If the location search is null then do nothing
	}	

	else{
		$q= $q. "AND location like '" .$locationSearch."'";
	}

	$stmt = $pdo->prepare($q);

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