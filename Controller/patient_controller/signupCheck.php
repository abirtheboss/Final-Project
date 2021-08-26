<?php
	session_start();
	require_once('../../model/patient_model/usersModel.php');

	if(isset($_POST['submit'])){

		$username= $_POST['username'];
		$nid= $_POST['nid'];
		$email= $_POST['email'];
		$password= $_POST['password'];
		$type= "patient";
		$gender=$_POST['gender'];
		$dob=$_POST['dob'];
		

		if($username != '' && $nid !='' && $email != '' && $password != '' && $gender != '' && $dob != ''){
			$user=['username'=>$username, 'nid'=>$nid, 'email'=>$email, 'password'=>$password, 'gender'=>$gender, 'dob'=>$dob, 'type'=>$type];
			$status=insertUser($user);
			
			if($status){
				header('location: ../../view/patient_view/login.php');
				
			}
			else{
				header('location: ../../view/patient_view/signup.php?msg=error');
			}
		}else{
			header('location: ../../view/patient_view/signup.php?msg=null');
		}
	}else{
		echo "invalid request...";
	}

?>