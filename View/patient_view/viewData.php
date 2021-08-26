<?php
	session_start();
	require_once('../../model/patient_model/usersModel.php');
	if(isset($_SESSION['flag'])){
		//show delete massage
		if(isset($_REQUEST['msg']))
		{
			$msg=$_REQUEST['msg'];
			if($msg=='error'){
				echo "<h3 align='middle'>"." Delete failed"."</h3>";
			}

		}
		
		
		$id= $_REQUEST['id'];
		$user= getUserById($id);
		$username= $user['Username'];
		
		$tem="";
		$rate="";
		$pressure="";
		$bloodsugar="";
		

		$user=getInputById($id);
		
		if($user['bodytem']!=''){
		
		if($user['bodytem']>99){
			$tem="temperatur High; Symptoms of Fever";
		}
		else{
			$tem="Normal";
		}
		
		if($user['pulserate']>=60 && $user['pulserate']<=100){
			$rate="Normal";
		}
		if($user['pulserate']>100){
			$rate="High; Symptoms of shortness of breath";
		}
		if($user['pulserate']<60){
			$rate="Very low; Feeling weak; Shortage of Oxigen";
		}
		if($user['uprate']<=125 && $user['lowrate']<=95){
			$pressure="normal";
		}
		if($user['uprate']>125){
			$pressure="High Pressure";
		}
		if($user['lowrate']<70){
			$pressure="Low Pressure";
		}
		if($user['bloodsugar']>=4 && $user['bloodsugar']<=7){
			$bloodsugar="Normal";
		}
		if($user['bloodsugar']>7){
			$bloodsugar="High; Diabetes found";
		}
		if($user['bloodsugar']<4){
			$bloodsugar="Low; Disrupted glucose supply";
		}
		}

?>



<html>
<head>
<title>
View Data
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
</style>
 
<form id="frm" method="post" action="../../controller/patient_controller/deleteViewData.php?id=<?php echo $id;?>">
<h3>Current Health Report</h3>
<table style="border-radius: 10px;">
<tr style="width: 145px; height: 45px;"> <td width="180px"> Measurement Date: </td> <td width="150px"> <?php if($user['bodytem']!=''){ echo $user['date'];} else{echo "";} ?> </td> <td > Report </td> </tr>
<tr style="width: 145px; height: 45px;"> <td> Body Temperature: </td> <td> <?php if($user['bodytem']!=''){ echo $user['bodytem'];} else{echo "";} ?> </td> <td > <?php echo $tem; ?> </td> </tr>
<tr style="width: 145px; height: 45px;"> <td> Pulse Rate: </td> <td> <?php if($user['pulserate']!=''){ echo $user['pulserate'];} else{echo "";} ?> </td> <td > <?php echo $rate; ?> </td> </tr>
<tr style="width: 145px; height: 45px;"> <td> Upper Pressure: </td> <td> <?php if($user['uprate']!=''){ echo $user['uprate'];} else{echo "";} ?> </td> <td rowspan="2"> <?php echo $pressure; ?> </td> </tr>
<tr style="width: 145px; height: 45px;"> <td> Lower Pressure: </td> <td> <?php if($user['lowrate']!=''){ echo $user['lowrate'];} else{echo "";} ?> </td> </tr>
<tr style="width: 145px; height: 45px;"> <td> blood Sugar: </td> <td> <?php if($user['bloodsugar']!=''){ echo $user['bloodsugar'];} else{echo "";} ?> </td> <td > <?php echo $bloodsugar; ?> </td> </tr>
<tr style="width: 145px; height: 45px;"><td colspan="3" align="right"><input id="btn" type="submit" name="submit" value="Delete data"></td> </tr>
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