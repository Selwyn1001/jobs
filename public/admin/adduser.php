<?php
include($_SERVER['DOCUMENT_ROOT'].'/admin/connect.php');
include($_SERVER['DOCUMENT_ROOT'].'/admin/useradminverify.php');
include($_SERVER['DOCUMENT_ROOT'].'/admin/isuserallowed.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title>Jo's Jobs - Add User</title>
	</head>
	<body>
	<?php
	require ("menulinks.php");

	?>
	<img src="/images/randombanner.php"/>
	<main class="sidebar">

	<section class="left">
		<ul>
			<li><a href="jobs.php">Jobs</a></li>
			<li><a href="categories.php">Categories</a></li>

		</ul>
	</section>

	<section class="right">

<?php
$uname_err="";

		if (isset($_POST['submit'])) {

            $hasError=false;
            $email=trim($_POST["username"]);
            if(empty($email)  || (!filter_var($email, FILTER_VALIDATE_EMAIL))){
                $uname_err = "Enter a valid email to use for an username.";
                $hasError=true;

            }



            if($hasError==false){

                $pwdinput=trim ($_POST['password']);
                $pwd =$pwdinput;
                echo $email;
                echo $pwd;
                echo $_POST['usertypeid'];
                echo date("Y-m-d H:i:s");
                $stmt = $pdo->prepare('INSERT INTO users (username, password, usertypeid, created_at)
							   VALUES (:username, :password, :usertypeid, :createddate)');

		$criteria = [
			'username' =>  $email,
			'password' =>  $pwd,
			'usertypeid' => $_POST['usertypeid']
			,'createddate' =>  date("Y-m-d H:i:s")
		];

		$stmt->execute($criteria);

		echo 'User has been successfully added';

        header("location: users.php");
    }
	}
        echo htmlspecialchars($_SERVER["PHP_SELF"]);
		?>


			<h2>Add user</h2>

			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
				<label>User name</label>
				<input type="text" name="username" />

                <?php echo $uname_err;?>

                <br/>
                <label>Password</label>
				<input type="description"  name="password"></textarea>
                
                <br/>
                <label>User Type</label>
				<select name="usertypeid">
				<?php
					$stmt = $pdo->prepare('SELECT * FROM usertype');
					$stmt->execute();

					foreach ($stmt as $row) {
						echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
					}

				?>

				</select>
                <br/>
				<input type="submit" name="submit" value="Add" />

			</form>



		<?php
		}
	

else {
	?>
	
<?php

	require ("login.php");
}


	?>

</section>
	</main>


	<?php
	require ("foot.php");
	?>
</body>
</html>