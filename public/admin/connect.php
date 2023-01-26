<?php
try{

    $pdo = new PDO('mysql:dbname=job;host=mysql', 'student', 'student');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e){
    die("ERROR: Sorry, there was an error with the database server. " . $e->getMessage());

}

?>