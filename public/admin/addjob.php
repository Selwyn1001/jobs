<?php
include($_SERVER['DOCUMENT_ROOT'].'/admin/connect.php');
include($_SERVER['DOCUMENT_ROOT'].'/admin/isuserallowed.php');
?>
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title>Jo's Jobs - Add Job</title>
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

	if (isset($_POST['submit'])) {

		$loggedinuserid = $_SESSION["id"];

		$stmt = $pdo->prepare('INSERT INTO job (title, description, salary, location, closingDate, categoryId, userid)
							   VALUES (:title, :description, :salary, :location, :closingDate, :categoryId, :userid)');

		$criteria = [
			'title' => $_POST['title'],
			'description' => $_POST['description'],
			'salary' => $_POST['salary'],
			'location' => $_POST['location'],
			'categoryId' => $_POST['categoryId'],
			'closingDate' => $_POST['closingDate'],
			'userid' => $loggedinuserid
		];

		$stmt->execute($criteria);

		echo 'Job Added';
	}
	else {

		?>


			<h2>Add Job</h2>

			<form action="addjob.php" method="POST"">
				<label>Title</label>
				<input type="text" name="title" />

				<label>Description</label>
				<textarea name="description"></textarea>

				<label>Salary</label>
				<input type="text" name="salary" />

				<label>Location</label>
				<input type="text" name="location" />

				<label>Category</label>

				<select name="categoryId">
				<?php
					$stmt = $pdo->prepare('SELECT * FROM category');
					$stmt->execute();

					foreach ($stmt as $row) {
						echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
					}

				?>

				</select>

				<label>Closing Date</label>
				<input type="date" name="closingDate" />

				<input type="submit" name="submit" value="Add" />

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


