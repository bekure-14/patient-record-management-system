<?php include('head.php');?>
<?php include('session.php'); ?>
<?php include("dbconnection.php");?>

<?php
$patientid1="";
if(isset($_POST["search"]))
{
	$patientid1=$_POST["patientid"];
$resapp = mysql_query("SELECT * FROM patientold where patid='$patientid1'");
}
else
{
	$resapp = mysql_query("SELECT * FROM patientold");
}
?>
  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
<?php include("headerDoctor.php");?>
      <!--header end-->

      <!--sidebar start-->
<?php include ("sidebarDoctor.php");?>
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Doctor Panel</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
						<li><i class="fa fa-table"></i>Patients Information</li>
						<li><i class="fa fa-th-list"></i>All Patients/By Patient Id</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Patients Record
                          </header>
                          <div class="nav search-row" id="top_menu">
							<!--  search form start -->
							<ul class="nav top-menu">                    
								<li>
									<form class="navbar-form" method="post" action="">
										<input class="form-control" placeholder="Search by Patient Id" type="text" name="patientid" value="<?php echo $patientid1; ?>" />
										<button class="btn btn-primary" type="submit" name="search">Search</button>
									</form><br>
								</li>                    
							</ul>
							<!--  search form end -->                
						  </div>
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
								 <th><i class="icon_id"></i> Patient ID</th>
                                 <th><i class="icon_profile"></i> Patient Name</th>
                                 <th><i class="icon_calendar"></i> Date of Birth</th>
								 <th><i class="icon_heart"></i> Gender</th>
                                 <th><i class="icon_contacts"></i> Address</th>
                                 <th><i class="icon_mobile"></i> Contact No.</th>
								 <th><i class="icon_info"></i> Status</th>
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
<?php
    while($row1 = mysql_fetch_array($resapp))
		{
?>
                              <tr>
                                 <td><?php echo $row1["patid"]; ?></td>
                                 <td><?php echo $row1["patfname"]. " ".$row1["patmname"]." ".$row1["patlname"]; ?> </td>
                                 <td><?php echo $row1["dob"]; ?></td>
								 <td><?php echo $row1["gender"]; ?></td>
								 <td><?php echo $row1["address"]; ?></td>
                                 <td><?php echo $row1["contactno"]; ?></td>
								 <td><?php echo $row1["status"]; ?></td>
                                 <td>
                                  <div class="btn-group">
									  <a class="btn btn-primary" href="reportPatientforDoc.php?paid=<?php echo $row1["patid"]; ?>"><i class="icon_book"></i></a>
                                  </div>
                                 </td>
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
