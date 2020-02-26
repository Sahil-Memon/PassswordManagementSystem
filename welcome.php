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
  <a href="addsocial.php">Add Social Media</a>
  <a href="showmedia.php">Show Social Media</a>
  <a href="user.php">Logout</a>
</div>
<br><br><br>
<?php
$userid=$_SESSION['user'];
echo "<center><h1> welcome ";
echo $userid;
echo "</h1></center>";
?>
</body>
</html>