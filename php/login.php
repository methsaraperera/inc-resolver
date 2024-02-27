<?php
session_start();
require_once "../config.php";

if (isset($_POST['Login'])) {
    $email = ($_POST['email']);
    $pw = ($_POST['password']);
    $role = ($_POST['role']); // checking for the role of the user
    if($role == 2){
        if (!empty($email) && !empty($pw)) {
            $sql = mysqli_query($conn, "SELECT * FROM student WHERE email = '{$email}'");
            if (!mysqli_num_rows($sql) > 0) {
                header("Location: ../login.php?error-non=true"); // user non exist
                exit();
            } 
            else {
                $search_password = mysqli_query($conn, "SELECT cunyid, password FROM student WHERE email = '{$email}'");
                if (mysqli_num_rows($search_password) > 0) {
                    $row = mysqli_fetch_assoc($search_password);
                    $db_pw = $row['password'];
                    $uid = $row['cunyid']; // will be used in future developments as the session key for login
                    if ($pw == $db_pw) {
                        echo 'success'; // successfully logged in
                    } else {
                        header("Location: ../login.php?error-pw=true"); // invalid password
                        exit();
                    }
                } else {
                    header("Location: ../login.php?error=true"); // unknown error
                    exit();
                }
            }
        } else {
            header("Location: ../login.php?error-inc=true"); // form invalid
            exit();
        }
    }
    else{
        echo 'err role inc';
    }
}
?>
