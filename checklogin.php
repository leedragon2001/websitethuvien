<?php
include('admin/inc/connect.php');

if (isset($_POST['login'])) {
  $email = $_POST['taikhoan'];
  $upass  = $_POST['matkhau'];
  $query = "SELECT * FROM docgia WHERE username='$email'";
  $result = mysqli_query($connect, $query);
  $num_rows = mysqli_num_rows($result);
  if ($num_rows == 0) {
    header("Location: login.php?fail=1");
  } else {

    $row = mysqli_fetch_array($result);
    if ($upass != $row['password']) {
      header("Location: login.php?fail=1");
    } else {
      header("Location: index.php?msg=1");
      $_SESSION['taikhoan'] = $email;
      $_SESSION['hoten'] = $row['tendocgia'];
      $_SESSION['madocgia'] = $row['madocgia'];
      $_SESSION['nganhdocgia'] = $row['nganhdocgia'];
      $_SESSION['id'] = $row['id'];
    }
  }
}

if (isset($_POST['register'])) {
  $madg = $_POST['madocgia'];
  $tendg  = $_POST['tendocgia'];
  $nganhdg  = $_POST['nganhhoc'];
  $sodt = $_POST['sdt'];
  $taikhoan  = $_POST['taikhoan'];
  $matkhau  = $_POST['matkhau'];
  $email = $_POST['email'];
  $querycheck = "SELECT * FROM docgia WHERE username='$taikhoan' OR madocgia='$madg' ";
  $resultcheck = mysqli_query($connect, $querycheck);
  $check = mysqli_num_rows($resultcheck);
  if ($check == 0) {
    $query = "INSERT INTO docgia ( madocgia, tendocgia, nganhdocgia, sodienthoai, username, password, email) VALUES ( '{$madg}', '{$tendg}', '{$nganhdg}', '{$sodt}', '{$taikhoan}', '{$matkhau}', '{$email}') ";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: register.php?msg=1");
    } else {
      header("Location: register.php?msg=2");
    }
  } else {
    header("Location: register.php?fail");
  }
}