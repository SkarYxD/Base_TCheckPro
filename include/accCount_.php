<?php
if(!isset($_SESSION['logged_in'])){
	header('Location: ../index.php');
}
$conn = new mysqli("localhost","root","","testchk");

$query = "SELECT * FROM users ORDER BY user_id DESC limit 10";
$result = mysqli_query($conn, $query);

$response='';

while($row=mysqli_fetch_array($result)) {
	$response = $response .
	"<tr>" .  
	"<td>". $row["email"] . "</td>" . 
	"<td class='c-accent'>" . $row["key_tcp"]  . "</td>" . 
	"<td class='text-success'>" . $row["genBy"]  . "</td>" . 
	"<td>" . $row["level"]  . "</td>" . 
	"<tr>";
}
if(!empty($response)) {
	print $response;
}
?>