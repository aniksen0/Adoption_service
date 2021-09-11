<?php
session_start();
echo $_SESSION['name'];
echo "parent Portal";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="css/font/css/all.min.css"crossorigin="anonymous">

  <link rel="stylesheeet" href="boot/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/mainSidebar.css" >
  <link rel="stylesheet" href="css/mainStyle.css" >

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <title>Dashboard</title>
</head>
<body id="body">
<div class="container1">
  <nav class="navbar">
    <div class="nav_icon" onclick="toggleSidebar()">
      <i class="fa fa-bars" aria-hidden="true"></i>
    </div>

    <div class="navbar--right">
      <img src="img/img-01.png" alt="mainlogo" id="farleft" height="50px" width="50px" />
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> <i class="fas fa-search"></i></button>


      <a href="#">
        <i class="fas fa-clock-o" aria-hidden="true"></i>
      </a>
      <a href="#">
        <img width="30" src="img/avatar.png" alt="LoginPerson's img" />
        <!-- <i class="fa fa-user-circle-o" aria-hidden="true"></i> -->
      </a>
    </div>
  </nav>

  <main>
    
  </main>

  <div id="sidebar">
    <div class="sidebar--title">
      <div class="sidebar--img">
        <img src="img/img-01.png" alt="logo" />
        <h1>Parental Control</h1>

      </div>
      <i
              onclick="closeSidebar()"
              class="far fa-clock"
              id="sidebarIcon"
              aria-hidden="true"
      ></i>
    </div>
    <p>Relief Section</p>
    <div class="sidebar--menu">
      <a href="index.php">
        <div class="sidebar--link active_menu_link">
          <i class="fa fa-home"></i>
          Overview
        </div>
      </a>

      <h2>View</h2>
      <a href="info.php">
        <div class="sidebar--link ">
          <i class="fa fa-user-secret" aria-hidden="true"></i>
          Your Info
        </div>
      </a>

      <a href="registration_details.php">
        <div class="sidebar--link">
          <i class="fa fa-building-o"></i>
          Registration Details
        </div>
      </a>
      <div class="sidebar--link ">
        <i class="fa fa-wrench"></i>
        <a href="">Payment</a>
      </div>
      <div class="sidebar--link active">
        <i class="fa fa-archive"></i>
        <a href="payment_status.php">Payment Status</a>
      </div>
      <div class="sidebar--link">
        <i class="fa fa-handshake-o"></i>
        <a href="renew_status.php">Renew Status</a>
      </div>
      <h2>Update</h2>
      <div class="sidebar--link">
        <i class="fa fa-sign-out"></i>
        <a href="update_renew_status.php">Update Renew Status</a>
      </div>
      <div class="sidebar--logout">
        <i class="fa fa-power-off"></i>
        <a href="logout.php">Log out</a>
      </div>
    </div>
  </div>
</div>
<footer id="footer">
  <p>&copyright All rights reserved</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="js/script.js"></script>
<script defer src="css/font/js/all.js"></script>
<script src="boot/js/bootstrap.min.js"></script>
</body>
</html>
