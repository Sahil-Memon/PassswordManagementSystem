<?php
include("checkdb.php");
if(isset($_POST['edit']))
{
    $sm=$test['smedia'];
    $_SESSION['smedia']=$sm;
 echo "<script type='text/javascript'>window.top.location='edit.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  <a href="addsocial.php">Add Social Media</a>
  <a class="active" href="showmedia.php">Show Social Media</a>
  <a href="user.php">Logout</a>
</div>
<br><br>
<div class="container">
<form method="post" action="">
<center><input type='submit' value='delete all' id='but' name='delete'/></center><br>
<table class="table table-bordered">
 <thead>
 <tr>
 <th>Userid</th>
 <th>Scoial Medi Name</th>
 <th>Social Media-Id</th>
 <th>Password</th>
 </tr>
 </thead>
 <tbody>
 <tr>
 <?php 
 $userid=$_SESSION['user'];
 $result = mysqli_query($conn,"SELECT * from media where username='$userid'");
 
while($test = mysqli_fetch_array($result))
{
 echo"<td>".$test['username']."</td>";
 echo"<td>".$test['smedia']."</td>";
 echo"<td>".$test['smuser']."</td>";
 echo"<td>".$test['password']."</td>"; 
 echo "</tr>"; 
}
if(isset($_POST['delete']))
{
 $result=mysqli_query($conn,"delete from media where username='$userid'");   
 echo "<script>alert('All Data has been deleted !!');</script>";
 echo "<script type='text/javascript'>window.top.location='showmedia.php';</script>"; 
}
 ?>
</table>
</form>
</div>
</body>
</html>