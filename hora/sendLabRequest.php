<?php include ('head.php');?>
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
<?php 
$patid=$docid=$testtype=$confirmation="";
$patidErr=$docidErr=$testtypeErr="";
if(isset($_POST["submit"]))
{
if(empty($_POST['patid']))
{
	$patidErr="Enter the Patient ID.";
}
else
{
$patid=test_input($_POST['patid']);
}
if(empty($_POST['docid']))
{
	$docidErr="Enter the Doctor ID.";
}
else
{
$docid=test_input($_POST['docid']);
}
if(empty($_POST['testtype']))
{
	$testtypeErr="Enter the type of tests here.";
}
else
{
$testtype=test_input($_POST['testtype']);
}
if(!$patidErr && !$docidErr && !$testtypeErr){
$sql="INSERT INTO labrequest (patid ,docid, testtype,status) VALUES ('$_POST[patid]','$_POST[docid]', '$_POST[testtype]','result not sent')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  else{$confirmation="The laboratory test request is sent.";}
}
}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
   }
 ?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Doctor Panel</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="indexDoctor.php">Home</a></li>
						<li><i class="icon_tools"></i>Lab Request</li>
						<li><i class="icon_chat"></i>Send Lab Request</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Send for laboratory test 
                          </header>
						  <div class="form">
                                  <form class="form-validate form-horizontal" id="register_form_lab" method="post" action="sendLabRequest.php">
									  <br>
									  <div class="form-group " style="color:green;">
                                          <label for="updatemess" class="control-label col-lg-8"><br><center><b><?php echo  $confirmation; ?></b></center><br></label>
                                        </div>
									  <div class="form-group ">
                                          <label for="patid" class="control-label col-lg-2">Patient ID<span class="required">*</span></label>
                                          <div class="col-lg-6">
                                              <input class=" form-control" id="patid" name="patid" type="number" value=""/>
											   <label style ="color:red" ><?php echo $patidErr;?></label>
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="docid" class="control-label col-lg-2">Doctor ID<span class="required">*</span></label>
                                          <div class="col-lg-6">
                                              <input class=" form-control" id="docid" name="docid" type="number" value=""/>
											   <label style ="color:red" ><?php echo $docidErr;?></label>
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="testtype" class="control-label col-lg-2">Test Type<span class="required">*</span></label>
                                          <div class="col-lg-6">
                                              <textarea class="form-control " id="testtype" name="testtype"></textarea>
											   <label style ="color:red" ><?php echo $testtypeErr;?></label>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-6">
                                              <button class="btn btn-primary" type="submit" name="submit">Send Request</button>
                                              <button class="btn btn-default" type="reset" name ="clear">Clear</button>
                                          </div>
                                      </div><br>
                                  </form>
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

