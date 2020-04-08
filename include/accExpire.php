<?php
	date_default_timezone_set("America/Argentina/Buenos_Aires");

	$conn = new mysqli("localhost","root","","testchk");

	$query = "SELECT * FROM users WHERE expireAcc <= CURRENT_DATE AND level <= 4 && level >= 2";
	$result = mysqli_query($conn, $query);
	$response='';

	while($row = mysqli_fetch_array($result)){
		$response = $response .
		"<tr>" .
		"<td class='text-success'>". $row["email"] . "</td>" . 
		"<td>" . $row["level"]  . "</td>" .
		"<td class='c-accent'>" . $row["created"]  . "</td>" . 
		"<td class='text-danger'>" . $row["expireAcc"]  . "</td>" .
		"<tr>";
		}
		if(!empty($response)) {
			print $response;
	}	
?>