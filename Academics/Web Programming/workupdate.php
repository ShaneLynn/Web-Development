<!DOCTYPE html>
<!--
    Christopher Lynn
    CISS 298 Web Programming
    5/27/2021
    Programming Assignment 4 - MySQL
-->

<html>
	<head>
		<meta charset = "utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style.css">
		<title>Work Experience Management-Update</title>
	</head>
	<body>
		<div>
		<section id = "workupdate">
		<h1>Update Work Experience</h1>
		<?php
			//Setup the connection
			$conn = mysqli_connect('localhost','root', '', 'workDB');
			if($conn)
			{
				//Connection is good, so add code to find out the work experience to update
				$listID = mysqli_real_escape_string($conn, $_GET['id']);
				//Retreive that record from the table
				$query = "SELECT * FROM worklist WHERE listID = '$listID'";
				$result = mysqli_query($conn, $query);
				if(mysqli_num_rows($result) == 1)
				{
					$row = mysqli_fetch_assoc($result);
					echo "<form action = '' method = 'post'>
					<textarea name = 'work'>".$row['listItem']."</textarea>
					<br>
					<input type = 'submit' name = 'update' value = 'Update'>
					</form>";
				}else
				{
					echo "<p>No content in the table.</p>";
				}
				
				//If the update button is clicked
				if(isset($_POST['update']))
				{
					//Get the form values
					$listItem = mysqli_real_escape_string($conn, $_POST['work']);
					//Update statement
					$query = "UPDATE worklist SET listItem = '$listItem' ";
					$query .= "WHERE listID = '$listID'";
					if((mysqli_query($conn, $query)) && mysqli_affected_rows($conn)>0)
					{
						header("Location: workmanage.php");
					}else
					{
						echo "<p>Update Failed</p>";
						echo "<p><h5><a href = 'workmanage.php'>Return to Work Experience Page Management</a></h5></p>";
					}
				}
				mysqli_close($conn);
			}	
		?>
		</section>
		</div>
	</body>
</html>