<?php
include($_SERVER['DOCUMENT_ROOT'].'/admin/connect.php');
session_start();


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    $jobid=$_POST['id'];

    $stmt = $pdo->prepare('UPDATE job SET dis= 0 WHERE id ='.$jobid);

    $stmt->execute();

    header('location: jobs.php');



}


?>