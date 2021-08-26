<?php
	session_start();
	require_once('../../model/patient_model/usersModel.php');
	
	if(isset($_POST['submit'])){

		$username= $_POST['username'];
		$password= $_POST['password'];
		
		
		if($username != '' && $password != ''){
			$status=validate($username, $password);
			
			if($status==1){
				$id= getUserId($username, $password);
				
				$_SESSION['flag']='true';
				setcookie('cflag','true',time()+10000,'/');
				header('location: ../../view/patient_view/home.php?id='.$id);
				
			}
			else if($status==2){
				echo "admin interface";
			}
			else if($status==3){
				echo "Doctor interface";
			}
			else if($status==4){
				echo "pharmacy interface";
			}
			else{
				header('location: ../../view/patient_view/login.php?msg=wrong');
			}
		}
			else{
				header('location: ../../view/patient_view/login.php?msg=null');
				}
		}
	else{
		echo "invalid request...";
	}

?>