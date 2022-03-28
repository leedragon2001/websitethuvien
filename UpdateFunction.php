<?php
include('admin/inc/connect.php');

if (isset($_POST['edituser'])) {
    $tendocgia = $_POST['tendocgia'];
    $nganhdocgia = $_POST['nganhdocgia'];
    $sodienthoai = $_POST['sodienthoai'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $id = $_POST['id'];

    // echo "'$tendocgia', '$nganhdocgia','$sodienthoai','$username','$password','$email','$id'";
    $query = "UPDATE docgia SET tendocgia='$tendocgia',nganhdocgia='$nganhdocgia',sodienthoai='$sodienthoai',username='$username',password='$password',email='$email' WHERE id=$id";
    $result = mysqli_query($connect, $query);
    if ($result) {
        header("Location: infor.php?msg=1");
    } else {
        header("Location: infor.php?msg=2");
    }
}