<?php 
if(!isset($_SESSION['logged_in'])){
	header('Location: ../index.php');
}

    if($_SESSION['level'] == "5"){ 
        echo 'ADMIN'; }
        elseif ($_SESSION['level'] == "4"){ 
            echo "PAGA III";} 
        elseif ($_SESSION['level'] == "3"){ 
            echo "PAGA II";} 
        elseif ($_SESSION['level'] == "2"){ 
            echo "PAGA I";} 
        elseif ($_SESSION['level'] == "1"){ 
            echo "GRATUITA";} 
            
?>