<?php
	session_start();
	require_once('../../model/patient_model/usersModel.php');
	if(isset($_SESSION['flag'])){
		
		
		//massage if not found after search
		if(isset($_REQUEST['msg'])){
			echo "<h3 align='middle'>No data found.</h3>";
		}
		
		//search who login
		$id= $_REQUEST['id'];
		$user= getUserById($id);
		$username= $user['Username'];
		
?>



<html>
<head>
<title>
Search Doctor
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
<form id="frm" method="post" action="checkSearchDoctor.php?id=<?php echo $id;?>">
<table>
<tr style="width: 145px; height: 45px; font-size:20px;"><td colspan="2">Select specialist</td></tr>
<tr style="width: 145px; height: 45px;">
<td><select id="type" name="typeDoctor" style="width: 145px; height: 45px; font-size:20px; border-radius: 10px;">
<option value="Bone">Bone</option>
<option value="Heart">Heart</option>
<option value="Mental health">Mental health</option>
<option value="Dentistry">Dentistry</option>
<option value="Surgery">Surgery</option>
</select></td>
<td><input id="btn" type="submit" name="submit" value="Search" ></td></tr>
<br>

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