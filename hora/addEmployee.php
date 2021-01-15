<?php include('head.php');?>
<?php include('session.php'); ?>
<?php include("dbconnection.php");?>

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
$fnameErr = $mnameErr = $lnameErr = $addressErr = $usertypeErr = $contactErr="";
$fname =$mname=$lname=$address=$contact=$usertype=$confirmation="";
	$result = mysql_query("SELECT MAX(empid) FROM employee");
	while($row = mysql_fetch_array($result))
		{
			$maxpatid = $row[0];
			$maxpatid++;
		}
	//insert employees record
if(isset($_POST["submit"]))
{	
   if (empty($_POST["fname"])) {
	$fnameErr = "Enter the first name of a user.";
	} else {
	$fname = test_input($_POST["fname"]);
			// check if name only contailetters and whitespace
	if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
	$fnameErr = "Only letters allowed for name.";
     }
   }
	if (empty($_POST["mname"])) {
     $mnameErr = "Enter the middle name of a user.";
	} else {
     $mname = test_input($_POST["mname"]);
     // check if name only contailetters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$mname)) {
       $mnameErr = "Only letters allowed for name.";
     }
   }
   if (empty($_POST["lname"])) {
     $lnameErr = "Enter the last name of a user.";
	} else {
     $lname = test_input($_POST["lname"]);
     // check if name only contailetters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
       $lnameErr = "Only letters allowed for name.";
     }
   }
   if (empty($_POST["contact"])) {
     $contactErr = "Enter contact number of a user.";
   } else {
     $contact = test_input($_POST["contact"]);
     // check if name only contailetters and whitespace
     if(strlen($contact)<10) {
       $contactErr = "Contact number should be at least 10 digits.";
     }
   }
   if (empty($_POST["address"])) {
     $addressErr = "Enter the address of a user";
   } else {
     $address = test_input($_POST["address"]);
     // check if name only contailetters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$address)) {
       $addressErr = "Use letters only for address.";
     }
   }
   if($_POST["usertype"]=="Choose User Type"){
	   $usertypeErr="Please choose user type here.";
   }else{
	   $usertype=test_input($_POST["usertype"]);
   }  
 if(!$fnameErr && !$mnameErr && !$lnameErr && !$contactErr && !$usertypeErr && !$addressErr)
 {
		$sql="INSERT INTO employee(empid, empname, designation, address, contactno, emailid)
				  VALUES('$_POST[empid]','$_POST[fname] $_POST[mname] $_POST[lname]','$_POST[usertype]','$_POST[address]','$_POST[contact]','$_POST[email]')";

			if (!mysql_query($sql,$con))
				{
					die('Error: ' . mysql_error());
				}
				else{$confirmation="The user profile is saved successfully.";}
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
						<li><i class="icon_profile"></i>Other Users</li>
					</ol>
				</div>
			</div>
              <!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-10">
                      <section class="panel">
                          <header class="panel-heading">
                             Add New Users
                          </header>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal " id="register_form_two" method="post" action="addEmployee.php">
									  <div class="form-group " style="color:green;">
                                          <label for="updatemess" class="control-label col-lg-8"><b><?php echo  $confirmation; ?></b></label>
                                      </div>
									  <div class="form-group ">
                                          <label for="empid" class="control-label col-lg-2">User ID<span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="empid" name="empid" type="text" readonly value="<?php echo $maxpatid; ?>"/>
                                          </div>
                                      </div>
									  <div class="form-group">
										<label for="usertype" class="control-label col-lg-2">User Type </label>
										<div class="col-lg-8">
											<select class="form-control" name="usertype">
												<option>Choose User Type</option>
												<option>Administrator</option>
												<option>Clerk</option>
												<option>Lab Technician</option>
											</select>
											<label style ="color:red" ><?php echo $usertypeErr;?></label>
										</div>
									  </div>
                                      <div class="form-group ">
                                          <label for="fname" class="control-label col-lg-2">First Name <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="fname" name="fname" type="text" placeholder="User First Name (Letters Only)" />
											   <label style ="color:red" ><?php echo $fnameErr;?></label>
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="mname" class="control-label col-lg-2">Middle Name <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="mname" name="mname" type="text" placeholder="User First Name (Letters Only)" />
											  <label style ="color:red" ><?php echo $mnameErr;?></label>
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="lname" class="control-label col-lg-2">Last Name <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="lname" name="lname" type="text" placeholder="User First Name (Letters Only)" />
											  <label style ="color:red" ><?php echo $lnameErr;?></label>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="address" class="control-label col-lg-2">Address <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="address" name="address" type="text" placeholder="User Address (Letters Only)" />
											  <label style ="color:red" ><?php echo $addressErr;?></label>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="contact" class="control-label col-lg-2">Contact No. <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="contact" name="contact" type="text" placeholder="User Contact Number (Numbers Only)" />
											  <label style ="color:red" ><?php echo $contactErr;?></label>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="email" class="control-label col-lg-2">E-Mail <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class="form-control " id="email" name="email" type="email" placeholder="User E-mail Address (abc@def.com)"  />
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
