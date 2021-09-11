<?php
/**
 * Created by PhpStorm.
 * User: me
 * Date: 9/11/2021
 * Time: 12:28 PM
 */
$conn= new PDO('mysql:host=localhost;port=3306;dbname=adoption','root','');
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>