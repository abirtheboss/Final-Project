
<?php
	
	session_start();
	//session_destroy();
	unset($_SESSION['flag']);
	setcookie('cflag', 'true', time()-10,'/');
	header('location: ../../view/patient_view/login.php');
?>