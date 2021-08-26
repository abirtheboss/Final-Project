<?php
	require_once('../../model/patient_model/usersModel.php');
	
	$id= $_REQUEST['id'];
	
	$status=deleteInput($id);
	if($status){
		header('location:../../view/patient_view/viewData.php?id='.$id.'&msg=done');
	}
	else{
	
		header('location:../../view/patient_view/viewData.php?id='.$id.'&msg=error');
	}

?>