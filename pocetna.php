<?php
session_start();
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['korime']) || empty($_POST['korloz'])) {
$error = "Username or Password is invalid";
}
else
{

	$korime=$_POST['korime'];
	$korloz=$_POST['korloz'];
	$korisnik="Korisnik";
	//treba da ide provera šta je korisnik uneo
	$db=@mysqli_connect("localhost", "root", "", "users") or die ("Neuspela konekcija na bazu");

	
	mysqli_query($db, "SET NAMES UTF8");
	$upit="SELECT * FROM korisnici WHERE korime='{$korime}' AND korloz='{$korloz}'";
	$status="SELECT status FROM korisnici WHERE korime='{$korime}' AND korloz='{$korloz}'";
	$rez=mysqli_query($db, $upit);
	$rezstatus=mysqli_query($db,$status);
	
	$row = mysqli_fetch_assoc($rezstatus);

	
	if(mysqli_num_rows($rez)==1)
	{
		if(strcmp($korisnik, $row['status']) == 0)
		{
		$_SESSION['login_status']=$row['status'];
		$_SESSION['login_user']=$korime; // Initializing Session
		header("location: smarthomekor.php"); // Redirecting To Other Page
		
		}else {
			$_SESSION['login_user']=$korime;
						// Initializing Session
			header("location: smarthome.php"); // Redirecting To Other Page
		}
		
		
		
			
		

	}  else {
		
		echo "<script type='text/javascript'>window.location='index.php'
			alert('Pogresno uneto korisnicko ime ili lozinka');</script>";
			exit();
		
}
mysqli_close($db); 
}
}

?>

