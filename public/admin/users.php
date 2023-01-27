<?php
include($_SERVER['DOCUMENT_ROOT'].'/admin/connect.php');
include($_SERVER['DOCUMENT_ROOT'].'/admin/useradminverify.php');
include($_SERVER['DOCUMENT_ROOT'].'/admin/isuserallowed.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title>Jo's Jobs - User page</title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<link rel="stylesheet" type="text/css"
		href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

		<script type="text/javascript" charset="utf8"
		
		src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
        <style>
            .pwd{
                display:none;
            }
         </style>
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
	<main class="sidebar">

    <section class="left">
        <ul>
            <li><a href="jobs.php">Jobs</a></li>
            <li><a href="categories.php">Categories</a></li>
        </ul>

</section>

<section class="right">



    

			<h2>Jobs</h2>

			<a class="new" href="adduser.php">Add User</a>

			<?php
			echo '<table id="usertable">';
			echo '<thead>';
			echo '<tr>';
			echo '<th>No</th>';
			echo '<th>Username</th>';
			echo '<th style="width: 15%">Date created</th>';
			echo '<th style="width: 15%">User type</th>';
			echo '<th style="width: 5%">password</th>';
			echo '<th style="width: 15%">&nbsp;</th>';
			echo '<th style="width: 15%">&nbsp;</th>';
			echo '</tr>';
			echo '</thead>';
			echo '<tbody>';
			$stmt = $pdo->query('select users.*, usertype.name usertypename from users inner join usertype on users.usertypeid = usertype.id order by username');


			
			foreach ($stmt as $user) {
				echo '<tr>';
				echo '<td>' . $user['id'] . '</td>';
				echo '<td>' . $user['username'] . '</td>';
				echo '<td>' . $user['created_at'] . '</td>';
				echo '<td>' . $user['usertypename'] . '</td>';
				echo '<td><a style="float: right" title="'.$user['password'].'" href="#viewUserid' . $user['id'] . '">View</a> <span class="pwd"> '.$user['password'].' </span></td>'; 
				echo '<td><a style="float: right" href="edituser.php?id=' . $user['id'] . '">Edit</a></td>';

				echo '<td><form method="post" action="deleteuser.php">
				<input type="hidden" name="id" value="' . $user['id'] . '" />
				<input type="submit" name="submit" value="Delete" />
				</form></td>';

                echo '</tr>';

            }

            echo '</tbody>';
            echo '</table>';

        

        else {

            ?>
            <?php
            require ("login.php")
        }
            ?>

            <?php
            require ("foot.php")
            ?>

    </body>
    </html>



        