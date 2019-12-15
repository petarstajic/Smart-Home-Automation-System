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
$pali="SELECT * FROM upali where id='3'";
$gasi="SELECT * FROM ugasi where id='3'";
$resultp = mysqli_query($db,$pali);
$resultg = mysqli_query($db,$gasi);

echo "<table>
<tr>
<th>Vreme paljenja</th>
<th>Korisnik</th>
<th>Vreme gašenja</th>
<th>Korisnik</th>
</tr>";
while($rowp = mysqli_fetch_array($resultp)  and  $rowg = mysqli_fetch_array($resultg) ) {
    echo "<tr>";
    echo "<td>" . $rowp['vreme'] . "</td>";
    echo "<td>" . $rowp['korisnik'] . "</td>";
    echo "<td>" . $rowg['vreme'] . "</td>";
    echo "<td>" . $rowg['korisnik'] . "</td>";

	echo "</tr>";
	echo '<div id="txt"></div>';
}
echo "</table>";
mysqli_close($db);
?>


</body>
</html>

