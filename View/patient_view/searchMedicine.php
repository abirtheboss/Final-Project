<?php
	session_start();
	if(isset($_COOKIE['cflag'])){
		
		$username= $_REQUEST['name'];
		$password= $_REQUEST['password'];
		$type= $_REQUEST['type'];
		
		$file=fopen('../controller/user.txt','r');
		$found=false;
		while(!feof($file)){
			$data=fgets($file);
			$user=explode('|',$data);
						
			if(trim($user[0])==$username && trim($user[3])==$password && trim($user[4])==$type){
				$found=true;
				break;
			}
		}
		
?>



<html>
<head>
<title>
Search Medicine
</title>
</head>
<body>
<table border='1' width=100% bordercolor="green">
<tr height="140px" align="right" >
<td colspan="2" valign="middle"> <a href="home.php?name=<?php echo $username;?>&password=<?php echo $password;?>&type=<?php echo $type;?>">
								<img src="pic.PNG" width="240px" height="90px" align="left"></a>
								Logged in as <?php echo($user[0]); ?> | <a href="../controller/logout.php">Logout </a></td>
</tr>
<tr height="430px">
<td width="400px" valign="top">
<fieldset>
<legend>Dashboard</legend>

<ul>
<li><a href="profile.php?name=<?php echo $username;?>&password=<?php echo $password;?>&type=<?php echo $type;?>"> View Profile</a></li> <br>
<li><a href="uploadDocuments.php?name=<?php echo $username;?>&password=<?php echo $password;?>&type=<?php echo $type;?>">Upload Documents</a></li><br>
<li><a href="userHistory.php?name=<?php echo $username;?>&password=<?php echo $password;?>&type=<?php echo $type;?>">User History</a></li><br>
<li><a href="manuallyDataInput.php?name=<?php echo $username;?>&password=<?php echo $password;?>&type=<?php echo $type;?>">Maniually Data Input</a></li><br>
<li><a href="viewData.php?name=<?php echo $username;?>&password=<?php echo $password;?>&type=<?php echo $type;?>">View Data</a></li><br>
<li><a href="searchDoctor.php?name=<?php echo $username;?>&password=<?php echo $password;?>&type=<?php echo $type;?>">Search doctor</a></li><br>
<li><a href="takeAppointment.php?name=<?php echo $username;?>&password=<?php echo $password;?>&type=<?php echo $type;?>">Take Apoinment</a></li><br>
<li><a href="searchMedicine.php?name=<?php echo $username;?>&password=<?php echo $password;?>&type=<?php echo $type;?>">Search Medicine</a></li><br>
<li><a href="suggestionBox.php?name=<?php echo $username;?>&password=<?php echo $password;?>&type=<?php echo $type;?>">Sugestion Box</a></li><br>
<li><a href="../controller/logout.php?name=<?php echo $username;?>&password=<?php echo $password;?>&type=<?php echo $type;?>">Logout</a></li>
</ul>

</fieldset>
</td>
<td> 

<h3>Search Medicine</h3>
<form method="post" action="../controller/checkSearchDoctor.php?name=<?php echo $username;?>&password=<?php echo $password;?>&type=<?php echo $type;?>">
<select name="typeDoctor">
<option value="Bone">Bone</option>
<option value="Heart">Heart</option>
<option value="MentalHelth">Mental helth</option>
<option value="Dentistry">Dentistry</option>
<option value="Surgery">Surgery</option>
</select>
<input type="submit" name="submit" value="Search"><br>

</form>

</td>
</tr>

</table>

<hr>
<h4 align="center"> Coptright @2017</h4>

</body>
</html>


<?php
	
	}else{
		header('location: login.php');
	}
?>