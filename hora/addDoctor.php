<?php include ('head.php');?>
<?php include('session.php'); ?>
<?php include("dbconnection.php");?>
<?php //include("validation/header.php");?>

<script type='text/javascript'>
function isAlphabet(elem,helperMsg){
	var alphaExp = /^[a-zA-Z]+$/;
	if(elem.value.match(alphaExp)){
		return true;
	}
	else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}
</script>
  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
<?php include("headerAll.php");?>
      <!--header end-->

      <!--sidebar start-->
<?php include ("sidebarAdmin.php");?>
      <!--sidebar end-->
<?php 
$fnameErr = $mnameErr = $lnameErr = $specialErr = $descriptionErr = $contactErr="";
$fname =$mname=$lname=$special=$contact=$description=$confirmation="";
	$result = mysql_query("SELECT MAX(docid) FROM doctor");
	while($row = mysql_fetch_array($result))
		{
			$maxpatid = $row[0];
			$maxpatid++;
		}
	//insert doctors record
if(isset($_POST["submit"]))
{	
			if (empty($_POST["fname"])) {
				$fnameErr = "Enter the first name of a doctor.";
			} else {
				$fname = test_input($_POST["fname"]);
			// check if name only contailetters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
			$fnameErr = "Only letters allowed for name.";
     }
   }
			 if (empty($_POST["mname"])) {
     $mnameErr = "Enter the middle name of a doctor.";
	} else {
     $mname = test_input($_POST["mname"]);
     // check if name only contailetters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$mname)) {
       $mnameErr = "Only letters allowed for name.";
     }
   }
   if (empty($_POST["lname"])) {
     $lnameErr = "Enter the last name of a doctor.";
	} else {
     $lname = test_input($_POST["lname"]);
     // check if name only contailetters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
       $lnameErr = "Only letters allowed for name.";
     }
   }
   if (empty($_POST["contact"])) {
     $contactErr = "Enter contact number of a doctor.";
   } else {
     $contact = test_input($_POST["contact"]);
     // check if name only contailetters and whitespace
     if(strlen($contact)<10) {
       $contactErr = "Contact number should be at least 10 digits.";
     }
   }
   if (empty($_POST["special"])) {
     $specialErr = "Enter a specialization of a doctor.";
   } else {
     $special = test_input($_POST["special"]);
     // check if name only contailetters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$special)) {
       $specialErr = "Use only letters for specialization.";
     }
   }
   if (isset($_POST["description"])) {
     $description = test_input($_POST["description"]);
     // check if name only contailetters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$description)) {
       $descriptionErr = "Use letters for description.";
     }
   }
 if(!$fnameErr && !$mnameErr && !$lnameErr && !$contactErr && !$specialErr && !$descriptionErr)
 {
			$sql="INSERT INTO doctor(doctorname, quali, specialistin, contactno, emailid, biodata )
				  VALUES('$_POST[fname] $_POST[mname] $_POST[lname]' ,'MDoc','$_POST[special]','$_POST[contact]','$_POST[email]','$_POST[description]')";

			if (!mysql_query($sql,$con))
				{
					die('Error: ' . mysql_error());
				}
			else{$confirmation="The new doctor infromation is saved.";}	
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
					<h3 class="page-header"><i class="fa fa-laptop"></i> Admin Panel</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
						<li><i class="icon_folder-add_alt"></i>New Users</li>
						<li><i class="icon_profile"></i>Doctor</li>
					</ol>
				</div>
			</div>
              <!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-10">
                      <section class="panel">
                          <header class="panel-heading">
                             Add New Doctors
                          </header>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal" id="registerone_form" method="post" action="addDoctor.php">
									  <div class="form-group " style="color:green;">
                                          <label for="updatemess" class="control-label col-lg-8"><b><?php echo  $confirmation; ?></b></label>
                                      </div>
									  <div class="form-group ">
                                          <label for="docid" class="control-label col-lg-2">Doctor ID<span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="docid" name="docid" type="text" readonly value="<?php echo $maxpatid; ?>"/>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="fname" class="control-label col-lg-2">First Name <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="fname" name="fname" type="text" placeholder="Doctor First Name (Letters Only)" />
											  <label style ="color:red" ><?php echo $fnameErr;?></label>
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="mname" class="control-label col-lg-2">Middle Name <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="mname" name="mname" type="text" placeholder="Doctor Middle Name (Letters Only)" />
											  <label style ="color:red" ><?php echo $mnameErr;?></label>
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="lname" class="control-label col-lg-2">Last Name <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="lname" name="lname" type="text" placeholder="Doctor Last Name (Letters Only)" />
											  <label style ="color:red" ><?php echo $lnameErr;?></label>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="contact" class="control-label col-lg-2">Contact No. <span class="required ">*</span></label>
                                          <div class="col-lg-8">
                                              <input class="form-control"  id="contact" name="contact" type="number"  placeholder="Doctor Contact Number(Numbers Only)" />
											  <label style ="color:red" > <?php echo $contactErr;?></label>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="email" class="control-label col-lg-2">E-Mail <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class="form-control " id="email" name="email" type="email" placeholder="Doctor E-mail Address (abc@def.com)"/>
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="special" class="control-label col-lg-2">Specialization <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class="form-control " id="special" name="special" type="text" placeholder="Doctor Specialization (Letters Only)" />
											  <label style ="color:red" > <?php echo $specialErr;?></label>
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="ccomment" class="control-label col-lg-2">Description</label>
                                          <div class="col-lg-8">
                                              <textarea class="form-control " id="ccomment" name="description"></textarea>
											  <label style ="color:red" > <?php echo $descriptionErr;?></label>
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
