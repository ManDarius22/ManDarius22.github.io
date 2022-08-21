<?php
require 'config.php';

if(!empty($_SESSION["id"]))
{
	header("Location: index.php");
}


if(isset($_POST["submit"]))
{
	$name = $_POST["name"];
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$confirmpassword=$_POST["confirmpassword"];

	$name= mysqli_real_escape_string($conn,$name);
	$username= mysqli_real_escape_string($conn,$username);
	$email= mysqli_real_escape_string($conn,$email);
	$password= mysqli_real_escape_string($conn,$password);
	$confirmpassword= mysqli_real_escape_string($conn,$confirmpassword);

	$duplicate= mysqli_query($conn,"SELECT * FROM tb_user WHERE username= '$username' OR email ='$email'");
	if(mysqli_num_rows($duplicate) > 0)
	{
		echo
		"<script> alert('Username or Email has already taken!'); </script>";
		
	}
	else
	{
		if($password == $confirmpassword)
		{
			
			$query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
			mysqli_query($conn,$query);
			echo
			"<script> alert('Registration Succesful'); </script>";
		}
		else
		{
			echo
			"<script> alert('Password don't match!'); </script>";
			
		}
	}


}

?>


<html lang="en" dir="ltr">

	<head>
		<meta charset="utf-8">
		<title>Registration</title>
		<link rel="stylesheet" href="logCSS.css">
	</head>


	<body>
		<div class="center">
			<h1>Registration</h1>
			<form class="" action="" method="post" autocomplete="off">
				<div class="txt_field">
					<input type="text" name="name" id="name" required value="">
					<label for="name">Nume: </label>
				</div>
				
				<div class="txt_field">
					<input type="username" name="username" id="username" required value="">
					<label for="username">Username: </label>
				</div>
				
				<div class="txt_field">
					<input type="email" name="email" id="email" required value="">
					<label for="email">Email: </label>
				</div>

				<div class="txt_field">
					<input type="password" name="password" id="passwrod" required value="">
					<label for="password">Password: </label>
				</div>
				
				<div class="txt_field">
					<input type="password" name="confirmpassword" id="confirmpasswrod" required value="">
					<label for="confirmpassword">Confirm Password: </label>
				</div>

				<div class="signup_link">
					Already have an account? <a href="login.php">Login</a>
				</div>

				<button type="submit" name="submit">Register</button>
			</form>
			
			
		</div>
	</body>

</html>