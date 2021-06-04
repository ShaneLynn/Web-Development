<!DOCTYPE html>
<!--
    Christopher Lynn
    CISS 298 Web Programming
    5/27/2021
    Programming Assignment 4 - MySQL
-->

<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style.css">
		<title>Work Page</title>
	</head>
	<body>
		<header>
			<h1>Christopher Shane Lynn</h1>
			<h2>What you believe becomes true for you!</h2>
			<nav>
				<ul>
					<li><a href="home.html">Home</a></li>
					<li><a href="education.html">Education</a></li>
					<li><a href="work.php">Work</a></li>
				</ul>
			</nav>
		</header>
		<div>
			<section id = "work">
				<h3>My Work Experience</h3>
				
				<p>I have been in the workforce for over twenty years now, and my last job was held for over 16 of
                those years.  Unfortunately, the pandemic took its toll and I was a part of the latest round of
                layoffs.  I held three positions in the company which I have listed below, and I enjoyed my time
                there.  However, the layoff proved benficial because I was already taking classes to career change
                into the tech world.  So, I see this as my opportunity to move into a career that I will love for the
                next part of the jouney in my life.
				</p>
				<ol>
					<?php
						//Retreive all experience that is active in the table
						$conn = mysqli_connect('localhost', 'root', '', 'workDB');
						if ($conn)
						{
							$query = "SELECT * FROM worklist ORDER BY listID ASC";
							$result = mysqli_query($conn, $query);
							if(mysqli_num_rows($result) > 0)
							{
								$display = "";
								while($row = mysqli_fetch_assoc($result))
								{
									$display .= "<li>" . $row["listItem"]. "</li>";
								}
							}else
							{
								$display = "<li>No Work History Found.</li>";
							}
							echo $display;
						}
						mysqli_close($conn);
					?>
				</ol>
				<br>
				<h5><a href = "workmanage.php">Manage Work History</a>
			</section>
		</div>
		
		<aside id="amazon">
			<h4>Check out amazon.com</h4>
			<p>Prime members get free shipping and videos!</p>
		</aside>
    
		<aside id="bn">
			<h4>Books available at bn.com</h4>
			<p>B&amp;N Members, stop in for store discounts and get free shipping online</p>
		</aside>
		
		<footer>
			<p>
				COPYRIGHT&copy; 2021 | Christopher S. Lynn | E-mail me at: cslynn1@cougars.ccis.edu | <a href="https://www.linkedin.com/in/christopher-shane-lynn/"><img id="LInIcon" alt="LinkedIn Icon" src="Linkedin_Shiny_Icon_Web.jpg"></a>
			</p>
		</footer>
	</body>
</html>