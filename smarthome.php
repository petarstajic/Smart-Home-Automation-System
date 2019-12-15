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
      <li class="active"><a href="smarthome.php">Prekidači</a></li>
      <li><a href="korisnici.php">Korisnici</a></li>
	  <li><a href="logout.php">Odjavi se</a></li>
    </ul>
  </div>
</nav>

<br>
<div class="container" style="background-color:rgba(255, 255, 255, 0.7); border-radius:20px; padding-bottom: 50px;">

<h3 class="naslovna" style="font-size: 40px">Modul sa 4 prekidača</h3> <br> <br> 


<div>
	<div>
    <label class="naslovna" style="font-size: 20px" id="lbl1" for="relay1"><?php echo $p1; ?></label>
	<p style="height:30px">
    <input type="checkbox" name="relay1" id="relay1" checked >
	<button class="btn btn-primary" data-toggle="collapse" data-target="#demo1">Podešavanja</button>
	
		<div id="demo1" class="collapse" style="background-color: rgba(255, 99, 71, 0.5) ; border-radius: 20px ; padding: 20px ;">

	
		   
		<form class="form-inline" id="formprek1">
	<input type="text" class="form-control" id="p1" name="p1" placeholder="Promeni naziv prekidača"/>
	<button type="submit" id="dugpro1" type="button" class="btn btn-primary" onsubmit="promeniNAZIV1()">Potvrdi</button>
	</form>
	</div>
			
	</p>
	
	
    <label class="naslovna" style="font-size: 20px" id="lbl2" for="relay2"><?php echo $p2; ?></label>
	<p style="height:30px">
    <input type="checkbox" name="relay2" id="relay2"checked>
	<button class="btn btn-primary" data-toggle="collapse" data-target="#demo2">Podešavanja</button>
	
		<div id="demo2" class="collapse" style="background-color: rgba(106, 90, 205, 0.5) ; border-radius: 20px ; padding: 20px ;">
		
		
	
	   
		<form class="form-inline" id="formprek2">
	<input type="text" class="form-control" id="p2" name="p2" placeholder="Promeni naziv prekidača"/>
	<button type="submit" id="dugpro2" type="button" class="btn btn-primary" onsubmit="promeniNAZIV2()">Potvrdi</button>
	</form>
	</div>
	
	</p>
	
	
    <label id="lbl3" class="naslovna" style="font-size: 20px" for="relay3"><?php echo $p3; ?></label>
	<p style="height:30px">
    <input type="checkbox" name="relay3" id="relay3"checked>
	<button class="btn btn-primary" data-toggle="collapse" data-target="#demo3">Podešavanja</button>
	
		<div id="demo3" class="collapse" style="background-color: rgba(60, 179, 113, 0.5) ; border-radius: 20px ; padding: 20px ;">
			
		
	
	   
	<form class="form-inline" id="formprek3">
	<input type="text" class="form-control" id="p3" name="p3" placeholder="Promeni naziv prekidača"/>
	<button type="submit" id="dugpro3" type="button" class="btn btn-primary" onsubmit="promeniNAZIV3()">Potvrdi</button>
	</form>
	</div>
			
	</p>
	
	
	
    <label id="lbl4" class="naslovna" style="font-size: 20px" for="relay4"><?php echo $p4; ?></label><br>
	<p style="height:30px">
    <input type="checkbox" name="relay4" id="relay4"checked>
	<button class="btn btn-primary" data-toggle="collapse" data-target="#demo4">Podešavanja</button>
	
		<div id="demo4" class="collapse" style="background-color: rgba(255, 165, 0, 0.5) ; border-radius: 20px ; padding: 20px ;">
			
		   
	<form class="form-inline" id="formprek4">
	<input type="text" class="form-control" id="p4" name="p4" placeholder="Promeni naziv prekidača"/>
	<button type="submit" id="dugpro4" type="button" class="btn btn-primary" onsubmit="promeniNAZIV4()">Potvrdi</button>
	</form>
	</div>
			
	</p>
	
	


</div>


 <!--



<p>Relay 1 is  <span id="feedback1"></span> </p>

