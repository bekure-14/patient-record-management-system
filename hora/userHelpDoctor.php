<?php include ('head.php');?>
<?php include('session.php'); ?>

  <body>
  <!-- container section start -->
  <section id="container-fluid" class="">
<?php include ("headerDoctor.php");?>     
      <!--header end-->

      <!--sidebar start-->
<?php include ("sidebarDoctor.php");?>
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Doctor Panel</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="indexDoctor.php">Home</a></li>
						<li><i class="fa fa-laptop"></i>User Help</li>						  	
					</ol>
				</div>
			</div>
					<div class="body_img col-md-10">
						<h3><b>User Help</b></h3>
						<p style ="text-align:justified;">The patient information system provides features and funtionalities for managing
						   all about patient information, doctors information, laboratory procedures, presciptions
						   and other staff profile in order to enhance the patient treatment system. </p>
						  <p> <h4>Step 1: </h4></p>
						  <p>After login the doctor panel (page) is displayed. At the left side the menu list is displayed to operate with the system. 
						     The doctor have the power to operate on the patients appointed with him or her by clerk .The first page is the home page for doctor.</p>
							 <p> <h4>Step 2: </h4></p>
						  <p>The next in the left side menu is new or old patients registration pages. The clerk is responsible to check each appointments created with his or her id. 
						  After checking the appointment the doctor treats the patients and update the patient information.</p>
							 <p> <h4>Step 3: </h4></p>
						  <p>Clicking in patient info shows the detail of the patients and their status. It also generates a report based on dates.</p>
						  <p> <h4>Step 4: </h4></p>
						  <p>The doctor also need to send lab request and based on the lab result he or she treats the patient.</p>
							<!--  <div id="my-slider1" class="carousel slide" data-ride="carousel">
							<ul class="carousel-indicators">
								<li data-target="#my-slider1" data-slide-to="0" class="active"></li>
								<li data-target="#my-slider1" data-slide-to="1"></li>
								<li data-target="#my-slider1" data-slide-to="2"></li>
							</ul>
							<div class="carousel-inner" role="listbox">
								<div class="item active">
									<img src ="img/Capture1.jpg" class="img-responsive img-rounded" alt="health center" style="width:800px;height:200px"/>
									<div class="carousel-caption">
										<h3>HU PIS</h3>
									</div>
								</div>
								<div class="item">
									<img src ="img/Capture2.jpg" class="img-responsive img-rounded" alt="health center" style="width:800px;height:200px"/>
									<div class="carousel-caption">
										<h3>HU PIS</h3>
									</div>
								</div>
								<div class="item">
									<img src ="img/Capture3.jpg" class="img-responsive img-rounded" alt="health center" style="width:600px;height:200px"/>
									<div class="carousel-caption">
										<h3>HU PIS</h3>
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
  </body>
</html>
