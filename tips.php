<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="JQuery.js"></script>
<script type="text/javascript" src="javascript.js"></script>
<title>Inlämningsuppgift 5</title>
</head>

<body>
	<?php 
	session_start();
	$page = 'tips';
	include 'inc/header.php';
	?>
	
	<div id="section">
		<div id="tips"><h1>Filmtips</h1></div>
		<ul class="movies" id="moreMovies">
		<?php
		include "inc/mysql.php"; 
		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT id, title, grade, year FROM movies";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo'<table border="1" ><th >Titel</th><th>Betyg</th><th>År</th>';
			while($row = $result->fetch_assoc()) {
				echo'<tr><td>'.$row['title'].'</td><td>'.$row['grade'].'</td><td>'.$row['year'].'</td></tr>';
			}
			echo'</table>';
		} else {
			echo "0 results";
		}

		$conn->close();

		?>
        </ul>
		
	</div>
	
	<?php include 'inc/footer.php'; ?>

</body>
</html>