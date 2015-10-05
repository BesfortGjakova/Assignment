<?php
$servername = "localhost";
$username = "cs2013";
$password = "abc123";
$dbname = "cs2013";

$servername2 = "localhost";
$username2 = "kid05038";
$password2 = "*******";
$dbname2 = "kid05038";

//Databas på localhost                        
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "movies";

$conn2 = new mysqli($servername2, $username2, $password2, $dbname2);

if (isset($_GET['action']) && $_GET['action'] == "nameGuestbook"){
	$gb = mysqli_real_escape_string($conn2, $_POST['gb']);
	$gbMessage = mysqli_real_escape_string($conn2, $_POST['gbMessage']);
	if(mysqli_query($conn2, "INSERT INTO gb (name, message) VALUES ('$gb','$gbMessage')"));{
		echo "true";
	}
}

?>