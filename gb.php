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
	$page = 'gb';
	include 'inc/header.php';
	include 'inc/mysql.php';

	
	?>

		<div id="section">
		<div id="gbTitle"><h1>Gästbok</h1></div>
		<div id="newInsert"><h2>Nytt inlägg</h2></div>
		<form action="#" id="formGb">
		<label for="newGuestbook"></label>
		Namn: <input type="text" id="nameGuestbook">
		Meddelande: <textarea rows="1" id="messageGuestbook"></textarea>
		<input type="button" value="Skicka inlägg!" name="submit" id="createNewmessage">
		</form>
		<ul id="messages">
		<?php
		$conn2 = new mysqli($servername2, $username2, $password2, $dbname2);
		$sql = mysqli_query($conn2, "SELECT * FROM gb ORDER BY id DESC LIMIT 0,5");		
		while($row = mysqli_fetch_assoc($sql)){
			echo "<div id='gbName'<li><b>".$row['name']."</b></li></div>";
			echo "<li>".$row['message']."</li>";
		}
		?>
		</ul>
		</div>
	
	<?php include 'inc/footer.php'; ?>

</body>
</html>
</html>