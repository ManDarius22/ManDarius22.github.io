<?php

require 'config.php';
	if(empty($_SESSION["id"]))
	{
		header("Location: login.php");
	}
	else
	{
		$id= $_SESSION["id"];
		$result = mysqli_query($conn,"SELECT * FROM tb_user WHERE id= $id");
		$row = mysqli_fetch_assoc($result);
	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="profileCSS.css">

	<title>Profile</title>
</head>
<body>
	
	<div class="container">
		
		<div class="profile-box">
			<a href="logout.php"><img src="imgprof/logoutbtn.png" class="logout" height=100px width="100px"></a>
			<a href="index.php"><img src="imgprof/house.png" class="home" height=100px width="100px"></a>
			<img src="imgprof/usericon.png" class="user" height=300px width="300px">
			<br>
			<br>
			<?php
				$id= $_SESSION["id"];
				$result= mysqli_query($conn, "SELECT * FROM tb_user WHERE id= $id");

				while($row= mysqli_fetch_array($result))
				{
					?>
						<?php $value1 = $row['username'] ?>
						<label>Welcome <b> <?php echo $value1; ?></b></label>
						<!-- literele din tabel se schimba de aici -->
						
					<?php
				}
				?>
				<br>
				<br>
			<table>
						<thead>
							<th>#</th>
							<th>Expeditor</th>
							<th>Actiuni</th>								
						</thead>
						<?php
							$i=1;
							$id2= $_SESSION["id"];
							$result= mysqli_query($conn, "SELECT * FROM tb_user WHERE id= $id2");
							$row = $result->fetch_assoc();
							$userconn = $row['username'];
							$rows= mysqli_query($conn, "SELECT DISTINCT expeditor FROM mesajeuseri WHERE username='$userconn'  ");
							
						?>
					
						<?php foreach ($rows as $row): ?>
						<tr>
							
							<td><?php echo $i++; ?></td>
							<td><?php echo $row["expeditor"] ?></td>

							<td>
								<a href="contact2.php?destinatar=<?php echo $row["expeditor"]; ?>">Raspunde</a>
							</td>
						</tr>
							
						<?php endforeach; ?>	
						
			</table>	

		</div>	

		
			
	</div>

</body>
</html>