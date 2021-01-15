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
$fnameErr = $mnameErr = $lnameErr = $addressErr = $genderErr = $contactErr=$dobErr=$statusErr="";
$fname =$mname=$lname=$address=$contact=$gender=$dob=$status=$confirmation=$dated="";
$datad= mktime(date('Y'),date('m')-1,date('d'));
	$result = mysql_query("SELECT MAX(patid) FROM patientinfo");
	while($row = mysql_fetch_array($result))
		{
			$maxpatid = $row[0];
			$maxpatid++;
		}
if(isset($_POST["submit"]))
{	
	if (empty($_POST["fname"])) {
	$fnameErr = "Enter the first name of a patient.";
	} else {
	$fname = test_input($_POST["fname"]);
			// check if name only contailetters and whitespace
	if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
	$fnameErr = "Only letters allowed for name.";
     }
   }
	if (empty($_POST["mname"])) {
     $mnameErr = "Enter the middle name of a patient.";
	} else {
     $mname = test_input($_POST["mname"]);
     // check if name only contailetters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$mname)) {
       $mnameErr = "Only letters allowed for name.";
     }
   }
   if (empty($_POST["lname"])) {
     $lnameErr = "Enter the last name of a patient.";
	} else {
     $lname = test_input($_POST["lname"]);
     // check if name only contailetters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
       $lnameErr = "Only letters allowed for name.";
     }
   }
   if (empty($_POST["contact"])) {
     $contactErr = "Enter contact number of a patient.";
   } else {
     $contact = test_input($_POST["contact"]);
     // check if name only contailetters and whitespace
     if(strlen($contact)<10) {
       $contactErr = "Contact number should be at least 10 digits.";
     }
   }
   if (empty($_POST["address"])) {
     $addressErr = "Enter the address of a patient";
   } else {
     $address = test_input($_POST["address"]);
     // check if name only contailetters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$address)) {
       $addressErr = "Use letters only for address.";
     }
   }
   if($_POST["gender"]=="Choose Gender"){
	   $genderErr="Please choose gender here.";
   }else{
	   $gender=test_input($_POST["gender"]);
   }  
   if (isset($_POST["status"])) {
     $status = test_input($_POST["status"]);
     // check if name only contailetters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$status)) {
       $statusErr = "Use letters for status.";
     }
   }
   if(isset($_POST['dob'])){
	   $dob = test_input($_POST["dob"]);
	   if($dob>$datad){
		   $dobErr="Please enter date of birth at least before one month.";
	   }
   }
 if(!$fnameErr && !$mnameErr && !$lnameErr && !$contactErr && !$genderErr && !$statusErr && !$dobErr)
 {

			$sql="INSERT INTO patientinfo(patfname, patmname, patlname, dob, gender, contactno, address, status)
				  VALUES('$_POST[fname]', '$_POST[mname]', '$_POST[lname]','$_POST[dob]','$_POST[gender]','$_POST[contact]','$_POST[address]','$_POST[status]')";

			if (!mysql_query($sql,$con))
				{
					die('Error: ' . mysql_error());
				}
				else{$confirmation="The patient profile is saved successfully.";}
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
					<h3 class="page-header"><i class="fa fa-laptop"></i> Clerk Panel</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
						<li><i class="icon_pencil-edit"></i>Register Patients</li>
						<li><i class="icon_profile"></i>New Patient</li>
					</ol>
				</div>
			</div>
              <!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-10">
                      <section class="panel">
                          <header class="panel-heading">
                             Add New Patients
                          </header>
                          <div class="panel-body">
<?php
/*
if(isset($_POST["submit"]))
{
	//include ("displayDocInfo.php");
	$result = mysql_query("SELECT MAX(patid) FROM patientinfo");
	while($row = mysql_fetch_array($result))
		{
			$maxpatid = $row[0];
		}
	$docrec = mysql_query("SELECT * FROM patientinfo where patid ='$maxpatid'");
	while($row = mysql_fetch_array($docrec))
		{
			echo "<form id='display_info' class='form-validate form-horizontal' method='post' enctype='multipart/form-data'>";
			echo '<div style= color:green;"><h3> Patient record saved successfully...</h3></div> <br><br>' ;
			//image code ends here
			echo "Patient ID is : $row[patid]<br><br>";
			echo "Patient Name : $row[patfname] $row[patmname] $row[patlname]<br><br>";
			echo "Date of Birth : $row[dob]<br><br>";
			echo "Gender : $row[gender]<br><br>";
			echo "Contact No : $row[contactno]<br><br>";
			echo "Address : $row[address]<br><br>";
			echo "Status : $row[status]<br><br>";
			echo "</b> <a href='addPatient.php'> <i class='arrow_carrot-left'></i> Back</a> </form>";
		}
}
else
{*/
?>
                              <div class="form">
                                  <form class="form-validate form-horizontal" id="register_form_seven" method="post" action="addPatient.php">
									  <div class="form-group " style="color:green;">
                                          <label for="updatemess" class="control-label col-lg-8"><b><?php echo  $confirmation; ?></b></label>
                                      </div>
									  <div class="form-group ">
                                          <label for="patid" class="control-label col-lg-2">Patient ID<span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="patid" name="patid" type="text" readonly value="<?php echo $maxpatid; ?>"/>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="fname" class="control-label col-lg-2">First Name <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="fname" name="fname" type="text" placeholder="Patient First Name (Letters Only)" />
											  <label style ="color:red" ><?php echo $fnameErr;?></label>
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="mname" class="control-label col-lg-2">Middle Name <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="mname" name="mname" type="text"  placeholder="Patient Middle Name (Letters Only)"/>
											  <label style ="color:red" ><?php echo $mnameErr;?></label>
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="lname" class="control-label col-lg-2">Last Name <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="lname" name="lname" type="text" placeholder="Patient Last Name (Letters Only)" />
											  <label style ="color:red" ><?php echo $lnameErr;?></label>
                                          </div>
                                      </div>
									  <div class="form-group">
										  <label for="select" class="control-label col-lg-2">Date Of Birth</label>  <script src="datetimepicker_css.js"></script>
										  <div class="col-lg-8">
											<input class="form-control" type="text" id="demo1" readonly="readonly" name="dob" placeholder="Patient Date of Birth">
											<img src="img/cal.gif" width="21" height="22" style="cursor:pointer" onclick="javascript:NewCssCal ('demo1','yyyyMMdd','','','','','')" />
										     <label style ="color:red" ><?php echo $dobErr;?></label>
										  </div>
									   </div>
									   <div class="form-group">
										<label for="gender" class="control-label col-lg-2">Gender </label>
										<div class="col-lg-8">
											<select class="form-control" name="gender">
												<option>Choose Gender</option>
												<option>Male</option>
												<option>Female</option>
											</select>
											<label style ="color:red" ><?php echo $genderErr;?></label>
										</div>
									  </div>
									  <div class="form-group ">
                                          <label for="address" class="control-label col-lg-2">Address <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="address" name="address" type="text" placeholder="Patient Address (Letters Only)" />
											  <label style ="color:red" ><?php echo $addressErr;?></label>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="contact" class="control-label col-lg-2">Contact No. <span class="required ">*</span></label>
                                          <div class="col-lg-8">
                                              <input class="form-control"  id="contact" name="contact" type="number" placeholder="Patient Contact Number (Numbers Only)" />
											  <label style ="color:red" ><?php echo $contactErr;?></label>
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="ccomment" class="control-label col-lg-2">Status</label>
                                          <div class="col-lg-8">
                                              <textarea class="form-control " id="ccomment" name="status" placeholder="Untreated/treated (Letters Only)" ></textarea>
											  <label style ="color:red" ><?php echo $statusErr;?></label>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-8">
                                              <button class="btn btn-primary" type="submit" name="submit">Save</button>
                                              <button class="btn btn-default" type="reset" name ="clear">Clear</button>
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
