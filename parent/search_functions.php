<?php
require_once "../connection.php";
session_start();
$id = $_SESSION["id"];
if(isset($_POST['search']))
{
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $age2= 0;
    $sql = "SELECT * from adopt_child where age BETWEEN $age2 AND $age ";
    $search=$conn->query($sql);
    $rows=$search->fetchAll(PDO::FETCH_ASSOC);
//    var_dump($rows);

    $_SESSION['adopt_data'] =$rows;
    var_dump($_SESSION['adopt_data']);
//    header("Location:search_functions.php");
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
        <h1 style="padding-left: 50px" class="bg-info">Search Children</h1>
        <div class="form-content form-inline row justify-content-between">
            <form method="POST" class="" style="padding-left: 50px">
                <div class="row">
                    <div class="form-group">
                        <label class="control-label" for="age">Age</label>
                        <div class="controls">
                            <input type="radio" id="b10" name="age" value="10">
                            <label for="b10">Below 10</label><br>
                            <input type="radio" id="b15" name="age" value="15">
                            <label for="b15">Below 15</label><br>
                            <input type="radio" id="b20" name="age" value="20">
                            <label for="b20">Below 20</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label" for="gender">Gender</label>
                        <div class="controls">
                            <input type="radio" id="male" name="gender" value="Male">
                            <label for="male">Male</label><br>
                            <input type="radio" id="female" name="gender" value="Female">
                            <label for="female">Female</label><br>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top: 50px">
                    <button name="search" class="btn d-flex btn-primary align-content-center justify-content-center">
                        SEARCH
                    </button>
                </div>
            </form>
        </div>

<!--        Search Data-->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                    <th>
                        Name
                    </th>
                    <th>
                        Age
                    </th>
                    <th>
                        Image
                    </th>
                    <th>
                        Action
                    </th>
                    </thead>
                    <tbody>
                    <?php
                    if (isset( $_SESSION['adopt_data']) )
                    {
                    foreach ( $_SESSION['adopt_data'][0] as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['age']; ?></td>
                            <td><img src="<?php echo '../parent/img/' . $row['image']; ?>" height="100"
                                     width="100">
                            </td>
                            <td><a class="btn btn-info" href="edit.php?id='.$row['id'].'">Edit</a>
                                <a class="btn btn-info"
                                   href="userprofile.php?id=<?php echo $row['id'] ?>">View</a>
                            </td>
                        </tr>


                    <?php }
                    }
                    else
                    {
                        echo "<span style='color: indianred'> No Data Available </span>";
                    }
                    ?>
                    </tbody>
                </table>
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
            <div class="sidebar--link ">
                <i class="fa fa-wrench"></i>
                <a href="payment.php">Payment</a>
            </div>
            <div class="sidebar--link ">
                <i class="fa fa-archive "></i>
                <a href="payment_status.php">Payment Status</a>
            </div>
            <div class="sidebar--link active_menu_link">
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
