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

if(isset($_POST["submit"]))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$cui = $_POST['cui'];
	$tip = $_POST['tip'];
	$adresa = $_POST['adresa'];
	$query = "INSERT INTO beneficiari VALUES('','$email','$name','$cui','$tip','$adresa')";
	mysqli_query($conn,$query);

}

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Beneficiari </title>
	<link rel="stylesheet" type="text/css" href="style.css"> 
	<link rel="stylesheet" type="text/css" href="benCSS.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
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

	<div class="container">
		<div class="contact-box">
			<div class="left"></div>
				<div class="right">
					<form   method="POST">
						<h3>Inregistrare institutiei</h3><br>
						<input class="field" type="text" name="name" id="name" placeholder="Denumire institutie" required>
						<input class="field" type="email" name="email" id="email" placeholder="Enter an valid email" required>
						<input class="field" type="text" name="cui" id="cui" placeholder="CUI" required>
						<input class="field" type="text" name="tip" id="tip" placeholder="Tipul institutie" required>
						<input class="field" type="text" name="adresa" id="adresa" placeholder="Adresa" required>
						<input class="btn" type="submit" name="submit" value="Send"> 
					</form>
				</div>
		</div>
	</div>

</body>
</html>