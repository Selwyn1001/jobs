<?php
include($_SERVER['DOCUMENT_ROOT'].'/admin/connect.php');
include($_SERVER['DOCUMENT_ROOT'].'/admin/isuserallowed.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title>Jo's Jobs - Applicants</title>
	</head>
	<body>
	<?php
	require ("menulinks.php");
	?>
	<img src="/images/randombanner.php"/>
	<main class="sidebar">


	<section class="right">

	<?php

		

			$stmt = $pdo->prepare('SELECT * FROM job WHERE id = :id');

			$stmt->execute(['id' => $_GET['id']]);

			$job = $stmt->fetch();
		?>


			<h2>Applicants for <?=$job['title'];?></h2>

			<?php
			echo '<table>';
			echo '<thead>';
			echo '<tr>';
			echo '<th style="width: 10%">Name</th>';
			echo '<th style="width: 10%">Email</th>';
			echo '<th style="width: 65%">Details</th>';
			echo '<th style="width: 15%">CV</th>';
			echo '</tr>';

			$stmt = $pdo->prepare('SELECT * FROM applicants WHERE jobId = :id');

			$stmt->execute(['id' => $_GET['id']]);

			foreach ($stmt as $applicant) {
				echo '<tr>';
				echo '<td>' . $applicant['name'] . '</td>';
				echo '<td>' . $applicant['email'] . '</td>';
				echo '<td>' . $applicant['details'] . '</td>';
				echo '<td><a href="/cvs/' . $applicant['cv'] . '">Download CV</a></td>';
				echo '</tr>';
			}

			echo '</thead>';
			echo '</table>';

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


