<?php
 if(!isset($_SESSION['logged_in'])){
	header('Location: ../index.php');
}
$perm_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 
function generate_pass($input, $strength = 8) {
    $input_length = strlen($input);
    $random_pass = '';
    for($i = 0; $i < $strength; $i++) {
        $random_char = $input[mt_rand(0, $input_length - 1)];
        $random_pass .= $random_char;
    }
 
    return $random_pass;
}
 
 
$genPass1 = generate_pass($perm_chars, 8);
 
echo $genPass1;

?>