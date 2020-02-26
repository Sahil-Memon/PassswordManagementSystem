<?php
?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/index.css">
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
  <a href="index.php"><i class="fa fa-home"></i></a>
  <a href="user.php"><i class="fa fa-user-circle"></i></a>
  <a href="admin.php"><i class="fa fa-building"></i></a>
  <a class="active" href="#"><i class="fa fa fa-address-card-o"></i></a>
</div>
<main>
        <section>
            <h2 align=center> WELCOME TO PASSWORD MANAGE SYSTEM</h2>
            <div class="column">
                <div class="card"> 
                    <img src="img/zishan.jpeg" width="50%" height="20%">
                    <h3 class="title"> Zishan Bandar </h3>
                    <button class="emailid">zishantofa@gmail.com</button>
                </div>
            </div>
        </section>
        <article class="column">
                <div class="card">
                    <img src="img/hoida.jpeg" width="50%" height="30%">
                    <h3 class="title"> Hoida Ansari </h3> 
                    <button class="emailid">hoidanaeem@gmail.com</button>
                </div>
                </article>
                <article class="column">
                        <div class="card">
                    <img src="img/sahil.png" width="50%" height="30%">
                    <h3 class="title"> Sahil Memon </h3>
                    <button class="emailid">sahilmemon@gmail.com</button> 
                </div>
            </article>
                 
    </main>
   
</body>
<footer>
<marquee>All CopyRights - 2019</marquee>
</footer>
</html>