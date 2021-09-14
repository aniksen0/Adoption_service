<?php
require_once "../connection.php";
session_start();
$id = $_SESSION["id"];
if(isset($_POST['pass']) == isset($_POST['pass2']))
{
    if (isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['ca']))
    {
        $folder= "parent/img/";
        $filename= $_FILES["file1"]["name"];
        $tempname= $_FILES["file1"]["tmp_name"];
        $filenamenew=$filename;
        move_uploaded_file($tempname,$filenamenew);

        $id_sql = "SELECT id FROM users WHERE id=(SELECT max(id) FROM users);";
        $data = $conn->query($id_sql);
        $rows = $data->fetchALL(PDO::FETCH_ASSOC);
        $last_data = $rows[0]["id"];

        $sql="Insert INTO users(id, name,email,contact_address,phone,marital_status,gender,profession,dob,children,nid,image,permanent_address,service_status,last_renewed,role) VALUES (:id,:name,:email,:contact_address,:phone,:marital_status,:gender,:profession,:dob,:children,:nid,:image,:permanent_address,:service_status,:last_renewed,:role)";
        $data=$conn->prepare($sql);
        $data->execute(array(

            ':id'=>$last_data+1,
            ':name'=>htmlentities($_POST['name']),
            ':email'=>htmlentities($_POST['email']),
            ':contact_address'=>htmlentities($_POST['ca']),
            ':phone'=>htmlentities($_POST['phone']),
            ':marital_status'=>htmlentities($_POST['marital_status']),
            ':gender'=>htmlentities($_POST['gender']),
            ':profession'=>htmlentities($_POST['profession']),
            ':dob'=>htmlentities($_POST['dob']),
            ':children'=>htmlentities($_POST['children']),
            ':nid'=>htmlentities($_POST['nid']),
            ':image'=>htmlentities($filenamenew),
            ':permanent_address'=>htmlentities($_POST['permanent_address']),
            ':service_status'=>"new",
            ':last_renewed'=>date("Y/m/d"),
            ':role'=>3
        ));
//        newdata
        $sql="Insert INTO login(pass) VALUES (:pass)";
        $data=$conn->prepare($sql);
        $data->execute(array(
            ':pass'=>htmlentities($_POST['pass'])
        ));

        //session data
        $_SESSION['new_id']=$last_data+1;
        $_SESSION['new_name']=$_POST['name'];
        header("Location:info.php");
        return;
    }
}
else
{
    $_SESSION["error"]="Password not matched";
    header("Location:info.php");
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
<div class="container1">
    <main>
        <div class="content align-content-center m-auto">
            <div class="container d-flex justify-content-center bg-dark">
                <form class="form-horizontal text-white"  method="POST" enctype="multipart/form-data">
                    <fieldset>
                        <div id="legend">
                            <legend class="h1 text-white">Register</legend>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="control-group">
                                    <!-- Username -->
                                    <label class="control-label" for="username">Name</label>
                                    <div class="controls">
                                        <input type="text" id="username" name="name" placeholder="" class="input-xlarge"
                                               required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="control-group">
                                    <!-- Username -->
                                    <label class="control-label" for="Email">Email</label>
                                    <div class="controls">
                                        <input type="text" id="Email" name="email" placeholder="Email" class="input-xlarge"
                                               required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="control-group">
                                    <!-- Username -->
                                    <label class="control-label" for="ContactAddress">Contact Address</label>
                                    <div class="controls">
                                    <textarea id="ContactAddress" name="ca" placeholder="Contact Address" class="input-xlarge"
                                              required> </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-4">
                                <div class="control-group">
                                    <!-- Username -->
                                    <label class="control-label" for="Phone">Phone</label>
                                    <div class="controls">
                                        <input type="text" id="Phone" name="phone" placeholder="Phone" class="input-xlarge"
                                               required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="control-group">
                                    <!-- Username -->
                                    <label class="control-label" for="marital_status">Marital Status</label>
                                    <div class="controls">
                                        <select name="marital_status" id="marital_status">
                                            <option value="">Select One</option>
                                            <option value="married">Married </option>
                                            <option value="Single">Single</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Single Father">Single Father</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="control-group">
                                    <!-- Username -->
                                    <label class="control-label" for="gender">Gender</label>
                                    <div class="controls">
                                        <input type="radio" id="male" name="gender" value="M">
                                        <label for="male">Male</label><br>
                                        <input type="radio" id="Female" name="gender" value="F">
                                        <label for="Female">Female</label><br>
                                        <input type="radio" id="nb" name="gender" value="nb">
                                        <label for="nb">Non-Binary</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="control-group">
                                <!-- Username -->
                                <label class="control-label" for="pass">Password</label>
                                <div class="controls">
                                    <input type="text" id="pass" name="pass" placeholder="Password" class="input-xlarge"
                                           required>
                                </div>
                            </div>
                            <hr>
                            <p></p>
                            <div class="control-group">
                                <!-- Username -->
                                <label class="control-label" for="Phone">Confirm Password</label>
                                <div class="controls">
                                    <input type="text" id="pass2" name="pass2" placeholder="Provide Password Again" class="input-xlarge"
                                           required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-4">
                                <div class="control-group">
                                    <!-- Username -->
                                    <label class="control-label" for="username">Profession</label>
                                    <div class="controls">
                                        <input type="text" id="Profession" name="profession" placeholder="Profession" class="input-xlarge"
                                               required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="control-group">
                                    <!-- Username -->
                                    <label class="control-label" for="DOB">DOB</label>
                                    <div class="controls">
                                        <input type="date" id="DOB" name="dob" placeholder="DOB" class="input-xlarge"
                                               required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="control-group">
                                    <!-- Username -->
                                    <label class="control-label" for="children">Current Children(*if yes)</label>
                                    <div class="controls">
                                        <input type="number" id="children" name="children" placeholder="children" class="input-xlarge"
                                               required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="row">
                            <div class="col-4">
                                <div class="control-group">
                                    <!-- Username -->
                                    <label class="control-label" for="NID">NID</label>
                                    <div class="controls">
                                        <input type="text" id="NID" name="nid" placeholder="NID" class="input-xlarge"
                                               required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="control-group">
                                    <!-- Username -->
                                    <label class="control-label" for="Image">Image::</label>
                                    <span class="text-danger"> Not more than 1MB</span>
                                    <div class="controls">
                                        <input type="file" id="Image" name="file1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="control-group">
                                    <!-- Username -->
                                    <label class="control-label" for="pa">Permanent Address</label>
                                    <div class="controls">
                                    <textarea type="text" id="pa" name="permanent_address" placeholder="permanent_address" class="input-xlarge"
                                              required> </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="control-group">
                            <!-- Button -->
                            <div class="controls">
                                <button class="btn btn-success">Register</button>
                                <br>
                                <p></p>
                            </div>
                        </div>
                    </fieldset>
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
        <p>Relief Section</p>
        <div class="sidebar--menu">
            <a href="index.php">
                <div class="sidebar--link active_menu_link">
                    <i class="fa fa-home"></i>
                    Overview
                </div>
            </a>

            <h2>View</h2>
            <a href="info.php">
                <div class="sidebar--link ">
                    <i class="fa fa-user-secret" aria-hidden="true"></i>
                    Update Your Info
                </div>
            </a>

            <a href="registration_details.php">
                <div class="sidebar--link">
                    <i class="fa fa-building-o"></i>
                    Registration Details
                </div>
            </a>
            <div class="sidebar--link ">
                <i class="fa fa-wrench"></i>
                <a href="">Payment</a>
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
