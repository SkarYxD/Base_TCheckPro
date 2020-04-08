<?php
if(!isset($_SESSION['logged_in'])){
	header('Location: ../index.php');
}
$conn = new mysqli("localhost","root","","testchk");

$query = "SELECT * FROM users WHERE level = 6";
$result = mysqli_query($conn, $query);

$response='';

while($row=mysqli_fetch_array($result)) {
	$password = $row["password"];
	$response = $response .
	"<tr>" .  
	"<td>". $row["email"] . "</td>" .
	"<tr>";
}
if(!empty($response)) {
	print $response;
}
?>