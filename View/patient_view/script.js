function AJAX(){
let did= document.getElementById('did').value;
	var data=JSON.stringify(did);
	const http = new XMLHttpRequest();
	http.open('POST', `../../controller/patient_controller/server.php`, true);
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.send(`mydata=${data}`);
	http.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			document.getElementById('result').innerHTML = this.responseText;
		}
	}
}