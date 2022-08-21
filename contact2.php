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



	if(isset($_GET['destinatar']))
	{
		$idDEST=$_GET['destinatar'];

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
		header("Location: profile.php");

	}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="contact2CSS.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title></title>
</head>
<body>
	
	<div class="row no-gutters">
			

			<div class="col-md-6 no-gutters">
				
				<div class="leftside">
					
				

						<div class="container py-5">
								<div class="row mt-4">
									<h1 style="color:white">Primite:</h1>
													<?php 

																	
																		$id2= $_SESSION["id"];
																		$result= mysqli_query($conn, "SELECT * FROM tb_user WHERE id= $id2");
																		$row = $result->fetch_assoc();
																		$userconn = $row['username'];
																		//$rows= mysqli_query($conn, "SELECT * FROM mesajeuseri WHERE username=(SELECT username FROM tb_user WHERE id = '$id2')");
																		$rows= mysqli_query($conn, "SELECT * FROM mesajeuseri WHERE username='$userconn' AND expeditor='$idDEST'");
																							 
																		$check_rows=mysqli_num_rows($rows) > 0;
																	 	
																	 	if ($check_rows > 0) {
																	       
																	        while ($row = mysqli_fetch_array($rows)) {
																		?>
																			<div class="col-md-7 py-3">
																				<div class="card">
																					<div class="card-body">
																						<h4 class="card-title"><?php echo $row['expeditor']; ?>: </h4>
																						
																						<p class="card-text">

																							<?php echo $row['mesajtext']; ?>
																							
																						</p>
																					</div>
																				</div>
																			</div>
																		<?php 
																		
																		}
																	    
																	 
																	}
																	?>
												</div>
											</div>
				</div>
			</div>	             




			<div class="col-md-6 no-gutters">
				
				<div class="rightside">

					     <div class="container2 py-5">
								<div class="row mt-4">
									<h1 style="color:white">Trimise:</h1>
													<?php 

																	
																		$id2= $_SESSION["id"];
																		$result= mysqli_query($conn, "SELECT * FROM tb_user WHERE id= $id2");
																		$row = $result->fetch_assoc();
																		$userconn = $row['username'];
																		//$rows= mysqli_query($conn, "SELECT * FROM mesajeuseri WHERE username=(SELECT username FROM tb_user WHERE id = '$id2')");
																		$rows= mysqli_query($conn, "SELECT * FROM mesajeuseri WHERE username='$idDEST' AND expeditor='$userconn'");
																							 
																		$check_rows=mysqli_num_rows($rows) > 0;
																	 	
																	 	if ($check_rows > 0) {
																	       
																	        while ($row = mysqli_fetch_array($rows)) {
																		?>
																			<div class="col-md-7 py-3">
																				<div class="card">
																					<div class="card-body">
																						<h4 class="card-title"><?php echo $row['expeditor']; ?>: </h4>
																						
																						<p class="card-text">

																							<?php echo $row['mesajtext']; ?>
																							
																						</p>
																					</div>
																				</div>
																			</div>
																		<?php 
																		
																		}
																	    
																	 
																	}
																	?>
												</div>
											</div>
					              


						<div class="contact-form" id="popup">
							<h1>Comunica</h1>
							<form method="POST">
							<div class="text">
								<label>User:</label>
								<input type="text" name="username" value="<?php echo $idDEST ?>" readonly>
							</div>

							<div class="text">
								<label>Mesaj:</label>
								<textarea name="mesaj" required></textarea>
							</div>
							
							
							<button class="btn btn-primary" name="sndmesaj">Send</button>
							</form>
						</div>
				</div>
			</div>

	</div>
</body>
</html>