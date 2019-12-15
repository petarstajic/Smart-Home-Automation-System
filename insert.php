<?php

$ime=$_POST['ime'];
$prezime=$_POST['prezime'];
$mail=$_POST['email'];
$korime=$_POST['korime'];
$korloz=$_POST['korloz'];
$status=$_POST['status'];
$db=@mysqli_connect("localhost", "root", "", "users") or die ("Neuspela konekcija na bazu");
mysqli_query($db, "SET NAMES UTF8");

$query = "SELECT * FROM korisnici WHERE korime = '".$korime."'";
$result = mysqli_query($db,$query);

  if(mysqli_num_rows($result)>=1)
  {
      echo "Korisničko ime već postoji";
  }

  else
  {
   
  

$upis="INSERT INTO korisnici ( ime, prezime, mail, korime, korloz, status) VALUES ('$ime', '$prezime', '$mail', '$korime', '$korloz', '$status')";
mysqli_query($db,$upis);
if(mysqli_error($db))
	echo "Doslo je do greske<br>".mysqli_error($db);
else
	echo "Korisnik je uspesno dodat";

}
?>