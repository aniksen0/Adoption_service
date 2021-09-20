<?php
require "../connection.php";
session_start();
//if (!isset($_SESSION['role'])&&!isset($_SESSION['name']))
//{
//    header("Location: ../index.php");
//    return;
//}
//if ($_SESSION['role']!=4)
//{
//    header("Location: ../AcessDenied.php");
//    return;
//}
//if (!isset($_SESSION['role'])&&!isset($_SESSION['name']))
//{
//    header("Location: ../index.php");
//    return;
//}

if (isset($_POST['id'])&&isset($_POST['name'])&&isset($_POST['mobile']))
{
    if (is_numeric($_POST['mobile']))
    {
        $folder= "img/";
        $filename= $_FILES["file1"]["name"];
        $tempname= $_FILES["file1"]["tmp_name"];
        $filenamenew=$folder.$filename;
        move_uploaded_file($tempname,$filenamenew);

        $salt = 'XyZzy12*_';
        $pw = hash('md5', $salt . $_POST['password']);
        $sql="Insert INTO shop_owner(id,shop_name,contract_number,shop_location_division,shop_location_jilla,shop_location_thana,total_repairman,image,email,pass,nid,city_corporation,shop_owner_name) VALUES (:id,:shopname,:mobile,:division,:jilla,:thana,:RM,:imgdata,:email,:password,:nid,:ccn,:name)";
        $data=$conn->prepare($sql);
        $data->execute(array(
            ':id'=>htmlentities($_POST['id']),
            ':shopname'=>htmlentities($_POST['name']),
            ':mobile'=>htmlentities($_POST['mobile']),
            ':division'=>htmlentities($_POST['division']),
            ':jilla'=>htmlentities($_POST['jilla']),
            ':thana'=>htmlentities($_POST['thana']),
            ':RM'=>htmlentities($_POST['RM']),
            ':imgdata'=>htmlentities($filenamenew),
            ':email'=>htmlentities($_POST['email']),
            ':password'=>htmlentities($_POST['password']),
            ':ccn'=>htmlentities($_POST['ccn']),
            ':name'=>htmlentities($_POST['name']),
            ':nid'=>htmlentities($_POST['nid'])
        ));

        $_SESSION['success']="Inserted";
        header("Location:user1.php");
        return;
    }
    else
    {
        $_SESSION["error"]="There is a problem with data. Please add appropriate data";
        header("Location:user1.php");
        return;
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Admin Dashboard
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="css/material-dashboard.css?v=2.1.2" rel="stylesheet" />

</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="/img/sidebar-1.jpg">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

          Tip 2: you can also add an image using data-image tag
      -->
        <div class="logo row justify-content-center">
            <img class="img-fluid" width="100" height="80" src="../img/logo.svg" alt="ministry logo"/>
            <p class="align-items-center" style="color: indianred">Admin Panel</p>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item active  ">
                    <a class="nav-link" href="index.php">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="add_admin.php">
                        <i class="material-icons">person</i>
                        <p>Add User</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="tables.php">
                        <i class="material-icons">content_paste</i>
                        <p>User List</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="syslog.php"">
                    <i class="material-icons">library_books</i>
                    <p>System Log</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="transaction.php"">
                    <i class="material-icons">library_books</i>
                    <p>Transaction</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="child_profile.php"">
                    <i class="material-icons">library_books</i>
                    <p>Add Child Profile</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="syscheck.php">
                        <i class="material-icons">bubble_chart</i>
                        <p>System Check</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="profit.php">
                        <i class="material-icons">location_ons</i>
                        <p>Profit</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="notification.php">
                        <i class="material-icons">notifications</i>
                        <p>Notifications</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:;">User Name</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                    <form class="navbar-form">
                        <div class="input-group no-border">
                            <input type="text" value="" class="form-control" placeholder="Search...">
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </div>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:;">
                                <i class="material-icons">dashboard</i>
                                <p class="d-lg-none d-md-block">
                                    Stats
                                </p>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">person</i>
                                <p class="d-lg-none d-md-block">
                                    Account
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../logout.php">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Add Shop Owner</h4>
                                <p class="card-category">
                                <div class="main--title">

                                    <div class="main--greeting">

                                        <?php
                                        if (isset($_SESSION['success']))
                                        {
                                            echo('<p style="color: white;" > SUCESS:::'.htmlentities($_SESSION['success'])."</p>\n");
                                            unset($_SESSION['success']);

                                        }
                                        if (isset($_SESSION['error']))
                                        {
                                            echo('<p style="color: white;">ERROR::::'.htmlentities($_SESSION['error'])."</p>\n");
                                            unset($_SESSION['error']);

                                        }
                                        ?>
                                    </div>
                                </div>

                                </p>
                            </div>
                            <div class="card-body">
                                <form  class="" method="post" enctype="multipart/form-data">
                                    <h1>Register</h1>
                                    <p>GROUP POLICY AND ROLE.</p>
                                    <hr>
                                    <div class="form-row">

                                        <div class="col-sm-4">
                                            <label for="id"><b>ID:</b></label>
                                            <input class="input form-control" type="text" size="20" maxlength="10" placeholder="Enter USER ID" name="id" id="id" required>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="name" ><b>Name:</b></label>
                                            <input class="input form-control" type="text" size="25" placeholder="Enter Name" name="name" id="name" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="email" ><b>Email:</b></label>
                                            <input class="input form-control" type="text" size="25" placeholder="Enter Email" name="email" id="email" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <label for="shopname"><b>Shop Name:</b></label>
                                        <input class="input form-control" type="text" size="25" placeholder="Enter shop name" name="password" id="shopname" required>
                                    </div>

                                    <div class="col-sm-12">
                                        <hr>
                                        <label for="file">Owner Image</label>
                                        <input type="file" id="file" name="file1" value="">
                                        <p style="color: indianred;">File size should be less than 1MB</p>
                                        <hr>
                                    </div>
                                    <div class="form-row">

                                        <div class="col-sm-4">
                                            <label for="psw"><b>Password:</b></label>
                                            <input class="input form-control" type="password" size="25" placeholder="Enter one time Password" name="password" id="psw" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="mobile" ><b>Mobile:</b></label>
                                            <input class="input form-control" type="text" size="25" placeholder="EG:017********" name="mobile" id="mobile" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="nid" ><b>NID:</b></label>
                                            <input class="input form-control" type="text" size="25" placeholder="NID" name="nid" id="nid" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row">

                                        <div class="col-sm-4">
                                            <label for="division"><b></b></label>
                                            <input class="input form-control" type="text" size="25" placeholder="Enter Division" name="division" id="division" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="jilla"><b></b></label>
                                            <input class="input form-control" type="text" size="25" placeholder="Enter jilla" name="jilla" id="jilla" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="thana"><b></b></label>
                                            <input class="input form-control" type="text" size="25" placeholder="Enter thana" name="thana" id="thana" required>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="col-sm-6">
                                        <label for="date"><b>Corporation Certificate Number:</b></label>
                                        <input class="input form-control" type="number" size="25" placeholder="Enter Corporation certificate number" name="ccn" id="ccn" required>
                                        <hr>
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="RM"><b>total Repair Man:</b></label>
                                        <input class="input form-control" type="text" placeholder="RepairMan Number" name="RM" id="RM" required>
                                        <br>
                                        <hr>
                                    </div>
                                    <p>Please provide all the information and follow <a href="#">Rules and Regulationsy</a>.</p>
                                    <button type="submit" class=" btnreg btn btn-success">Register</button>
                                    <hr>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <footer id="footer">
            <p>&copyright All rights reserved</p>
        </footer>
    </div>
</div>

<!--   Core JS Files   -->
<script src="js/core/jquery.min.js"></script>
<script src="js/core/popper.min.js"></script>
<script src="js/core/bootstrap-material-design.min.js"></script>
<script src="js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Plugin for the momentJs  -->
<script src="js/plugins/moment.min.js"></script>
<!--  Plugin for Sweet Alert -->
<script src="js/plugins/sweetalert2.js"></script>
<!-- Forms Validations Plugin -->
<script src="js/plugins/jquery.validate.min.js"></script>
<!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="js/plugins/jquery.bootstrap-wizard.js"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="js/plugins/bootstrap-selectpicker.js"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="js/plugins/bootstrap-datetimepicker.min.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
<script src="js/plugins/jquery.dataTables.min.js"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="js/plugins/bootstrap-tagsinput.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="js/plugins/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="js/plugins/fullcalendar.min.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="js/plugins/jquery-jvectormap.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="js/plugins/nouislider.min.js"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Library for adding dinamically elements -->
<script src="js/plugins/arrive.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chartist JS -->
<script src="js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="demo/demo.js"></script>
<script>
    $(document).ready(function() {
        $().ready(function() {
            $sidebar = $('.sidebar');

            $sidebar_img_container = $sidebar.find('.sidebar-background');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');

            window_width = $(window).width();

            fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

            if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                    $('.fixed-plugin .dropdown').addClass('open');
                }

            }

            $('.fixed-plugin a').click(function(event) {
                // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .active-color span').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-color', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-color', new_color);
                }
            });

            $('.fixed-plugin .background-color .badge').click(function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('background-color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-background-color', new_color);
                }
            });

            $('.fixed-plugin .img-holder').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).parent('li').siblings().removeClass('active');
                $(this).parent('li').addClass('active');


                var new_image = $(this).find("img").attr('src');

                if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    $sidebar_img_container.fadeOut('fast', function() {
                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $sidebar_img_container.fadeIn('fast');
                    });
                }

                if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $full_page_background.fadeOut('fast', function() {
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                        $full_page_background.fadeIn('fast');
                    });
                }

                if ($('.switch-sidebar-image input:checked').length == 0) {
                    var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                }
            });

            $('.switch-sidebar-image input').change(function() {
                $full_page_background = $('.full-page-background');

                $input = $(this);

                if ($input.is(':checked')) {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar_img_container.fadeIn('fast');
                        $sidebar.attr('data-image', '#');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page_background.fadeIn('fast');
                        $full_page.attr('data-image', '#');
                    }

                    background_image = true;
                } else {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar.removeAttr('data-image');
                        $sidebar_img_container.fadeOut('fast');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page.removeAttr('data-image', '#');
                        $full_page_background.fadeOut('fast');
                    }

                    background_image = false;
                }
            });

            $('.switch-sidebar-mini input').change(function() {
                $body = $('body');

                $input = $(this);

                if (md.misc.sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    md.misc.sidebar_mini_active = false;

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                } else {

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                    setTimeout(function() {
                        $('body').addClass('sidebar-mini');

                        md.misc.sidebar_mini_active = true;
                    }, 300);
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function() {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function() {
                    clearInterval(simulateWindowResize);
                }, 1000);

            });
        });
    });
</script>
</body>

</html>

