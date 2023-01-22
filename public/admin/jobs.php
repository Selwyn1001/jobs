<?php
$pdo = new PDO('mysql:dbname=job;host=mysql', 'student', 'student');
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title>Jo's Jobs - Job list</title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<link rel="stylesheet" type="text/css"
		href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

		<script type="text/javascript" charset="utf8"
		
		src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
		</head>
		<body>
	<script type="text/javascript">
	$(document).ready( function () {
    $('#jobtable').DataTable();
} );
</script>

	
	
		<?php
			require 'menulinks.php'
		?>
	

	<img src="/images/randombanner.php"/>
	<main class="sidebar">

	

	<section class="right">

	<?php

		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		?>


			<h2>Jobs</h2>

			<a class="new" href="addjob.php">Add new job</a>

			<?php
			echo '<table id="jobtable">';
			echo '<thead>';
			echo '<tr>';
			echo '<th>No</th>';
			echo '<th>Title</th>';
			echo '<th style="width: 15%">Salary</th>';
			echo '<th style="width: 15%">Category name</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 15%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '</tr>';
			echo '</thead>';
			echo '<tbody>';
			$stmt = $pdo->query('select job.*, Category.name from job inner join category on job.categoryId = category.id');

			
			foreach ($stmt as $job) {
				$applicants = $pdo->prepare('SELECT count(*) as count FROM applicants WHERE jobId = :jobId');

				$applicants->execute(['jobId' => $job['id']]);

				$applicantCount = $applicants->fetch();
				
				$disabled=$job['dis'];


				echo '<tr>';
				echo '<td>' . $job['id'] . '</td>';
				echo '<td>' . $job['title'] . '</td>';
				echo '<td>' . $job['salary'] . '</td>';
				echo '<td>' . $job['name'] . '</td>';
				echo '<td><a style="float: right" href="editjob.php?id=' . $job['id'] . '">Edit</a></td>';
				echo '<td><a style="float: right" href="applicants.php?id=' . $job['id'] . '">View applicants (' . $applicantCount['count'] . ')</a></td>';
				echo '<td><form method="post" action="deletejob.php">
				<input type="hidden" name="id" value="' . $job['id'] . '" />
				<input type="submit" name="submit" value="Delete" />
				</form></td>';
			

			if ($disabled==1){
					echo '<td><form method="post" action="unarchjob.php">
				<input type="hidden" name="id" value="' . $job['id'] . '" />
				<input type="submit" name="submit" value="Unarchive" />
				</form></td>';
				}

			else {

				echo '<td><form method="post" action="archjob.php">
				<input type="hidden" name="id" value="' . $job['id'] . '" />
				<input type="submit" name="submit" value="Archive" />
				</form></td>';
			}	

			
			echo '</tr>';

		}

			echo '</tbody>';
            echo '</table>';

	}

	
		else {
			?>
			<h2>Log in</h2>

			<form action="index.php" method="post">
				<label>Password</label>
				<input type="password" name="password" />

				<input type="submit" name="submit" value="Log In" />
			</form>
		<?php
		}
	?>

</section>
	</main>
	
	<?php
	require "foot.php";
	?>

</body>
</html>


