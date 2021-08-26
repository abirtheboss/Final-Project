<?php
	session_start();
	require_once('../../model/patient_model/usersModel.php');
	if(isset($_SESSION['flag'])){
		
		//show massasage if null value found
		if(isset($_REQUEST['msg'])){
		$msg=$_REQUEST['msg'];
		if($msg=='null')
		{
			echo "<h3 align='center'>"."null value found!<br>please fill up all information."."</h3>";
		}
		if($msg=='done')
		{
			echo "<h3 align='center'>"."Data Updated Successfully!"."</h3>";
		}
		}
		//get who logged in
		$id= $_REQUEST['id'];
		$user= getUserById($id);
		$username= $user['Username'];
?>



<html>
<head>
<title>
Manually Data Input
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
 
<form id="frm" method="post" onsubmit="return getDate()"  action="../../controller/patient_controller/checkManuallyDataInput.php?id=<?php echo $id;?>">
<h3>Insert your health test data to generate report</h3>
<table>

<tr style="font-size:20px;"> <td> Date </td> <td> <input id="date" type="date" name="date" style="width: 145px; height: 45px; border-radius: 10px; font-size:16px;" value="<?php if(isset($_REQUEST['date'])){echo $_REQUEST['date'];} ?>"></td> </tr>
<tr style="font-size:20px;"> <td> Body Temperature(F) </td> <td> <input class="txt" id="bodytem" type="number" name="bodytem"  max="115" style="width: 145px; height: 45px; border-radius: 10px;" value="<?php if(isset($_REQUEST['bodytem'])){echo $_REQUEST['bodytem'];} ?>"></td> </tr>
<tr style="font-size:20px;"> <td> Pulse Rate</td> <td> <input class="txt" id="pulserate" type="number" name="pulserate" max="200" style="width: 145px; height: 45px; border-radius: 10px;" value="<?php if(isset($_REQUEST['pulserate'])){echo $_REQUEST['pulserate'];} ?>"></td> </tr>
<tr style="font-size:20px;"> <td> Systolic/Upper Pressure</td> <td> <input class="txt" id="uprate" type="number" name="uprate" max="200" style="width: 145px; height: 45px; border-radius: 10px;" value="<?php if(isset($_REQUEST['uprate'])){echo $_REQUEST['uprate'];} ?>"></td> </tr>
<tr style="font-size:20px;"> <td> Diastolic/Lower Pressure </td> <td> <input class="txt" id="lowrate" type="number" name="lowrate"  max="200" style="width: 145px; height: 45px; border-radius: 10px;" value="<?php if(isset($_REQUEST['lowrate'])){echo $_REQUEST['lowrate'];} ?>"></td> </tr>
<tr style="font-size:20px;"> <td> Blood Sugar(mmol/L) </td><td> <input class="txt" id="bloodsugar" type="number" name="bloodsugar" max="40" style="width: 145px; height: 45px; border-radius: 10px;" value="<?php if(isset($_REQUEST['bloodsugar'])){echo $_REQUEST['bloodsugar'];} ?>"></td> </tr>
<tr > <td> <input id="btn" type="reset" name="reset" ></td> <td> <input id="btn" type="submit" name="submit" value="Calculate" ></td> </tr>
</table>
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
		
		var date = document.getElementById('date').value;
		var bodytem = document.getElementById('bodytem').value;
		var pulserate = document.getElementById('pulserate').value;
		var uprate = document.getElementById('uprate').value;
		uprate=parseInt(uprate);
		var lowrate = document.getElementById('lowrate').value;
		lowrate=parseInt(lowrate);
		var bloodsugar = document.getElementById('bloodsugar').value;
		
		var inputDate= new Date(date);

			if(inputDate != '' && bodytem !='' && pulserate !='' && uprate !='' && lowrate !='' && bloodsugar !=''){
				
				if( lowrate < uprate ){
					alert('Successful.');
					return true;
				}
				else{
					alert('invalid lower/upper pressure value');
					return false;
				}
				
			}else{
				alert('empty value found!');
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