<?php
include($_SERVER['DOCUMENT_ROOT'].'/admin/connect.php');
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

        $stmt = $pdo->prepare('DELETE FROM users WHERE id =:id');
        $stmt->execute(['id' => $_POST['id']]);



        header('location: users.php');

}
?>

