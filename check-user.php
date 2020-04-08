<?php
require_once 'config.php';
$db = new Cl_DBclass();


if( isset( $_POST['name'] ) && !empty($_POST['name'])){
	$name = $_POST['name'];
	$query = " SELECT count(name) cnt FROM users where name = '$name' ";
	$result = mysqli_query($db->con, $query);
	$data = mysqli_fetch_assoc($result);
	if($data['cnt'] > 0){
		echo 'false';
	}else{
		echo 'true';
	}
	exit;
}

if( isset( $_GET['name'] ) && !empty($_GET['name'])){
	$name = $_GET['name'];
	$query = " SELECT count(name) cnt FROM users where name = '$name' ";
	$result = mysqli_query($db->con, $query);
	$data = mysqli_fetch_assoc($result);
	if($data['cnt'] == 1){
		echo 'true';
	}else{
		echo 'false';
	}
	exit;
}
