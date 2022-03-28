<?php include('admin/inc/connect.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>USER</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="admin/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
</head>
<?php
$tomorrow = date("Y-m-d", strtotime("+1 day"));

?>

<body class="sb-nav-fixed">
    <nav class="navbar navbar-expand-lg navbar-light bg-danger">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">GREENWICH | LIBRARY MANAGEMENT SYSTEM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <?php
                        $today = date("d-m-Y");
                        ?>
                        <p style="color:white;margin-top:15px;margin-right:200px">Today is : <?php echo $today ?></p>
                    </li>
                </ul>
                <div class="d-flex">
                    <div class="nav-item dropdown d-none d-lg-block">
                        <?php if (isset($_SESSION['taikhoan'])) { ?>
                        <a class="nav-link dropdown-toggle text-light" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i>Hello
                            <?php echo $_SESSION['hoten'] ?></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="infor.php">Profile</a></li>
                            <li><a class="dropdown-item" href="history.php">History</a></li>
                            <li><a class="dropdown-item" href="overdue.php">Overdue</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            <?php } else { ?>
                            <a style="color:white;margin-top:15px;text-decoration:none" href="login.php">Sign In</a> ||
                            <a style="color:white;margin-top:15px;margin-left : 15px;text-decoration:none"
                                href="register.php">Sign Up</a>
                            <?php } ?>
                        </ul>
                    </div>

                    <div class="nav-item d-block d-lg-none">
                        <?php if (isset($_SESSION['taikhoan'])) { ?>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <div class="nav-link disabled text-light"><span>HELLO
                                        <?php echo $_SESSION['hoten'] ?></span>
                                </div>
                            </li>
                            <li class="nav-item"><a class="nav-link active text-light" href="infor.php">PROFILE</a>
                            </li>
                            <li class="nav-item"><a class="nav-link active text-light" href="logout.php">LOGOUT</a>
                            </li>
                        </ul>
                        <?php } else { ?>
                        <a style="color:white;margin-top:15px;text-decoration:none" href="login.php">Sign In</a> ||
                        <a style="color:white;margin-top:15px;text-decoration:none" href="register.php">Sign Up</a>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </nav>


    <div id="layoutTable">
        <!-- <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav" id="sidenavAccordion">
                <img style="margin : 90px auto;width : 240px;height : 200px"
                    src="https://fpt.edu.vn/Content/images/assets/Logo-Greenwich.png" />
            </nav>
        </div> -->
        <div id="layoutTable_content">
            <main>
                <div class="container-fluid px-4">
                <h1 class="mt-4">Overdue</h1>

                    <div class="card mb-4">

                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr style="background-color : #6D6D6D">
                                        <th>No.</th>
                                        <th>ID Book</th>
                                        <th>Book Name</th>
                                        <th>Borrow Date</th>
                                        <th>Return Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>ID Book</th>
                                        <th>Book Name</th>
                                        <th>Borrow Date</th>
                                        <th>Return Date</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <!-- Hiển thị dữ liệu lịch sử mượn ra ngoài giao diện-->
                                    <?php
                                    $tendg = $_SESSION['hoten'];
                                    $madg = $_SESSION['madocgia'];
                                    $nganhdg = $_SESSION['nganhdocgia'];
                                    $query = "SELECT a.*,b.ten,b.masach,b.nganh,b.nhaxb,b.tacgia FROM phieumuon as a,book as b WHERE a.book_id = b.id AND a.status = 1 AND a.ngaytra < DATE(NOW()) AND a.madocgia = '{$madg}' AND a.tendocgia = '{$tendg}' AND a.nganhdocgia = '{$nganhdg}'  ORDER BY a.id DESC";
                                    $result = mysqli_query($connect, $query);
                                    $stt = 1;
                                    while ($arUser = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        $idModelInfor = "exampleModalInfor" . $arUser["id"];
                                    ?>
                                    <tr>
                                        <td><?php echo $stt ?></td>
                                        <td><?php echo $arUser['masach'] ?></td>
                                        <td><?php echo $arUser['ten'] ?></td>
                                        <td><?php echo $arUser["ngaymuon"] ?></td>
                                        <td><?php echo $arUser["ngaytra"] ?></td>
                                        <td style="width: 90px !important">
                                            <?php if ($arUser["status"] == 1) { ?>
                                            <span class="badge badge-danger"
                                                style="background-color:goldenrod;font-size:12px">Borrowing</span>
                                            <?php } else { ?>
                                            <span class="badge badge-danger"
                                                style="background-color: forestgreen; font-size: 12px ">Returned </span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php $stt++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="admin/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="admin/js/datatables-simple-demo.js"></script>
</body>

</html>