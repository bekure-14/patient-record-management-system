<?php 
include('session.php');
?>
       <script Language=Javascript>
	 function CheckDate()
  {
var str1  = document.getElementById("demo1");
var str2  = document.getElementById("todate");
var string1 = str1.value;
var string2 = str2.value;

var arrfromdate = string1.split("-");
var fdate = arrfromdate[0];
var fmonth = arrfromdate[1];
var fyear = arrfromdate[2]; 

var arrtodate = string2.split("/");
var tdate = arrtodate[0];
var tmonth= arrtodate[1];
var tyear = arrtodate[2];

var date1 = new Date(fyear, fmonth, fdate); 
var date2 = new Date(tyear, tmonth, tdate);
var dayNames = new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");


var dmonth = fmonth-1;

var date3 = new Date(fyear, dmonth, fdate); 
var dayname  = dayNames[date3.getDay()];

 if(date1 > date2)
 {
  alert("You cant take appointment for this date..");
   document.getElementById("demo1").style.backgroundColor="#FFFFE0"; 
  document.getElementById("demo1").value = "";
 return false;
 }
 else if(dayname =="Sunday")
 {
  alert("Sunday is Holiday..");
   document.getElementById("demo1").style.backgroundColor="#FFFFE0"; 
  document.getElementById("demo1").value = "";
 return false;
 }
 }
    </script>
<?php
include("dbconnection.php");
include("head.php");
include("validation/header.php"); 
?>
 <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
<?php include("headerClerk.php");?>
      <!--header end-->

      <!--sidebar start-->
<?php include ("sidebarClerk.php");?>
      <!--sidebar end-->
	  <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-10">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Clerk Panel</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
						<li><i class="icon_calendar"></i>Appointment</li>
						<li><i class="fa fa-th-list"></i>Create Appointment</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-10">
                      <section class="panel">
                          <header class="panel-heading">
                               Create Appointment with a Doctor
                          </header>
