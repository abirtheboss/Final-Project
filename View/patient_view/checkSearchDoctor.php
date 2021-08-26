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
        width:600px;
        margin: 20px 180px;
        padding:20px;
        border-radius: 10px;
        box-shadow: 0px 0px 50px black;
        background-color: transparent; 
        color: #34495e;
      }
</style>

<form id="frm"> 
<p align="left"><a style=" text-decoration:none; font-size: 20px; color:white; background-color:darkcyan; padding:5px 5px; border-radius: 10px;" href="searchDoctor.php?id=<?php echo $id;?>">Back</a></p>
<table style="border-radius:10px;">
<tr align="middle" style="width: 145px; height: 45px; font-size:20px"> <td width="50px">ID</td><td width="130px">Name</td> <td width="150px" >Specialist Type</td> <td width="120px">Location</td> <td width="100px">Take</td> </tr>
<?php

	//searh doctor info
	if(isset($_POST['submit'])){
		
		$typeDoctor=$_POST['typeDoctor'];
		
			$users=getAllUser($typeDoctor);

			for($i=0; $i<count($users); $i++){
				$did=$users[$i]['sl'];
				echo "<tr align='middle' style='width: 145px; height: 45px; font-size:20px;'><td>".$users[$i]['sl']."</td> <td>". $users[$i]['fullname']."</td> <td>". $users[$i]['specialty']."</td> <td>". $users[$i]['address']."</td> <td>"."<a style='text-decoration:none; color:white; background-color:green; padding:5px 5px; border-radius: 10px;' href='takeAppointment.php?id=$id&did=$did'>Apointment</a>"."</td></tr>"."<br>";
			}
			
		
				
			/*if($found==false){
				header('location: ../..view/patient_view/searchDoctor.php?name='.$username.'&password='.$password.'&type='.$type.'&msg=null');
			}*/
				
		}
	else{
		echo "Invalid request";
	}

?>
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

