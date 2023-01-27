<?php
include($_SERVER['DOCUMENT_ROOT'].'/admin/connect.php');
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: index.php"); exit;
}
$username = $password = "";
$username_err = $password_err = $login_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter your username here";

    } else{
            $username_err = trim($_POST["username"]);
    }


    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password here"

} else{
        $password = trim($_POST["password"]);

    }
}

    if(empty($username_err) && empty($password_err)){

        $sql = "SELECT id, username, password, usertypeid, FROM users WHERE username = '".trim($_POST[username])."'";
        
        if($stmt = pdo->prepare($sql)){

            if($stmt->execute()){

                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){

                    $id = $row["id"];
                    $username = $row["username"];
                    $pwd = $row["password"];
                    $usertypeid = $row["usertypeid"];
                    if($password == $pwd){

                        session_start();

                        $_SESSION["logged in"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username;
                        $_SESSION["usertypeid"] = $usertypeid;

                        header("location: index.php");
                    } else{

                            $login_err = "Invalid username or password.";
                    }

                    }

                }


            } else{

                $login_err = "Invalid username or password.";

            }

        } else{

            echo "Unfortunely there was a unforeseen error please check up your details again.";

        }

        unset($pdo);

    }

?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title>Jo's Jobs - Login</title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<link rel="stylesheet" type="text/css"
		href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

		<script type="text/javascript" charset="utf8"
		
		src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
		</head>
		<body>
	<script type="text/javascript">
	$(document).ready( function () {
    $('#jobtable').DataTable();
} );
</script>

	
	
		<?php
			require 'menulinks.php'
		?>
	

	<img src="/images/randombanner.php"/>

    <?php
    if(!empty($login_err)){
        echo '<div class="txt-danger">' . $login_err . '</div>';

    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="txt-danger"><?php echo $password_err; ?></span>
</div>
<div class="form-group">
    <label>Password</label>
    <input type="password" name="password" class="form-control">
    <span class="txt-danger"><?php echo $password_err; ?></span>
</div>
<div class="form-group">
    <input type="submit" class="btn btn-primary" value="Login">
</div>
<p>Please inform the admin if you need to create a new account.</p>
</form>
</html>