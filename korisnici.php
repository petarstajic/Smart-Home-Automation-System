
<?php
include('session.php');
if(isset($_SESSION['login_status'])){
	header("location: smarthomekor.php");
	}
?>

<html>
<head>
<meta charset="UTF-8" />
<!-- for mobile version -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="bootstrap.css" rel="stylesheet">
<link href="bootstrap-switch.css" rel="stylesheet">
<script src="jquery.min.js"></script>
<script src="bootstrap-switch.js"></script>
<script src="bootstrap.min.js"></script>
<script src="jquery.cookie.js"></script>
</head>


<body data-spy="scroll" data-target="#myScrollspy" data-offset="15">

<div class="container-fluid" style=" background-color: rgba(0,0,0,0.8); color:#fff; height:150px;">
  <div class="container"><img src="images/logo1.png" style="padding-top:15px; height:90%; opacity:0.8;"></div>

	
</div>
<nav class="navbar navbar-inverse" style="border-radius:0px">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand">

	  <?php echo "Korisnik: ".$login_session; ?>
	  
	  </a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="smarthome.php">Prekidači</a></li>
      <li class="active"><a href="korisnici.php">Korisnici</a></li>
	  <li ><a href="logout.php">Odjavi se</a></li>
    </ul>
  </div>
</nav>

<br>
<div class="container" style="background-color:rgba(255, 255, 255, 0.7); border-radius:20px; padding-bottom: 50px;">

<h3 class="naslovna" style="font-size: 40px">Upravljanje korisnicima</h3> <br> <br> 
<div>


<button type="button" class="btn btn-primary btn-lg btn-block"  data-toggle="collapse" data-target="#demo1">Dodaj korisnika</button>
  <div id="demo1" class="collapse" style="background-color: rgba(255, 99, 71, 0.5) ; margin-top: 20px; border-radius: 20px ; padding: 20px ;"> 
  <br>
  
  
  
  
  
    <form class="form-inline" id="myform">
   
      <label>Korisničko ime:</label><br>
      <input type="text" class="form-control" name="korime" id="korime" required="" oninvalid="this.setCustomValidity('Morate uneti korisnicko ime')" oninput="setCustomValidity('')" />
	  <br>
    
      <label>Lozinka:</label><br>
      <input type="password" class="form-control" name="korloz" id="korloz" required="" oninvalid="this.setCustomValidity('Morate uneti lozinku')" oninput="setCustomValidity('')" />
      <br>
  

      <label>Ime:</label><br>
      <input type="text" class="form-control" name="ime" id="ime" required="" oninvalid="this.setCustomValidity('Morate uneti ime')" oninput="setCustomValidity('')" />
	  <br>
	  
	  
      <label>Prezime:</label><br>
      <input type="text" class="form-control" name="prezime" id="prezime" required="" oninvalid="this.setCustomValidity('Morate uneti prezime')" oninput="setCustomValidity('')" />
	  <br>
	  
	  
      <label>Email:</label><br>
      <input type="text" class="form-control" name="email" id="email">
	  <br>
	  
	  
   	  <label>Status:</label><br>
      <select class="form-control " name="status" id="status" style="width:200px" >
		<option>Korisnik</option>
		<option>Administrator</option>
	  </select>
      <br>
	  <br>
	  
      <button type="submit" class="btn btn-primary" onsubmit="pozoviAJAXPOST()" >Potvrdi</button>
    </form>
</div>
</div>
<br>

<div>
<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="collapse" data-target="#demo2" >Izbriši korisnika</button>
  <div id="demo2" class="collapse" style="background-color: rgba(106, 90, 205, 0.5) ; margin-top: 20px; border-radius: 20px ; padding: 20px ;"> 
  <br>
     <form class="form-inline" id="brisanje">
    
      <label for="usr">Korisničko ime:</label><br>
      <input type="text" class="form-control" name="korimeb" id="korimeb" required="" oninvalid="this.setCustomValidity('Morate uneti korisničko ime')" oninput="setCustomValidity('')" />
	  
	  <button type="submit" class="btn btn-primary" onsubmit="pozoviAJAXPOSTBRISANJE()" >Potvrdi</button>
  </form>
  

        
  
  </div>

</div>

<br>

