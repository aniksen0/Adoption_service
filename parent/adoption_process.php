<?php
require_once "../connection.php";
session_start();
$id = $_SESSION["id"];
$user_data_sql = "SELECT * FROM parent_requirement  WHERE parent_id = $id";
$data = $conn->query($user_data_sql);
$user_data = $data->fetchALL(PDO::FETCH_ASSOC);

if (isset($_POST['btn'])) {
    if (isset($_POST['child_age_min'])) {

        $sql = "INSERT INTO parent_requirement (sn,parent_id,child_age_min,child_age_max,child_color,child_religion,child_hair,child_height,child_parent_rights) VALUES (:sn ,:parent_id, :child_age_min, :child_age_max, :child_color , :child_religion, :child_hair, :child_height, :child_parent_rights  )";
        $data=$conn->prepare($sql);
        $data->execute(array(
            ':sn' => null,
            ':parent_id' => htmlentities($_SESSION['id']),
            ':child_age_min' => htmlentities($_POST['child_age_min']),
            ':child_age_max' => htmlentities($_POST['child_age_max']),
            ':child_color' => "Not Applicable",
            ':child_religion' => htmlentities($_POST['child_religion']),
            ':child_hair' => htmlentities($_POST['child_hair']),
            ':child_height' => htmlentities($_POST['child_height']),
            ':child_parent_rights' => htmlentities($_POST['child_parent_rights']),
        ));
        echo $sql;
        $_SESSION["success"] = "Data Updated";
        header("Location:adoption_process.php");
        return;
    }

}
//else
//{
//    echo "problem";
//    $_SESSION["error"]="Password not matched";
//    header("Location:info.php");
//    return;
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="css/font/css/all.min.css" crossorigin="anonymous">
    <link rel="stylesheeet" href="boot/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mainSidebar.css">
    <link rel="stylesheet" href="css/mainStyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/profile.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Adoption Process</title>
</head>
<body id="body">
<div class="container1 bg-light">
    <main>
        <h1 class="alert">Adoption Process</h1>
        <?php if (isset($_SESSION["error"])) { ?>
        <p class="justify-content-center align-content-center alert alert-warning text-center ">
            <?php   echo $_SESSION['error'];
            unset($_SESSION['error']);
            ?>
            <?php } ?></p>
        <?php if (isset($_SESSION["success"])) { ?>
        <p class="justify-content-center align-content-center alert alert-success text-center">
             <?php   echo $_SESSION['success'];
                unset($_SESSION['success']);
            ?>
             <?php } ?></p>
        <hr>
        <?php
        if ($user_data != null)
        {?>
        <p class="justify-content-center align-content-center alert alert-danger text-center">
            <?php   echo "You already submitted the data. Please be patience we will contact you.";
            ?>
            <?php } ?></p>

        <div class="container" style="padding-left: 50px">
            <div class="form-content form-inline row justify-content-between">
                <form method="post">
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label" for="child_age_min">Child Age <sup>(Minimum)</sup></label>
                            <div class="controls">
                                <input type="text" id="child_age_min" name="child_age_min"
                                       placeholder="child_age_min" class="input-xlarge"
                                       required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <!-- Username -->
                                <label class="control-label" for="child_age_max">Child Age <sup>Max</sup></label>
                                <div class="controls">
                                    <input type="text" id="child_age_max"
                                           name="child_age_max" placeholder="child_age_max" class="input-xlarge"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-4">
                                <div class="control-group">
                                    <!-- Username -->
                                    <label class="control-label" for="Religion">Religion</label>
                                    <div class="controls">
                                        <input type="text" id="Religion"
                                               name="child_religion" placeholder="Religion" class="input-xlarge"
                                               required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <!-- Username -->
                                <label class="control-label" for="marital_status">Hair</label>
                                <div class="controls">
                                    <select name="child_hair" id="child_hair">
                                        <option value="n/a">Select One</option>
                                        <option
                                            value="curly">Curly
                                        </option>
                                        <option
                                            value="straight">Straight
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <!-- Username -->
                                <label class="control-label" for="height">Height</label>
                                <div class="controls">
                                    <input type="text" id="child_height"
                                           name="child_height" placeholder="child_height" class="input-xlarge"
                                           required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label" for="child_parent_rights"><strong>Do you wish child's parent should visit
                                there child in occasion? </strong></label>
                            <div class="controls">
                                <input type="radio" id="YES" name="child_parent_rights" value="yes">
                                <label for="YES">YES</label><br>
                                <input type="radio" id="no" name="child_parent_rights" value="no">
                                <label for="no">NO</label><br>
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Button -->
                            <div class="controls">
                                <button name="btn" <?php  if ($user_data != null) echo 'disabled'?>  class="btn btn-success">Submit For Processing</button>
                                <br>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <div id="sidebar">
        <div class="sidebar--title">
            <div class="sidebar--img">
                <img src="img/img-01.png" alt="logo"/>
                <h1>Parental Control</h1>

            </div>
            <i
                onclick="closeSidebar()"
                class="far fa-clock"
                id="sidebarIcon"
                aria-hidden="true"
            ></i>
        </div>
        <p>Adoption Section</p>
        <div class="sidebar--menu">
            <a href="index.php">
                <div class="sidebar--link ">
                    <i class="fa fa-home"></i>
                    Overview
                </div>
            </a>

            <h2>View</h2>
            <a href="info.php">
                <div class="sidebar--link ">
                    <i class="fa fa-user-secret" aria-hidden="true"></i>
                    Update Info
                </div>
            </a>

            <a href="registration_details.php">
                <div class="sidebar--link ">
                    <i class="fa fa-building-o"></i>
                    Registration Details
                </div>
            </a>
            <div class="sidebar--link ">
                <i class="fa fa-wrench"></i>
                <a href="payment.php">Payment</a>
            </div>
            <div class="sidebar--link ">
                <i class="fa fa-archive "></i>
                <a href="payment_status.php">Payment Status</a>
            </div>
            <div class="sidebar--link">
                <i class="fa fa-handshake-o"></i>
                <a href="search_functions.php">Search for adoption</a>
            </div>
            <h2>Update</h2>
            <div class="sidebar--link active_menu_link">
                <i class="fa fa-sign-out"></i>
                <a href="adoption_process.php">Adoption Process</a>
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
