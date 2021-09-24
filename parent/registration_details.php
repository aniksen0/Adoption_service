<?php
require_once "../connection.php";
session_start();
$id = $_SESSION["id"];
echo $_SESSION['id'];
$user_data_sql = "SELECT * FROM account_information  WHERE user_id = $id";
$data = $conn->query($user_data_sql);
$user_data = $data->fetchALL(PDO::FETCH_ASSOC);

$sql = "Select * from payment where id = $id";
$data2 = $conn->query($sql);
$all_payment = $data2->fetchAll(PDO::FETCH_ASSOC);
//var_dump($all_payment)
$taka = 0;
foreach ($all_payment as $taka1)
{
    $taka += $taka1['payment_money'];
}
echo $taka;
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
        <h1> Your Adoption History </h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">Account Status</th>
                <td scope="row"> <?php echo $user_data[0]['account_status'] ?></td>
            </tr>
            <tr>
                <th scope="row">Payment Status(One time)</th>
                <td scope="row"> <?php echo $user_data[0]['payment_status'] ?></td>
            </tr>
            <tr>
                <th scope="row">Adoption Status</th>
                <td scope="row"> <?php echo $user_data[0]['adoption_status'] ?></td>
            </tr>
            <tr>
                <th scope="row">All Payment History</th>
                <td scope="row"><?php foreach ($all_payment as $payment) { echo $payment['payment_for'].", " ;}?> </td>
            </tr>
            <tr>
                <th scope="row">Total Taka</th>
                <td scope="row"><?php echo $taka ?> </td>
            </tr>
            </tbody>
        </table>
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
                <div class="sidebar--link active_menu_link">
                    <i class="fa fa-building-o"></i>
                    Registration Details
                </div>
            </a>
            <div class="sidebar--link ">
                <i class="fa fa-wrench"></i>
                <a href="payment.php">Payment</a>
            </div>
            <div class="sidebar--link active">
                <i class="fa fa-archive"></i>
                <a href="payment_status.php">Payment Status</a>
            </div>
            <div class="sidebar--link">
                <i class="fa fa-handshake-o"></i>
                <a href="renew_status.php">Search for adoption</a>
            </div>
            <h2>Update</h2>
            <div class="sidebar--link">
                <i class="fa fa-sign-out"></i>
                <a href="update_renew_status.php">Adoption Process</a>
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
