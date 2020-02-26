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
  <a class="active" href="addsocial.php">Add Social Media</a>
  <a href="showmedia.php">Show Social Media</a>
  <a href="user.php">Logout</a>
</div>
<br><br>
<div class="container">
<form method="post" action="">
<table class="table table-bordered">
 <thead>
 <tr>
 <th>Userid</th>
 <th>Scoial Medi Name</th>
 <th>Social Media-Id</th>
 <th>Password</th>
 <th></th>
 </tr>
 </thead>
 <tbody>
 <tr>
 <?php 
 $userid=$_SESSION['user'];

 $result = mysqli_query($conn,"SELECT * from users where email='$userid'");
 $test = mysqli_fetch_array($result);

 echo"<td>".$test['email']."</td>";
 echo "<td><input type='text' name='sm' id='sm' size='20' require></td>";
 echo "<td><input type='text' name='si' id='si' size='20' require></td>";
 echo "<td><input type='text' name='sp' id='sp' size='20' require></td>";
 echo"<td><input type='submit' value='submit' id='but' name='btn_register'/></td>";
 echo "</tr>";
 if(isset($_POST['btn_register']))
{
    $email=$test['email'];
    $sm=$_POST['sm'];
    $si=$_POST['si'];
    $sp=$_POST['sp'];
	 $sql="insert into media (username,smedia,smuser,password) values ('$email','$sm','$si','$sp')";

	 if(mysqli_query($conn,$sql)==TRUE)
	 {
        echo '<script type="text/JavaScript">  
        alert("Social Media Info Add."); 
         </script>'; 
        echo "<script type='text/javascript'>window.top.location='addsocial.php';</script>"; 
		 //header("Refresh:2,url=addInfo.php");
	 }
	 else
		 {
		 echo $conn->error;
		 }
 } 
 ?>
</table>
</form>
</div>
</body>
</html>