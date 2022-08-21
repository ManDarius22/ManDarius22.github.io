<?php

require 'config.php';

if(!empty($_SESSION["id"]))
{
	header("Location: index.php");
}


if(isset($_POST["submit"]))
{
	$usernameemail = $_POST["usernameemail"];
	$password= $_POST["password"];
	$usernameemail= mysqli_real_escape_string($conn,$usernameemail);
	$password= mysqli_real_escape_string($conn,$password);
	$result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
	$row = mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result) > 0)
	{
		if($password == $row["password"])
		{
			$_SESSION["login"]=true;
			$_SESSION["id"] = $row["id"];
			header("Location: index.php");
			
		}
		else
		{
			"<script> alert('Wrong password!'); </script>";
			
		}
		
	}
	else
	{
		echo
			"<script> alert('User not registered!'); </script>";
	}
	

}

?>



<html lang="en" dir="ltr">

	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="logCSS.css">
	</head>


	<body>
		
		<div class="center">
			<h1> Login </h1>
			<form class="" action="login.php" method="post" autocomplete="off">
				<div class="txt_field">
					<input type="text" name="usernameemail" id="usernameemail" required value="">
					<span></span>
					<label>Username or email</label>
				</div>
				<div class="txt_field">
					<input type="password" name="password" id="password" required value="">
					<span></span>
					<label>Password</label>
				</div>
				<div class="signup_link">
					Not a member? <a href="registration.php">Register</a>
				</div>
			
				<button type="submit" name="submit">Login</button>
			</form>
				
			
		</div>
	</body>

</html>