<?php
	date_default_timezone_set("America/Argentina/Buenos_Aires");

	$conn = new mysqli("localhost","root","","testchk");

	$query = "SELECT * FROM users ORDER BY name ASC";
	$result = mysqli_query($conn, $query);
	$response='';

	while($row = mysqli_fetch_array($result)){
		$response = $response .
		"<tr>" .
		"<td class='text-success'>". $row["email"] . "</td>" . 
		"<td>" . "<input type='text' name='users[]' class='form-control' value='".$row['level']."' required='required'/>" . "</td>" .

		"<td>" . "<button class='btn btn-warning' name='update'><span class='glyphicon glyphicon-edit'></span> Actualizar</button>" . "</td>" .
		"<tr>";
		}
		if(!empty($response)) {
			print $response;
	}	

		if(ISSET($_POST['update'])){
		foreach($_POST['id'] as $key => $value){
			$users = $_POST['users'][$key];
			mysqli_query($conn, "UPDATE `users` SET `level` = '$users' WHERE `user_id` = '$value'") or die(mysqli_error());
		}
		
	}
?>