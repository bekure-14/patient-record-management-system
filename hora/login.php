<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link href="img/hlogo.png" rel="icon">

    <title>HHS-PIS | Login</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
</head>
<?php include('dbconnection.php'); ?>
  <body class="login-img3-body">

    <div class="container">
      <form class="login-form" method="POST">	  
        <div class="login-wrap">
		    <p><b>HHS Patient Information System</b></p>
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" name="userid" class="form-control" placeholder="User ID" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <label class="checkbox">
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="loginbtn">Login</button>
            <!--<button class="btn btn-info btn-lg btn-block" type="reset" name="reset">Clear</button>-->
<?php
if (isset($_POST['loginbtn'])){
session_start();
$userid = $_POST['userid'];

$password =$_POST['password'];
//$password=md5($password);

//$usertype = $_POST['usertype'];
if (empty($userid)) {  ?>
		<br>
	<div class="alert alert-danger"> <center>Please, enter your User ID.</center></div>	
<?php		
		}
		else if (empty($password)){  ?>
		
		<br>
	<div class="alert alert-danger"><center>Please, enter your Password.</center></div>	
<?php		
		}
else if (!empty($userid)&&!empty($password))
{
$query = "SELECT * FROM users WHERE userid='$userid' AND password='$password' AND usertype='Administrator'";
$query1 = "SELECT * FROM users WHERE userid='$userid' AND password='$password' AND usertype='Doctor'";
$query2 = "SELECT * FROM users WHERE userid='$userid' AND password='$password' AND usertype='Clerk'";
$query3 = "SELECT * FROM users WHERE userid='$userid' AND password='$password' AND usertype='Lab Technician'";
if(mysql_query($query)==TRUE){
$result = mysql_query($query)or die(mysql_error());
$num_row = mysql_num_rows($result);
		$row=mysql_fetch_array($result);
		if( $num_row > 0 ) {
			header('location:index.php');
			$_SESSION['id']=$row['user_id'];
			}
			else{ ?>
			
			<br>
	<div class="alert alert-danger"><center>The input did not match. Please, try again.</center></div>
			<?php
			}
	}
if(mysql_query($query1)==TRUE){
$result = mysql_query($query1)or die(mysql_error());
$num_row = mysql_num_rows($result);
		$row=mysql_fetch_array($result);
		if( $num_row > 0 ) {
			header('location:indexDoctor.php');
			$_SESSION['id']=$row['user_id'];
		}
	}
if(mysql_query($query2)==TRUE){
$result = mysql_query($query2)or die(mysql_error());
$num_row = mysql_num_rows($result);
		$row=mysql_fetch_array($result);
		if( $num_row > 0 ) {
			header('location:indexClerk.php');
			$_SESSION['id']=$row['user_id'];
		}
    }
if(mysql_query($query3)==TRUE){
$result = mysql_query($query3)or die(mysql_error());
$num_row = mysql_num_rows($result);
		$row=mysql_fetch_array($result);
		if( $num_row > 0 ) {
			header('location:indexLabTechnician.php');
			$_SESSION['id']=$row['user_id'];
		}
}
}		
else { ?>
		
		<br>
	<div class="alert alert-danger"><center>The input did not match. Please, try again.</center></div>	
<?php		}
}
?>
        </div>
      </form>
    </div>
  </body>
</html>
