<?php

require 'config.php';
if(!empty($_SESSION["id"]))
{
	$id= $_SESSION["id"];
	$result = mysqli_query($conn,"SELECT * FROM tb_user WHERE id= $id");
	$row = mysqli_fetch_assoc($result);
}
else
{
	header("Location: login.php");
	
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- fontu quicksand -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
	<title>Home Page</title>
</head>
<body>
	<div class="banner">
		<div class="navbar">
			<img src="logo2.png" class="logo">
			<ul>			
				<li><a href="beneficiari.php">Registration</a></li>
				<li><a href="incarcareanunturitest.php">Doneaza</a></li>
				<li><a href="youtube.php">Donatii</a></li>
				<li><a href="afisareanunturibeneficiari.php">Ajuta</a></li>
				<li><a href="index.php">Home</a></li>
				<li><a href="logout.php">Logout</a></li>
				<li><a href="profile.php">#</a></li>
			</ul>
		</div>

		<div class="content">
			<h1>Impreuna suntem mai puternici</h1>
			<p>Incearca sa ii ajuti pe cei aflati in nevoie oricand
			ai ocazia.</p>
			<div>
				<button onclick="location.href='incarcareanunturitest.php'" type="button"><span></span>Doneaza</button>
				<br>
				
				
			</div>
		</div>
	</div>

</body>
</html>