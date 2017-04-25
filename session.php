<?php
session_start();

$checkUser=$_SESSION['loggedin'];
$lookupDb=mysqli_query("select username from login where username='$checkUser'", $connection);
$row = mysqli_fetch_assoc($lookupDb);

$login_session = $row['username'];

if(!isset($login_session)){
	mysql_close($connection); // Closing Connection
	header('Location: index.php'); // Redirecting To Home Page
}
?>