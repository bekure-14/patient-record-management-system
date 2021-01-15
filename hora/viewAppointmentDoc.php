<?php include('head.php');?>
<?php include('session.php'); ?>
<?php include('dbconnection.php');?>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
<?php include("headerDoctor.php");?>
      <!--header end-->

      <!--sidebar start-->
<?php include ("sidebarDoctor.php");?>
      <!--sidebar end-->

<!-- ####################################################################################################### -->
<?php
$doctorid="";
	$doctorid=$_POST['docid'];
	$resapp = mysql_query("SELECT * FROM docappointment where docid='$doctorid'");
?>
<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Doctor Panel</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="indexDoctor.php">Home</a></li>
						<li><i class="icon_clock_alt"></i>Appointment</li>
						<li><i class="fa fa-th-list"></i> Doctors Appointment</li>
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
						  <div class="nav search-row" id="top_menu">
							<!--  search form start -->
							<ul class="nav top-menu">                    
								<li>
									<form class="navbar-form" method="post" action="">
										<input class="form-control" placeholder="Search by Doctor Id" type="number" name="docid" value="<?php echo $doctorid; ?>" />
										<button class="btn btn-primary" type="search" name="search">Search</button> 
									</form> <br>
								</li>                    
							</ul>
							<!--  search form end -->                
						  </div>
						  <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
								 <!--<th><i class="icon_creditcard"></i> Appt No</th>-->
                                 <th><i class="icon_group"></i> Patients</th>
                                 <th><i class="icon_profile"></i> Doctor</th>
								 <th><i class="icon_calendar"></i> Appt Date</th>
                                 <th><i class="icon_clock_alt"></i> Appt Time</th>
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
							  <?php
								while($row1 = mysql_fetch_array($resapp))
									{
							  ?>
							  <tr>
								<td><?php echo $row1["patid"]; 
									$respac = mysql_query("SELECT * FROM patientinfo where patid='$row1[patid]'");
									while($row26 = mysql_fetch_array($respac))
										{
											echo " : ". $row26["patfname"]." ".$row26["patmname"];
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
								<?php echo "<td>
									<a class='btn btn-success' href='treatPatients.php?patids=$row1[patid]&docid=$row1[docid]&tdate=$row1[adate]&ttime=$row1[atime]'>
									<i class='icon_check'></i> Treat</a></td>";
								?>
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