<p>Relay 2 is <span id="feedback2"></span> </p>

<p>Relay 3 is <span id="feedback3"></span> </p>

<p>Relay 4 is <span id="feedback4"></span> </p> 

-->
</div>
</div>

<script type="text/javascript">


//setting all buttons off state to be red color
$.fn.bootstrapSwitch.defaults.offColor="danger";



//inicalizing the switch buttons 
$("[name='relay1']").bootstrapSwitch();
$("[name='relay2']").bootstrapSwitch();
$("[name='relay3']").bootstrapSwitch();
$("[name='relay4']").bootstrapSwitch();



//this will be execute when the html is ready
$(document).ready(function(){

  //ajax request with post method (better to be GET)
  $.ajax({
    method: "POST",
    url: "firstCheck.php",
    data: {}
  })
  .done(function( msg ) {
    // we need to parse the responce 2 times 
    msg = JSON.parse(msg);
    msg = JSON.parse(msg);

    //for loop that is implemented for the feedback divs and buttons state
    for(var i = 0 ; i < 4; i++){

      // setting the feedback divs
      if(msg[i] == true){
        $("#feedback"+(i+1)).html("Turned On");
      }else{
        $("#feedback"+(i+1)).html("Turned Off");
      } 
      //setting the current button state
      $("[name='relay"+(i+1)+"']").bootstrapSwitch('state',msg[i]);
    } 
});



});






// making onclick event listener for the buttons 
$('input[name="relay1"],'+
  'input[name="relay2"],'+
  'input[name="relay3"],'+
  'input[name="relay4"]').on('switchChange.bootstrapSwitch', function(event, state) {

// checking whitch button is clicked
var relayID = event.target.id.substring(event.target.id.length - 1);




//ajax POST request
$.ajax({
  method: "POST",
  url: "changeState.php",
  data: { clicked :state , relayId:relayID}
})
  .done(function( msg ) {
  // changing the feedback paragraphs
  if(msg == "true"){
    $("#feedback"+(relayID)).html("Turned On");
  }else{
    $("#feedback"+(relayID)).html("Turned Off");
  } 

  });


});


$(document).ready(function(){
 
    $("#dugpro1").click(function(){
    	$('#lbl1').html($('#p1').val());
    });
});

$(document).ready(function(){
 
    $("#dugpro2").click(function(){
    	$('#lbl2').html($('#p2').val());
    });
});

$(document).ready(function(){
 
    $("#dugpro3").click(function(){
    	$('#lbl3').html($('#p3').val());
    });
});

$(document).ready(function(){
 
    $("#dugpro4").click(function(){
    	$('#lbl4').html($('#p4').val());
    });
});





$(document).ready(function(promeniNAZIV1) {
	$("#formprek1").submit(function(e) {
    e.preventDefault();
 var p1=document.getElementById('p1').value;

 
 var xhttp = new XMLHttpRequest();

 xhttp.open("POST", "promeninaziv1.php", true);
 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 xhttp.send("&p1=" + p1 );
});
});





$(document).ready(function(promeniNAZIV2) {
	$("#formprek2").submit(function(e) {
    e.preventDefault();
 var p2=document.getElementById('p2').value;

 
 var xhttp = new XMLHttpRequest();

 xhttp.open("POST", "promeninaziv2.php", true);
 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 xhttp.send("&p2=" + p2 );
});
});




$(document).ready(function(promeniNAZIV3) {
	$("#formprek3").submit(function(e) {
    e.preventDefault();
 var p3=document.getElementById('p3').value;

 
 var xhttp = new XMLHttpRequest();

 xhttp.open("POST", "promeninaziv3.php", true);
 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 xhttp.send("&p3=" + p3 );
});
});





$(document).ready(function(promeniNAZIV4) {
	$("#formprek4").submit(function(e) {
    e.preventDefault();
 var p4=document.getElementById('p4').value;

 
 var xhttp = new XMLHttpRequest();

 xhttp.open("POST", "promeninaziv4.php", true);
 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 xhttp.send("&p4=" + p4 );
});
});


 


</script>

</body>

</html>