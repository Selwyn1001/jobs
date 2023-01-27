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
			
			<li><a href="/admin/index.php">Home</a></li>
			<li>Jobs
				<ul>
					
				<?php
					$sql = "SELECT * from category";
					if($result = $pdo->query($sql)){ 
						if($result->rowCount() > 0){

							while($row = $result->fetch()){
								echo '<li><a href="categoryjob.php?id=' . $row['id'] . '">'.$row['name'] .'</a></li>';
							}
					}
				}
					?>

			</ul>
			</li>

				<li><a href="about.php">About Us</a></li>
				<li><a href="FAQS.php">FAQS</a></li>

			</ul>


			<section class="left">

			<ul>


	<li><a href="jobs.php" class="menulink">Jobs</a></li>
	<li><a href="categories.php" class="menulink">Categories</a></li>
	<li><a href="users.php" class="menulink">Users</a></li>
			
</ul>

			</section>
			<?php
			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
				echo '<p><a href="logout.php" class="btn btn-danger">Log out</a></p>';

			}

			?>
			</nav>