<?php
	session_start();
	require_once('../../model/patient_model/usersModel.php');
	if(isset($_SESSION['flag'])){
		//upload successful massage
		if(isset($_REQUEST['msg'])){
		$msg=$_REQUEST['msg'];
			
			if($msg=='typeError')
			{
				echo "<h3 align='center'>"."Failed!<br>Only .png/.jpg/.jpeg/.gif file are acceptable"."</h3>";
			}
		}
		//read who is logged in
		$id= $_REQUEST['id'];
		$user= getUserById($id);
		$username= $user['Username'];
		
?>



<html>
<head>
<title>
Upload Documents
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

<td background="backPic/bgpic.jpeg" valign="top"><br><br> 
<form id="frm" method="post" onsubmit="return validateImage()" action="../../controller/patient_controller/checkDocuments.php?id=<?php echo $id;?>" enctype="multipart/form-data">
<h2 align="middle">Upload your Presscription photos</h2>
<table align="center">
<tr> <td colspan="2" style=" height: 45px; font-size: 20px;"><input id="img" type="file" name="image" value="" style="font-size:20px;"> </td> </tr>
<tr>
<td style="font-size: 20px; color:red;" id="result"> </td>
 <td><input id="btn" type="submit" name="submit" value="Upload" > </td></tr>
<tr> <td><input id="btn" type="reset" name="reset" value="Reset"> </td> <td width="150px" align="right"><a Style="text-decoration:none; font-size: 16px; color:white; background-color:darkcyan; padding:5px 5px; border-radius: 10px;" href="../../controller/patient_controller/image">See Uploaded Photo </a></td></tr>
</table>
</form>
 </td>
</tr>

</table>
<?php
		require_once('footer.php');
	?>
	
<script type="text/javascript">
function validateImage() {
	let img=document.getElementById('img').value;
	
	if(img!=''){
	
    var formData = new FormData();
    var file = document.getElementById("img").files[0];
    formData.append("Filedata", file);
    var t = file.type.split('/').pop().toLowerCase();
	
    if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
        alert('Please select a valid image file');
        document.getElementById("img").value = '';
        return false;
    }
	else{
		alert('successful.');
		return true;
	}
	}
	else{
		//alert('null');
		document.getElementById('result').innerHTML = "Please choose the file."; 
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