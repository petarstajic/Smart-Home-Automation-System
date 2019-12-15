<?php
include('pocetna.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
	
	if(isset($_SESSION['login_status'])){
	header("location: smarthomekor.php");
	} else
	{
		header("location: smarthome.php");
	}
}
		
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>Pametna kuća</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<link rel="stylesheet" href="css/style.css" type="text/css" />
<script type="text/javascript"></script>
</head>

<body>



<div class="login-form">
	<div class="front-face">
		<span class="text"><img src="images/login.png" width="140px"  ></span>
		<span class="loader"></span>
	</div>
	<form id="forma" action="" method="post">	
		<input type="text" name="korime" id="korime" placeholder="Korisničko ime" class="input" required="" oninvalid="this.setCustomValidity('Morate uneti korisnicko ime')" oninput="setCustomValidity('')">
		<input type="password" name="korloz" id="korloz" placeholder="Lozinka" class="input" required="" oninvalid="this.setCustomValidity('Morate uneti lozinku')" oninput="setCustomValidity('')">>
		<input type="submit" name="submit" value="Prijavite se"/><br>

	</form>
</div>
<span><?php echo $error; ?></span>

</body>
</html>





<script type="text/javascript">
$(document).ready(function(){
	$(".input").on("focus",function(){
		$(".login-form").addClass("focused");
	})
	
	
})
</script>