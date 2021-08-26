<?php
	session_start();
	require_once('../../model/patient_model/usersModel.php');
	if(isset($_SESSION['flag'])){
		
		if(isset($_REQUEST['msg'])){
		$msg=$_REQUEST['msg'];
			if($msg=='null')
			{
				echo "<h3 align='center'>"."failed...<br>NULL value found!"."</h3>";
			}
			if($msg=='failed')
			{
				echo "<h3 align='center'>"."failed...<br>Failed!"."</h3>";
			}
		}

		$id= $_REQUEST['id'];
		$user= getUserById($id);
		$username= $user['Username'];
		
?>



<html>
<head>
<title>
Take Appointment
</title>
<script type="text/javascript" src="script.js"></script>
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

<td background="backPic/bgpic.jpeg" align="center">

<style>
#frm{
        width:400px;
        margin: 20px 300px;
        padding:30px;
        border-radius: 10px;
        box-shadow: 0px 0px 50px black;
        background-color: transparent; 
        color: #34495e;
      }
#btn{
	width: 145px;
	height: 45px;
	border-radius:10px;
	cursor:pointer;
	background-color:#ddd;
	font-size: 20px;
}
#btn:hover{
        background-color: blue;
        color: white;
      }
.txt{
	width: 150px;
	height: 35px;
	font-size:20px;
	border-radius:10px;
}
</style>

<form id="frm" method="post" onsubmit="return getDid()" action="../../controller/patient_controller/checkTakeAppointment.php?name=<?php echo $id;?>">
<fieldset style="border-radius:10px;">
<legend align="center" style="width: 145px; height: 45px; font-size: 20px;">Doctor Appointment</legend>
<table>
<tr style="width: 145px; height: 45px; font-size: 20px;"> <td> Patient ID</td> <td> <input class="txt" type="number" name="id" max="500" value="<?php echo $id ?>" readonly="true"></td> </tr>
<tr style="width: 145px; height: 45px; font-size: 20px;"> <td> Doctor ID</td>
<td><input class="txt" type="number" id="did" name="did" value="<?php if (isset($_REQUEST['did'])){echo $_REQUEST['did']; }?>" onkeyup="AJAX()" /></td>
</tr>
<tr><td></td><td id="result" style= color:red> </td></tr>
<tr style="width: 145px; height: 45px; font-size: 20px;"> <td> Date</td> <td> <input style="width: 150px;height: 35px;font-size:17px;border-radius:10px;" id="date" type="date" name="date" value="" ></td> </tr>

<tr style="width: 145px; height: 45px; font-size: 20px;"> <td> <a style="text-decoration:none; color:white; background-color:darkcyan; padding:5px 5px; border-radius: 10px;" href="home.php?id=<?php echo $id;?>" > Home </a></td> <td> <input id="btn" type="submit" name="submit" value="submit"></td> </tr>
</table>
</fieldset>
</form>
</td>

</tr>

</table>

<?php
		require_once('footer.php');
	?>
<script>
		
		//date
		function getDate(){
			let date = document.getElementById('date').value;
			
			if(date!==''){
				alert('Appointment Request Sent Successfully.');
				return true;
			}else{
				alert('Date is not set.');
				return false;
			}
		}

		//did
		function getDid(){
		let did = document.getElementById('did').value;

			if(did != ''){
				//alert('successful');
				return getDate();
			}else{
				alert('Doctor ID is empty!');
				return false;
			}
			}
</script>

</body>
</html>


<?php
			
	}else{
		header('location: login.php');
	}
?>