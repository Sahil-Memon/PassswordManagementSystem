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
  <a class="active" href="showusers.php">Show users</a>
  <a href="deleteuser.php">Delete user</a>
  <a href="admin.php">LogOut</a>
</div>
<br><br><br>
<form method='post'>
<?php

$result = mysqli_query($conn,"SELECT * FROM users");
while($test = mysqli_fetch_array($result))
{
$userid=$test['email'];
echo "<table class='table table-bordered'><thead><tr><th>User </th><th>";
echo $userid;
echo "</th><th></th></thead></tr>";
echo "<thead><tr><th>Scoial Medi Name</th><th>Social Media-Id</th><th>Password</th></thead><center><tr>";

$result2 = mysqli_query($conn,"SELECT * FROM media where username='$userid'");
while($test2=mysqli_fetch_array($result2))
{
echo "<tr>";
 echo"<td>".$test2['smedia']."</td>";
 echo"<td>".$test2['smuser']."</td>";
 echo"<td>".$test2['password']."</td>"; 
 echo "</tr>"; 
}
echo "</table>";
}

?>
</form>
</body>
</html>