<?php
/**
 * Created by PhpStorm.
 * User: ANIK
 * Date: 1/8/2021
 * Time: 11:35 PM
 */
session_start();

require "../connection.php";
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
//echo $_SESSION['name'];
//echo $_SESSION['role'];
$_SESSION['active'] = "active";


$statusquery = "SELECT * from payment";
$store1 = $conn->query($statusquery);
$rows = $store1->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['submit']))
{
    $status = "active";
    $sql = "UPDATE payment SET status= :status where sn = :sn";
    $data = $conn->prepare($sql);
    $data->execute(array(
        ":sn" => $_POST['sn'],
        ":status" => $status
    ));
    header("Location:transaction.php");
    return;
}
//var_dump($rows)

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
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

          Tip 2: you can also add an image using data-image tag
      -->
        <div class="logo row justify-content-center">
            <!--            <img class="img-fluid" width="100" height="80" src="../img/logo.svg" alt="Site logo"/>-->
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
                        <p>Add Shop Owner</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="tables.php">
                        <i class="material-icons">content_paste</i>
                        <p>Shop List</p>
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
                    <a class="nav-link" href="category.php"">
                    <i class="material-icons">library_books</i>
                    <p>Category</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="syscheck.php">
                        <i class="material-icons">bubble_chart</i>
                        <p>System Check</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="map.php">
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
        <div class="content container">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title ">Payment History</h4>
                                    <p class="card-category"> Cautions: Maintain secracy </p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class=" text-primary">
                                            <th>
                                                Serial No
                                            </th>
                                            <th>
                                                Id
                                            </th>
                                            <th>
                                                Payment Process
                                            </th>
                                            <th>
                                                Payment Date
                                            </th>
                                            <th>
                                                Exp Date
                                            </th>
                                            <th>
                                                Quote
                                            </th>
                                            <th>
                                                Sender
                                            </th>
                                            <th>
                                                Total
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach ($rows as $row) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['sn']; ?></td>
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td><?php echo $row['payment_process']; ?></td>
                                                    <td><?php echo $row['payment_date']; ?></td>
                                                    <td><?php echo $row['expiration_date']; ?></td>
                                                    <td><?php echo $row['payment_for']; ?></td>
                                                    <td><?php echo $row['from1']; ?></td>
                                                    <td><?php echo $row['payment_money']; ?></td>
                                                    <td><?php echo $row['status']; ?></td>
                                                    </td>
                                                    <form method="post">
                                                        <input type="text" name="sn" hidden value="<?php echo $row['sn']; ?>">
                                                        <td><button class="btn btn-success" <?php if ($row['status'] == "Not processed") { echo "hidden" ;}?> >Active</button></td>
                                                        <td><button name="submit" <?php if ($row['status'] == "active") { echo "hidden" ;}?>  class="btn btn-info">Processed</button>
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

                <!--   Core JS Files   -->
                <script src="js/core/jquery.min.js"></script>
                <script src="js/core/popper.min.js"></script>
                <script src="js/core/bootstrap-material-design.min.js"></script>
                <script src="js/plugins/perfect-scrollbar.jquery.min.js"></script>

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

