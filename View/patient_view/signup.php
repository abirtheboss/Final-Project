
<?php
	
	if(isset($_REQUEST['msg'])){
		$msg=$_REQUEST['msg'];
		
		if($msg=='null')
		{
			echo "<h3 align='center'>"."Warning! null value found!<br>please fill all necearry iformation"."</h3>";
		}
		
		if($msg=='error')
		{
			echo "<h3 align='center'>"."Warning!<br>Signup error"."</h3>";
		}
	}
	//$valid=null;

?>



<!DOCTYPE html>
<html>
<head>
	<title>Signup Page</title>
	
</head>
<body>
<table border="1" width=100%>
<tr >
<td align="right" valign="center" style=" height:60px; background-color:darkcyan; padding: 1% 1%;"> <a href="login.php">
									<img src="backPic/pic.png" width="102px" height="100px" align="left"></a>
<a style=" position:absolute; right:50px; top:55px; color:white; border-radius: 10px; text-decoration:none; font-size:20px; padding:5px 10px; background-color:orange;" href="login.php">Login </a></td>

</tr>
<tr>
<style>
#frm{
        width:400px;
        margin: 20px 300px;
        padding:30px;
        border-radius: 10px;
        box-shadow: 0px 0px 50px black;
        background-color: transparent; 
        color: #34495e;
		font-size:20px;
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
<td align="center">
	

	<form id="frm" method="post" onSubmit="return getName()" action="../../controller/patient_controller/signupCheck.php">
		<fieldset style="border-radius:10px;">
			<legend  align="center" >Signup</legend>
			<table>
				<tr>
					<td ><b>Username</td>
					<td ><input class="txt" id="name" type="text" name="username" maxlength="10" value="<?php if (isset($_REQUEST['username'])){echo $_REQUEST['username'];} ?>"></td>
				</tr>
				<tr>
                    <td colspan=2><hr></td>
				</tr>
				<tr >
					<td><b>NID Number</td>
					<td><input class="txt" id="nid" type="number" name="nid" value="<?php if (isset($_REQUEST['nid'])){echo $_REQUEST['nid'];} ?>"></td>
				</tr>
				<tr>
                    <td colspan=2><hr></td>
				</tr>
				<tr >
					<td><b>Email</td>
					<td><input class="txt" id="email" type="email" name="email" value="<?php if (isset($_REQUEST['email'])){echo $_REQUEST['email']; }?>"></td>
				</tr>
				<tr>
                    <td colspan=2><hr></td>
				</tr>
				<tr>
					<td><b>Password</td>
					<td><input class="txt" id="password" type="password" name="password" max="10" value="<?php if (isset($_REQUEST['password'])){echo $_REQUEST['password']; }?>"></td>
				</tr>
				<tr>
                    <td colspan=2><hr></td>
				</tr>
				
				<tr>
                    <td colspan=2>
					<fieldset style="border-radius:10px;">
                    <legend><b>Gender</legend>
                    <input id="m" type="radio" name="gender" value="Male"> Male
					<input id="f"type="radio" name="gender" value="Femail"> Female
					<input id="o" type="radio" name="gender" value="Other"> Other
                    </fieldset>
                    </td>
				</tr>
				<tr>
                    <td colspan=2><hr></td>
				</tr>
				
				<tr>
                    <td colspan=2>
                    <fieldset style="border-radius:10px;">
                    <legend><b>Date Of Birth</legend>
                    <input style="font-size:17px; width: 150px; height: 45px; border-radius:10px;" id="date" type="date" name="dob" >
                    </fieldset>
                    </td>
                </tr>
				
				<tr>
                    <td colspan=2><hr></td>
				</tr>
				<tr align="center">
					
					<td colspan=2><br>
					<input id="btn" type="reset" name="reset" value="Reset" >
					<input id="btn" type="submit" name="submit" value="Signup"> 
					
					</td>
				</tr>
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
		//DOB
		function getDob(){
			let date = document.getElementById('date').value;
			
			let inputDate= new Date(date);
			let todayDate=new Date();
			
			if(date!==''){
				
				if(inputDate<todayDate){
					//alert('valid');
					return true;
				}
				else{
					alert('Date of Birth is invalid!');
					return false;
				}
				
			}else{
				alert('null value in Date of birth');
				return false;
			}
		}

		//gender
		function getGender(){

			if(document.getElementById('m').checked || document.getElementById('f').checked || document.getElementById('o').checked){
				//alert('Gender is selected');
				return getDob();
			}else{
				alert('Please Select "Gender"');
				return false;
			}
		}
		
		//password
		function getPass(){
		let password = document.getElementById('password').value;

			if(password != ''){
					if(password.length>4){
					//alert('Valid password');
					return getGender();
					}
					else{
						alert('Warning! Password should be more than 4 digit');
						return false;
					}
				
			}else{
				alert('Password is empty!');
				return false;
			}
			}
		//email
		function getEmail(){
			var mailformat = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			let email = document.getElementById('email').value;

			if(email != ''){
				if(email.match(mailformat)){
						return getPass();
					}
					else{
						alert('invalid Email');
						return false;
					}
			}else{
				alert('Email is empty!');
				return false;
			}
		}

		//nid
		function getNid(){
		let nid = document.getElementById('nid').value;

			if(nid != ''){
					if(nid.length==10){
					//alert('Valid name and nid');
					return getEmail();
					
					}
					else{
						alert('Warning! NID should be 10 digit');
						return false;
					}
				
			}else{
				alert('NID is empty!');
				return false;
			}
			}
		//name
		function getName(){
		let name = document.getElementById('name').value;

			if(name != ''){
					if((/[a-zA-Z]/).test(name.charAt(0))){
						return getNid();
					}
					else{
						alert('Warning! Username should be start with a letter');
						return false;
					}
				
			}else{
				alert('Username is empty!');
				return false;
			}
			}
</script>

</body>
</html>