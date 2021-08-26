<td style="background-color:#042331;" width="260px" valign="top">
<style>

.dsh-container{
            display: inline;
            position: relative;
			text-decoration: none;
        }
.dsh-content{
            
            position: absolute;
            top:40px;
            right: -260px;
            background-color: #042331;
            text-align: left;
            min-width: 260px;
            display: none;
			font-size:18;

        }
.dsh-content a{
            display: block;
            color: white;
            padding: 11px 30px;
            text-decoration: none;
        
        }
.dsh-content a:hover {
            background-color: #0066ff;
        }
.dsh-container:hover .dsh-content{
            display: inline;
        }

</style>


<div class="dsh-container">
<a style="text-decoration:none; color:white; font-size: 20px; background-color:orange; padding: 10px 86px; position:absolute;"href="#">Dashboard</a>
<div class="dsh-content">
<a href="profile.php?id=<?php echo $id;?>"> View Profile</a>
<a href="uploadDocuments.php?id=<?php echo $id;?>">Upload Documents</a>
<a href="userHistory.php?id=<?php echo $id;?>">User History</a>
<a href="manuallyDataInput.php?id=<?php echo $id;?>">Maniually Data Input</a>
<a href="viewData.php?id=<?php echo $id;?>">View Data</a>
<a href="searchDoctor.php?id=<?php echo $id;?>">Search doctor</a>
<a href="takeAppointment.php?id=<?php echo $id;?>">Take Apoinment</a>
<a href="suggestionBox.php?id=<?php echo $id;?>">Sugestion Box</a>
<a href="../../controller/patient_controller/logout.php?id=<?php echo $id;?>">Logout</a>
</div>
</div>

</td>