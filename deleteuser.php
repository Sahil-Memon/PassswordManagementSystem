<?php
include("checkdb.php");
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/stud.css">

<style>
body {margin:0;}

.icon-bar {
  width: 100%;
  background-color: #cca969;
  overflow: auto;
}

.icon-bar a {
  float: left;
  width: 30%;
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
th{
  text-align:center;
  background-color:#555;
  color:white;
}

</style>
<body>

<div class="icon-bar">
  <a href="showusers.php">Show users</a>
  <a class="active" href="deleteuser.php">Delete user</a>
  <a href="admin.php">LogOut</a>
</div>
<br><br><br>
<div id="wrapper">

<div class="form_div">
<p class="form_label">Delete</p>
<form method="post" action="">
<p><input type="text" placeholder="Enter Username to delete" name="username" id="username" required></p>
<p><input type="submit" value="Sure !!" name='delete'></p>
</form>
</div>
</form>
</div>
</body>
</html>
<?php
if(isset($_POST['delete']))
{
$userid=$_POST['username'];
$result=mysqli_query($conn,"delete from media where username='$userid'");   
$result=mysqli_query($conn,"delete from users where email='$userid'");
 echo "<script>alert('User has been deleted !!!!');</script>";
 echo "<script type='text/javascript'>window.top.location='deleteuser.php';</script>";
}
?>