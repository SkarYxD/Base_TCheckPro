<?php
require_once 'config.php';
$db = new Cl_DBclass();


if( isset( $_POST['tcp_key'] ) && !empty($_POST['tcp_key'])){
	$tcp_key = $_POST['tcp_key'];
	$query = " SELECT count(tcp_key) cnt FROM users where tcp_key = '$tcp_key' ";
	$result = mysqli_query($db->con, $query);
	$data = mysqli_fetch_assoc($result);
	if($data['cnt'] > 0){
		echo 'false';
	}else{
		echo 'true';
	}
	exit;
}

if( isset( $_GET['tcp_key'] ) && !empty($_GET['tcp_key'])){
	$tcp_key = $_GET['tcp_key'];
	$query = " SELECT count(tcp_key) cnt FROM users where tcp_key = '$tcp_key' ";
	$result = mysqli_query($db->con, $query);
	$data = mysqli_fetch_assoc($result);
	if($data['cnt'] == 1){
		echo 'true';
	}else{
		echo 'false';
	}
	exit;
}
