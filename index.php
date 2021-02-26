<?php
session_start();

if(!isset($_SESSION['username'])){
	header('location:login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
		<h1>Hi <?php echo $_SESSION['username']; ?></h1>
	
	<a href="logout.php"><button style="font-size: 20px;margin-top: 20px;">Logout</button></a>
	</center>
</body>
</html>