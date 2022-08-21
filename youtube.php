<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="youtubeCSS.css">
    <!-- modifica culoare background sau fa fisier nou -->
	<!-- fontu quicksand -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <title>Donatii</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title></title>
</head>
<body bgcolor="#DBF9FC">
		<div class="banner2">
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
	<center>
	<div class="col-md-3">
                <form action="" method="POST">
                    <div class="card shadow mt-3">
                        <div class="card-header">
                            <h5>Filter 
                                <button type="submit" class="btn btn-primary btn-sm float-end" name="submit">Search</button>
                               
                            
                                
                            </h5>
                        </div>
                        <div class="card-body">
                            <h6><b>Tipuri de donatii</b></h6>
                            <hr>         
							<label for="financiara" class="radio-inline"><input type="radio" name="tip" value="Financiara" id="financiara"> Financiara</label> <br>
							<label for="financiara" class="radio-inline"><input type="radio" name="tip" value="Jucarii" id="financiara"> Jucarii</label> <br>
							<label for="financiara" class="radio-inline"><input type="radio" name="tip" value="Haine" id="financiara"> Haine</label> <br>
							<label for="financiara" class="radio-inline"><input type="radio" name="tip" value="Mobilier" id="financiara"> Mobilier</label><br>
							<label for="financiara" class="radio-inline"><input type="radio" name="tip" value="Altele" id="financiara"> Altele</label><br>
							<br>
							<button type="submit" class="btn btn-primary" name="favoritebtn"><i style="color:#F6F640;" class="fa fa-star" aria-hidden="true"></i> Favorite</button>
							<br>				
							<br>
							<button class="btn btn-primary" onClick="window.location.reload();">Remove filters</button>
                        </div>
                    </div>
                </form>
    </div>
    
		<div class="container py-5">
			<div class="row mt-4">

								<?php 
									require 'config.php';



												if(isset($_POST['favoritebtn'])){
													$userconn= $_SESSION["id"];
													$queryfav = "SELECT * FROM favorite WHERE userconectat='$userconn' ";
													$query_runfav = mysqli_query($conn,$queryfav);
													$check_datafav=mysqli_num_rows($query_runfav) > 0;
												 	
												 	if ($check_datafav > 0) {
												       
												        while ($row = mysqli_fetch_array($query_runfav)) {
													?>
														<div class="col-md-4 py-3">
															<div class="card">
																<img src="imgtest/<?php echo $row['img'] ?>" w alt="Poze Donatii">
																<div class="card-body">
																	<h4 class="card-title"><?php echo $row['user']; ?></h4>
																	<h3 class="card-title"><?php echo $row['tip']; ?></h3>
																	<p class="card-text">
																		<?php echo $row['descriere']; ?>
																		<br>
																		<a href="contact.php?contact=<?php echo $row["user"]; ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a>
																		<br>

																		<a href="favorite.php?delete=<?php echo $row["id"];?>"><i style="color:red;" class="fa fa-trash-o" aria-hidden="true"></i> Remove</a>
																	</p>
																</div>
															</div>
														</div>
														<?php
														}

													}
													else{
														echo "<script>alert('Nu aveti articole favorite!');</script>";
														
													
														header( "refresh:0;url=youtube.php" );
													}
													exit();
												}
													



												if (isset($_POST['submit'])) {
												 	$str = $_POST['tip'];
												 	$query2 = "SELECT * FROM anunturidonatori WHERE tip='$str' ";
													$query_run2 = mysqli_query($conn,$query2);
													$check_data2=mysqli_num_rows($query_run2) > 0;
												 	
												 	if ($check_data2 > 0) {
												       
												        while ($row = mysqli_fetch_array($query_run2)) {
													?>
														<div class="col-md-4 py-3">
															<div class="card">
																<img src="imgtest/<?php echo $row['img'] ?>" w alt="Poze Donatii">
																<div class="card-body">
																	<h4 class="card-title"><?php echo $row['user']; ?></h4>
																	<h3 class="card-title"><?php echo $row['tip']; ?></h3>
																	<p class="card-text">
																		<?php echo $row['descriere']; ?>
																		<br>
																		<a href="contact.php?contact=<?php echo $row["user"]; ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a>
																		<br>

																		<a href="favorite.php?favorit=<?php echo $row["id"];?>"><i style="color:#F6F640;" class="fa fa-star" aria-hidden="true"></i>Add to favorite</a>
																	</p>
																</div>
															</div>
														</div>
													<?php 
													
													}
													}
													else
													{
														echo "<script>alert('Nu dispunem de acest tip de articole!');</script>";
														
													
														header( "refresh:0;url=youtube.php" );
													}												    
												 
												}
												 else
												{	
													$query = "SELECT * FROM anunturidonatori";
													$query_run = mysqli_query($conn,$query);
													
													while ($row = mysqli_fetch_array($query_run)) {
													?>
														<div class="col-md-4 py-3">
															<div class="card">
																<img src="imgtest/<?php echo $row['img'] ?>" height="300px" alt="Poze Donatii">
																<div class="card-body">
																	<h4 class="card-title"><?php echo $row['user']; ?></h4>
																	<h3 class="card-title"><?php echo $row['tip']; ?></h3>
																	<p class="card-text">
																		<?php echo $row['descriere']; ?>
																	<br>
																		<a href="contact.php?contact=<?php echo $row["user"]; ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a>
																		<br>

																		<a href="favorite.php?favorit=<?php echo $row["id"];?>"><i style="color:#F6F640;" class="fa fa-star" aria-hidden="true"></i>Add to favorite</a>
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

	</center>



</body>
</html>

