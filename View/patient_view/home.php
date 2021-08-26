<?php
	session_start();
	require_once('../../model/patient_model/usersModel.php');
	if(isset($_COOKIE['cflag'])){
		
		$id= $_REQUEST['id'];
		$user= getUserById($id);
		$username= $user['Username'];
?>



<html>
<head>
<title>
Home
</title>
</head>
<body>
<table width=100%>
<tr height="140px" align="right" >
<?php
		require_once('header.php');
	?>
</tr>
<tr height="430px">
<?php
		require_once('dashboard.php');
	?>
<td background="backPic/bgpic.jpeg" align="center"> <h1 style="color:red;">Welcome to Online Medical Service!</h1></td>
</tr>

</table>

<?php
		require_once('footer.php');
	?>

</body>
</html>


<?php
	
	}else{
		header('location: login.php');
	}
?>