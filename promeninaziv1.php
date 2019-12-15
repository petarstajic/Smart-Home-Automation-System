<?php
$p1=$_POST['p1'];
$db=@mysqli_connect("localhost", "root", "", "users") or die ("Neuspela konekcija na bazu");
mysqli_query($db, "SET NAMES UTF8");


$promeni="UPDATE prekidaci SET p1='".$p1."' WHERE 1";
mysqli_query($db, $promeni);
if(mysqli_error($db))
	echo "Doslo je do greske<br>".mysqli_error($db);

  
?>