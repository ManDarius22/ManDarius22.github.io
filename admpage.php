<?php
require 'config.php';

	if(isset($_POST["stergeD"]))
	{
		$ids = $_POST['stergeid'];
		$query = "DELETE FROM `testpoza` WHERE id='$ids'";
		$res2=mysqli_query($conn,$query);

	}

	if(isset($_POST["stergeB"]))
	{
		$ids = $_POST['stergeid'];
		$query = "DELETE FROM `anunturibeneficiari` WHERE id='$ids'";
		$res2=mysqli_query($conn,$query);

	}

	if(isset($_POST["editB"]))
	{
		$id=$_POST['idB'];
		$nume=$_POST['numeB'];
		$email=$_POST['emailB'];
		$descriere=$_POST['descriereB'];
		$tip=$_POST['tipB'];
		$adresa=$_POST['adresaB'];

		$query="UPDATE `anunturibeneficiari` SET name='$nume',email='$email',descriere='$descriere',tip='$tip',adresa='$adresa' WHERE id='$id'";
		mysqli_query($conn,$query);
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="admpageCSS.css">
	<title></title>
</head>
<body>
	<div class="container">
		<form   method="POST">
			<h3>Editeaza un anunt de beneficiar</h3>
			<input type="text" name="idB" id="idB" placeholder="Numarul Anuntului:" required>
			<input type="text" name="numeB" id="pctplecareE" placeholder="Numele" required>
			<input type="text" name="emailB" id="destinatieE" placeholder="Emailu" required>
			<input type="text" name="descriereB" id="desciereB" placeholder="Descrierea" required>
			<input type="text" name="tipB" id="tipB" placeholder="Tipul" required>
			<input type="text" name="adresaB" id="adresaB" placeholder="Adresa" required>
			<button type="submit" name="editB">Edit</button>
			<br>
			<button onclick="location.href='index.php'" type="button"><span></span>Home</button>
		</form>
	</div>

	<div class="container">
		<form   method="POST">
			<h3>Sterge anunt beneficiar</h3>
			<input type="text" name="stergeid" id="stergeid" placeholder="Introduceti numarul anuntului beneficiar: " required>
			<button type="submit" name="stergeB">Sterge</button>
			<br>
			<button onclick="location.href='index.php'" type="button"><span></span>Home</button>
		</form>
	</div>


	<div class="container">
		<form   method="POST">
			<h3>Sterge anunt donator</h3>
			<input type="text" name="stergeid" id="stergeid" placeholder="Introduceti numarul anuntului beneficiar: " required>
			<button type="submit" name="stergeD">Sterge</button>
			<br>
			<button onclick="location.href='index.php'" type="button"><span></span>Home</button>
		</form>
	</div>



</body>
</html>