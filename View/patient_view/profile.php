<?php
	session_start();
	require_once('../../model/patient_model/usersModel.php');
	if(isset($_SESSION['flag'])){
		
		if(isset($_REQUEST['msg'])){
		$msg=$_REQUEST['msg'];
			if($msg=='null')
			{
				echo "<h3 align='center'>"."Update failed."."<br>"."null value found!"."</h3>";
			}
			
		}
		$id= $_REQUEST['id'];
		$user= getUserById($id);
		$username= $user['Username'];
		
?>



<html>
<head>
<title>
Profile Information
</title>
</head>
<body>
<table width=100%>
<tr height="140px" align="right" >
<?php
		require_once('header.php');
	?>
</tr>
<tr height="">

<?php
		require_once('dashboard.php');
	?>

<td background="backPic/bgpic.jpeg">
<form id="frm" method="post" onSubmit="return getName()" action="../../controller/patient_controller/updateCheck.php?id=<?php echo $id;?>">
<fieldset style="border-radius:10px;">
<legend align="center" >EDIT PROFILE</legend>

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
<table>
<tr>
<td style="width: 145px; height: 45px; font-size: 20px;">Username</td> <td><input class="txt" id="name" type="text" name="username" value="<?php echo $user['Username']; ?>" maxlength="15"></td></tr>
<tr><td style="width: 145px; height: 45px; font-size: 20px;">NID</td><td> <input class="txt" id="nid" type="number" name="nid" value="<?php echo $user['Nid']; ?>"></td></tr>
<tr><td style="width: 145px; height: 45px; font-size: 20px;">Email</td><td> <input class="txt" id="email" type="email" name="email" value="<?php echo $user['Email']; ?>"></td></tr>
<tr><td style="width: 145px; height: 45px; font-size: 20px;">Password</td><td><input class="txt" id="password" type="text" name="password" value="<?php echo $user['Password']; ?>" ></td></tr>
<tr><td colspan="2">
	<fieldset style="font-size: 20px; border-radius: 10px;">
	<legend >Gender</legend>
	<input <?php if($user['Gender'] == 'Male'){echo "checked";}?> id="m" type="radio" name="gender" value="Male"> Male
	<input <?php if($user['Gender'] == 'Female'){echo "checked";}?> id="f"type="radio" name="gender" value="Femail"> Female
	<input <?php if($user['Gender'] == 'Other'){echo "checked";}?> id="o" type="radio" name="gender" value="Other"> Other
	</fieldset>
</td></tr>
<tr><td style="width: 145px; height: 45px; font-size: 20px;">Date of Birth</td><td> <input style="font-size:17px; width: 150px; height: 35px; border-radius:10px;" id="date" type="date" name="date"  value="<?php echo $user['Dob']; ?>"> </td></tr>
	<tr><td></td><td align="right"><input id="btn" type="submit" name="update" value="Update"></td>
	</tr>
	<tr><td><a align="center" style=" text-decoration:none; font-size: 20px; color:white; background-color:darkcyan; padding:5px 5px; border-radius: 10px;" href="home.php?id=<?php echo $id;?>">Home</a></td><td align="right"><input id="btn" type="submit" name="delete" value="Delete Account"></td></tr>
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
					alert('Successful');
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


<?php
			
	}else{
		header('location: login.php');
	}
?>