<?php
session_start();
require_once "connection.php";
if (isset($_POST['name'])) {
    $sql = "Insert INTO contact(name,email,phone,message) VALUES (:name,:email, :phone, :message)";
    $data = $conn->prepare($sql);
    $data->execute(array(
        ':name' => htmlentities($_POST['name']),
        ':email' => htmlentities($_POST['email']),
        ':phone' => htmlentities($_POST['phone']),
        ':message' => htmlentities($_POST['msg'])
    ));
    $_SESSION["success"] = "Successfully Submitted";
    header("Location:index-4.php");
    return;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contacts</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="images/favicon.ico">
    <link rel="shortcut icon" href="images/favicon.ico"/>
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/style.css">

    <script>
        $(document).ready(function () {
            $().UItoTop({easingType: 'easeOutQuart'});
        })
    </script>
    <!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
            <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0"
                 height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a>
    </div>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <link rel="stylesheet" media="screen" href="css/ie.css">
    <![endif]-->
</head>
<body class="" id="top">
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
                        <li>
                            <a href="index.html">Home</a>

                        </li>
                        <li><a href="index-1.html">Videos </a></li>
                        <li><a href="index-3.html">Volunteer </a></li>
                        <li class="current"><a href="index-4.php">Contacts</a></li>
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
        <div class="ic"></div>
        <div class="container_12">
            <div class="grid_12">
                <div class="map">
                    <figure class=" ">
                        <iframe
                            src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Port City International University,+Chittagong,+Dhaka,+Bangladesh&amp;aq=0&amp;sll=37.0625,-95.677068&amp;sspn=61.282355,146.513672&amp;ie=UTF8&amp;hq=&amp;hnear=Brooklyn,+Kings,+New+York&amp;ll=40.649974,-73.950005&amp;spn=0.01628,0.025663&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
                    </figure>
                </div>
            </div>
            <div class="grid_4">
                <h3>Address</h3>
                <div class="map">
                    <address>
                        <dl>
                            <dt>The Company Name Inc. <br>
                                Life in color<br>
                                Beisde: Port city international University
                            </dt>
                            <dd><span>Freephone:</span>+1 800 559 6580</dd>
                            <dd><span>Telephone:</span>+1 800 603 6035</dd>
                            <dd><span>FAX:</span>+1 800 889 9898</dd>
                            <dd>E-mail: <a href="#" class="col1">mail@demolink.org</a></dd>
                            <dd>Skype: <a href="#" class="col1">@skypename</a></dd>
                        </dl>
                    </address>
                </div>
            </div>
            <div class="grid_8">
                <h3>Contact Form</h3>
                <form id="form" method="POST">
                    <div class="success_wrapper">
                        <div class="success-message">Contact form submitted</div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <?php
                            if (isset($_SESSION["success"])) {

                                echo $_SESSION["success"];
                            }
                            if (isset($_SESSION["error"])) {
                                echo $_SESSION["error"];
                            }
                            ?>
                        </div>
                    </div>
                    <label class="name">
                        <input type="text" name="name" placeholder="Name:" data-constraints="@Required @JustLetters"/>
                        <span class="empty-message">*This field is required.</span>
                        <span class="error-message">*This is not a valid name.</span>
                    </label>
                    <label class="email">
                        <input type="text" name="email" placeholder="E-mail:" data-constraints="@Required @Email"/>
                        <span class="empty-message">*This field is required.</span>
                        <span class="error-message">*This is not a valid email.</span>
                    </label>
                    <label class="phone">
                        <input type="text" name="phone" placeholder="Phone:" data-constraints="@Required @JustNumbers"/>
                        <span class="empty-message">*This field is required.</span>
                        <span class="error-message">*This is not a valid phone.</span>
                    </label>
                    <label class="message">
                        <textarea placeholder="Message:" name="msg"
                                  data-constraints='@Required @Length(min=20,max=999999)'></textarea>
                        <span class="empty-message">*This field is required.</span>
                        <span class="error-message">*The message is too short.</span>
                    </label>
                    <div>
                        <div class="clear"></div>
                        <div class="btns">
                            <button data-type="submit" class="btn">Send</button>
                            <button data-type="reset" class="btn">Clear</button>
                        </div>
                    </div>
                </form>
            </div>
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
</body>
</html>

