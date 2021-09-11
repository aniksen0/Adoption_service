<?php
/**
 * Created by PhpStorm.
 * User: ANIK
 * Date: 12/9/2020
 * Time: 10:43 AM
 */
session_start();
require_once "connection.php";
$onlinenaki="delete from  online1 where id=:id";
$onlinedata=$conn->prepare($onlinenaki);
$onlineinput=$onlinedata->execute(array(
        ':id' => htmlentities($_SESSION['id']),
    )
);
session_destroy();
header("Location:index.php");