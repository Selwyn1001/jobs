<?php
$pdo = new PDO('mysql:dbname=job;host=mysql', 'student', 'student');
?>

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
			
			<li><a href="/jobs/public/admin/index.php">Home</a></li>
			<li>Jobs
				<ul>
					
				<?php
					$sql = "SELECT * from category";
					if($result = $pdo->query($sql)){ 
						if($result->rowCount() > 0){

							while($row = $result->fetch()){
								echo '<li><a href="/jobs/public/categoryjob.php?id=' . $row['id'] . '">'.$row['name'] .'</a></li>';
							}
					}
				}
					?>

			</ul>
			</li>

				<li><a href="/jobs/public/about.php">About Us</a></li>
				<li><a href="/jobs/public/FAQS.php">FAQS</a></li>

			</ul>

			<ul>

	<li>Admin

<ul>
	<li><a href="/jobs/public/admin/jobs.php">Jobs</a></li>
	<li><a href="/jobs/public/admin/categories.php">Categories</a></li>
			
</ul>
			</nav>