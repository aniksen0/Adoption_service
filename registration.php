<?php

require_once "connection.php";
session_start();
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
        $sql="Insert INTO login(id,pass) VALUES (:id,:pass)";
        $data=$conn->prepare($sql);
        $data->execute(array(
            ':id'=>$last_data+1,
            ':pass'=>htmlentities($_POST['pass'])
        ));

    //session data
        $_SESSION['new_id']=$last_data+1;
        $_SESSION['new_name']=$_POST['name'];
        header("Location:welcome.php");
        return;
    }
}
else
{
    $_SESSION["error"]="Password not matched";
    header("Location:regitration.php");
    return;
}


/**
 * Created by PhpStorm.
 * User: me
 * Date: 9/11/2021
 * Time: 3:21 PM
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>
    <link rel="stylesheet" href="boot/css/bootstrap.min.css"/>
    <link rel="icon" href="images/favicon.ico">
    <link rel="shortcut icon" href="images/favicon.ico"/>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" media="screen" href="css/ie.css">

</head>
<body class="page1" id="top">
<!--==============================header=================================-->
<header>
    <div class="clear"></div>
    <div class="container_12">
        <div class="grid_12">
            <h1>
                <a href="index.html">
                    <img src="images/logo.png" alt="Your Happy Family">
                </a>
            </h1>
            <div class="menu_block">
                <nav class="horizontal-nav full-width horizontalNav-notprocessed">
                    <ul class="sf-menu">
                        <li><a href="index.html">Home</a>
                        </li>
                        <li><a href="index-1.html">Videos </a></li>
                        <li class="current"><a href="index-3.html">Parents Portal</a></li>
                        <li><a href="index-4.php">Contacts Us</a></li>
                    </ul>
                </nav>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</header>
<div class="main">
    <!--==============================Content=================================-->
    <div class="content">
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
    <!--==============================footer=================================-->
    <footer>
        <div class="hor bg3"></div>
        <div class="container_12">
            <div class="grid_12 ">
                <div class="socials">
                    <a href="#"></a>
                    <a href="#"></a>
                    <a href="#"></a>
                    <div class="clear"></div>
                </div>
                <div class="copy">
                    <strong>Adoption System</strong> &copy; <span id="copyright-year"></span>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="boot/js/bootstrap.bundle.min.js"></script>
</body>
<script>

</script>
</html>
