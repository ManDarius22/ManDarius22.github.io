<?php 

require 'config.php';



if(isset($_GET['favorit']))
	{
		$id=$_GET['favorit'];
		$result = mysqli_query($conn,"SELECT * FROM anunturidonatori WHERE id= $id");
		$row = mysqli_fetch_assoc($result);

		$imagine=$row['img'];
		$user=$row['user'];
		$tipul=$row['tip'];
		$descriere=$row['descriere'];

		$id2= $_SESSION["id"];
		
		$duplicate= mysqli_query($conn,"SELECT * FROM favorite WHERE userconectat= '$id' AND img ='$imagine'");
		if(mysqli_num_rows($duplicate) > 0)
		{
			echo
			"<script> alert('Aveti acest articol deja adaugat!'); </script>";
			header( "refresh:0;url=youtube.php" );
		}
		else{
			$query = "INSERT INTO favorite VALUES('','$id2','$user','$descriere','$tipul','$imagine')";
			mysqli_query($conn,$query);
			echo
				"<script> alert('Obiect adaugat la favorite!'); </script>";
			header("Location: youtube.php");
		}

	}

if(isset($_GET['delete'])){
		$iddel=$_GET['delete'];
		$delete=mysqli_query($conn,"DELETE FROM favorite WHERE id='$iddel'");
		echo
			"<script> alert('Ati eliminat articolul cu succes!'); </script>";
			header( "refresh:0;url=youtube.php" );
}


?>