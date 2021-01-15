<?php include ('head.php');?>
<?php include('session.php'); ?>
<?php include("dbconnection.php");?>

<?php
if(isset($_GET["docid"]))
{
mysql_query("DELETE FROM doctor WHERE docid = '$_GET[docid]'");
}
$resapp = mysql_query("SELECT * FROM doctor");
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
						<li><i class="fa fa-th-list"></i>Doctors</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Doctors Record
                          </header>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
								 <th><i class="icon_creditcard"></i> ID</th>
                                 <th><i class="icon_profile"></i> Doc Name</th>
                                 <th><i class="icon_bag"></i> Qualn.</th>
								 <th><i class="icon_genius"></i> Specialn.</th>
                                 <th><i class="icon_mail_alt"></i> Email</th>
                                 <th><i class="icon_mobile"></i> Contact No.</th>
								 <th><i class="icon_mobile"></i> Description</th>
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
<?php
    while($row1 = mysql_fetch_array($resapp))
		{
?>
                              <tr>
                                 <td><?php echo $row1["docid"]; ?></td>
                                 <td><?php echo $row1["doctorname"]; ?> </td>
                                 <td><?php echo $row1["quali"]; ?></td>
								 <td><?php echo $row1["specialistin"]; ?></td>
								 <td><?php echo $row1["emailid"]; ?></td>
                                 <td><?php echo $row1["contactno"]; ?></td>
								 <td><?php echo $row1["biodata"]; ?></td>
                                 <td>
                                  <div class="btn-group">
                                      <a class="btn btn-primary" href="addDoctor.php"><i class="icon_plus_alt2"></i></a>
                                      <a class="btn btn-success" href="editDoctors.php?docids=<?php echo $row1["docid"]; ?>"><i class="icon_pencil-edit"></i></a>
                                      <a class="btn btn-danger" href="viewDoctor.php?docid=<?php echo $row1["docid"]; ?>"><i class="icon_trash_alt"></i></a>
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
