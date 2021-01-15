<?php include('head.php');?>
<?php include('session.php'); ?>
<?php include("dbconnection.php");?>
<?php include("validation/header.php");?>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
<?php include("headerClerk.php");?>
      <!--header end-->

      <!--sidebar start-->
<?php include ("sidebarClerk.php");?>
      <!--sidebar end-->
<?php 
$patientid1=$patfname=$patmname=$patlname=$dob=$gender=$address=$contactno=$status=$notfound=$confirmation=$confirmation2="";
if(isset($_POST["search"]))
{
	$patientid1=$_POST["patientid"];
	$resapp = mysql_query("SELECT * FROM patientold where patid='$patientid1'");
while($row = mysql_fetch_array($resapp))
		{
			$patfname=$row["patfname"];
			$patmname=$row["patmname"];
			$patlname=$row["patlname"];
			$dob = $row["dob"];
			$gender=$row["gender"];
			$address = $row["address"];
			$contactno = $row["contactno"];
			$status = $row["status"];
		}
}
else
{
	//$notfound = "The patient id is not found.";
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
						<li><i class="icon_pencil-edit"></i> Register Patients</li>
						<li><i class="icon_profile"></i>Old Patient</li>
					</ol>
				</div>
			</div>
              <!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-10">
                      <section class="panel">
                          <header class="panel-heading">
                             Add Old Patients
                          </header>
                          <div class="panel-body">
<?php
if(isset($_POST["submit"]))
{
	//include ("displayDocInfo.php");
	
	$sql="INSERT INTO patientinfo(patid, patfname, patmname, patlname, dob, gender, contactno, address, status)
				  VALUES('$_POST[patid]','$_POST[fname]', '$_POST[mname]', '$_POST[lname]','$_POST[dob]','$_POST[gender]','$_POST[contact]','$_POST[address]','$_POST[status]')";

			if (!mysql_query($sql,$con))
				{
					die('Error: ' . mysql_error());
				}
				else{
					$confirmation="Patient information is registered as active.";
					$resrec= mysql_query("UPDATE patientinfo SET status ='Untreated' WHERE patid = '$_POST[patid]'");
					mysql_query("DELETE FROM patientold WHERE patid = '$_POST[patid]'");
					//$confirmation2 ="The status of the patient is changed.";
				}		
}
?>
						<!-- <div ><!--class="nav search-row" id="top_menu">
							<!--  search form start -->
							<ul class="nav top-menu">                    
								<li>
									<form class="navbar-form" method="post" action="">
									  <div class= "form-group">
										<input class="form-control" placeholder="Search by Patient Id" type="text" name="patientid" value="<?php echo $patientid1; ?>" />
										<button class="btn btn-primary" type="submit" name="search">Search</button>
									  </div>
									</form>
								</li>                    
							</ul>
							<!--  search form end -->                
						  </div><br>
                              <div class="form">
                                  <form class="form-validate form-horizontal" id="register_form_old" method="post" action="oldPatient.php">
									   <div class="form-group " style="color:green;">
                                          <label for="updatemess" class="control-label col-lg-8"><b><?php echo  $notfound; ?></b></label>
										  <label for="updatemes1" class="control-label col-lg-8"><b><?php echo  $confirmation; ?></b></label>
										  <label for="updatemes2" class="control-label col-lg-8"><b><?php echo  $confirmation2; ?></b></label>
                                      </div>
									  <div class="form-group ">
                                          <label for="patid" class="control-label col-lg-2">Patient ID<span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class="form-control" id="patid" name="patid" type="text" readonly value="<?php echo $patientid1; ?>"/>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="fname" class="control-label col-lg-2">First Name <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="fname" name="fname" type="text" value="<?php echo $patfname; ?>" readonly />
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="mname" class="control-label col-lg-2">Middle Name <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="mname" name="mname" type="text" value="<?php echo $patmname; ?>" readonly />
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="lname" class="control-label col-lg-2">Last Name <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="lname" name="lname" type="text" value="<?php echo $patlname; ?>" readonly />
                                          </div>
                                      </div>
									  <div class="form-group">
										  <label for="select" class="control-label col-lg-2">Date Of Birth <span class="required">*</span></label>  
										  <div class="col-lg-8">
											<input class="form-control" type="text" id="demo1" readonly="readonly" name="dob" value="<?php echo $dob; ?>" />
										  </div>
									   </div>
									   <div class="form-group">
										<label for="gender" class="control-label col-lg-2">Gender </label>
										<div class="col-lg-8">
											<input class=" form-control" id="gender" name="gender" type="text" readonly value="<?php echo $gender; ?>" />
										</div>
									  </div>
									  <div class="form-group ">
                                          <label for="address" class="control-label col-lg-2">Address <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="address" name="address" type="text" value="<?php echo $address; ?>" readonly />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="contact" class="control-label col-lg-2">Contact No. <span class="required ">*</span></label>
                                          <div class="col-lg-8">
                                              <input class="form-control"  id="contact" name="contact" type="number" value="<?php echo $contactno; ?>" readonly />
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="ccomment" class="control-label col-lg-2">Status</label>
                                          <div class="col-lg-8">
                                              <textarea class="form-control " id="ccomment" name="status" readonly > <?php echo $status; ?></textarea>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-8">
                                              <button class="btn btn-primary" type="submit" name="submit">Save</button>
											  <button class="btn btn-primary" type="submit" name="changestatus">Change Status</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
<?php
//}
?>
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
