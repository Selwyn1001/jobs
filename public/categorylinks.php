<?php
$pdo = new PDO('mysql:dbname=job;host=mysql', 'student', 'student');
session_start();

					$sql = "SELECT * from category";
					if($result = $pdo->query($sql)){ 
						if($result->rowCount() > 0){

							while($row = $result->fetch()){
								echo '<li><a href="categoryjob.php?id=' . $row['id'] . '">'.$row['name'] .'</a></li>';
							}
					}
				}
					?>