<?php 
include('head.php');
include('session.php'); 
include("dbconnection.php");
$doctorid ="";
if(isset($_GET["presdelid"]))
{
	mysql_query("DELETE FROM timings WHERE docid = '$_GET[presdelid]'");
}
if(isset ($_POST['docid'])){
$doctorid=$_POST['docid'];
}
if(isset($_POST["submit"]))
{
$sql="INSERT INTO timings (docid ,timings) VALUES ( '$_POST[docid]', '$_POST[timings]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
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
						<li><i class="fa fa-home"></i><a href="indexDoctor.php">Home</a></li>
						<li><i class="fa fa-table"></i>Add Timings</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Add Your timings (Working Hours)
                          </header>
						  <div class="form">
                                  <form class="form-validate form-horizontal" id="register_form_nine" method="post" action="addtimings.php">
									  <br><div class="form-group ">
                                          <label for="docid" class="control-label col-lg-2">Doctor ID<span class="required">*</span></label>
                                          <div class="col-lg-6">
                                              <input class=" form-control" id="docid" name="docid" type="text" value=""/>
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="ccomment" class="control-label col-lg-2">Timings</label>
                                          <div class="col-lg-6">
                                              <textarea class="form-control " id="ccomment" name="timings"></textarea>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-6">
                                              <button class="btn btn-primary" type="submit" name="submit">Add</button>
                                              <button class="btn btn-default" type="reset" name ="clear">Clear</button>
                                          </div>
                                      </div><br>
                                  </form>
								  <table class="table table-striped table-advance table-hover col-lg-6">
									<tbody>
										<tr>
											<th><i class="icon_id_alt"></i> Doctor ID</th>
											<th><i class="icon_clock"></i> Timings</th>
											<th><i class="icon_cogs"></i> Action</th>
										</tr>
										<?php
										$resresc = mysql_query("SELECT * FROM timings where docid ='$doctorid'");
										while($row = mysql_fetch_array($resresc))
											{	 
												echo " <tr>";
												echo "    <td>$row[docid]</td>";
												echo "    <td>$row[timings]</td>";
												echo "    <td><a class='btn btn-danger' href='addtimings.php?presdelid=$row[docid]'><i class='icon_trash_alt'></i></a></td>";															
												echo "  </tr>";
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

