<?php
	session_start();
	require_once('../../model/patient_model/usersModel.php');
	//for update value
	if(isset($_POST['update'])){
		
		$id= $_REQUEST['id'];
		$username= $_POST['username'];
		$nid= $_POST['nid'];
		$email= $_POST['email'];
		$password= $_POST['password'];
		$gender= $_POST['gender'];
		$dob= $_POST['date'];
		
		
		

		if($username != '' && $nid !='' && $email != '' && $password != '' && $gender != '' && $dob != ''){
			$user=['id'=>$id, 'username'=>$username, 'nid'=>$nid, 'email'=>$email, 'password'=>$password, 'gender'=>$gender, 'dob'=>$dob];
			$status=updateUser($user);
			if($status){
				header('location: ../../view/patient_view/profile.php?id='.$id);
			}
		}
		else{
			header('location: ../../view/patient_view/profile.php?id='.$id.'&msg=null');
		}
	}
	//for delete account 
	else if(isset($_POST['delete'])){
		
		$id= $_REQUEST['id'];
		$status=deleteUser($id);
		if($status)
		{
			header('location: ../../controller/patient_controller/logout.php');
		}
		else{
			echo"Account delete falied";
		}
		
	}
	else{
		echo "invalid request...";
	}

?>