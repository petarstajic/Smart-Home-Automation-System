<?php
include('session.php');
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
      <li class="active"><a href="smarthomekor.php">Prekidači</a></li>
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
    <input type="checkbox" name="relay1" id="relay1" checked <?php if ($prek1==$nula) echo 'disabled'; ?>>
	
			
	</p>
	
	
    <label class="naslovna" style="font-size: 20px" id="lbl2" for="relay2"><?php echo $p2; ?></label>
	<p style="height:30px">
    <input type="checkbox" name="relay2" id="relay2"checked <?php if ($prek2==$nula) echo 'disabled'; ?>>
	
	
	</p>
	
	
    <label id="lbl3" class="naslovna" style="font-size: 20px" for="relay3"><?php echo $p3; ?></label>
	<p style="height:30px">
    <input type="checkbox" name="relay3" id="relay3"checked <?php if ($prek3==$nula) echo 'disabled'; ?>>
			
	</p>
	
	
	
    <label id="lbl4" class="naslovna" style="font-size: 20px" for="relay4"><?php echo $p4; ?></label><br>
	<p style="height:30px">
    <input type="checkbox" name="relay4" id="relay4"checked <?php if ($prek4==$nula) echo 'disabled'; ?>>
			
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










 


</script>

</body>

</html>