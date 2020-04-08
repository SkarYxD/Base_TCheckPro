<?php
if(!isset($_SESSION['logged_in'])){
	header('Location: ../index.php');
}
$conn = new mysqli("localhost","root","","testchk");

$query = "SELECT * FROM users WHERE ( level >= 0 OR level <= 3) ORDER BY created DESC limit 1";
$result = mysqli_query($conn, $query);

$response='';

while($row=mysqli_fetch_array($result)) {
	$response = $response . 
	"<span>". $row["created"] . "</span>";
}
if(!empty($response)) {
	print $response;
}
?>