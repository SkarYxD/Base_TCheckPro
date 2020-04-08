<?php
if(!isset($_SESSION['logged_in'])){
	header('Location: ../index.php');
}
$conn = new mysqli("localhost","root","","testchk");

$query = "SELECT * FROM users WHERE ( level = 4 or level = 5) ORDER BY user_id DESC limit 1";
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