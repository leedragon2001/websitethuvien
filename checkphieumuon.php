<?php include('admin/inc/connect.php');

if (isset($_POST['muonsach'])) {
    $ngaymuon = date('Y-m-d');
    $madg = $_POST['madg'];
    $tendg = $_POST['tendg'];
    $nganhdg = $_POST['nganhhoc'];
    $sodt = $_POST['sdt'];
    $ngaytra = $_POST['ngaytra'];
    $sach = $_POST['tensach'];
    $querycheck = "SELECT * FROM phieumuon WHERE madocgia='$madg' AND book_id='$sach' AND tendocgia = '$tendg' AND nganhdocgia = '$nganhdg' AND `status` = 1";
    $resultcheck = mysqli_query($connect, $querycheck);
    $check = mysqli_num_rows($resultcheck);
    if ($check == 0) {
        $query = "INSERT INTO phieumuon ( book_id, madocgia, tendocgia, nganhdocgia, sodienthoai, ngaymuon, ngaytra, status ) VALUES ( '{$sach}', '{$madg}', '{$tendg}', '{$nganhdg}', '{$sodt}', '{$ngaymuon}', '{$ngaytra}', 1 ) ";
        $result = mysqli_query($connect, $query);
        if ($result) {
            $querys = "UPDATE book SET soluong = soluong - 1 WHERE `id`='{$sach}'";
            $results = mysqli_query($connect, $querys);
            header("Location: index.php?ms=1");
        }
    } else {
        header("Location: index.php?ms=2");
    }
}