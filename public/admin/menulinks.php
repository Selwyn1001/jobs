<?php
$pdo = new PDO('mysql:dbname=job;host=mysql', 'student', 'student');
?>
<ul>
			
			<li><a href="/jobs/public/admin/index.php">Home</a></li>
			<li><a href="/jobs/public/admin/jobs.php">Jobs</a></li>
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