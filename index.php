<?php
include("checkdb.php");
?>
<!DOCTYPE html>
<html>
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
  <a class="active" href="#"><i class="fa fa-home"></i></a>
  <a href="user.php"><i class="fa fa-user-circle"></i></a>
  <a href="admin.php"><i class="fa fa-building"></i></a>
  <a href="info.php"><i class="fa fa fa-address-card-o"></i></a>
</div>
<br><br><br><br><br>
<center><img src="img/man.jpg" /></center>
</body>
<footer>
<marquee>All CopyRights - 2019</marquee>
</footer>
</html>