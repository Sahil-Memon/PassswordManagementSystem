<?php
?>

<!DOCTYPE html>
<html>
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

</style>
<body>

<div class="icon-bar">
  <a href="showusers.php">Show users</a>
  <a href="deleteuser.php">Delete user</a>
  <a href="admin.php">LogOut</a>
</div>
<br><br><br>
<center><h1>WELCOME ADMIN</h1></center>
</body>
</html>