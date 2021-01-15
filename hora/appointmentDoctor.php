<?php 
include("head.php");
include("dbconnection.php");
include('session.php'); 
if(isset($_GET["docid"]))
{
	$_SESSION["appdocid"] = $_GET["docid"]; 
	$_SESSION["appdocname"] = $_GET["docname"];
	$_SESSION["appdocsptype"] = $_GET["sptype"];
	//header("Location: createAppointment.php?apptaken=yes");
}
?>
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
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
						<li><i class="icon_calendar"></i>Appointment</li>
						<li><i class="fa fa-th-list"></i>Create Appointment</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                               Create Appointment with a Doctor
                          </header>
						<table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
								 <th><i class="icon_profile"></i> Doctor Name</th>
                                 <th><i class="icon_genius"></i> Specialist Of</th>
                                 <th><i class="icon_clock"></i> Timings</th>
								 <th><i class="icon_calendar"></i> Make Appointment</th>
                              </tr>   
				<?php 
			    $result = mysql_query("SELECT * FROM doctor");
				while($row = mysql_fetch_array($result))
					{
						echo "<tr>";
						echo "<td>".$row['doctorname']."</td>";
						echo "<td>".$row['specialistin']."</td>";
						echo "<td>";
	
						$resDapp = mysql_query("SELECT * FROM timings WHERE docid='$row[docid]'");
						while($row12 = mysql_fetch_array($resDapp))
							{
								echo $row12['timings'];
							}
						echo "</td>";
						echo "<td><a href='createAppointment.php?docid=$row[docid]&docname=$row[doctorname]&sptype=$row[specialistin]'>Create Appointment</a></td>";
						echo "</tr>";
			//}

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
