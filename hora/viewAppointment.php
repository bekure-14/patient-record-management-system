<?php include('head.php');?>
<?php include('session.php'); ?>
<?php include('dbconnection.php');?>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
<?php include("headerAll.php");?>
      <!--header end-->

      <!--sidebar start-->
<?php include ("sidebarAdmin.php");?>
      <!--sidebar end-->

<!-- ####################################################################################################### -->
<?php
$dnames=$datad="";
 if(isset($_POST["dtar"]))
{
	$datad = date("Y-m-d", strtotime($_POST["dtar"]));
}
else
{
$datad = date("Y-m-d");
}
    $resapp = mysql_query("SELECT * FROM docappointment where adate ='$datad' AND docid='$_POST[dname]'");
?>

<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Admin Panel</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
						<li><i class="icon_clock_alt"></i>Appointment</li>
						<li><i class="fa fa-th-list"></i>Appointment by Doctor</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Doctors Appointment Record
                          </header>
                          <form class="form-validate form-horizontal" method="post" action="viewAppointment.php">
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
								 <th><i class="icon_profile"></i> Doctor Name:</th>
								 <th><?php
										$resdcapp = mysql_query("SELECT * FROM doctor");
									?>
									<!--<div class="col-lg-8">-->
										<select class="form-control" name="dname" value="">
											<?php
												while($row26z = mysql_fetch_array($resdcapp))
													{
														echo  "<option value='$row26z[docid]'>$row26z[doctorname]</option>";
													}
											?>   
										</select>
									<!--</div>-->
								 </th>
                                 <th>
									<i class="icon_calendar"></i> <script src="datetimepicker_css.js"></script> Date :
									<input type="text" id="demo1" readonly="readonly" name="dtar" placeholder="Appointment Date" value=""/>
									<img src="img/cal.gif" alt="" width="21" height="22" style="cursor:pointer" onclick="javascript:NewCssCal ('demo1','ddMMyyyy','','','','','')" />
								 </th>
                                 <th><button class="btn btn-primary" type="submit" name="button">Search</button></th>
							  </tr>
							  <tr>
								<th><i class="icon_calendar"></i> Date :</th>
								<th><?php  echo date("d-M-Y", strtotime($datad)); ?></td>
							  </tr>
							</tbody>
						  </table>
						  </form>
						  <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
								 <th><i class="icon_creditcard"></i> Appt No</th>
                                 <th><i class="icon_group"></i> Patients</th>
                                 <th><i class="icon_profile"></i> Doctor</th>
								 <th><i class="icon_calendar"></i> Date</th>
                                 <th><i class="icon_clock_alt"></i> Appt Time</th>
                                 <!--<th><i class="icon_comment"></i> Comment</th>-->
                              </tr>
							  <?php
								while($row1 = mysql_fetch_array($resapp))
									{
							  ?>
							  <tr>
								<td><?php echo $row1["apptid"]; ?></td>
								<td><?php echo $row1["patid"]; 
									$respac = mysql_query("SELECT * FROM patientinfo where patid='$row1[patid]'");
									while($row26 = mysql_fetch_array($respac))
										{
											echo " : ". $row26["patfname"];
										} 
									?></td>
           
								<td><?php echo $row1["docid"]; 
									$respacdoc = mysql_query("SELECT * FROM doctor where docid='$row1[docid]'");
									while($row26a = mysql_fetch_array($respacdoc))
										{
											echo " : ". $row26a["doctorname"];
										} 
									?></td>
          
								<td><?php echo date("d-m-Y", strtotime($row1["adate"])); ?></td>
								<td><?php echo $row1["atime"]; ?></td>
								<!--<td><?php //echo $row1["comment"]; ?></td>-->
							  </tr>
						<?php
						}
						?>                 
                           </tbody>
                        </table>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->
  <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nicescroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
  </body>
</html>