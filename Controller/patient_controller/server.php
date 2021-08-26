<?php
	
	require_once('../../model/patient_model/DB_config.php');
	header("Content-Type: application/json");
	$data = $_POST['mydata'];
	$mydata = json_decode($data);
	
	$conn = getConnection();
	$sql = "select fullname from drinfo where sl='$mydata'";
	$result = mysqli_query($conn, $sql);
	$user = mysqli_fetch_assoc($result);
	//echo $user;
	if($user){
		echo $user['fullname'];
	}
	else{
		echo "not found";
	}

?>
