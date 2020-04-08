<?php 
if(!isset($_SESSION['logged_in'])){
	header('Location: index.php');
}
    if($_SESSION['level'] == "6"){ 
        echo 'BANNED'; }
        elseif ($_SESSION['level'] == "5"){ 
            echo "ADMIN";} 
        elseif ($_SESSION['level'] == "4"){ 
            echo "STAFF";} 
        elseif ($_SESSION['level'] == "3"){ 
            echo "VIP III";} 
        elseif ($_SESSION['level'] == "2"){ 
            echo "VIP II";} 
        elseif ($_SESSION['level'] == "1"){ 
            echo "VIP I";} 
        elseif ($_SESSION['level'] == "0"){ 
            echo "GRATIS";} 
            
?>