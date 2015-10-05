<?php 
if(!isset($_SESSION['user']))
{
	echo '<div id="header">	
	<h1>Min filmsamling</h1>
	<a ';echo ($page == 'index') ? 'class="current"' : ''; echo 'href="index.php" class="btn">Start</a>
	<a ';echo ($page == 'gb') ? 'class="current"' : ''; echo 'href="gb.php" class="btn">Gästbok</a>
	<a ';echo ($page == 'movies') ? 'class="current"' : ''; echo 'href="movies.php" class="btn">Filmer</a>
	<a ';echo ($page == 'tips') ? 'class="current"' : ''; echo 'href="tips.php" class="btn">Filmtips</a>
	<a ';echo ($page == 'about') ? 'class="current"' : ''; echo 'href="about.php" class="btn">Om webbplatsen</a>
	<a ';echo ($page == 'contact') ? 'class="current"' : ''; echo 'href="contact.php" class="btn">Kontakt</a>
	<a ';echo ($page == 'login') ? 'class="current"' : ''; echo 'href="login.php" class="btn">Logga in</a>
	</div>';
}
else
{
	echo '<div id="header">	
	<h1>Min filmsamling</h1>
	<a ';echo ($page == 'index') ? 'class="current"' : ''; echo 'href="index.php" class="btn">Start</a>
	<a ';echo ($page == 'gb') ? 'class="current"' : ''; echo 'href="gb.php" class="btn">Gästbok</a>
	<a ';echo ($page == 'movies') ? 'class="current"' : ''; echo 'href="movies.php" class="btn">Filmer</a>
	<a ';echo ($page == 'tips') ? 'class="current"' : ''; echo 'href="tips.php" class="btn">Filmtips</a>
	<a ';echo ($page == 'about') ? 'class="current"' : ''; echo 'href="about.php" class="btn">Om webbplatsen</a>
	<a ';echo ($page == 'contact') ? 'class="current"' : ''; echo 'href="contact.php" class="btn">Kontakt</a>
	<a ';echo ($page == 'admin') ? 'class="current"' : ''; echo 'href="admin.php" class="btn">Admin</a>
	</div>';
}

?>

	