<div>
<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="collapse" data-target="#demo4" onclick="showUser()">Pristup</button>
   <div id="demo4" class="collapse" style="background-color: rgba(60, 179, 113, 0.5) ; margin-top: 20px; border-radius: 20px ; padding: 20px ">
		
	<form id="chkforma" class="form-inline">
	
	
	<label for="usr">Korisničko ime:</label><br>
      <input type="text" class="form-control" name="korimep" id="korimep" required="" oninvalid="this.setCustomValidity('Morate uneti korisničko ime')" oninput="setCustomValidity('')" />
	  <button type="submit" id="dugme" class="btn btn-primary" onsubmit="pozoviPRISTUP()" >Potvrdi</button>
	  <br>
	  
    <div class="checkbox ">
      <label style="font-size:15px"><input type="checkbox" name="chk1" id="chk1" style="transform: scale(2); margin:20px;" value="0"/><b><?php echo $p1; ?></b></label>
    </div>
	<br>
    <div class="checkbox">
      <label style="font-size:15px"><input type="checkbox" name="chk2" id="chk2" style="transform: scale(2); margin:20px;" value="0"/><b><?php echo $p2; ?></b></label>
    </div>
	<br>
    <div class="checkbox">
      <label style="font-size:15px"><input type="checkbox" name="chk3" id="chk3" style="transform: scale(2); margin:20px;" value="0"/><b><?php echo $p3; ?></b></label>
    </div>
	<br>
	<div class="checkbox">
      <label style="font-size:15px"><input type="checkbox" name="chk4" id="chk4" style="transform: scale(2); margin:20px;" value="0"/><b><?php echo $p4; ?></b></label>
    </div>
	<br>
	

  </form>
		
  </div>
</div>

<br>

<div>
<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="collapse" data-target="#demo3" onclick="showUser()">Lista korisnika</button>
   <div id="demo3" class="collapse" style="background-color: rgba(10, 17, 120, 0.5) ; margin-top: 20px; border-radius: 20px ; padding: 20px ; height: 300px">
		<div id="txtHint"></div>
  </div>
</div>

<br>

<div>
<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="collapse" data-target="#demo5" >Istorija</button>
   <div id="demo5" class="collapse" style="background-color: rgba(0, 10, 0, 0.5) ; margin-top: 20px; border-radius: 20px ; padding: 20px ">
		
		<div>
		<button type="button" class="btn btn-warning btn-lg btn-block" data-toggle="collapse" data-target="#demo6" onclick="showPREK1()" ><?php echo $p1; ?></button>
		<div id="demo6" class="collapse" style="background-color: rgba(0, 0, 200, 0.5) ; margin-top: 20px; border-radius: 20px ; padding: 20px ">
		<div id="txtHint1"></div>
		<button type="button" id="dugme1" name="dugme1"  class="btn btn-danger btn-block" onsubmit="brisiTABELU1()">Obriši tabelu</button>
  </div>
</div>
<br>
<div>
		<button type="button" class="btn btn-warning btn-lg btn-block" data-toggle="collapse" data-target="#demo7" onclick="showPREK2()" ><?php echo $p2; ?></button>
		<div id="demo7" class="collapse" style="background-color: rgba(0, 179, 0, 0.5) ; margin-top: 20px; border-radius: 20px ; padding: 20px ">
		<div id="txtHint2"></div>
		<button type="button" id="dugme2" name="dugme2"  class="btn btn-danger btn-block" onsubmit="brisiTABELU2()">Obriši tabelu</button>
  </div>
</div>
<br>
<div>
		<button type="button" class="btn btn-warning btn-lg btn-block" data-toggle="collapse" data-target="#demo8" onclick="showPREK3()" ><?php echo $p3; ?></button>
		<div id="demo8" class="collapse" style="background-color: rgba(120, 0, 113, 0.5) ; margin-top: 20px; border-radius: 20px ; padding: 20px ">
		<div id="txtHint3"></div>
		<button type="button" id="dugme3" name="dugme3"  class="btn btn-danger btn-block" onsubmit="brisiTABELU3()">Obriši tabelu</button>
  </div>
</div>
<br>
<div>
		<button type="button" class="btn btn-warning btn-lg btn-block" data-toggle="collapse" data-target="#demo9" onclick="showPREK4()" ><?php echo $p4; ?></button>
		<div id="demo9" class="collapse" style="background-color: rgba(60, 179, 113, 0.5) ; margin-top: 20px; border-radius: 20px ; padding: 20px ">
		
		<div id="txtHint4"></div>
		
		<button type="button" id="dugme4" name="dugme4"  class="btn btn-danger btn-block" onsubmit="brisiTABELU4()">Obriši tabelu</button>
		
  </div>
</div>
		
  </div>
</div>


</div>

<script>



