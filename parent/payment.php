<?php
require_once "../connection.php";
session_start();
$id = $_SESSION["id"];
if (isset($_POST['btn']))
{
    $sql = "INSERT INTO payment (id, payment_process, payment_date , expiration_date , payment_for,	from1, payment_money) VALUES (:id, :payment_process, :payment_date , :expiration_date , :payment_for,	:from1, :payment_money)";
    $data = $conn->prepare($sql);
    $data->execute(array(
        ':id'=>$id,
        ':payment_process'=>htmlentities($_POST['payment']),
        ':payment_date'=>date("Y/m/d"),
        ':expiration_date'=>"01/01/2022",
        ':payment_for'=>$_POST['payment_for'],
        ':from1' => $_POST['from1'],
        ':payment_money' =>htmlentities($_POST['payment_money']),
    ));
    $_SESSION['success'] = "Data Updated Successfully our Customer officer will connect with you soon";
    header("Location:payment.php");
    return;
}
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

    <title>Dashboard</title>
</head>
<body id="body">
<div class="container1 bg-light">
    <main>
       <div class="container border">
           <h1> Make Payment</h1>
            <span style="background-color: red"> <?php if (isset($_SESSION["error"])) {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                } ?></span>

        <span style="background-color: greenyellow"> <?php if (isset($_SESSION["success"])) {
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            } ?></span>
           <form method="post" >
               <div class="form-group">
                   <div class="control-group">
                       <div class="controls">
                           <label class="control-label" for="payment">Paymenet Process</label>
                           <div class="controls">
                               <select name="payment" id="payment">
                                   <option value="">Select One</option>
                                   <option value="Bkash">Bkash
                                   </option>
                                   <option
                                       value="NAGAD">NAGAD
                                   </option>
                                   <option
                                       value="ROCKET">ROCKET
                                   </option>
                               </select>
                           </div>
                       </div>
                   </div>
                   <div class="control-group">
                       <div class="controls">
                           <label class="control-label" for="payment_for">payment_for</label>
                           <div class="controls">
                               <select name="payment_for" id="payment_for">
                                   <option value="">Select One</option>
                                   <option value="donation">Donation
                                   </option>
                                   <option
                                       value="one_time_search">Adoption Search One Time
                                   </option>
                                   <option
                                       value="processing_fee"> Processing Fee for Adoption
                                   </option>
                               </select>
                           </div>
                       </div>
                   </div>
                   <div class="control-group">
                       <div class="controls">
                           <label class="control-label" for="from1">Payment from (last 4 digit)</label>
                           <div class="controls">
                               <input type="text" required name="from1" id="from1">
                           </div>
                       </div>
                   </div>

                   <p class="text-danger"> Notice : Processing Fee for adoption  is 2000tk/-  </p>
                   <p class="text-danger"> Notice : Processing Fee for one time search  1000tk/-  </p>
                   <div class="control-group">
                       <div class="controls">
                           <label class="control-label" for="payment_money">Payment Money</label>
                           <div class="controls">
                               <input type="number" required name="payment_money" id="payment_money">
                           </div>
                       </div>
                   </div>
                   <hr>
                   <button name="btn" class="btn-primary"> Button </button>
           </form>

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
        <p>Relief Section</p>
        <div class="sidebar--menu">
            <a href="index.php">
                <div class="sidebar--link">
                    <i class="fa fa-home"></i>
                    Overview
                </div>
            </a>

            <h2>View</h2>
            <a href="info.php">
                <div class="sidebar--link">
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
            <div class="sidebar--link active_menu_link ">
                <i class="fa fa-wrench"></i>
                <a href="payment.php">Payment</a>
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
