<?php
	require_once('DB_config.php');
	
	function validate($username, $password){

		$conn = getConnection();
		$sql = "select * from login where username='{$username}' and password='{$password}'";
		$result = mysqli_query($conn, $sql);
		$user = mysqli_fetch_assoc($result);
		
		if($user){
			if($user['type']=='patient'){
				return 1;
			}
			else if($user['type']=='admin')
			{
				return 2;
			}
			else if($user['type']=='doctor')
			{
				return 3;
			}
			else if($user['type']=='pharmacy')
			{
				return 4;
			}
		}
		else{
			return false;
		}
	}
	//get user id from username and password
		function getUserID($username, $password){

		$conn = getConnection();
		$sql = "select * from login where username='{$username}' and password='{$password}'";
		$result = mysqli_query($conn, $sql);
		$user = mysqli_fetch_assoc($result);
		return $user['id'];
	}
	//from patientProfile table
	function getUserByID($id){

		$conn = getConnection();
		$sql = "select * from patientProfile where Id='{$id}'";
		$result = mysqli_query($conn, $sql);
		$user = mysqli_fetch_assoc($result);
		return $user;
	}
	//from input table
	function getInputByID($id){

		$conn = getConnection();
		$sql = "select * from input where id='{$id}'";
		$result = mysqli_query($conn, $sql);
		$user = mysqli_fetch_assoc($result);
		return $user;
	}
	//insert into appointment table
	function insertAppointment($user){
		$id=$user['id'];
		$did=$user['did'];
		$date=$user['date'];
		$status="not approved";
		
		$conn = getConnection();
		
		//insert into appointment table
		$sql="insert into appointment (id, doctorId, applyDate, status) values ( '$id', '$did', '$date', '$status')";
		$query=mysqli_query($conn, $sql);
		
		if($query){
			return true;
		}
		else{
			return false;
		}
	}
	
	//find appointment history by id
	function getAppointInfoById($id){
		$conn = getConnection();
		$sql = "select * from appointment where id='$id'";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($user = mysqli_fetch_assoc($result)){
			array_push($users, $user);
		}
		return $users;
	}
	//find suggestion by id
	function getSuggestionById($id){
		$conn = getConnection();
		$sql = "select * from suggestion where PatientId='$id'";
		$result = mysqli_query($conn, $sql);
		$info = [];

		while($user = mysqli_fetch_assoc($result)){
			array_push($info, $user);
		}
		return $info;
	}
	
	//delete appointment info by serial
		function deleteAppointmentBySerial($serial){
		$conn = getConnection();
		$sql = "delete from appointment where serial='$serial'";
		$query= mysqli_query($conn, $sql);
		
		if($query){
			return true;
		}
		else{
			return false;
		}
	}	
	
	
	
	//find doctor type
	function getAllUser($type){
		$conn = getConnection();
		$sql = "select * from drinfo where specialty='$type'";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($user = mysqli_fetch_assoc($result)){
			array_push($users, $user);
		}
		return $users;
	}

	//delete account
	function deleteUser($id){
		$conn = getConnection();
		$sql = "delete from patientProfile where id='$id'";
		$query= mysqli_query($conn, $sql);
		
		if($query){
			$sql_1 = "delete from login where id='$id'";
			$query_1= mysqli_query($conn, $sql_1);
		
			return true;
		}
		else{
			return false;
		}
	}
	//delete manually data input
	function deleteInput($id){
		$date= "";
		$bodytem= "";
		$pulserate= "";
		$uprate= "";
		$lowrate="";
		$bloodsugar="";
		
		
		$conn = getConnection();
		$sql = "update input set date='$date', bodytem='$bodytem', pulserate='$pulserate', uprate='$uprate', lowrate='$lowrate', bloodsugar='$bloodsugar' where id='$id'";
		$query= mysqli_query($conn, $sql);
		
		if($query){
			return true;
		}
		else{
			return false;
		}
	}

	//upadte patient info
	function updateUser($user){
		$id=$user['id'];
		$username=$user['username'];
		$nid= $user['nid'];
		$email= $user['email'];
		$password=$user['password'];
		$gender=$user['gender'];
		$dob=$user['dob'];
		
		
		
		$conn = getConnection();
		//update patientProfile table
		$sql = "update patientProfile set Username='$username', Nid='$nid', Email='$email', Password='$password', Gender='$gender', Dob='$dob' where id='$id'";
		$query= mysqli_query($conn, $sql);
		
		if($query){
			//return true;
			//update login table
			$sql_1 = "update login set username='$username', Password='$password' where id='$id'";
			$query_1= mysqli_query($conn, $sql_1);
			if($query_1){
				return true;
			}
		}
		else{
			return false;
		}
	}
	
	function insertUser($user){
		$username=$user['username'];
		$nid= $user['nid'];
		$email= $user['email'];
		$password=$user['password'];
		$gender=$user['gender'];
		$dob=$user['dob'];
		$type=$user['type'];
		
		$conn = getConnection();
		
		//insert into login table
		$sql="insert into login (username, password, type) values ( '$username', '$password', '$type')";
		$query=mysqli_query($conn, $sql);
		
		if($query){
			//track new id from login table
			$sql_1 = "select * from login where username='$username' and password='$password' and type='$type'";
			$result= mysqli_query($conn, $sql_1);
			$user = mysqli_fetch_assoc($result);
			//return $user;
			if($user){
				$id=$user['id'];
				//insert patient id and other info to patientProfile table
				$sql_2 = "insert into patientProfile(Id,Username,Nid,Email,Password,Gender,Dob,Type) values( '$id', '$username', '$nid', '$email', '$password', '$gender', '$dob', '$type')";
				$query_2= mysqli_query($conn, $sql_2);
				if($query_2){
					//insert patient id and other info to patientProfile table
					$sql_3 = "insert into input (id) values( '$id')";
					$query_3= mysqli_query($conn, $sql_3);
					if($query_3){
						return true;
					}
					else{
						return false;
					}
				}
				else{
					return false;
				}
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	//insert into input table
	function insertInput($user){
		$id=$user['id'];
		$date= $user['date'];
		$bodytem= $user['bodytem'];
		$pulserate=$user['pulserate'];
		$uprate=$user['uprate'];
		$lowrate=$user['lowrate'];
		$bloodsugar=$user['bloodsugar'];
		
		$conn = getConnection();
		
		//insert into input table
		$sql="update input set date='$date', bodytem='$bodytem', pulserate='$pulserate', uprate='$uprate', lowrate='$lowrate', bloodsugar='$bloodsugar' where id='$id'";
		$query=mysqli_query($conn, $sql);
		
		if($query){
			return true;
		}
		else{
			return false;
		}
	}
	
?>