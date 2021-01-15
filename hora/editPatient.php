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
<?php include ("sidebarClerk.php");?>
      <!--sidebar end-->
<?php
$updrec=$dob=$address=$contactno=$status=$patientfname=$patientlname=$patientmname=$gender=$patientid="";
	if(isset($_POST["submit"]))
		{
			//$dname = $_POST[fname] ." ". $_POST[mname] ." ". $_POST[lname];
			if(isset($_SESSION["id"]))
				{
					$resrec= mysql_query("UPDATE patientinfo SET
						patfname='$_POST[fname]', patmname ='$_POST[mname]', patlname='$_POST[lname]', dob='$_POST[dob]', contactno ='$_POST[contact]',gender='$_POST[gender]',address='$_POST[address]', status='$_POST[status]' WHERE patid = '$_POST[patid]' ");
				}
			else
				{
					$resrec= mysql_query("UPDATE patientinfo SET
						patfname='$_POST[fname]', patmname= '$_POST[mname]', patlname='$_POST[lname]', dob='$_POST[dob]', contactno ='$_POST[contact]',gender='$_POST[gender]',address='$_POST[address]', status='$_POST[status]' WHERE patid = '$_POST[patid]' ");
				}
			$updrec = "Record Updated Successfully...";
		}
	$patientid=$_GET["paids"];
	$resultpatientrec = mysql_query("SELECT * FROM patientinfo WHERE patid ='$patientid'");

	while($row = mysql_fetch_array($resultpatientrec))
		{
			$patientfname=$row["patfname"];
			$patientmname=$row["patmname"];
			$patientlname=$row["patlname"];
			$dob = $row["dob"];
			$gender=$row["gender"];
			$address = $row["address"];
			$contactno = $row["contactno"];
			$status = $row["status"];
		}
?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Clerk Panel</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
						<li><i class="fa fa-table"></i>Patient Information</li>
						<li><i class="icon_pencil-edit"></i>Edit Patient Info</li>
					</ol>
				</div>
			</div>
              <!-- Form validations -->
              <div class="row">
                  <div class="col-lg-10">
                      <section class="panel">
                          <header class="panel-heading">
                             Update Patient Profile
                          </header>
                          <div class="panel-body">
<?php include("dbconnection.php"); ?>
                              <div class="form">
                                  <form class="form-validate form-horizontal " id="register_form" method="post" action="">
									  <div class="form-group " style="color:green;">
                                          <label for="updatemess" class="control-label col-lg-8"><b><?php echo  $updrec; ?></b></label>
                                      </div>
									  <div class="form-group ">
                                          <label for="patid" class="control-label col-lg-2">Patient ID<span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="patid" name="patid" type="text" value="<?php echo $patientid; ?>" readonly />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="fname" class="control-label col-lg-2">First Name <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="fname" name="fname" type="text" value="<?php echo $patientfname; ?>" />
                                          </div>
                                      </div>
									   <div class="form-group ">
                                          <label for="mname" class="control-label col-lg-2">Middle Name <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="mname" name="mname" type="text" value="<?php echo $patientmname; ?>" />
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="lname" class="control-label col-lg-2">Last Name <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="lname" name="lname" type="text" value="<?php echo $patientlname; ?>" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="dob" class="control-label col-lg-2">Date of Birth <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="dob" name="dob" type="text" value="<?php echo $dob; ?>"/>
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="gender" class="control-label col-lg-2">Gender <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="gender" name="gender" type="text" readonly value="<?php echo $gender; ?>"/>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="address" class="control-label col-lg-2">Address <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class="form-control " id="address" name="address" type="text" value="<?php echo $address; ?>" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="contact" class="control-label col-lg-2">Contact No. <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="contact" name="contact" type="text" value="<?php echo $contactno; ?>" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="status" class="control-label col-lg-2">Status</label>
                                          <div class="col-lg-8">
                                              <textarea class="form-control " id="status" name="status"><?php echo $status; ?></textarea>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-8">
                                              <button class="btn btn-primary" type="submit" name="submit">Save Changes</button>
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
