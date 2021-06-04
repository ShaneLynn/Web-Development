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
		<title>Create work Table</title>
	</head>
	<body>
		<p><a href = "home.html">Continue to Home Page</a></p>
		<br>
		<?php
			$conn = mysqli_connect('localhost', 'root', '');
			
			if($conn)
			{
				echo "<p>Connection set up successfully. </p>";
			}
			
			$query = "DROP DATABASE IF EXISTS workDB";
			mysqli_query($conn, $query);
			
			$query = "CREATE DATABASE workDB";
			if(mysqli_query($conn, $query))
			{
				echo "<p>Database created successfully. </p>";
			}else
			{
				echo "<p>Database setup failed. </p>";
			}
			
			mysqli_select_db($conn, "workDB");
			$query = "CREATE TABLE worklist
					(
						listID INTEGER AUTO_INCREMENT,
						listItem VARCHAR(200) NOT NULL,
						PRIMARY KEY (listID)
					)";
			
			if(mysqli_query($conn, $query))
			{
				echo "<p>Table created successfully. </p>";
			}else
			{
				echo "<p>Table Setup failed. </p>";
			}
			mysqli_close($conn);
		?>
		
	</body>
</html>