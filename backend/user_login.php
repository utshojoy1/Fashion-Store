<?php
include('../db/connect.php');

if (isset($_POST['login'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "select * from user_info where username='$username'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $encrypt_pass = $row['user_password'];
    $check_pass = password_verify($password, $encrypt_pass);

    if ($check_pass) {
        echo "<script>window.open('../profile.php','_self')</script>";
    } else {
        echo "<script>alert('Login Failed..\nInvalid Password!')</script>";
    }
}
