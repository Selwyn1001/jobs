<?php
include($_SERVER['DOCUMENT_ROOT'].'/admin/connect.php');
include($_SERVER['DOCUMENT_ROOT'].'/admin/useradminverify.php');
include($_SERVER['DOCUMENT_ROOT'].'/admin/isuserallowed.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title>Jo's Jobs - Add Category</title>
	</head>
	<body>
	<?php
		require ("menulinks.php");
	?>

	<img src="/images/randombanner.php"/>
	<main class="sidebar">

	<section class="left">
		<ul>
			<li><a href="jobs.php">Jobs</a></li>
			<li><a href="categories.php">Categories</a></li>

		</ul>
	</section>

	<section class="right">

	<?php

		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {


	if (isset($_POST['submit'])) {

		$stmt = $pdo->prepare('INSERT INTO category (name) VALUES (:name)');

		$criteria = [
			'name' => $_POST['name']
		];

		$stmt->execute($criteria);
		echo 'Category added';
	}
	else {
		?>


			<h2>Add Category</h2>

			<form action="" method="POST">
				<label>Name</label>
				<input type="text" name="name" />


				<input type="submit" name="submit" value="Add Category" />

			</form>


		<?php
		}



	}
	else {
			?>
			
		<?php
			require ("login.php");
		}
	?>


</section>
	</main>
		<?php
		require ("foot.php");

		?>
	
</body>
</html>
