<?php
	require_once('../../model/patient_model/usersModel.php');
	$id= $_REQUEST['id'];
	$did= $_POST['did'];
	$date=$_POST['date'];
	//$time=$_POST['time'];
	
	if($id!='' && $did!='' && $date!=''){
	$user=['id'=>$id, 'did'=>$did, 'date'=>$date];
	$status=insertAppointment($user);
	if($status){
		header('location: ../../view/patient_view/takeAppointment.php?id='.$id);
	}
	else{
		header('location: ../../view/patient_view/takeAppointment.php?id='.$id.'&msg=failed');
	}
	}
	else{
		header('location: ../../view/patient_view/takeAppointment.php?id='.$id.'&msg=null');
	}
	
?>