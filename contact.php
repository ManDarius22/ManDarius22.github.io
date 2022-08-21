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



	if(isset($_GET['contact']))
	{
		$id=$_GET['contact'];

		?>
		<!-- <label>User:</label>
		<input type="text" name="lastname" value=" <?php echo $id ?>" readonly> -->
		<?php
	}

	if(isset($_POST['sndmesaj'])){
		$user=$_POST['username'];
		$mesaj=$_POST['mesaj'];

		$user= mysqli_real_escape_string($conn,$user);
		$mesaj= mysqli_real_escape_string($conn,$mesaj);

		$id2= $_SESSION["id"];
		$connDB=mysqli_select_db($conn,'reglog');
		$result= mysqli_query($conn, "SELECT * FROM tb_user WHERE id= $id2");
		$expeditor = $row['username'];

	
		$query = "INSERT INTO mesajeuseri VALUES('','$user','$mesaj','$expeditor')";
		mysqli_query($conn,$query);
		echo
			"<script> alert('Mesaj trimis cu succes!'); </script>";
		header("Location: youtube.php");

	}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="contactCSS.css">
	<title></title>
</head>
<body>
	<div class="contact-form">
		<h1>Comunica</h1>
		<form method="POST">
		<div class="text">
			<label>User:</label>
			<input type="text" name="username" value="<?php echo $id ?>" readonly>
		</div>

		<div class="text">
			<label>Mesaj:</label>
			<textarea name="mesaj" required></textarea>
		</div>
		
		
		<button class="btn" name="sndmesaj">Send</button>
		</form>
	</div>
	
		
	
</body>
</html>