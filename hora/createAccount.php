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
$userid=$usertype=$password=$confirmPass=$confirmation="";
$useridErr=$usertypeErr=$passwordErr=$confirmPassErr="";
	if(isset($_POST["submit"]))
{	
	if (empty($_POST["empid"])) {
	$useridErr = "Enter correct user ID.";
	} else {
	$userid = test_input($_POST["empid"]);
    }
	if($_POST["usertype"]=="Choose User Type"){
	   $usertypeErr="Please choose user type here.";
   }else{
	   $usertype=test_input($_POST["usertype"]);
   }  
   if (empty($_POST["password"])){
     $passwordErr = "Password is required!";
	 }
    else {
     $password = test_input($_POST["password"]);
	 if(strlen($password)<5)
	 {
		 $passwordErr="The password length should be at least 5 characters long.";
	 }
   }
if (empty($_POST["confirm_password"])) {
     $confirmPassErr = "Confirm password is required!";
   } 
else if ($_POST['password'] != $_POST['confirm_password']) {
	 $confirmPassErr = 'Your password did not match. Please, enter the password again.';
   }else {
     $confirmPass = test_input($_POST["confirm_password"]);
   }
   
if(!$useridErr && !$usertypeErr && !$passwordErr && !$confirmPassErr){
   			$sql="INSERT INTO users(userid, password, usertype) VALUES('$_POST[empid]','$_POST[password]','$_POST[usertype]')";
			if (!mysql_query($sql,$con))
				{
					die('Error: ' . mysql_error());
				}
			else {
			$confirmation="The user account is created.";
			}
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
						<li><i class="icon_profile"></i>Create User Account</li>
					</ol>
				</div>
			</div>
              <!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-10">
                      <section class="panel">
                          <header class="panel-heading">
                             Create a User Account for New Users
                          </header>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal " id="register_form_three" method="post" action="createAccount.php">
									  <div class="form-group " style="color:green;">
                                          <label for="updatemess" class="control-label col-lg-8"><br><center><b><?php echo  $confirmation; ?></b></center><br></label>
                                      </div>
									  <div class="form-group ">
                                          <label for="empid" class="control-label col-lg-2">User ID<span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="empid" name="empid" type="number" placeholder="User ID (Numbers Only)"/>
											  <label style ="color:red" ><?php echo $useridErr;?></label>
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="password" class="control-label col-lg-2">Password <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class="form-control " id="password" name="password" type="password" placeholder="Password (at least 5 chars combination)" />
											  <label style ="color:red" ><?php echo $passwordErr;?></label>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="confirm_password" class="control-label col-lg-2">Confirm Password <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class="form-control " id="confirm_password" name="confirm_password" type="password" placeholder="Same Password Again" />
											  <label style ="color:red" ><?php echo $confirmPassErr;?></label>
                                          </div>
                                      </div>
									  <div class="form-group">
										<label for="usertype" class="control-label col-lg-2">User Type </label>
										<div class="col-lg-8">
											<select class="form-control" name="usertype">
												<option>Choose User Type</option>
												<option>Administrator</option>
												<option>Doctor</option>
												<option>Clerk</option>
												<option>Lab Technician</option>
											</select>
											<label style ="color:red" ><?php echo $usertypeErr;?></label>
										</div>
									  </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-8">
                                              <button class="btn btn-primary" type="submit" name="submit">Create Account</button>
                                              <button class="btn btn-default" type="reset" name ="clear">Clear</button>
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
