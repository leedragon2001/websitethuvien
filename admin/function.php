<?php
include('inc/connect.php');

//nguoidung page
if (isset($_POST['addnguoidung'])) {
    $taikhoan = $_POST['taikhoan'];
    $matkhau  = $_POST['matkhau'];
    $hoten  = $_POST['hoten'];
    $querycheck = "SELECT * FROM user WHERE username='$taikhoan' ";
    $resultcheck = mysqli_query($connect, $querycheck);
    $check = mysqli_num_rows($resultcheck);
    if ($check == 0) {
        $query = "INSERT INTO user ( fullname, username, password, role, status ) VALUES ( '{$hoten}', '{$taikhoan}', '{$matkhau}', 2, 1 ) ";
        $result = mysqli_query($connect, $query);
        if ($result) {
            header("Location: nguoidung.php?msg=1");
        } else {
            header("Location: nguoidung.php?msg=2");
        }
    } else {
        header("Location: nguoidung.php?fail");
    }
}
if (isset($_POST['editnguoidung'])) {
    $taikhoan = $_POST['taikhoan'];
    $matkhau  = $_POST['matkhau'];
    $hoten  = $_POST['hoten'];
    $id  = $_POST['id'];
    $query = "UPDATE `user` SET `fullname`='{$hoten}',`username`='{$taikhoan}',`password`='{$matkhau}' WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        header("Location: nguoidung.php?msg=1");
    } else {
        header("Location: nguoidung.php?msg=2");
    }
}
if (isset($_POST['deletenguoidung'])) {
    $id  = $_POST['id'];
    $query = "DELETE FROM user WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        header("Location: nguoidung.php?msg=1");
    } else {
        header("Location: nguoidung.php?msg=2");
    }
}

//sach page
if (isset($_POST['addsach'])) {
    $tensach = $_POST['tensach'];
    $masach = $_POST['masach'];
    $nganh  = $_POST['nganh'];
    $tacgia  = $_POST['tacgia'];
    $nhaxb = $_POST['nhaxb'];
    $soluong  = $_POST['soluong'];
    $querycheck = "SELECT * FROM book WHERE masach='$masach' ";
    $resultcheck = mysqli_query($connect, $querycheck);
    $check = mysqli_num_rows($resultcheck);
    if ($check == 0) {
        $query = "INSERT INTO book ( masach, ten, nganh, nhaxb, soluong, tacgia, status ) VALUES ( '{$masach}', '{$tensach}', '{$nganh}', '{$nhaxb}', '{$soluong}', '{$tacgia}', 1 ) ";
        $result = mysqli_query($connect, $query);
        if ($result) {
            header("Location: sach.php?msg=1");
        } else {
            header("Location: sach.php?msg=2");
        }
    } else {
        header("Location: sach.php?fail");
    }
}

if (isset($_POST['editsach'])) {
    $tensach = $_POST['tensach'];
    $masach = $_POST['masach'];
    $nganh  = $_POST['nganh'];
    $tacgia  = $_POST['tacgia'];
    $nhaxb = $_POST['nhaxb'];
    $soluong  = $_POST['soluong'];
    $id  = $_POST['id'];
    $query = "UPDATE `book` SET `ten`='{$tensach}',`masach`='{$masach}',`nganh`='{$nganh}',`nhaxb`='{$nhaxb}',`soluong`='{$soluong}',`tacgia`='{$tacgia}' WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        header("Location: sach.php?msg=1");
    } else {
        header("Location: sach.php?msg=2");
    }
}
if (isset($_POST['deletesach'])) {
    $id  = $_POST['id'];
    $check = "SELECT * FROM phieumuon WHERE book_id = '{$id}' AND status != 2 ";
    $excute = mysqli_query($connect, $check);
    $row = mysqli_num_rows($excute);
    if ($row > 0) {
        header("Location: sach.php?msg=2");
    } else {
        $query = "UPDATE book SET status = 0 WHERE `id`='{$id}'";
        $result = mysqli_query($connect, $query);
        header("Location: sach.php?msg=1");
    }
}

//infor page
if (isset($_POST['edittenht'])) {
    $id  = $_POST['id'];
    $tenht  = $_POST['tenhienthi'];
    $query = "UPDATE `user` SET `fullname`= '{$tenht}' WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        header("Location: infor.php?msg=1");
    } else {
        header("Location: infor.php?msg=2");
    }
}
if (isset($_POST['editmk'])) {
    $id  = $_POST['id'];
    $mk  = $_POST['matkhau'];
    $query = "UPDATE `user` SET `password`= '{$mk}' WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        header("Location: infor.php?msg=1");
    } else {
        header("Location: infor.php?msg=2");
    }
}

//phieumuon page
if (isset($_POST['trasach'])) {
    $id  = $_POST['id'];
    $ids  = $_POST['idsach'];
    $query = "UPDATE `phieumuon` SET `status`= 2 WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        $querys = "UPDATE book SET soluong = soluong + 1 WHERE `id`='{$ids}'";
        $results = mysqli_query($connect, $querys);
        header("Location: phieumuon.php?msg=1");
    } else {
        header("Location: phieumuon.php?msg=2");
    }
}