<?php
$pdo = new PDO('mysql:dbname=job;host=mysql', 'student', 'student');
?>
<ul>
			<li><a href="/">Home</a></li>
			<li><a href="/jobs/public/admin/index.php">Home</a></li>
			<li>Jobs
				<ul>
					<li><a href="/jobs/public/it.php">IT</a></li>
					<li><a href="/jobs/public/hr.php">Human Resources</a></li>
					<li><a href="/jobs/public/sales.php">Sales</a></li>

				<?php
					$sql = "SELECT * from category";
					if($result = $pdo->query($sql)){ 
						if($result->rowCount() > 0){

							while($row = $result->fetch()){
								echo '<li><a href="/jobs/public/catjob.php?id=' . $row['id'] . '">'.$row['name'] .'</a></li>';
							}
					}
				}
					?>