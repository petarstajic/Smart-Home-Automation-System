<?php
$korimeb=$_POST['korimeb'];
$db=@mysqli_connect("localhost", "root", "", "users") or die ("Neuspela konekcija na bazu");
mysqli_query($db, "SET NAMES UTF8");

$query = "SELECT * FROM korisnici WHERE korime = '".$korimeb."'";
$result = mysqli_query($db,$query);

  if(mysqli_num_rows($result)==0)
  {
      echo "Korisničko ime ne postoji";
  }

  else
  {

$brisanje="DELETE FROM korisnici WHERE korime = '".$korimeb."' ";
mysqli_query($db, $brisanje);
if(mysqli_error($db))
	echo "Doslo je do greske<br>".mysqli_error($db);
else
	echo "Korisnik je obrisan";
  }
?>