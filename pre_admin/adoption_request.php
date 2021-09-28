<?php
/**
 * Created by PhpStorm.
 * User: Anik
 * Date: 1/18/2021
 * Time: 11:36 PM
 */
session_start();

require "../connection.php";
//if (!isset($_SESSION['role'])&&!isset($_SESSION['name']))
//{
//    header("Location: ../Login_v1/login.php");
//    return;
//}
//if ($_SESSION['role']!=4)
//{
//    header("Location: ../AcessDenied.php");
//    return;
//}
$from = date("Y/m/d");
$to = date("Y/m/d");
echo $to;
$logquery = "SELECT * FROM parent_requirement";
$logdata = $conn->query($logquery);
$rows = $logdata->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['block']))
{
    $sn = $_POST['sn'];
    $sql = "UPDATE parent_requirement SET status=:status WHERE sn= $sn";
    $data = $conn->prepare($sql);
    $data->execute(array(
        ':status'=>"active",
    ));
    $newsl=$_POST['sn'];
    $sql2 = "Insert INTO syslog (action, time) VALUES(:action, :time)";
    $block = $conn->prepare($sql2);
    $block->execute(array(
        ':action'=>"ID:".$sn."Adoption Accepted, Processing Started",
        ':time'=> date("Y/m/d")
    ));

    header("Location:adoption_request.php");
    return;


}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>
        Admin Dashboard
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="css/material-dashboard.css?v=2.1.2" rel="stylesheet"/>

</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="/img/sidebar-1.jpg">

        <div class="logo row justify-content-center">
            <p class="align-items-center" style="color: indianred">Admin Panel</p>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">
                        <i class="material-icons"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item active ">
                    <a class="nav-link" href="adoption_request.php">
                        <i class="material-icons">person</i>
                        <p>Adoption Request</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="adoption_form.php">
                        <i class="material-icons">content_paste</i>
                        <p>Adoption Form</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="adoption_status.php"">
                    <i class="material-icons">library_books</i>
                    <p>Adoption Status</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="child_profile.php"">
                    <i class="material-icons">library_books</i>
                    <p>All Child Profile</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="court_order.php">
                        <i class="material-icons">bubble_chart</i>
                        <p>Court Order Upload</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="adoption_details.php">
                        <i class="material-icons">notifications</i>
                        <p>Adoption Details</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="notification.php">
                        <i class="material-icons">notifications</i>
                        <p>Adoption Details</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="logout.php">
                        <i class="material-icons">Log Out</i>
                        <p>Adoption Details</p>
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
                    <a class="navbar-brand" href="javascript:;">Dashboard</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation">
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
                            <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">person</i>
                                <p class="d-lg-none d-md-block">
                                    Account
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                <a class="dropdown-item" href="#profile">Profile</a>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">Parental Permission Date:<?php echo date("Y-m-d") ?> </h4>
                                <p class="card-category"> Cautions: Maintain secracy </p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                        <th>
                                           Parent ID
                                        </th>
                                        <th>
                                            child_age_min
                                        </th>
                                        <th>
                                            child_age_max
                                        </th>
                                        <th>
                                            child_religion
                                        </th> <th>
                                            child_hair
                                        </th><th>
                                            child_height
                                        </th>
                                        <th>
                                            Parental Authority
                                        </th>
                                        <th> Status</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($rows as $row) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['parent_id']; ?></td>
                                                <td><?php echo $row['child_age_min']; ?></td>
                                                <td><?php echo $row['child_age_max']; ?> </td>
                                                <td><?php echo $row['child_religion']; ?> </td>
                                                <td><?php echo $row['child_hair']; ?> </td>
                                                <td><?php echo $row['child_height']; ?> </td>
                                                <td><?php echo $row['child_parent_rights']; ?> </td>

                                                </td>

                                                <form method="POST">
                                                    <td>
                                                        <input name="sn" hidden value="<?php echo $row['sn']; ?>">
                                                        <button name="block"
                                                            <?php
                                                            if (($row['status'])=="active")
                                                            {
                                                                echo "disabled";
                                                            }
                                                            ?>
                                                                class="btn btn-danger">

                                                            <?php
                                                            if (($row['status'])=="inactive")
                                                            {
                                                                echo "ACCEPT";
                                                            }
                                                            else
                                                            {
                                                                echo "ACCEPTED";
                                                            }
                                                            ?></button>
                                                    </td>
                                                </form>

                                            </tr>


                                        <?php }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <footer id="footer">
                        <p>&copyright All rights reserved</p>
                    </footer>
                </div>
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
        <script src="/js/plugins/arrive.min.js"></script>
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
            $(document).ready(function () {
                $().ready(function () {
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

                    $('.fixed-plugin a').click(function (event) {
                        // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                        if ($(this).hasClass('switch-trigger')) {
                            if (event.stopPropagation) {
                                event.stopPropagation();
                            } else if (window.event) {
                                window.event.cancelBubble = true;
                            }
                        }
                    });

                    $('.fixed-plugin .active-color span').click(function () {
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

                    $('.fixed-plugin .background-color .badge').click(function () {
                        $(this).siblings().removeClass('active');
                        $(this).addClass('active');

                        var new_color = $(this).data('background-color');

                        if ($sidebar.length != 0) {
                            $sidebar.attr('data-background-color', new_color);
                        }
                    });

                    $('.fixed-plugin .img-holder').click(function () {
                        $full_page_background = $('.full-page-background');

                        $(this).parent('li').siblings().removeClass('active');
                        $(this).parent('li').addClass('active');


                        var new_image = $(this).find("img").attr('src');

                        if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                            $sidebar_img_container.fadeOut('fast', function () {
                                $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                                $sidebar_img_container.fadeIn('fast');
                            });
                        }

                        if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                            $full_page_background.fadeOut('fast', function () {
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

                    $('.switch-sidebar-image input').change(function () {
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

                    $('.switch-sidebar-mini input').change(function () {
                        $body = $('body');

                        $input = $(this);

                        if (md.misc.sidebar_mini_active == true) {
                            $('body').removeClass('sidebar-mini');
                            md.misc.sidebar_mini_active = false;

                            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                        } else {

                            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                            setTimeout(function () {
                                $('body').addClass('sidebar-mini');

                                md.misc.sidebar_mini_active = true;
                            }, 300);
                        }

                        // we simulate the window Resize so the charts will get updated in realtime.
                        var simulateWindowResize = setInterval(function () {
                            window.dispatchEvent(new Event('resize'));
                        }, 180);

                        // we stop the simulation of Window Resize after the animations are completed
                        setTimeout(function () {
                            clearInterval(simulateWindowResize);
                        }, 1000);

                    });
                });
            });
        </script>
        <script>
            $(document).ready(function () {
                // Javascript method's body can be found in assets/js/demos.js
                md.initDashboardPageCharts();

            });
        </script>
</body>

</html>

