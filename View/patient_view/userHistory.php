<?php
	session_start();
	require_once('../../model/patient_model/usersModel.php');
	if(isset($_SESSION['flag'])){
		
		if(isset($_REQUEST['msg'])){
			echo "<h3 align='center'>Delete Succesful</h3>";
		}
		
		
		$id= $_REQUEST['id'];
		$user= getUserById($id);
		$username= $user['Username'];
		
		//search appointment info
		$info = getAppointInfoById($id);
?>



<html>
<head>
<title>
User History
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
<td background="backPic/bgpic.jpeg"> 
<style>
#frm{
        width:600px;
        margin: 20px 200px;
        padding:30px;
        border-radius: 10px;
        box-shadow: 0px 0px 50px black;
        background-color: transparent; 
        color: #34495e;
      }
</style>
<form id="frm" method="post" action="">
<h3 align="center">See your Appointment History</h3>

		<table align="center" border="1" style="border-radius: 10px;">
			<tr align="center" style="width: 145px; height: 45px; font-size:20px;">
				<td>Doctor ID</td>
				<td>Requested Date</td>
				<td>Accepted Date</td>
				<td width="60px">Time</td>
				<td>Status</td>
				<td>Action</td>
			</tr>

			<?php  for($i=0; $i<count($info); $i++){ ?>
				<tr align="center" style="width: 145px; height: 45px; font-size:20px;">
					<td><?=$info[$i]['doctorId']?></td>
					<td><?=$info[$i]['applyDate']?></td>
					<td><?=$info[$i]['acceptDate']?></td>
					<td><?=$info[$i]['time']?></td>
					<td><?=$info[$i]['status']?></td>
					<td>
						<a style="text-decoration:none; color:white; background-color:red; padding:5px 5px; border-radius: 10px;"  href="../../controller/patient_controller/deleteUserHistory.php?id=<?=$info[$i]['id']?>&serial=<?=$info[$i]['serial']?>">Delete</a>
					</td>
				</tr>
			<?php } ?>
			
		</table>


</form>
</td>
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