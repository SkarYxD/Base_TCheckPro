<?php
if(!isset($_SESSION['logged_in'])){
	header('Location: ../index.php');
}
$mysqli = new mysqli("localhost","root", "", "testchk");

$query = $mysqli->prepare("SELECT * FROM users WHERE ( level != 4 and level != 5) AND level != 6");
$query->execute();
$query->store_result();

$u_count = $query->num_rows;

echo $u_count;
?>