<?php
	if(isset($_REQUEST['msg'])){
		$msg=$_REQUEST['msg'];
		if($msg=='wrong'){
			echo "<h3 align='center'>"."Wrong username or password"."</h3>";
		}
		if($msg=='null'){
			echo "<h3 align='center'>"."Null value found"."</h3>";
		}
	}
?>

<!DOCTYPE html>
<head>
<title>
Login
</title>
</head>
<body Background="backPic/login.jpg">
<table border="1" width=30% align="center">
<tr height="140px" align="center">
<td > <h1>Medical Service</h1> </td>
</tr>
<tr height="340px">
<td> 


<form method="post" action="../../controller/patient_controller/loginCheck.php">
			<fieldset>
				<legend>Login</legend>
				<table align="center" width="100%" height="200px">
					<tr align="center">
						<td><h3>Username</h3></td>
						<td><input type="text" name="username" style="width: 145px; height: 35px;" placeholder="Username"></td>
					</tr>
					<tr align="center">
						<td><h3>Password<h3></td>
						<td><input type="password" name="password" style="width: 145px; height: 35px;" placeholder="Password"></td>
					</tr>

					<tr align="center">
						<td></td>
						<td><input type="submit" name="submit" value="Submit" style="width: 145px; height: 45px;"></td>
					</tr>
					<tr align="center">
					<td></td>
					<td> <hr> New here? <br><a href="signup.php">Signup</a></td>
					</tr>
				</table>
			</fieldset>
		</form>
</td>
</tr>
</table>
<br>
<br>
<br>
<br>
<br>

<hr>
<p align="center">Copyright @ 2021</p>
</body>
</html>