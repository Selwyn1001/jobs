<?php
include($_SERVER['DOCUMENT_ROOT'].'/admin/connect.php');
include($_SERVER['DOCUMENT_ROOT'].'/admin/useradminverify.php');
include($_SERVER['DOCUMENT_ROOT'].'/admin/isuserallowed.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title>Jo's Jobs - Categories</title>
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

		
		?>


			<h2>Categories</h2>

			<a class="new" href="addcategory.php">Add new category</a>

			<?php
			echo '<table>';
			echo '<thead>';
			echo '<tr>';
			echo '<th>Name</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '</tr>';

			$categories = $pdo->query('SELECT * FROM category');

			foreach ($categories as $category) {
				echo '<tr>';
				echo '<td>' . $category['name'] . '</td>';
				echo '<td><a style="float: right" href="editcategory.php?id=' . $category['id'] . '">Edit</a></td>';
				echo '<td><form method="post" action="deletecategory.php">
				<input type="hidden" name="id" value="' . $category['id'] . '" />
				<input type="submit" name="submit" value="Delete" />
				</form></td>';
				echo '</tr>';
			}

			echo '</thead>';
			echo '</table>';

		

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

