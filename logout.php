<?php

function logoutUser(){
	unset($_SESSION['user']);
    unset($_SESSION['email']);
}
    
	logoutUser();
    header('Location: index.html');

?>

    