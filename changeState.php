<?php 
$korime=$_SESSION['login_user'];
$db=@mysqli_connect("localhost", "root", "", "users") or die ("Neuspela konekcija na bazu");
		mysqli_query($db, "SET NAMES UTF8");
		session_start();
		$korime=$_SESSION['login_user'];
		$relej=$_POST['relayId'];
		
if(isset($_POST['clicked'])){

	if($_POST['clicked']  == 'true' ){
		
		$query = "INSERT INTO upali ( id, korisnik) VALUES ('$relej','$korime')";
		$result = mysqli_query($db,$query);
		
		// executing the command : sudo python relay_on.py id
		// where the id is the number of relay that we want to switch on/off
		exec("sudo python /home/pi/relay_on.py " . $_POST['relayId']);
		echo "true";
	}else{
		$queryi = "INSERT INTO ugasi ( id, korisnik) VALUES ('$relej','$korime')";
		$resulti = mysqli_query($db,$queryi);
		exec("sudo python /home/pi/relay_off.py " . $_POST['relayId']);
		echo "false";
	}
}
?>