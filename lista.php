<!DOCTYPE html>
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
<style>


table, td, th {
	border-collapse:separate; 
    border: 1px solid black;
    padding: 5px;
}

table {
    width: 100%;
    border-spacing: 10px;
	border:none;

}

td {
	background-color: rgba(255,255,255,0.7);
	border:none;
	border-radius: 5px;
}

th{
	background-color: rgba(204,0,0,0.7);
	border:none;
	border-radius: 5px;
	color: white;
	
}

th {text-align: left;}
td.broj{
	text-align:center;
	color:white;
}

</style>
</head>
<body>

<?php
$db=@mysqli_connect("localhost", "root", "", "users") or die ("Neuspela konekcija na bazu");

mysqli_select_db($db,"korisnici");
$ispis="SELECT * FROM korisnici";
$result = mysqli_query($db,$ispis);
$korisnik="Korisnik";

echo "<table>
<tr>
<th>Korisničko ime</th>
<th>Ime</th>
<th>Prezime</th>
<th>Email</th>
<th>Status</th>
<th colspan='4'>Pristup</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['korime'] . "</td>";
    echo "<td>" . $row['ime'] . "</td>";
    echo "<td>" . $row['prezime'] . "</td>";
    echo "<td>" . $row['mail'] . "</td>";
    echo "<td>" . $row['status'] . "</td>";
	if(strcmp($korisnik, $row['status']) == 0)
		{
			if($row['pr1']==0) echo "<td  class='broj' style='background-color:rgba(60, 179, 113, 0.9)'>&nbsp;</td>"; else echo "<td style='background-color:rgba(255, 0, 0, 0.8)'>&nbsp;</td>";
			if($row['pr2']==0) echo "<td  class='broj' style='background-color:rgba(60, 179, 113, 0.9)'>&nbsp;</td>"; else echo "<td style='background-color:rgba(255, 0, 0, 0.8)'>&nbsp;</td>";
			if($row['pr3']==0) echo "<td  class='broj' style='background-color:rgba(60, 179, 113, 0.9)'>&nbsp;</td>"; else echo "<td style='background-color:rgba(255, 0, 0, 0.8)'>&nbsp;</td>";
			if($row['pr4']==0) echo "<td  class='broj' style='background-color:rgba(60, 179, 113, 0.9)'>&nbsp;</td>"; else echo "<td style='background-color:rgba(255, 0, 0, 0.8)'>&nbsp;</td>";		
		}
	else{
		echo "<td colspan='4' style='background-color:rgba(60, 179, 113, 0.9)'></td>";
		}
    echo "</tr>";
	echo '<div id="txt"></div>';
}
echo "</table>";
mysqli_close($db);
?>
<script>
$(document).ready(function(){
    	$('td').css('color','red');

});
</script>

</body>
</html>

