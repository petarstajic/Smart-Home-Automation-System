<?php
$p2=$_POST['p2'];
$db=@mysqli_connect("localhost", "root", "", "users") or die ("Neuspela konekcija na bazu");
mysqli_query($db, "SET NAMES UTF8");


$promeni="UPDATE prekidaci SET p2='".$p2."' WHERE 1";
mysqli_query($db, $promeni);
if(mysqli_error($db))
	echo "Doslo je do greske<br>".mysqli_error($db);

  
?>