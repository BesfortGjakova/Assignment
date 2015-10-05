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
	if(!isset($_SESSION['user'])){
		   header("Location:login.php");
	}
	$page = 'admin';
	include 'inc/header.php'; ?>
	
		<div id="right-nav">
		<form action="<?php echo $_SERVER['PHP_SELF']?>" onsubmit="return showPHP()" id="form" name="movieForm" method="post">
		
		<h3>Lägg till en film</h3>
	
		<?php
		if (isset($_POST["submit"])) {
			$title = $_POST['movieTitle'];
			$rating = $_POST['movieRatings'];
			$linkImdb = $_POST['linkImdb'];
			$linkImg = $_POST['linkImg'];
			$plot = $_POST['plot'];
			echo '<div id="movieSaved">Filmen är sparad!</div><br>';
		
		
		$handle = fopen('movies.txt', 'a');
		$names_array = array("$title","$rating","$linkImdb","$linkImg","$plot");
		$string = implode(';', $names_array);
		fwrite($handle, $string."\n");			
		fclose($handle);
		}	
		?>
			Titel:<br>
			<input type="text" name="movieTitle" id="movieTitle"><br>
			
			Betyg:<br>
			<select id="movieRatings" name="movieRatings">
			  <option value="0">Välj betyg här...</option>
			  <option value="*" name="1">1</option>
			  <option value="**">2</option>
			  <option value="***">3</option>
			  <option value="****">4</option>
			  <option value="*****">5</option>
			</select>			
					
			<br>Länk till imdb:<br>
			<input type="text" id="linkImdb" name="linkImdb"><br>
			
			Länk till bild:<br>
			<input type="text" id="linkImg" name="linkImg"><br>
			
			Filmens handling:<br>
			<textarea cols="16" rows="4" name="plot" id="plot"></textarea>
		
			 
			<br>
			<button name="submit">Spara film</button>
		</form>
		
		
		</div>
		
		<div id="section">
		<h1>Admin</h1>
		
		Välkommen till admin-sidan!<br>
		Du kan lägga till filmer till sidan "Filmer" i formuläret till höger.<br>
		<a href='logout.php'>Logga ut</a>
		</div>
	
	<?php include 'inc/footer.php'; ?>

</body>
</html>