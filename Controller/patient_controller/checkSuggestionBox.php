<?php
	session_start();

	if(isset($_POST['submit'])){

		$username= $_REQUEST['name'];
		$password= $_REQUEST['password'];
		$type= $_REQUEST['type'];
		
		$email=$_POST['email'];
		$suggestion=$_POST['suggestion'];

		if($email != '' && $suggestion !=''){
			$user= "\n".$username."|".$email."|". $suggestion;
			$file=fopen('suggestion.txt','a');
			fwrite($file, $user);
			fclose($file);
			
			header('location: ../view/suggestionBox.php?name='.$username.'&password='.$password.'&type='.$type.'&msg=done');
			
		}else{
			header('location: ../view/suggestionBox.php?name='.$username.'&password='.$password.'&type='.$type.'&msg=null');
		}
	}else{
		echo "invalid request...";
	}

?>