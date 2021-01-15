<?php 
include('head.php');
include('session.php'); 
include("dbconnection.php");
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
						<li><i class="fa fa-home"></i><a href="indexDoctor.php">Home</a></li>
						<li><i class="icon_tools"></i>Lab Request</li>
						<li><i class="icon_chat"></i>Show Lab Result</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              View the test result of your patient 
                          </header>
						  <div class="nav search-row" id="top_menu">
							<!--  search form start -->
							<ul class="nav top-menu">                    
								<li>
									<form class="navbar-form" method="post" action="">
										<input class="form-control" placeholder="Search by Doctor Id" type="number" name="docid" />
										<button class="btn btn-primary" type="search" name="search">Search</button> 
									</form> <br>
								</li>                    
							</ul>
							<!--  search form end -->                
						  </div>
						  <div class="form">
								  <table class="table table-striped table-advance table-hover col-lg-6">
									<tbody>
										<tr>
										    <th><i class="icon_id_alt"></i> Patient ID</th>
											<th><i class="icon_id_alt"></i> Doctor ID</th>
											<th><i class="icon_info"></i> Test Types</th>
											<th><i class="icon_book"></i> Test Results</th>
										</tr>
										<?php
										if(isset($_POST['docid'])){
										$resresc = mysql_query("SELECT * FROM labresult where docid ='$_POST[docid]'");
										while($row = mysql_fetch_array($resresc))
											{	 
												echo " <tr>";
												echo " <td>$row[patid]";
												   $respac = mysql_query("SELECT * FROM patientinfo where patid='$row[patid]'");
												   while($row26 = mysql_fetch_array($respac))
													{
														echo " : ". $row26["patfname"]." ".$row26["patmname"];
													} echo "</td>";
												echo "    <td>$row[docid]";
												   $respacdoc = mysql_query("SELECT * FROM doctor where docid='$row[docid]'");
													while($row26a = mysql_fetch_array($respacdoc))
													{
														echo " : ". $row26a["doctorname"];
													} echo "</td>";
												echo "    <td>$row[testtype]</td>";
												echo "    <td>$row[testresult]</td>";														
												echo "  </tr>";
											}
										}
										?>
									</tbody>
								  </table>
                              </div>
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

