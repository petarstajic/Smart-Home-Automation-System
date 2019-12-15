<?php

$db=@mysqli_connect("localhost", "root", "", "users") or die ("Neuspela konekcija na bazu");
mysqli_query($db, "SET NAMES UTF8");

$brisanjep="DELETE FROM upali WHERE id = '4' ";
$brisanjeg="DELETE FROM ugasi WHERE id = '4' ";
mysqli_query($db, $brisanjep);
mysqli_query($db, $brisanjeg);
if(mysqli_error($db))
	echo "Doslo je do greske<br>".mysqli_error($db);
else
	echo "Istorija je obrisana";
  
?>