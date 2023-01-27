<?php
include($_SERVER['DOCUMENT_ROOT'].'/admin/connect.php');
include($_SERVER['DOCUMENT_ROOT'].'/admin/useradminverify.php');
include($_SERVER['DOCUMENT_ROOT'].'/admin/isuserallowed.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title>Jo's Jobs - Edit Job</title>
	</head>
	<body>
	<header>
		<?php

	require ("section.php");
      ?>
	</header>
	<nav>
		
            <?php
			require ("menulinks.php");
			?>

				
	</nav>
<img src="images/randombanner.php"/>
	<main class="sidebar">
		

    <section class="left">

        <ul>
            <li><a href="jobs.php">Jobs</a></li>
            <li><a href="categories.php">Categories</a></li>


    </ul>

</section>

<section class="right">

        <?php

        if (isset($_POST['submit'])) {

            $stmt = $pdo->prepare('UPDATE users SET usertypeid = :usertypeid WHERE id = :id');

            $criteria = [
                    'usertypeid' => $_POST['usertypeid'],
                    'id' => $_POST['id']
            ];

            $stmt->execute($criteria);

            echo 'User was saved successfully';

        }
        else {
               

                    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = :id');

                    $stmt->execute($_GET);

                    $user = $stmt->fetch();

                ?>


                    <h2>Edit this user for <?php echo $user['username']; ?></h2>

                    <form action="edituser.php" method="POST">

                    <input type="hidden" name="id" value="<?php echo $user['id']; ?>" />
                    <label>Usertype:</label>

                    <select name="usertypeid">
                        <?php

                        $stmt = $pdo->prepare('SELECT * FROM usertype');
                        $stmt->execute();

                        foreach ($stmt as $row) {
                                if ($user['usertypeid'] == $row['id']) {
                                echo '<option selected="selected" value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                }
                                else {

                                    echo '<option value="' . $row['id'] . '">' . $row['name']. '</option>';

                                }


                                }

                        

                        ?>

                    </select>
                    <input type="submit" name="submit" value="Save" />

                    </form>

                    <?php
                }

                else{

                    ?>

                   
                <?php
                require ("login.php");

                }

            
            ?>


        </section>

        </main>    

        <?php
    require ("foot.php")

        ?>
        </body>
        </html>