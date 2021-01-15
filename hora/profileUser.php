<?php include('head.php');?>
<?php include('session.php'); 
//session_start();?>
<?php include('dbconnection.php');?>

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
$updrec=$usertype=$address=$contactno=$emailid=$name[0]=$name[1]=$name[2]=$userid="";
$_SESSION['empid']= $userid;
	if(isset($_POST["submit"]))
		{
			//$dname = $_POST[fname] ." ". $_POST[mname] ." ". $_POST[lname];
			if(isset($_SESSION["empid"]))
				{
					$resrec= mysql_query("UPDATE employee SET 
						empname='$_POST[fname] $_POST[mname] $_POST[lname]', designation='$_POST[usertype]', contactno ='$_POST[contact]',emailid='$_POST[email]',address='$_POST[address]' WHERE empid = '$_SESSION[empid]' ");
				}
			else
				{
					$resrec= mysql_query("UPDATE employee SET 
						empname='$_POST[fname] $_POST[mname] $_POST[lname]', designation='$_POST[usertype]',address'$_POST[address]',contactno ='$_POST[contact]',emailid='$_POST[email]' WHERE empid = '$_SESSION[empid]' ");
				}
			$updrec = "Record Updated Successfully...";
		}
	
	$resultpatientrec = mysql_query("SELECT * FROM employee WHERE empid ='$userid'");

	while($row = mysql_fetch_array($resultpatientrec))
		{
			$wordChunks = explode(" ", $row['empname']);
			for($i = 0; $i < count($wordChunks); $i++)
				{
					$name[$i] = $wordChunks[$i] ;
				}

			//$doctorname2 =  array($doctorname1);
			$usertype = $row["designation"];
			$address = $row["address"];
			$contactno = $row["contactno"];
			$emailid = $row["emailid"];
		}
	//}
	//if(isset($_POST["loginbtn"]))
//{
	//patient Login funtion..
//$loginvalidation =  loginfuntion($_POST["userid"],$_POST["password"]);
//}
?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Clerk Panel</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
						<li><i class="icon_profile"></i>Profile</li>
						<li><i class="icon_pencil-edit"></i>Edit Profile</li>
					</ol>
				</div>
			</div>
              <!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-10">
                      <section class="panel">
                          <header class="panel-heading">
                             Update Your Profile
                          </header>
                          <div class="panel-body">
                            <?php include("dbconnection.php"); ?>
                              <div class="form">
                                  <form class="form-validate form-horizontal " id="register_form" method="post" action="">
									  <div class="form-group " style="color:green;">
                                          <label for="updatemess" class="control-label col-lg-8"><b><?php echo  $updrec; ?></b></label>
                                      </div>
									  <?php echo "the user id is:". $userid; ?>
                                      <div class="form-group ">
                                          <label for="fname" class="control-label col-lg-2">First Name <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="fname" name="fname" type="text" value="<?php echo $name[0]; ?>" />
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="mname" class="control-label col-lg-2">Middle Name <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="mname" name="mname" type="text" value="<?php echo $name[1]; ?>" />
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="lname" class="control-label col-lg-2">Last Name <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="lname" name="lname" type="text" value="<?php echo $name[2]; ?>" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="usertype" class="control-label col-lg-2">User Type <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="usertype" name="usertype" type="text" value="<?php echo $usertype; ?>" readonly />
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
                                          <label for="email" class="control-label col-lg-2">E-Mail <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class="form-control " id="email" name="email" type="email" value="<?php echo $emailid; ?>" />
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