<?php 
$patientid1=$patname=$patmname=$patlname=$dob=$gender=$address=$contactno=$dt=$confirmation="";
$apptime=$appdate=$pname=$pid=$search="";
$apptimeErr=$appdateErr=$pnameErr=$pidErr=$searchErr="";
if(isset($_GET["docid"]))
{
	$_SESSION["appdocid"] = $_GET["docid"]; 
	$_SESSION["appdocname"] = $_GET["docname"];
	$_SESSION["appdocsptype"] = $_GET["sptype"];
	//header("Location: createAppointment.php?apptaken=yes");
}
if(isset($_POST["search"]))
{
	$patientid1=$_POST["patientid"];
	$resapp = mysql_query("SELECT * FROM patientinfo where patid='$patientid1'");

while($row = mysql_fetch_array($resapp))
		{
			$patname=$row["patfname"]." ".$row["patmname"]." ".$row["patlname"];
		}
	$enable ="true";
	//$dt = date("Y-m-d h:m:s"); 
}
if(isset($_POST["submit"]))
{
	if (empty($_POST["patid"])) {
	$pidErr = "Patient ID cannot be empty.";
	} else {
	$pid = test_input($_POST["patid"]);
   }
   if (empty($_POST["patientid"])) {
	$searchErr = "Enter the correct ID of the patient here.";
	} else {
	$search = test_input($_POST["patientid"]);
   }
   if (empty($_POST["pname"])) {
	$pnameErr = "Patient name cannot be empty.";
	} else {
	$pname= test_input($_POST["pname"]);
   }
   if (empty($_POST["adate"])) {
	$appdateErr = "The appointment date cannot be empty.";
	} else {
	$appdate = test_input($_POST["adate"]);
   }
   if($_POST["atime"]=="Choose Time"){
	   $apptimeErr="Please choose appointment time here.";
   }else{
	   $apptime=test_input($_POST["atime"]);
   }  
if(!$pnameErr && !$pidErr && !$apptimeErr && !$appdateErr)
 {
	$sql="INSERT INTO docappointment (patid, datetime, adate,atime,docid)
		  VALUES ('$_POST[patid]','date(Y-m-d h:m:s)','$_POST[adate]','$_POST[atime]','$_POST[docid]')";
			if (!mysql_query($sql,$con))
			{
				die('Error: ' . mysql_error());
			}
			else{
				$confirmation="The appointment is created.";								
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
						<div class="panel-body">
							<ul class="nav top-menu">                    
								<li>
									<form class="navbar-form" method="post" action="">
									  <div class= "form-group">
										<input class="form-control" placeholder="Search by Patient Id" type="number" name="patientid" value="<?php echo $patientid1; ?>" />
										<button class="btn btn-primary" type="submit" name="search">Search</button>
									  </div>
									</form>
								</li>                    
							</ul>
							<!--  search form end -->                
						  </div><br>
                              <div class="form">
                                  <form class="form-validate form-horizontal" id="register_form_appt" method="post" action="createAppointment.php">
									   <div class="form-group " style="color:green;">
                                          <label for="updatemess" class="control-label col-lg-8"><br><center><b><?php echo  $confirmation; ?></b></center><br></label>
                                        </div>
									  <div class="form-group ">
                                          <label for="patid" class="control-label col-lg-2">Patient ID<span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class="form-control" id="patid" name="patid" type="text" readonly value="<?php echo $patientid1; ?>"/>
											  <label style ="color:red" ><?php echo $pidErr;?></label>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="pname" class="control-label col-lg-2">Patient Name <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="pname" name="pname" type="text" readonly value="<?php echo $patname; ?>" />
											  <label style ="color:red" ><?php echo $pnameErr;?></label>
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="docname" class="control-label col-lg-2">Doctor Name <span class="required">*</span></label>
                                          <div class="col-lg-8">
										   <input class="form-control" type="hidden" name="docid" id="docid" readonly value="<?php echo $_SESSION["appdocid"]; ?>" />
                                            <!--  <input type="hidden" name="docid" id="docid" class="validate[required,custom[onlyLetterSp]] text-input" value="<?php echo $_SESSION["appdocid"]; ?>" />-->
											  <input class=" form-control" id="docname" name="docname" type="text" readonly value="<?php echo $_SESSION["appdocname"]; ?>" />
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="lname" class="control-label col-lg-2">Specialist Of <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="lname" name="lname" type="text" readonly value="<?php echo $_SESSION["appdocsptype"]; ?>" />
                                          </div>
                                      </div>
									  <?php
										$tomorrow = mktime(0,0,0,date("m")+1,date("d"),date("Y"));
										$tdate= date("d/m/Y", $tomorrow);
									  ?>
										<input type="hidden" name="todate" id="todate" value="<?php echo $tdate; ?>">
									  <div class="form-group">
										  <label for="select" class="control-label col-lg-2">Appointment Date <span class="required">*</span></label>  
										  <div class="col-lg-4">
											<script type="text/javascript">
												function show_alert()
													{
														alert("Please select Date Time Picker");
													}
											</script>
											<script src="datetimepicker_css.js"></script>
											<input class="form-control" type="Text" id="demo1" onclick="show_alert()" name="adate" readonly  class="validate[required]"  onchange="CheckDate()"/>
											<img src="img/cal.gif" onclick="javascript:NewCssCal ('demo1','yyyyMMdd','','','','','future')"  style="cursor:pointer"/>
											<label style ="color:red" ><?php echo $appdateErr;?></label>
										  </div>
									   </div>
									   <div class="form-group">
										  <label for="select" class="control-label col-lg-2">Appointment Time <span class="required">*</span></label>  
									   <div class="col-lg-4">
											<select class="form-control" name="atime">
												<option>Choose Time</option>
												<option>8:30 AM</option>
												<option>9:00 AM</option>
												<option>9:30 AM</option>
												<option>10:00 AM</option>
												<option>10:30 AM</option>
												<option>11:00 AM</option>
												<option>11:30 AM</option>
												<option>1:30 PM</option>
												<option>2:00 PM</option>
												<option>2:30 PM</option>
												<option>3:00 PM</option>
												<option>3:30 PM</option>
												<option>4:00 PM</option>
												<option>4:30 PM</option>
												<option>6:00 PM</option>
												<option>6:30 PM</option>
												<option>7:00 PM</option>
												<option>7:30 PM</option>
												<option>8:00 PM</option>
												<option>8:30 PM</option>
												<option>9:00 PM</option>
												<option>9:30 PM</option>
											</select>
											<label style ="color:red" ><?php echo $apptimeErr;?></label>
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

      
