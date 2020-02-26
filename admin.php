<?php
include ("checkdb.php");?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/stud.css">
<script src=""></script>

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
<body>

<div class="icon-bar">
  <a href="index.php"><i class="fa fa-home"></i></a>
  <a href="user.php"><i class="fa fa-user-circle"></i></a>
  <a class="active"href="#"><i class="fa fa-building"></i></a>
  <a href="info.php"><i class="fa fa fa-address-card-o"></i></a>
</div>
<br><br><br>
<div id="wrapper">

<div class="form_div">
<p class="form_label">Admin login</p>
<form method="post" action="">
<p><input type="text" placeholder="Username" name="username" id="username" required></p>
<p><input type="password" placeholder="**********" name="password" id="password" required></p>
<p><input type="submit" value="LOGIN" name='login'></p>
</form>
</div>
</form>
</div>
</body>
</html>
<?php
if(isset($_POST['login']))
{
  $myusername=mysqli_real_escape_string($conn,$_POST["username"]);
  $mypassword=mysqli_real_escape_string($conn,$_POST["password"]);

$sql="select * from adminlog where username='$myusername' and password='$mypassword'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
$active=$row['active'];

$count=mysqli_num_rows($result);

if($count==1)
{
$_SESSION['userid']=$myusername;
echo "<script type='text/javascript'>window.top.location='adminmenu.php';</script>"; 
exit;
//header("Refresh:2,url=adminmenu.php");
}
else
{
  echo '<script type="text/JavaScript">  
 alert("Username or Password is Wrong !!"); 
  </script>' 
; 
}
}
?>