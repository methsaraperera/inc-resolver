<?php
require_once "../config.php";
if(isset($_POST['Register'])){
    $fname = ($_POST['fname']);
    $lname = ($_POST['lname']);
    $cunyid = ($_POST['cunyid']);
    $email = ($_POST['email']);
    $pw = ($_POST['password']);
    $pw_re = ($_POST['re-password']);

    echo $fname ."<br>".$lname."<br>".$cunyid."<br>".$email."<br>".$pw."<br>".$pw_re;  
}
?>
