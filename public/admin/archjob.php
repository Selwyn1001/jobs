<?php
$pdo = new PDO('mysql:dbname=job;host=mysql', 'student', 'student');
session_start();


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    $jobid=$_POST['id'];

    $stmt = $pdo->prepare('UPDATE job SET notDis= 1 WHERE id ='.$jobid);

    $stmt->execute();

    header('location: jobs.php');



}


?>