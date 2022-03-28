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
    <?php
    if (isset($_GET['msg'])) { ?>
    <script>
    function Redirect() {
        window.location = 'index.php';
    }
    alert('Login Successfully !')
    Redirect()
    </script>
    <?php } ?>


    <?php
    if (isset($_GET['ms']) && $_GET['ms'] == 1) { ?>
    <script>
    function Redirect() {
        window.location = 'index.php';
    }
    alert('Successful !')
    Redirect()
    </script>
    <?php } ?>
    <?php
    if (isset($_GET['ms']) && $_GET['ms'] == 2) { ?>
    <script>
    function Redirect() {
        window.location = 'index.php';
    }
    alert('You are borrowing this book!')
    Redirect()
    </script>
    <?php } ?>

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
                    <!-- <h1 class="mt-4">Search Book</h1> -->

                    <div class="card mb-4">
                        <div class="card-header">

                            <div class="row" style="justify-content:space-around !important">
                                <div class="col-3">
                                    <form method="GET" action="" class="register-form" id="register-form">
                                        <label for="category-film" class="col-form-label">Book Name:</label>
                                        <input type="text" class="form-control" id="bn" name="bookname">
                                        <button type="submit" class="btn btn-success"
                                            style="margin-top:10px !important">
                                            Search
                                        </button>
                                    </form>
                                </div>
                                <div class="col-3">
                                    <form method="GET" action="" class="register-form" id="register-form">
                                        <label for="category-film" class="col-form-label">Branch:</label>
                                        <input type="text" class="form-control" id="bn" name="branch">
                                        <button type="submit" class="btn btn-success"
                                            style="margin-top:10px !important">
                                            Search
                                        </button>
                                    </form>
                                </div>
                                <div class="col-3">
                                    <form method="GET" action="" class="register-form" id="register-form">
                                        <label for="category-film" class="col-form-label">Author:</label>
                                        <input type="text" class="form-control" id="bn" name="author">
                                        <button type="submit" class="btn btn-success"
                                            style="margin-top:10px !important">
                                            Search
                                        </button>
                                    </form>
                                </div>
                                <div class="col-3">
                                    <form method="GET" action="" class="register-form" id="register-form">
                                        <label for="category-film" class="col-form-label">Publishing Company:</label>
                                        <input type="text" class="form-control" id="bn" name="pc">
                                        <button type="submit" class="btn btn-success"
                                            style="margin-top:10px !important">
                                            Search
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr style="background-color : #6D6D6D">
                                        <th>No.</th>
                                        <th>Book Name</th>
                                        <th>Branch</th>
                                        <th>Author</th>
                                        <th>Publishing Company</th>
                                        <th>Quantity</th>
                                        <?php if (isset($_SESSION['taikhoan'])) { ?>
                                        <th>Action</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Book Name</th>
                                        <th>Branch</th>
                                        <th>Author</th>
                                        <th>Publishing Company</th>
                                        <th>Quantity</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <!-- Hiển thị dữ liệu sách ra ngoài giao diện-->
                                    <?php
                                    if (isset($_GET['bookname'])) {
                                        $bn = $_GET['bookname'];
                                        $query = "SELECT * FROM `book` WHERE `book`.`soluong` > 0 AND `book`.`status` = 1 AND `book`.`ten` LIKE '%$bn%'  ORDER BY `book`.`id` ASC";
                                    } else if (isset($_GET['branch'])) {
                                        $br = $_GET['branch'];
                                        $query = "SELECT * FROM `book` WHERE `book`.`soluong` > 0 AND `book`.`status` = 1 AND `book`.`nganh` LIKE '%$br%'  ORDER BY `book`.`id` ASC";
                                    } else if (isset($_GET['author'])) {
                                        $au = $_GET['author'];
                                        $query = "SELECT * FROM `book` WHERE `book`.`soluong` > 0 AND `book`.`status` = 1 AND `book`.`tacgia` LIKE '%$au%'  ORDER BY `book`.`id` ASC";
                                    } else if (isset($_GET['pc'])) {
                                        $pc = $_GET['pc'];
                                        $query = "SELECT * FROM `book` WHERE `book`.`soluong` > 0 AND `book`.`status` = 1 AND `book`.`nhaxb` LIKE '%$pc%'  ORDER BY `book`.`id` ASC";
                                    } else {
                                        $query = "SELECT * FROM `book` WHERE `book`.`soluong` > 0 AND `book`.`status` = 1  ORDER BY `book`.`id` ASC";
                                    }
                                    $result = mysqli_query($connect, $query);
                                    $stt = 1;
                                    while ($arUser = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        $idModelInfor = "exampleModalInfor" . $arUser["id"];
                                    ?>
                                    <tr>
                                        <td><?php echo $stt ?></td>
                                        <td><?php echo $arUser['ten'] ?></td>
                                        <td><?php echo $arUser['nganh'] ?></td>
                                        <td><?php echo $arUser['tacgia'] ?></td>
                                        <td><?php echo $arUser['nhaxb'] ?></td>
                                        <td><?php echo $arUser['soluong'] ?></td>
                                        <?php if (isset($_SESSION['taikhoan'])) {
                                                $iduser = $_SESSION['id'];
                                                $queryuser = "SELECT * FROM docgia WHERE id = $iduser";
                                                $resultuser = mysqli_query($connect, $queryuser);
                                                $row = mysqli_fetch_array($resultuser);
                                            ?>
                                        <td>
                                            <!-- if -->

                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#<?php echo $idModelInfor ?>"
                                                style="width: 110px !important;margin-bottom : 5px">
                                                Borrow
                                            </button>
                                            <!-- else -->

                                            <!--Detail-->
                                            <div class="modal fade" id="<?php echo $idModelInfor ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">BORROW BOOK
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form action="checkphieumuon.php" method="POST">
                                                                <div class="col">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <label for="category-film"
                                                                                class="col-form-label"> ID
                                                                                Reader:</label>
                                                                            <input type="text" class="form-control"
                                                                                id="category-film" name="madg"
                                                                                value="<?php echo $row["madocgia"] ?>"
                                                                                readonly>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <label for="category-film"
                                                                                class="col-form-label">Full
                                                                                Name:</label>
                                                                            <input type="text" class="form-control"
                                                                                id="category-film" name="tendg"
                                                                                value="<?php echo $row["tendocgia"] ?>"
                                                                                readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <label for="category-film"
                                                                                class="col-form-label">Major:</label>
                                                                            <input type="text" class="form-control"
                                                                                id="category-film" name="nganhhoc"
                                                                                value="<?php echo $row["nganhdocgia"] ?>"
                                                                                readonly>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <label for="category-film"
                                                                                class="col-form-label">Phone
                                                                                Number:</label>
                                                                            <input type="text" class="form-control"
                                                                                id="category-film" name="sdt"
                                                                                value="<?php echo $row["sodienthoai"] ?>"
                                                                                readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col mb-3">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <label for="category-film"
                                                                                class="col-form-label">Book
                                                                                Name:</label>
                                                                            <input type="text" class="form-control"
                                                                                id="theloai" name="tensach"
                                                                                value=" <?php echo $arUser['ten'] ?>"
                                                                                readonly>

                                                                            <input type="hidden" class="form-control"
                                                                                id="theloai" name="tensach"
                                                                                value=" <?php echo $arUser['id'] ?>">

                                                                        </div>
                                                                        <div class="col-6">
                                                                            <label for="category-film"
                                                                                class="col-form-label">Return
                                                                                Date:</label>
                                                                            <input type="date" class="form-control"
                                                                                id="category-film" name="ngaytra"
                                                                                min="<?php echo $tomorrow ?>" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary"
                                                                        name="muonsach">Accept</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Dele-->
                                        </td>
                                        <?php } ?>
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