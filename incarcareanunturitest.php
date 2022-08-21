<?php
require 'config.php';

if(!empty($_SESSION["id"]))
{
	$id= $_SESSION["id"];
	$result = mysqli_query($conn,"SELECT * FROM `tb_user` WHERE `id`= $id");
	$row = mysqli_fetch_assoc($result);
}
else
{
	header("Location: login.php");
	
}



if(isset($_POST['submit']))
{
	$user=$row["username"];
	$descriere=$_POST['descriere'];
	$tip=$_POST['tip'];
	if($_FILES["image"]["error"]===4)
	{
		echo "<script>alert('Image does not exist!');</script>";
	}
	else
	{
		$fileName = $_FILES['image']['name'];
		$fileSize= $_FILES['image']['size'];
		$tmpName=$_FILES['image']['tmp_name'];

		$validImageExtension=['jpg','jpeg','png'];
		$imageExtension = explode('.', $fileName);
		$imageExtension = strtolower(end($imageExtension));
		if(!in_array($imageExtension, $validImageExtension))
		{
			echo "<script>alert('Invalid Image extension!');</script>";
		}
		else if($fileSize > 1000000)
		{
			echo "<script>alert('Image size to large!');</script>";
		}
		else
		{
			$newImageName = uniqid().'.'.$imageExtension;
			move_uploaded_file($tmpName,'imgtest/' . $newImageName);
			$query = "INSERT INTO anunturidonatori VALUES('','$user','$descriere','$tip','$newImageName')";
			mysqli_query($conn,$query);
			echo 
			"<script>
				alert('Succesfuly added!');
				header(Location: afisareanunturitest.php);
			</script>";
		}

	}
}


?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="indexCSS.css">
	<link rel="stylesheet" type="text/css" href="style.css"> 
	<link rel="stylesheet" type="text/css" href="incarcareCSS.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
	<title>Doneaza</title>
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
							<h1>Donatie</h1>
							<form method="post" enctype="multipart/form-data">

								<!--<input type="text" class="form-control" id="descriere" name="descriere"><br> -->
								<textarea class="field" id="descriere" name="descriere" placeholder="Descriere"></textarea>	
								<br>
									
								<label>Tip donatie:</label>
								<br>
								<label for="financiara" class="radio-inline"><input type="radio" name="tip" value="Financiara" id="financiara"> Financiara</label><br>
								<label for="mobilier" class="radio-inline"><input type="radio" name="tip" value="Mobilier" id="mobilier"> Mobilier</label><br>
								<label for="jucarii" class="radio-inline"><input type="radio" name="tip" value="Jucarii" id="jucarii"> Jucarii</label><br>
								<label for="haine" class="radio-inline"><input type="radio" name="tip" value="Haine" id="Haine"> Haine</label><br>
								<label for="altele" class="radio-inline"><input type="radio" name="tip" value="Altele" id="altele"> Altele</label><br>
								<br>
							
								<label for="image">Imagine: </label><br>
								<input type="file" name="image" id="image"value=""><br>
								<br>
								<br>
								
								<input class="btn" type="submit" name="submit" value="Upload"> 
								
							</form>
						</div>
					
				</div>
			</div>
	
	<br>
	
</body>
</html>