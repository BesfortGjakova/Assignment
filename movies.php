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
	$page = 'movies';
	include 'inc/header.php'; ?>
		
		<div id="section">
		<?php
		if (strpos($_SERVER['REQUEST_URI'], "title") == false) { 
		echo '<ul class="movies" id="moreMovies"><h1>Filmer</h1>';
		$filename = 'movies.txt';
		
		$handle = fopen($filename, 'r');
		
		$datain = fread($handle, filesize($filename)); 
		
		$lines = explode ("\n",trim($datain));
			foreach($lines as $line)
			{
				list($title,$rating,$linkImdb,$linkImg,$plot) = explode(";",$line,5);
				echo '<li><a href="movies.php?title='.$title.'">'.$title.'<span>'.$rating.'</span></a></li>';
			}
		echo '</ul>';
		}
		else {	
		if (isset($_GET["title"])) {
		  $readin = file('movies.txt');
			  foreach ($readin as $fname) 
			  {
				 $names_array = explode(';', $fname);
				 if($_GET['title']===$names_array[0]){
					echo '<img src="'.$names_array[3].'"></img><h1>'.$names_array[0].'</h1>'.$names_array[4].'<br><br><b>Betyg: </b>'.$names_array[1].'<br><br><b>Länk till IMDB: </b><a href="'.$names_array[2].'">'.$names_array[2].'</a>';
				 }
			  }
			}
		}
		?>		
	</div>
	
	<?php include 'inc/footer.php'; ?>

</body>
</html>