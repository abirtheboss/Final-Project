<?php
	
	require_once('../../model/patient_model/usersModel.php');
	$id= $_REQUEST['id'];
	$date= $_POST['date'];
	$bodytem=$_POST['bodytem'];
	$pulserate=$_POST['pulserate'];
	$uprate=$_POST['uprate'];
	$lowrate=$_POST['lowrate'];
	$bloodsugar=$_POST['bloodsugar'];
	
	

	if( $date != '' && $bodytem !='' && $pulserate != '' && $uprate != '' && $lowrate != '' && $bloodsugar != ''){
		$user=['id'=>$id, 'date'=>$date, 'bodytem'=>$bodytem, 'pulserate'=>$pulserate, 'uprate'=>$uprate, 'lowrate'=>$lowrate, 'bloodsugar'=>$bloodsugar];
		$status=insertInput($user);
		
		if($status){
			header('location: ../../view/patient_view/manuallyDataInput.php?id='.$id);
		}
		else{
			echo "error";
		}
	}
	else{
		header('location: ../../view/patient_view/manuallyDataInput.php?id='.$id.'&msg=null');
	}
	
?>