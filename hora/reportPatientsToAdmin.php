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
 if(isset($_POST["dtar"])&& isset($_POST["dtar2"]))
{
	$datad = date("Y-m-d", strtotime($_POST["dtar"]));
	$datad2 = date("Y-m-d", strtotime($_POST["dtar2"]));
	//$doctorid=$_POST["docid"];
}
else
{
$datad = $datad2= date("Y-m-d");
}
    $resapp = mysql_query("SELECT * FROM treatedPatient WHERE date BETWEEN '$datad' AND '$datad2'");
	//SELECT * FROM `dt_tb` WHERE dt BETWEEN '2005-01-01' AND '2005-12-31'
?>
<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Clerk Panel</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
						<li><i class="icon_clock_alt"></i>Patient Information</li>
						<li><i class="fa fa-th-list"></i>Report Patients History</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Patients Treatment Record
                          </header>
                          <form class="form-validate form-horizontal" method="post" action="reportPatientsToAdmin.php">
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
								 <!--<th><i class="icon_profile"></i> Doctor ID:</th>
								 <th>
								   <input class="form control" type ="text" name="docid" placeholder="Enter your ID"/>
								 </th>-->
                                 <th>
									<i class="icon_calendar"></i> <script src="datetimepicker_css.js"></script> Date :
									<input type="text" id="demo1" readonly="readonly" name="dtar" placeholder="Start Date"value=""/>
									<img src="img/cal.gif" alt="" width="21" height="22" style="cursor:pointer" onclick="javascript:NewCssCal ('demo1','ddMMyyyy','','','','','')" />
									<input type="text" id="demo2" readonly="readonly" name="dtar2" placeholder="Last Date"value=""/>
									<img src="img/cal.gif" alt="" width="21" height="22" style="cursor:pointer" onclick="javascript:NewCssCal ('demo2','ddMMyyyy','','','','','')" />
								 </th>
                                 <th><button class="btn btn-primary" type="submit" name="button">Search</button></th>
							  </tr>
							  <tr>
								<th><i class="icon_calendar"></i> Date : <?php  echo date("d-M-Y"); ?></th>
								<th></td>
							  </tr>
							</tbody>
						  </table>
						  </form>
						  <table class="table table-striped table-advance table-hover">
                            <tbody>
                              <tr>
  								 <!--<th><i class="icon_creditcard"></i> Appt No</th>-->
                                 <th><i class="icon_group"></i> Patients</th>
                                 <th><i class="icon_profile"></i> Doctor</th>
								 <th><i class="icon_calendar"></i> Date Treated</th>
                                 <th><i class="icon_clock_alt"></i> Time Treated</th>
                                 <!--<th><i class="icon_comment"></i> Comment</th>-->
                              </tr>
							  <?php
								while($row1 = mysql_fetch_array($resapp))
									{
							  ?>
							  <tr>
								<!--<td><?php //echo $row1["apptid"]; ?></td>-->
								<td><?php echo $row1["patid"];
									$respac = mysql_query("SELECT * FROM patientold where patid='$row1[patid]'");
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

								<td><?php echo date("d-m-Y", strtotime($row1["date"])); ?></td>
								<td><?php echo $row1["time"]; ?></td>
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
