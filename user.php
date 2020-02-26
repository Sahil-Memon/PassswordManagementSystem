<?php include("checkdb.php");?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="keywords" content="Elegent Tab Forms,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"./>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
				<script type="text/javascript">
					$(document).ready(function () {
						$('#horizontalTab').easyResponsiveTabs({
							type: 'default',       
							width: 'auto', 
							fit: true 
						});
					});
				   </script>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,600,700,200italic,300italic,400italic,600italic|Lora:400,700,400italic,700italic|Raleway:400,500,300,600,700,200,100' rel='stylesheet' type='text/css'>
<style>
body {margin:0;}

.icon-bar {
  width: 100%;
  background-color: #cca969;
  overflow: auto;
}

.icon-bar a {
  float: left;
  width: 25%;
  text-align: center;
  padding: 12px 0;
  transition: all 0.3s ease;
  color: white;
  font-size: 36px;
}

.icon-bar a:hover {
  background-color: #291b1c;
}

.active {
  background-color: #291b1c;
}
</style>
</head>
<body>
<div class="main">
<div class="icon-bar">
  <a href="index.php"><i class="fa fa-home"></i></a>
  <a class="active" href="#"><i class="fa fa-user-circle"></i></a>
  <a href="admin.php"><i class="fa fa-building"></i></a>
  <a href="info.php"><i class="fa fa fa-address-card-o"></i></a>
</div><br><br>
	 <div class="sap_tabs">	
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
			  <ul class="resp-tabs-list">
			  	  <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><div class="top-img"><img src="images/top-note.png" alt=""/></div><span>Register</span>
			  	  	
				</li>
				  <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><div class="top-img"><img src="images/top-lock.png" alt=""/></div><span>Login</span></li>
				  <div class="clear"></div>
			  </ul>		
			  	 
			<div class="resp-tabs-container">
					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
					<div class="facts">
					
						<div class="register">
							<form name="registration" method="post" action="" enctype="multipart/form-data">
								<p>First Name </p>
								<input type="text" class="text" value=""  name="fname" required >
								<p>Last Name </p>
								<input type="text" class="text" value="" name="lname"  required >
								<p>Email Address </p>
								<input type="text" class="text" value="" name="email"  >
								<p>Password </p>
								<input type="password" value="" name="password" required>
								<p>Contact No. </p>
								<input type="text" value="" name="contact"  required>
								<div class="sign-up">
									<input type="reset" value="Reset">
									<input type="submit" name="signup"  value="Sign Up" >
									<div class="clear"> </div>
								</div>
							</form>

						</div>
					</div>
				</div>		
			 <div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
					 	<div class="facts">
							 <div class="login">
							<div class="buttons">
								
								
							</div>
							<form name="login" action="" method="post">
								<input type="text" class="text" name="uemail" value="" placeholder="Enter your registered email"  ><a href="#" class=" icon email"></a>

								<input type="password" value="" name="upassword" placeholder="Enter valid password"><a href="#" class=" icon lock"></a>

								<div class="p-container">
								
									<div class="submit two">
									<input type="submit" name="login" value="LOG IN" >
									</div>
									<div class="clear"> </div>
								</div>

							</form>
					</div>
				</div> 
			</div> 			        					 
				 <div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
					 	<div class="facts">
							 <div class="login">
							<div class="buttons">						           	      
				        </div>	
				     </div>	
		        </div>
	        </div>
	     </div>
<br><br>
</body>
</html>
<?php 
//Code for Registration 
if(isset($_POST['signup']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$remail=$_POST['email'];
	$password=$_POST['password'];
	$contact=$_POST['contact'];
	$enc_password=$password;
	$msg=mysqli_query($conn,"insert into users(fname,lname,email,password,contact) values('$fname','$lname','$remail','$enc_password','$contact')");
    if($msg)
    {
    	echo "<script>alert('Register successfully');</script>";
    }
}

// Code for login 

if(isset($_POST['login']))
{
$userid=$email;
$uemail=$_POST['uemail'];
$upassword=$_POST['upassword'];
$_SESSION['user']=$uemail;
$sql="select * from users where email='$uemail' and password='$upassword'";
$result = mysqli_query($conn,$sql);
$test = mysqli_fetch_array($result);

$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
$active=$row['active'];

$count=mysqli_num_rows($result);


if($count==1)
{
$_SESSION['user']=$uemail;
echo "<script type='text/javascript'>window.top.location='welcome.php';</script>"; 
exit;
//header("location: welcome.php");
}
else
{
  echo '<script type="text/JavaScript">  
 alert("Username or Password is Wrong !!"); 
  </script>'; 
}
}
?>