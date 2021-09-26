<?php
/**
 * Created by PhpStorm.
 * User: chapal
 * Date: 1/18/2021
 * Time: 11:36 PM
 */
session_start();
require_once "../connection.php";
if (isset($_POST['name']) && isset($_POST['dob'])) {
    if (is_numeric($_POST['age'])) {
        $folder = "img/";
        $filename = $_FILES["file1"]["name"];
        $filename = $_FILES["file1"]["name"];
        $tempname = $_FILES["file1"]["tmp_name"];
        $filenamenew = $folder . $filename;
        move_uploaded_file($tempname, $filenamenew);

        $sql = "Insert INTO adopt_child(name,image,age,gender,dob,birth_certificate_no,born_in,father_name,mother_name,color,hair,disease,alergy,medical_condition,eye_color,height,hobby) VALUES (:name,:age,:image,:gender,:dob,:birth_certificate_no,:born_in,:father_name,:mother_name,:color,:hair,:disease,:alergy,:medical_condition,:eye_color,:height,:hobby)";
        $data = $conn->prepare($sql);
        $data->execute(array(
            ':name' => htmlentities($_POST['name']),
            ':age' => htmlentities($_POST['age']),
            ':gender' => htmlentities($_POST['gender']),
            ':dob' => htmlentities($_POST['dob']),
            ':image' => $filenamenew,
            ':birth_certificate_no' => htmlentities($_POST['birth_certificate_no']),
            ':born_in' => htmlentities($_POST['born_in']),
            ':father_name' => htmlentities($_POST['father_name']),
            ':mother_name' => htmlentities($_POST['mother_name']),
            ':color' => htmlentities($_POST['color']),
            ':hair' => htmlentities($_POST['hair']),
            ':disease' => htmlentities($_POST['disease']),
            ':alergy' => htmlentities($_POST['alergy']),
            ':medical_condition' => htmlentities($_POST['medical_condition']),
            ':eye_color' => htmlentities($_POST['eye_color']),
            ':height' => htmlentities($_POST['height']),
            ':hobby' => htmlentities($_POST['hobby'])
        ));

        $_SESSION['success'] = "Inserted";
        header("Location:child_profile.php");
        return;
    } else {
        $_SESSION["error"] = "There is a problem with data. Please add appropriate data";
        header("Location:user1.php");
        return;
    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
    <link rel="icon" type="image/png" href="img/favicon.png">
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
            <img class="img-fluid" width="100" height="80" src="../img/logo.svg" alt="adminpanel"/>
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
                    <a class="navbar-brand" href="javascript:;">Table List</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">Add Child Profile</h4>
                                <p class="card-category"> Cautions: Maintain secracy </p>
                            </div>
                            <div class="card-body">
                                <div class="main--title">

                                    <div class="main--greeting">

                                        <?php
                                        if (isset($_SESSION['success'])) {
                                            echo('<p style="color: white;" > SUCESS:::' . htmlentities($_SESSION['success']) . "</p>\n");
                                            unset($_SESSION['success']);

                                        }
                                        if (isset($_SESSION['error'])) {
                                            echo('<p style="color: white;">ERROR::::' . htmlentities($_SESSION['error']) . "</p>\n");
                                            unset($_SESSION['error']);

                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form class="" method="post" enctype="multipart/form-data">
                                        <h1>Register</h1>
                                        <p> MAINTAIN GROUP POLICY AND ROLE.</p>
                                        <hr>
                                        <div class="form-row">

                                            <div class="col-sm-4">
                                                <label for="name"><b>name:</b></label>
                                                <input class="input form-control" type="text" size="20" maxlength="10"
                                                       placeholder="Enter Child Name" name="name" id="name" required>
                                            </div>

                                            <div class="col-sm-4">
                                                <label for="age"><b>Age:</b></label>
                                                <input class="input form-control" type="text" size="25"
                                                       placeholder="Enter age" name="age" id="age" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="gender"><b>gender:</b></label>
                                                <input class="input form-control" type="text" size="25"
                                                       placeholder="Enter gender" name="gender" id="gender" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <label for="dob"><b>Date of Birth:</b></label>
                                            <input class="input form-control" type="date" size="25"
                                                   placeholder="Enter dob" name="dob" id="dob" required>
                                        </div>

                                        <div class="col-sm-12">
                                            <hr>
                                            <label for="file">Image</label>
                                            <input type="file" id="file" name="file1" value="">
                                            <p style="color: indianred;">File size should be less than 1MB</p>
                                            <hr>
                                        </div>
                                        <div class="form-row">

                                            <div class="col-sm-4">
                                                <label for="birth_certificate_no"><b>birth_certificate_no:</b></label>
                                                <input class="input form-control" type="text" size="25"
                                                       placeholder="birth_certificate_no" name="birth_certificate_no"
                                                       id="birth_certificate_no" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="born_in"><b>Birth Place:</b></label>
                                                <input class="input form-control" type="text" size="25"
                                                       placeholder="born_in" name="born_in"
                                                       id="born_in" required>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-row">

                                            <div class="col-sm-4">
                                                <label for="fn"><b> Father Name:</b></label>
                                                <input class="input form-control" type="text" size="25"
                                                       placeholder="Father Name" name="father_name" id="fn" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="mother_name"><b>Mother Name</b></label>
                                                <input class="input form-control" type="text" size="25"
                                                       placeholder="Enter mother_name" name="mother_name"
                                                       id="mother_name" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="color"><b>Color</b></label>
                                                <input class="input form-control" type="text" size="25"
                                                       placeholder="Enter color" name="color" id="color" required>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="col-sm-6">
                                            <label for="hair"><b>Hair Color:</b></label>
                                            <input class="input form-control" type="text" size="25"
                                                   placeholder="Enter hair" name="hair" id="hair" required>
                                            <hr>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="disease"><b>Disease(if any):</b></label>
                                            <input class="input form-control" type="text" size="25"
                                                   placeholder="disease" name="disease" id="disease" required>
                                            <hr>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="alergy"><b>Alergy(if any):</b></label>
                                            <input class="input form-control" type="text" size="25"
                                                   placeholder="Enter alergy" name="alergy" id="alergy" required>
                                            <hr>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="medical_condition"><b>medical_condition(if any):</b></label>
                                                <input class="input form-control" type="text" size="25"
                                                       placeholder="Enter medical_condition" name="medical_condition"
                                                       id="medical_condition" required>
                                                <hr>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="eye_color"><b>eye_color(if any):</b></label>
                                                <input class="input form-control" type="text" size="25"
                                                       placeholder="Enter eye_color" name="eye_color" id="eye_color"
                                                       required>
                                                <hr>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="height"><b>height(if any):</b></label>
                                                <input class="input form-control" type="text" size="25"
                                                       placeholder="Enter height" name="height" id="height" required>
                                                <hr>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="hobby"><b>hobby(if any):</b></label>
                                                <input class="input form-control" type="text" size="25"
                                                       placeholder="Enter hobby" name="hobby" id="hobby" required>
                                                <hr>
                                            </div>
                                        </div>


                                        <p>Please provide all the information and follow <a href="#">Rules and
                                                Regulationsy</a>.</p>
                                        <button type="submit" name='btn' class=" btnreg btn btn-success">Register
                                        </button>
                                        <hr>
                                    </form>
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
</body>

</html>