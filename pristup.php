<?php
$korimep=$_POST['korimep'];
$chk1=$_POST['chk1'];
$chk2=$_POST['chk2'];
$chk3=$_POST['chk3'];
$chk4=$_POST['chk4'];
$korisnik="Korisnik";

$db=@mysqli_connect("localhost", "root", "", "users") or die ("Neuspela konekcija na bazu");
mysqli_query($db, "SET NAMES UTF8");

$query = "SELECT * FROM korisnici WHERE korime = '".$korimep."'";
$result = mysqli_query($db,$query);

	$status="SELECT status FROM korisnici WHERE korime='".$korimep."' ";
	$rezstatus=mysqli_query($db,$status);
	$row = mysqli_fetch_assoc($rezstatus);

if(mysqli_num_rows($result)==0)
  {
      echo "Korisničko ime ne postoji";
  }

  else if (strcmp($korisnik, $row['status']) !== 0)
		{
		
		echo "Izabrani korisnik je administrator";
		
		}else {

$pristup="UPDATE korisnici SET pr1='".$chk1."', pr2='".$chk2."', pr3='".$chk3."', pr4='".$chk4."'  WHERE korime = '".$korimep."'";
mysqli_query($db, $pristup);
if(mysqli_error($db))
	echo "Doslo je do greske<br>".mysqli_error($db);
else
	echo "Pristup korisniku je dodeljen";
  }
?>