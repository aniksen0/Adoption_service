<?php

require_once "connection.php";
session_start();

$name = $_SESSION["new_name"];
$id = $_SESSION["new_id"]

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>
    <link rel="stylesheet" href="boot/css/bootstrap.min.css"/>
    <link rel="icon" href="images/favicon.ico">
    <link rel="shortcut icon" href="images/favicon.ico"/>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" media="screen" href="css/ie.css">

</head>
<body class="page1" id="top">
<!--==============================header=================================-->
<header>
    <div class="clear"></div>
    <div class="container_12">
        <div class="grid_12">
            <h1>
                <a href="index.html">
                    <img src="images/logo.png" alt="Your Happy Family">
                </a>
            </h1>
            <div class="menu_block">
                <nav class="horizontal-nav full-width horizontalNav-notprocessed">
                    <ul class="sf-menu">
                        <li><a href="index.html">Home</a>
                        </li>
                        <li><a href="index-1.html">Videos </a></li>
                        <li class="current"><a href="index-3.html">Parents Portal</a></li>
                        <li><a href="index-4.php">Contacts Us</a></li>
                    </ul>
                </nav>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</header>
<div class="main">
    <!--==============================Content=================================-->
    <div class="content">
        <div class="container d-flex justify-content-center bg-light">
            <h2>Welcome <span style="color: indianred"> <?php echo $name ?>    </span></h2>

        </div>
        <div class="container d-flex justify-content-center">
            <br>
            <h2> Your Id number is : <span style="color: indianred"> <?php echo $id ?>    </h2>

        </div>
        <div class="container d-flex justify-content-center">
            <p style="color: violet"> Please remember your id and you can now login with your id now</p>
            <br> <p> </p>

        </div>
        <div class="container d-flex justify-content-center">
            <button class="btn-info"><a href="Login/index.php"> Login</a></button>
            <br> <p> </p>

        </div>

    </div>
    <!--==============================footer=================================-->
    <footer>
        <div class="hor bg3"></div>
        <div class="container_12">
            <div class="grid_12 ">
                <div class="socials">
                    <a href="#"></a>
                    <a href="#"></a>
                    <a href="#"></a>
                    <div class="clear"></div>
                </div>
                <div class="copy">
                    <strong>Adoption System</strong> &copy; <span id="copyright-year"></span>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="boot/js/bootstrap.bundle.min.js"></script>
</body>
<script>

</script>
</html>
