<?php
require_once "../connection.php";
session_start();
$id = $_SESSION["id"];
echo $_SESSION['id'];
$user_data_sql = "SELECT * FROM users WHERE id= $id";
$data = $conn->query($user_data_sql);
$user_data = $data->fetchALL(PDO::FETCH_ASSOC);

if (isset($_POST['btn'])) {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['ca'])) {
        $folder = "img/";
        $filename = $_FILES["file1"]["name"];
        $tempname = $_FILES["file1"]["tmp_name"];
        $filenamenew = $filename;
        move_uploaded_file($tempname, $folder.$filenamenew);

        $sql = "UPDATE users SET name=:name, email=:email , contact_address = :contact_address, phone = :phone , marital_status =:marital_status , gender = :gender, profession = :profession, dob=:dob, children=:children, nid=:nid, image=:image, permanent_address = :permanent_address, service_status = :service_status, last_renewed = :last_renewed, role=:role WHERE id=$id";
        $data = $conn->prepare($sql);
        $data->execute(array(
            ':name' => htmlentities($_POST['name']),
            ':email' => htmlentities($_POST['email']),
            ':contact_address' => htmlentities($_POST['ca']),
            ':phone' => htmlentities($_POST['phone']),
            ':marital_status' => htmlentities($_POST['marital_status']),
            ':gender' => htmlentities($_POST['gender']),
            ':profession' => htmlentities($_POST['profession']),
            ':dob' => htmlentities($_POST['dob']),
            ':children' => htmlentities($_POST['children']),
            ':nid' => htmlentities($_POST['nid']),
            ':image' => htmlentities($filenamenew),
            ':permanent_address' => htmlentities($_POST['permanent_address']),
            ':service_status' => "new",
            ':last_renewed' => date("Y/m/d"),
            ':role' => 3
        ));
        echo $sql;
        $_SESSION["success"]="Data Updated";
        header("Location:info.php");
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

    <title>Dashboard</title>
</head>
<body id="body">
<div class="container1 bg-light">
    <main>
        <h1 class="alert">Update Info</h1>
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
        <div class="container" style="padding-left: 50px">
            <div class="form-content form-inline row justify-content-between">
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label" for="username">Name</label>
                            <div class="controls">
                                <input type="text" id="username" value="<?php echo $user_data[0]['name'] ?>" name="name"
                                       placeholder="" class="input-xlarge"
                                       required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <!-- Username -->
                                <label class="control-label" for="Email">Email</label>
                                <div class="controls">
                                    <input type="text" id="Email" value="<?php echo $user_data[0]['email'] ?>"
                                           name="email" placeholder="Email" class="input-xlarge"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-4">
                                <div class="control-group">
                                    <!-- Username -->
                                    <label class="control-label" for="Phone">Phone</label>
                                    <div class="controls">
                                        <input type="text" id="Phone" value="<?php echo $user_data[0]['phone'] ?>"
                                               name="phone" placeholder="Phone" class="input-xlarge"
                                               required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <!-- Username -->
                                <label class="control-label" for="marital_status">Marital Status</label>
                                <div class="controls">
                                    <select name="marital_status" id="marital_status">
                                        <option value="">Select One</option>
                                        <option <?php if ($user_data[0]['marital_status'] == 'married') echo 'selected' ?>
                                            value="married">Married
                                        </option>
                                        <option <?php if ($user_data[0]['marital_status'] == 'single') echo 'selected' ?>
                                            value="single">Single
                                        </option>
                                        <option <?php if ($user_data[0]['marital_status'] == 'divorced') echo 'selected' ?>
                                            value="divorced">Divorced
                                        </option>
                                        <option <?php if ($user_data[0]['marital_status'] == 'single father') echo 'selected' ?>
                                            value="Single Father">Single Father
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="form-group">
                            <div class="control-group">
                                <!-- Username -->
                                <label class="control-label" for="gender">Gender</label>
                                <div class="controls">
                                    <input type="radio" <?php if ($user_data[0]['gender'] == 'M') echo 'checked' ?>
                                           id="male" name="gender" value="M">
                                    <label for="male">Male</label><br>
                                    <input type="radio" <?php if ($user_data[0]['gender'] == 'F') echo 'checked' ?>
                                           id="Female" name="gender" value="F">
                                    <label for="Female">Female</label><br>
                                    <input type="radio" <?php if ($user_data[0]['gender'] == 'nb') echo 'checked' ?>
                                           id="nb" name="gender" value="nb">
                                    <label for="nb">Non-Binary</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <!-- Username -->
                                <label class="control-label" for="username">Profession</label>
                                <div class="controls">
                                    <input type="text" value="<?php echo $user_data[0]['profession'] ?>" id="Profession"
                                           name="profession" placeholder="Profession" class="input-xlarge"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <!-- Username -->
                                <label class="control-label" for="ContactAddress">Contact Address</label>
                                <div class="controls">
                                    <textarea id="ContactAddress" name="ca" placeholder="Contact Address" class="input-xlarge"
                                              required><?php echo $user_data[0]['contact_address']?> </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="form-group">
                            <div class="control-group">
                                <!-- Username -->
                                <label class="control-label" for="DOB">DOB</label>
                                <div class="controls">
                                    <input type="date" id="DOB" value="<?php echo $user_data[0]['dob'] ?>" name="dob"
                                           placeholder="DOB" class="input-xlarge"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <!-- Username -->
                                <label class="control-label" for="children">Current Children(*if yes)</label>
                                <div class="controls">
                                    <input type="number" id="children" value="<?php echo $user_data[0]['children'] ?>"
                                           name="children" placeholder="children" class="input-xlarge"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <!-- Username -->
                                <label class="control-label" for="NID">NID</label>
                                <div class="controls">
                                    <input type="text" id="NID" value="<?php echo $user_data[0]['nid'] ?>" name="nid"
                                           placeholder="NID" class="input-xlarge"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <!-- Username -->
                                <label class="control-label" for="Image">Image::</label>
                                <span class="text-danger"> Not more than 1MB</span>
                                <div class="controls">
                                    <input type="file" id="Image" name="file1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="form-group">
                            <div class="control-group">
                                <!-- Username -->
                                <label class="control-label" for="pa">Permanent Address</label>
                                <div class="controls">
                                    <textarea type="text" id="pa" name="permanent_address"
                                              placeholder="permanent_address" class="input-xlarge"
                                              required><?php echo $user_data[0]['permanent_address'] ?> </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Button -->
                            <div class="controls">
                                <button name="btn" class="btn btn-success">Register</button>
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
                <div class="sidebar--link active_menu_link">
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