$(document).ready(function(pozoviPRISTUP) {
  $("#chkforma").submit(function(e) {
  e.preventDefault();
 if ($('#chk1').is(":checked"))
{
   var chk1=1;
}

 if ($('#chk2').is(":checked"))
{
   var chk2=1;
}

 if ($('#chk3').is(":checked"))
{
   var chk3=1;
}

 if ($('#chk4').is(":checked"))
{
   var chk4=1;
}
 var korimep=document.getElementById('korimep').value;

 
 
 
 var xhttp = new XMLHttpRequest();
 xhttp.onreadystatechange = function() {
 if (xhttp.readyState == 4 && xhttp.status == 200) {
 alert(xhttp.responseText);
 }
 };
 xhttp.open("POST", "pristup.php", true);
 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 xhttp.send("&chk1=" + chk1 + "&chk2=" + chk2 + "&chk3=" + chk3 + "&chk4=" + chk4 + "&korimep=" + korimep);
 });
});







$(document).ready(function(pozoviAJAXPOST) {
  $("#myform").submit(function(e) {
  e.preventDefault();
 
 var korime=document.getElementById('korime').value;
 var korloz=document.getElementById('korloz').value;
 var ime=document.getElementById('ime').value;
 var prezime=document.getElementById('prezime').value;
 var email=document.getElementById('email').value;
 var status=document.getElementById('status').value;
 
 var xhttp = new XMLHttpRequest();
 xhttp.onreadystatechange = function() {
 if (xhttp.readyState == 4 && xhttp.status == 200) {
 alert(xhttp.responseText);
 }
 };
 xhttp.open("POST", "insert.php", true);
 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 xhttp.send("&korime=" + korime + "&korloz=" + korloz + "&ime=" + ime + "&prezime=" + prezime + "&email=" + email + "&status=" + status );
 });
});



function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } 
	
	else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } 
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","lista.php",true);
        xmlhttp.send();
    }
}











$(document).ready(function(pozoviAJAXPOSTBRISANJE) {
	$("#brisanje").submit(function(e) {
    e.preventDefault();
 var korimeb=document.getElementById('korimeb').value;

 
 var xhttp = new XMLHttpRequest();
 xhttp.onreadystatechange = function() {
 if (xhttp.readyState == 4 && xhttp.status == 200) {
 alert(xhttp.responseText);
 }
 };
 xhttp.open("POST", "delete.php", true);
 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 xhttp.send("&korimeb=" + korimeb );
});
});










$(document).ready(function(){
    	$('td').css('color','red');
  
});









function showPREK1(str) {
    if (str == "") {
        document.getElementById("txtHint1").innerHTML = "";
        return;
    } 
	
	else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } 
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint1").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","lista1.php",true);
        xmlhttp.send();
    }
}






function showPREK2(str) {
    if (str == "") {
        document.getElementById("txtHint2").innerHTML = "";
        return;
    } 
	
	else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } 
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint2").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","lista2.php",true);
        xmlhttp.send();
    }
}



function showPREK3(str) {
    if (str == "") {
        document.getElementById("txtHint3").innerHTML = "";
        return;
    } 
	
	else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } 
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint3").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","lista3.php",true);
        xmlhttp.send();
    }
}





function showPREK4(str) {
    if (str == "") {
        document.getElementById("txtHint4").innerHTML = "";
        return;
    } 
	
	else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } 
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint4").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","lista4.php",true);
        xmlhttp.send();
    }
}








$(document).ready(function(brisiTABELU1) {
	$("#dugme1").click(function(brisiTABELU1) {


 
 var xhttp = new XMLHttpRequest();
 xhttp.onreadystatechange = function() {
 if (xhttp.readyState == 4 && xhttp.status == 200) {
 alert(xhttp.responseText);
 }
 };
 xhttp.open("POST", "brisi1.php", true);
 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 xhttp.send();
});
});






$(document).ready(function(brisiTABELU2) {
	$("#dugme2").click(function(brisiTABELU2) {


 
 var xhttp = new XMLHttpRequest();
 xhttp.onreadystatechange = function() {
 if (xhttp.readyState == 4 && xhttp.status == 200) {
 alert(xhttp.responseText);
 }
 };
 xhttp.open("POST", "brisi2.php", true);
 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 xhttp.send();
});
});







$(document).ready(function(brisiTABELU3) {
	$("#dugme3").click(function(brisiTABELU3) {


 
 var xhttp = new XMLHttpRequest();
 xhttp.onreadystatechange = function() {
 if (xhttp.readyState == 4 && xhttp.status == 200) {
 alert(xhttp.responseText);
 }
 };
 xhttp.open("POST", "brisi3.php", true);
 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 xhttp.send();
});
});










$(document).ready(function(brisiTABELU4) {
	$("#dugme4").click(function(brisiTABELU4) {


 
 var xhttp = new XMLHttpRequest();
 xhttp.onreadystatechange = function() {
 if (xhttp.readyState == 4 && xhttp.status == 200) {
 alert(xhttp.responseText);
 }
 };
 xhttp.open("POST", "brisi4.php", true);
 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 xhttp.send();
});
});






</script>

</body>

</html>