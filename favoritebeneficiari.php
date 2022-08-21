<?php 

require 'config.php';



if(isset($_GET['favorit']))
	{
		$id=$_GET['favorit'];
		$result = mysqli_query($conn,"SELECT * FROM anunturibeneficiari WHERE id= $id");
		$row = mysqli_fetch_assoc($result);

		$user=$row['username'];
		$tipul=$row['tip'];
		$descriere=$row['descriere'];
		$oras=$row['oras'];
		$data=$row['data'];

		$id2= $_SESSION["id"];
		
		$duplicate= mysqli_query($conn,"SELECT * FROM favoritebeneficiari WHERE userconectat= '$id' AND descriere ='$descriere'");
		if(mysqli_num_rows($duplicate) > 0)
		{
			echo
			"<script> alert('Aveti acest articol deja adaugat!'); </script>";
			header( "refresh:0;url=afisareanunturibeneficiari.php" );
		}
		else{
			$query = "INSERT INTO favoritebeneficiari VALUES('','$id2','$user','$tipul','$descriere','$oras','$data')";
			mysqli_query($conn,$query);
			echo
				"<script> alert('Obiect adaugat la favorite!'); </script>";
			header("Location: afisareanunturibeneficiari.php");
		}

	}

if(isset($_GET['delete'])){
		$iddel=$_GET['delete'];
		$delete=mysqli_query($conn,"DELETE FROM favoritebeneficiari WHERE id='$iddel'");
		echo
			"<script> alert('Ati eliminat articolul cu succes!'); </script>";
			header( "refresh:0;url=afisareanunturibeneficiari.php" );
}


?>