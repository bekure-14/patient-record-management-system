<?php include ('head.php');?>
<?php include('session.php'); ?>

  <body>
  <!-- container section start -->
  <section id="container-fluid" class="">
<?php include ("headerAll.php");?>
      <!--header end-->

      <!--sidebar start-->
<?php include ("sidebarAdmin.php");?>
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--overview start-->
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Admin Panel</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
						<li><i class="fa fa-laptop"></i>Admin</li>
					</ol>
				</div>
			</div>
					<div class="body_img col-md-10">
						<h3><b>Hora Har-sadii Higher Clinic</b></h3>
						<p style ="text-align:justified;">Hora Har-sadi Higher Health Center exists in Bishoftu town.
						This clinic was established in 2010 E.C as a private health center.
						It was reestablished as higher health center in 2011.
						Hora Har-sadi clinic is using manual system.
						Registration of new patients as well as search for existing patient record is also paper based.
						The main objective of this project is to develop a web based patient information management
						system for Hora Har-sadi clinic to solve problem that exist in the clinic.</p>
						<div id="my-slider1" class="carousel slide" data-ride="carousel">
							<ul class="carousel-indicators">
								<li data-target="#my-slider1" data-slide-to="0" class="active"></li>
								<li data-target="#my-slider1" data-slide-to="1"></li>
							</ul>
							<div class="carousel-inner" role="listbox">
								<div class="item active">
									<img src ="img/HUhealthcenter1.gif" class="img-responsive img-rounded" alt="health center" style="width:1000px;height:345px"/>
									<div class="carousel-caption">
										<h3>Hora Har-sadii Health Center</h3>
									</div>
								</div>
								<div class="item">
									<img src ="img/HUhealthcenter2.jpg" class="img-responsive img-rounded" alt="health center" style="width:1000px;height:345px"/>
									<div class="carousel-caption">
										<h3>Hora Har-sadii Health Center</h3>
									</div>
								</div>
							</div>
							<a class="left carousel-control" href="#my-slider1" role="button" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left" area-hidden="true"></span>
								<!--<span class="sr-only">Previous</span>-->
							</a>
							<a class="right carousel-control" href="#my-slider1" role="button" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right" area-hidden="true"></span>
								<!--<span class="sr-only">Next</span>-->
							</a>
						</div>
					</div>
				 <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
              <!-- project team & activity end -->

          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->

    <!-- javascripts -->
    <script src="js/jquery.js"></script>
	<script src="js/jquery-ui-1.10.4.min.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
	<script src="js/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="js/jquery-jvectormap-world-mill-en.js"></script>
	<script src="js/xcharts.min.js"></script>
	<script src="js/jquery.autosize.min.js"></script>
	<script src="js/jquery.placeholder.min.js"></script>
	<script src="js/gdp-data.js"></script>
	<script src="js/morris.min.js"></script>
	<script src="js/sparklines.js"></script>
	<script src="js/charts.js"></script>
	<script src="js/jquery.slimscroll.min.js"></script>
<?php include('hupisfooter.php'); ?>
  </body>
</html>
