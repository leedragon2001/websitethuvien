<?php
include('inc/connect.php');

if(isset($_POST['login'])){
    $email = $_POST['taikhoan'];
    $upass  = $_POST['matkhau'];
    $query = "SELECT * FROM user WHERE username='$email' AND status = 1";
    $result = mysqli_query($connect, $query);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows == 0) {
      header("Location: login.php?fail=1");
    } 
    else {
    
      $row = mysqli_fetch_array($result);
      if ($upass != $row['password']) {
        header("Location: login.php?fail=1");
      }
      else{
        header("Location: index.php?msg=1");
      $_SESSION['taikhoan'] = $email;
      $_SESSION['hoten'] = $row['fullname'];
      $_SESSION['role'] = $row['role'];
      $_SESSION['id'] = $row['id'];
      }
    }
    }
 ?>