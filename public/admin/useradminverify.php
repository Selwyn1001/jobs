<?php

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header("location: login.php"); exits;
}
else if(isset($_SESSION["usertypeid"]) && $_SESSION["usertypeid"] !== 1){
        header("location: index.php"); exit;

}


?>