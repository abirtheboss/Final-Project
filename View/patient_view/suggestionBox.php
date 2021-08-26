<?php
	session_start();
	require_once('../../model/patient_model/usersModel.php');
	if(isset($_SESSION['flag'])){
		
		if(isset($_REQUEST['msg'])){
			$msg=$_REQUEST['msg'];
			if($msg=='null')
			{
				echo "<h3 align='middle'>failed to send!<br>null value found </h3>";
			}
			if($msg=='done')
			{
				echo "<h3 align='middle'>Online order sent Succesfully! </h3>";
			}
		}
		//check who is logged in
		$id= $_REQUEST['id'];
		$user= getUserById($id);
		$username= $user['Username'];
		
		//search suggestion info by patient id
		$info = getSuggestionById($id);
?>



<html>
<head>
<title>
Sugesstion Box
</title>
</head>
<body>
<table width=100% >
<tr height="140px" align="right" >
<?php
		require_once('header.php');
?>
</tr>
<tr height="430px">
<?php
		require_once('dashboard.php');
	?>
<td background="backPic/bgpic.jpeg" align="center">

<style>
#frm{
        width:650px;
        margin: 20px 175px;
        padding:30px;
        border-radius: 10px;
        box-shadow: 0px 0px 50px black;
        background-color: transparent; 
        color: #34495e;
      }
</style>
 
<form id="frm">
<h3>Doctor's suggested medicine based on your problems</h3>
<table border="1" style="border-radius:10px;">
			<tr align="center" style="width: 145px; height: 45px; font-size:20px;">
				<td>Doctor ID</td>
				<td>Start Date</td>
				<td>Medicine Name</td>
				<td>Medicine Taking Time</td>
				<td>Time Period</td>
			</tr>

			<?php  for($i=0; $i<count($info); $i++){ ?>
				<tr align="center" style="width: 145px; height: 45px; font-size:20px;">
					<td><?=$info[$i]['did']?></td>
					<td><?=$info[$i]['date']?></td>
					<td><?=$info[$i]['medicineName']?></td>
					<td><?=$info[$i]['takingTime']?></td>
					<td><?=$info[$i]['timePeriod']?></td>
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