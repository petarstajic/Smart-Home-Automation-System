<?php

$db=@mysqli_connect("localhost", "root", "", "users") or die ("Neuspela konekcija na bazu");
mysqli_query($db, "SET NAMES UTF8");
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
$nula=1;

// SQL Query To Fetch Complete Information Of User
$upit="select korime from korisnici where korime='$user_check'";

$prek="select * from prekidaci";

$prekstat="select * from korisnici where korime='$user_check'";

$rez=mysqli_query($db, $upit);
$rezprek=mysqli_query($db, $prek);
$prekrez=mysqli_query($db, $prekstat);

$row = mysqli_fetch_assoc($rez);
$rowprek = mysqli_fetch_assoc($rezprek);
$rowprekrez = mysqli_fetch_assoc($prekrez);



$login_session =$row['korime'];
$p1=$rowprek['p1'];
$p2=$rowprek['p2'];
$p3=$rowprek['p3'];
$p4=$rowprek['p4'];

$prek1=$rowprekrez['pr1'];
$prek2=$rowprekrez['pr2'];
$prek3=$rowprekrez['pr3'];
$prek4=$rowprekrez['pr4'];




if(!isset($login_session)){
mysqli_close($db); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}

?>