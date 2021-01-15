<!------- Modal Popup Start ------>
<div class="container" id="success" style=" z-index:10000; position:absolute;margin-top:-517px;display:none;">
<?php 
    
	$result = mysql_query("SELECT MAX(docid) FROM doctor");
	while($row = mysql_fetch_array($result))
		{
			$maxpatid = $row[0];
		}
	$docrec = mysql_query("SELECT * FROM doctor where docid ='$maxpatid'");
	while($row = mysql_fetch_array($docrec))
		
		{
    ?>
    <div class="divpop">
        
        <div class="navbar" style="width:815px; margin-left:1px;">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                     <a class="brand" href="#">Doctor</a>
                    
                </div><!-- /.container -->
            </div><!-- /.navbar-inner -->
        </div><!-- /.navbar -->  
        <table border="0" style="font-size:15px; height:300px; width:400px; margin-left:20px; margin-bottom:20px;">
            <tr>
                <tr><td>Doctors ID<td>:</td></td><td><?php echo "$row[docid]";?></td></tr>
                <tr><td>Full Name<td>:</td></td><td><?php echo "Dr. $row[doctorname]";?></td></tr>
                <tr><td>Qualification<td>:</td></td><td><?php  echo "$row[quali]";?></td></tr>
                <tr><td>Specialization<td>:</td></td><td><?php  echo "$row[specialistin]";?></td></tr>
                <tr><td>Contact No.</td><td>:<td><?php  echo "$row[contactno]";?></td></tr>
                <tr><td>E-Mail<td>:</td></td><td><?php  echo "$row[emailid]";?></td></tr>
            </tr>
        </table>
        <?php }?>
        <div class="modal-footer">
            <table style="">
                <td><td><a href="addDoctor.php" class="btn"><i class="icon-remove icon-black"></i>&nbsp;Close</a></td>
            </table>
        </div>
    </div> <!-- div pop end --->
</div>
<!-------- Modal Popup End --->