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
	$page = 'login';
	include 'inc/header.php'; 
	include "inc/mysql.php";
	$conn2 = new mysqli($servername2, $username2, $password2, $dbname2);
	?>

		<div id="section">
		<h1>Logga in</h1>
		<?php 
			if(isset($_SESSION['user'])){
				   header("Location:admin.php");
			} 
						
			if( isset($_POST['username']) && isset($_POST['password']) )
			{	
			$username = mysqli_real_escape_string($conn2, $_POST['username']);
			$password = mysqli_real_escape_string($conn2, $_POST['password']);
			$encrypted_pass=md5($password);
			
			$getuser=mysqli_query($conn2, "SELECT * FROM users WHERE username='$username' AND password='$encrypted_pass'");
			
			if (mysqli_num_rows($getuser) == 1)
				{

					$_SESSION['user'] = $_POST['username'];

					header( "Location:admin.php" );
				 } else{
					header("Location: login.php?fail");
				 }
				
			 }
			 if (isset($_GET['fail'])){
				echo '<div id="loginFail">Fel användarnamn eller lösenord</div>';	
			}
			
			 
			?>
				
		<form action="" onsubmit="" id="loginForm" name="loginForm" method="post">
	
			Användarnamn:<br>
			<input type="text" name="username" id="username"><br>
						
			<br>Lösenord:<br>
			<input type="password" id="password" name="password"><br>
			<br>
			<button name="submit">Logga in</button>
		</form>
		</div>
	
	<?php include 'inc/footer.php'; ?>

</body>
</html>