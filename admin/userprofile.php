<?php
require_once "../connection.php";
$id = $_GET['id'];
$id_sql = "SELECT * FROM users WHERE id= $id";
$data = $conn->query($id_sql);
$rows = $data->fetchALL(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheeet" href=boot/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/userprofilecss.css">
    <link rel="stylesheet" href="css/mainStyle.css">
    <title>User Profile|Payroll Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
            crossorigin="anonymous"></script>
</head>
<div class="container border">
    <br>
    <br>
    <br>
    <div class="col col-sm-12 alert alert-danger"> Profile of <?php $rows[0]['name'] ?> <a class="float-right"
                                                                                           style="text-decoration: none; background-color: indianred;color: #9fcdff"
                                                                                           href="logout.php">
            <button style="background-color: indianred" id="btn btn-alert" type="submit"> Log-Out</button>
        </a></div>
    <div class=" col-sm-4">
        <button class="btn btn-info"><a href="tables.php">Back</a></button>
    </div>
    <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle"
                             width="150">
                        <div class="mt-3">
                            <h4><?= $rows[0]['profession'] ?></h4>
                            <p class="text-secondary mb-1"><?php echo $rows[0]['name'] ?></p>
                            <p class="text-muted font-size-sm"><?php echo $rows[0]['contact_address'] ?></p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6>NID</h6>
                        <span class="text-secondary"><?php echo $rows[0]['nid'] ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6>Total Adopted</h6>
                        <span class="text-secondary"><?php echo "0" ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6> Email</h6>
                        <span class="text-secondary"><?php echo $rows[0]['email'] ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6>Marital Status</h6>
                        <span class="text-secondary"><?php echo $rows[0]['marital_status'] ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6>gender </h6>
                        <span class="text-secondary"><?php echo $rows[0]['gender'] ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6></h6>
                        <span class="text-secondary"><?php echo $rows[0]['dob'] ?></span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?php echo $rows[0]["name"] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Profile Created</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?php echo $rows[0]["created_at"] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">service status</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?php echo $rows[0]['service_status'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Last Renewed</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            +880- <?php echo $rows[0]["last_renewed"] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Local-Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?php echo $rows[0]['permanent_address'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</html>