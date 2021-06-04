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
		<title>Work Experience Management-Delete</title>
	</head>
	<body>
		<div>
		<section id = "workdelete">
		<h1>Delete Work Experience</h1>
		<?php
			//Setup the connection
			$conn = mysqli_connect('localhost','root', '', 'workDB');
			if($conn)
			{
				//Connection is good, so add code to delete the work experience from the table
				$listID = mysqli_real_escape_string($conn, $_GET['id']);
				//Delete statement
				$query = "DELETE FROM worklist WHERE listID = '$listID'";
				if((mysqli_query($conn, $query)) && mysqli_affected_rows($conn)>0)
				{
					header("Location: workmanage.php");
				}
			}
			mysqli_close($conn);
		?>
		</section>
		</div>
	</body>
</html>