<?php include("checkdb.php");?>
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
<table class="table table-bordered">
 <thead>
 <tr>
 <th></th>
 <th>Userid</th>
 <th>Scoial Medi Name</th>
 <th>Social Media-Id</th>
 <th>Password</th>
 <th></th>
 <th></th>
 <th></th>
 </tr>
 </thead>
 <tbody>
 <tr>
 <?php 
 $userid=$_SESSION['user'];
 $sm=$_SESSION['smedia'];
 $result = mysqli_query($conn,"SELECT * from media where username='$userid' and smedia='$sm'");
$test = mysqli_fetch_array($result);
 echo "<td><b>Old Value</b><td>";
 echo"<td>".$test['username']."</td>";
 echo"<td>".$test['smedia']."</td>";
 echo"<td>".$test['smuser']."</td>";
 echo"<td>".$test['password']."</td>"; 
 echo"<td></td>";
 echo"<td></td>";
 echo "</tr>"; 
 echo"<tr>";
 echo "<td><b>New Value</b><td>";
 echo"<td>".$test['username']."</td>";
 echo"<td>".$test['smedia']."</td>";
 echo"<td><input type='text' name='smuser'/></td>";
 echo"<td><input type='text' name='password'/></td>";
 echo"<td><input type='submit' value='update' id='but' name='update'/></td>";
 echo"<td><input type='submit' value='update' id='but' name='update'/></td>";
 echo "</tr>"; 
if(isset($_POST['update']))
{
 $sm=$_SESSION['smedia'];
}
?>
</table>
</form>
</div>
</body>
</html>