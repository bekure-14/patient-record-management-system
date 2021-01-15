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
$updrec=$patientid=$patientname=$treatdate=$confirmation=$treattime=$treatdocid=$confirmation2=$symptoms=$prescription="";
$symptomsErr=$prescriptionErr="";
if(isset($_POST["submit"]))
{
if(empty($_POST['symptoms']))
{
	$symptomsErr="Please write the symptoms here.";
}
else
{
$symptoms=test_input($_POST['symptoms']);
}
if(empty($_POST['prescription']))
{
	$prescriptionErr="Please enter the prescriptions and advises.";
}
else
{
$prescription=test_input($_POST['prescription']);
}
if(!$symptomsErr && !$prescriptionErr){
					$sql = "INSERT INTO treatedPatient (patid,docid,symptoms,prescription,date,time)
						   VALUES ('$_POST[patid]','$_POST[docid]','$_POST[symptoms]','$_POST[prescription]','$_POST[date]','$_POST[time]')";
									  if (!mysql_query($sql,$con))
										{
											die('Error: ' . mysql_error());
										}
										else{
											$confirmation="The patient is TREATED and treatement history is saved.";
											$resrec= mysql_query("UPDATE patientinfo SET status ='Treated' WHERE patid = '$_POST[patid]'");
											mysql_query("DELETE FROM docappointment WHERE patid = '$_POST[patid]'");
										}
		}
}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
   }
		//if(isset($_POST["changestatus"]))
		//{
			
			//$confirmation2 ="The status of the patient is changed.";
		//}
	$patientid=$_GET["patids"];
	//$treatdocid=$_GET["docid"];
	//$treatdate=$_GET["tdate"];
	//$treattime=$_GET["ttime"];
	$resultpatientrec = mysql_query("SELECT * FROM patientinfo WHERE patid ='$patientid'");

	while($row = mysql_fetch_array($resultpatientrec))
		{
			$patientname=$row["patfname"]." ".$row["patmname"];
		}
	$resultpatientrec1 = mysql_query("SELECT * FROM docappointment WHERE patid ='$patientid'");

	while($row1 = mysql_fetch_array($resultpatientrec1))
		{
			$treatdocid=$row1["docid"];
			$treatdate=$row1["adate"];
			$treattime=$row1["atime"];
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
						<li><i class="fa fa-table"></i>Appointment</li>
						<li><i class="fa fa-th-list"></i>Treatment</li>
					</ol>
				</div>
			</div>
              <!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-10">
                      <section class="panel">
                          <header class="panel-heading">
                             Patient treatment record
                          </header>
                          <div class="panel-body">
					<?php include("dbconnection.php"); ?>
                              <div class="form">
                                  <form class="form-validate form-horizontal " id="register_form_treat" method="post" action="treatPatients.php">
									  <div class="form-group " style="color:green;">
                                          <label for="updatemess" class="control-label col-lg-8"><b><?php echo  $confirmation; ?></b></label>
                                      </div>
									  <div class="form-group">
											<br><p> &nbsp;&nbsp; &nbsp;&nbsp; Patient ID : <?php echo $patientid;?></p>
											<p> &nbsp;&nbsp; &nbsp;&nbsp; Patient Name : <?php echo $patientname;?></p>
									  </div>
									  <div class="form-group ">
                                          <label for="patid" class="control-label col-lg-2">Patient ID<span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="patid" name="patid" type="text" value="<?php echo $patientid; ?>" readonly />
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="docid" class="control-label col-lg-2">Doctor ID<span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="docid" name="docid" type="text" readonly value="<?php echo $treatdocid; ?>" />
                                          </div>
                                      </div>
                                     <div class="form-group ">
                                          <label for="symptoms" class="control-label col-lg-2">Symptoms</label>
                                          <div class="col-lg-8">
                                              <textarea class="form-control " id="symptoms" name="symptoms" cols="50" rows="10"></textarea>
											  <label style ="color:red" ><?php echo $symptomsErr;?></label>
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="prescription" class="control-label col-lg-2">Prescription</label>
                                          <div class="col-lg-8">
                                              <textarea class="form-control " id="prescription" name="prescription" cols="50" rows="10"></textarea>
											  <label style ="color:red" ><?php echo $prescriptionErr;?></label>
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="date" class="control-label col-lg-2">Date<span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="date" name="date" type="text" readonly value="<?php echo $treatdate; ?>" />
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="time" class="control-label col-lg-2">Time<span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="time" name="time" type="text" readonly value="<?php echo $treattime; ?>" />
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-8">
                                              <button class="btn btn-primary" type="submit" name="submit">Save</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
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
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- jquery validate js -->
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>

    <!-- custom form validation script for this page-->
    <script src="js/form-validate.js"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>    

  </body>
</html>
