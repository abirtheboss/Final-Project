<?php
	require_once('../../model/patient_model/usersModel.php');
	$id= $_REQUEST['id'];
	$serial= $_REQUEST['serial'];
	
	$status=deleteAppointmentBySerial($serial);
	if($status){
		header('location: ../../view/patient_view/userHistory.php?id='.$id);
	}
	else{
		echo "error";
	}

?>