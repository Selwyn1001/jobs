<?php
include($_SERVER['DOCUMENT_ROOT'].'/admin/connect.php');
session_start();
if (!isset($_SESSION["logged in"]) || $_SESSION["loggedin"] !== true){

        header("location: login.php"); exits;
}

?>