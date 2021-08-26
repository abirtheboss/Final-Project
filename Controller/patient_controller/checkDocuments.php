<?php
	
	$id=$_REQUEST['id'];
	
	$filename=$_FILES['image']['name'];
	$filetype=$_FILES['image']['type'];
	$filetemp=$_FILES['image']['tmp_name'];
	$filesize=$_FILES['image']['size'];
	$ext=explode('.',$filename);

	$location='image/'.$filename;
	
	$ex=strtolower($ext[1]);
	
	if($ex=='png' || $ex=='jpeg' || $ex=='jpg' || $ex=='gif'){
		if(move_uploaded_file($filetemp, $location)){
		header('location: ../../view/patient_view/uploadDocuments.php?id='.$id.'&msg=done');
	}
	
	}
	else{
		header('location: ../../view/patient_view/uploadDocuments.php?id='.$id.'&msg=typeError');
	}

?>