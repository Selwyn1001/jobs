<?php
include($_SERVER['DOCUMENT_ROOT'].'/admin/connect.php');

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

	$stmt = $pdo->prepare('DELETE FROM category WHERE id = :id');
	$stmt->execute(['id' => $_POST['id']]);


	header('location: categories.php');
}

?>
