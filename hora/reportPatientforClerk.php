<?php include('head.php');?>
<?php include('session.php'); ?>
<?php include('dbconnection.php');?>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
<?php include("headerClerk.php");?>
      <!--header end-->

      <!--sidebar start-->
<?php include ("sidebarClerk.php");?>
      <!--sidebar end-->
	  
	  <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Clerk Panel</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="indexClerk.php">Home</a></li>
						<li><i class="fa fa-table"></i>Patients Information</li>
						<li><i class="fa fa-th-list"></i>Patient History</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Patient Treatement Record
                          </header>
						  <?php
							$resapp = mysql_query("SELECT * FROM patientold where patid='$_GET[paid]'");
							while($row11a = mysql_fetch_array($resapp))
								{
									$patientfname = $row11a["patfname"];
									$patlname = $row11a["patlname"];
								}
						  ?>
						  <br><p> &nbsp;&nbsp; &nbsp;&nbsp; Patient ID : <?php echo $_GET["paid"];?></p>
						  <p> &nbsp;&nbsp; &nbsp;&nbsp; First Name : <?php echo $patientfname;?></p>
						  <p> &nbsp;&nbsp; &nbsp;&nbsp; Last Name : <?php echo $patlname;?></p><br>
						  <p><strong>&nbsp;&nbsp; Patient Treattment History :</strong></p>
						<table class="table table-striped table-advance table-hover">
                            <tbody>
                              <tr>
								 <!--<th><i class="icon_info"></i> Treatement</th>-->
                                 <th><i class="icon_profile"></i> Doc Name</th>
								 <th><i class="icon_pencil"></i> Symptoms</th>
                                 <th><i class="icon_pencil"></i> Prescription</th>
								 <th><i class="icon_calendar"></i> Date</th>
                                 <th><i class="icon_clock"></i> Time</th>
                                 <!--<th><i class="icon_id"></i> Appointment ID</th>-->
                              </tr>
							  <?php
								$resapprec = mysql_query("SELECT * FROM treatedPatient where patid='$_GET[paid]'");
								while($row11b = mysql_fetch_array($resapprec))
									{
										
								?>
							  <tr>
								<!--<td><?php //echo $row1b["treid"]; ?></td>-->
								<td><?php echo $row11b["docid"]; 
									$respacdoc = mysql_query("SELECT * FROM doctor where docid='$row11b[docid]'");
									while($row26a = mysql_fetch_array($respacdoc))
										{
											echo " : ". $row26a["doctorname"];
										} 
									?> </td>
								<td><?php echo $row11b["symptoms"];?></td>
								<td><?php echo $row11b["prescription"];?></td>
								<td><?php echo date("d-m-Y", strtotime($row11b["date"])); ?></td>
								<td><?php echo $row11b["time"]; ?></td>
								<!--<td><?php //echo $row1b["appointid"]; ?></td>-->
							  </tr>
							  <?php
											}
								?>
							</tbody>
						</table>
								<br><p><strong>&nbsp;&nbsp; Laboratory Test :</strong></p>
						<table class="table table-striped table-advance table-hover">
                            <tbody>
                              <tr>
								 <th><i class="icon_id"></i> Test ID</th>
                                 <th><i class="icon_info"></i> Test Type</th>
                                 <th><i class="icon_pencil"></i> Test Result</th>
								 <th><i class="icon_calendar"></i> Date</th>
                                 <th><i class="icon_clock"></i> Time</th>
                                 <th><i class="icon_id"></i> Treatment ID</th>
                              </tr>		
							  <?php
								$kabrec= mysql_query("SELECT * FROM labtest where patid='$_GET[paid]'");
								while($rowlab = mysql_fetch_array($kabrec))
									{
							  ?>
							  <tr>
								<td><?php echo $rowlab["testid"];?></td>
								<td><?php 
									$respac = mysql_query("SELECT * FROM testtype where ttypeid ='$rowlab[ttypeid]'");
									while($row26 = mysql_fetch_array($respac))
										{
											echo  $row26["testtype"];
										} 
								?></td>
								<td><?php echo $rowlab["labfee"];?></td>
								<td><?php echo date("d-m-Y", strtotime($rowlab["date"])); ?></td>
								<td><?php echo $rowlab["time"]; ?></td>
								<td><?php echo $rowlab["treid"]; ?></td>
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
