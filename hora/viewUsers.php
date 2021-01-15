<?php include ('head.php');?>
<?php include('session.php'); ?>
<?php include("dbconnection.php");?>

<?php
if(isset($_GET["empid"]))
{
mysql_query("DELETE FROM employee WHERE empid = '$_GET[empid]'");
}
$resapp = mysql_query("SELECT * FROM employee");
?>
  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
<?php include("headerAll.php");?>
      <!--header end-->

      <!--sidebar start-->
<?php include ("sidebarAdmin.php");?>
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Admin Panel</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
						<li><i class="fa fa-table"></i>List of Users</li>
						<li><i class="fa fa-th-list"></i>Other Users</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Other Users Record
                          </header>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
								 <th><i class="icon_id"></i> ID</th>
                                 <th><i class="icon_profile"></i> Emp Name</th>
                                 <th><i class="icon_group"></i> User Type</th>
								 <th><i class="icon_bag"></i> Address</th>
                                 <th><i class="icon_mail_alt"></i> Email</th>
                                 <th><i class="icon_mobile"></i> Contact No.</th>
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
<?php
    while($row1 = mysql_fetch_array($resapp))
		{
?>
                              <tr>
                                 <td><?php echo $row1["empid"]; ?></td>
                                 <td><?php echo $row1["empname"]; ?> </td>
                                 <td><?php echo $row1["designation"]; ?></td>
								 <td><?php echo $row1["address"]; ?></td>
								 <td><?php echo $row1["emailid"]; ?></td>
                                 <td><?php echo $row1["contactno"]; ?></td>
                                 <td>
                                  <div class="btn-group">
                                      <a class="btn btn-primary" href="addEmployee.php"><i class="icon_plus_alt2"></i></a>
                                      <a class="btn btn-success" href="editUser.php?empids=<?php echo $row1["empid"]; ?>"><i class="icon_pencil-edit"></i></a>
                                      <a class="btn btn-danger" href="viewUsers.php?empid=<?php echo $row1["empid"]; ?>"><i class="icon_trash_alt"></i></a>
                                  </div>
                                  </td>
                              </tr>
<?php
        }
?>                    
                           </tbody>
                        </table>
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
