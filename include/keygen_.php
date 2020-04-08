<?php
if(!isset($_SESSION['logged_in'])){
	header('Location: ../index.php');
}
$conn = new mysqli("localhost","root","","testchk");

$query = "SELECT * FROM tcp_key ORDER BY id_key ASC limit 10";
$result = mysqli_query($conn, $query);

$response='';

while($row=mysqli_fetch_array($result)) {
	/* Formate fecha */
	$fechaKeyCreada = $row["creado"];
	$fechaFormateada = date("d-m-Y", strtotime($fechaKeyCreada));


	$response = $response .
	"<tr>" .  
	"<td>". $row["id_key"] . "</td>" . "<td>". $row["tcpKey"] . "</td>" . 
	"<td>" . $row["admKey"]  . "</td>" . "<td>"  . $row["iplKey"]  . "</td>" .
	"<td>" . $fechaFormateada  . "</td>" .	"<td>". $row["recKey"]  . "</td>" .  
	"<tr>";
}
if(!empty($response)) {
	print $response;
}
?>