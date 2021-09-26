<?php
require_once "../connection.php";
session_start();
$id = $_SESSION["id"];
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
        <h1> Your Payment  Status </h1>
        <table class="table">
            <thead>
            <th>Serial No</th>
            <th>Payment Process</th>
            <th>Payment Date</th>
            <th>Expiration Date</th>
            <th>Payment For</th>
            <th>Amount</th>
            <th>Payment For</th>
            <th> status</th>
            </thead>
            <tbody>
                <?php foreach ($all_payment as $payment) {?>
                <tr>
                    <td><?php echo $payment['sn']; ?></td>
                    <td><?php echo $payment['payment_process']; ?></td>
                    <td><?php echo $payment['payment_date']; ?></td>
                    <td><?php echo $payment['expiration_date']; ?></td>
                    <td><?php echo $payment['payment_for']; ?></td>
                    <td><?php echo $payment['from1']; ?></td>
                    <td><?php echo $payment['payment_money']; ?></td>
                    <td><?php  if($payment['status'] =="active"){echo "Received";} else echo "Pending"; ?></td>
                <?php }
                ?>
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
        <p>Adoption Section</p>
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
            <div class="sidebar--link ">
                <i class="fa fa-wrench"></i>
                <a href="payment.php">Payment</a>
            </div>
            <div class="sidebar--link active_menu_link">
                <i class="fa fa-archive "></i>
                <a href="payment_status.php">Payment Status</a>
            </div>
            <div class="sidebar--link">
                <i class="fa fa-handshake-o"></i>
                <a href="search_functions.php">Search for adoption</a>
            </div>
            <h2>Update</h2>
            <div class="sidebar--link">
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
