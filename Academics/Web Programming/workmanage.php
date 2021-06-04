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
		<title>Work Experience Management</title>
	</head>
	<body>
	<div>
		<section id = "workmanagement">
		<h1>Work Experience Management</h1>
		<form action = "" method = "post">
		<textarea id = "work" name = "work" placeholder = "Work Experience"></textarea>
		<br>
		<input type = "submit" name = "insert" value = "Add New Work">
		<input type = "submit" name = "view" value = "View All">
		</form>
		<?php
			//Setup the connection
			$conn = mysqli_connect('localhost', 'root', '', 'workDB');
			if($conn)
			{
				//Connection good, so add the code if insert button is click with work not empty
				if((isset($_POST['insert'])) && !empty($_POST['work']))
				{
					//Get the values from the form
					$listItem = mysqli_real_escape_string($conn, $_POST['work']);
					//SQL insert statement
					$query = "INSERT INTO worklist (listItem) VALUES ('$listItem')";
					if(mysqli_query($conn, $query))
					{
						echo "<p>Insert Successful</p>";
					}else
					{
						echo "<p>Insert Failed</p>";
					}
				}
				
				//If the view all button is clicked
				if(isset($_POST['view']))
				{
					//Select statement
					$query = "SELECT * FROM worklist ORDER BY listID ASC";
					$result = mysqli_query($conn, $query);
					if(mysqli_num_rows($result) > 0)
					{
						$display = "<h3>All Work Experience</h3>";
						while ($row = mysqli_fetch_assoc($result))
						{
							$display .= "ID: " . $row["listID"]. "<br>";
							$display .= "Work Experience: " . $row["listItem"]. "<br>";
							$display .= "<a href = 'workupdate.php?id=" . $row['listID']."'>Update</a><br>";
							$display .= "<a href = 'workdelete.php?id=" . $row['listID']."'>Delete</a><br>";
							$display .= "<br>";
						}
					}else
					{
						$display = "<p>No content in the table.</p>";
					}
					echo $display;
				}
				mysqli_close($conn);
				
			}else
			{
				echo "<p>Connection Failed</p>";
			}
		?>
		<br>
		<p><h5><a href = "work.php">Return to Work History</a></h5></p>
		</section>
	</div>
	</body>
</html>	