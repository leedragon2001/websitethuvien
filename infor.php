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
                    <h1 class="mt-4">INFORMATION</h1>
                    <div class="card mb-4">
                        <div class="card-body">
                            <?php
                            $ids = $_SESSION['id'];
                            $query = "SELECT * FROM docgia WHERE id = '{$ids}'";
                            $result = mysqli_query($connect, $query);
                            $arUser = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            ?>
                            <form method="POST" action="checklogin.php" class="register-form" id="register-form">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="category-film" class="col-form-label">ID Reader: </label>
                                            <input type="text" class="form-control" id="tenphim" name="madocgia"
                                                value="<?php echo $arUser['madocgia'] ?>" tabindex="1" disabled>
                                        </div>
                                        <div class="col-6">
                                            <label for="category-film" class="col-form-label">Full Name: </label>
                                            <input type="text" class="form-control" id="dienvien" name="tendocgia"
                                                value="<?php echo $arUser['tendocgia'] ?>" tabindex="2" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="category-film" class="col-form-label">Major: </label>
                                            <input type="text" class="form-control" id="dienvien" name="nganhhoc"
                                                value="<?php echo $arUser['nganhdocgia'] ?>" tabindex="2" disabled>
                                        </div>
                                        <div class="col-6">
                                            <label for="category-film" class="col-form-label">Phone Number: </label>
                                            <input type="number" class="form-control" id="daodien" name="sodt"
                                                value="<?php echo $arUser['sodienthoai'] ?>" tabindex="3" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 ">
                                            <label for="category-film" class="col-form-label">Username: </label>
                                            <input type="text" class="form-control" id="daodien" name="taikhoan"
                                                value="<?php echo $arUser['username'] ?>" tabindex="3" disabled>
                                        </div>
                                        <div class="col-6 mt-3 ">
                                            <label for="exampleFormControlFile1">Password:</label>
                                            <input type="password" class="form-control" id="daodien1" name="matkhau"
                                                value="<?php echo $arUser['password'] ?>" tabindex="3" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="category-film" class="col-form-label">Email: </label>
                                            <input type="text" class="form-control" id="daodien" name="email"
                                                value="<?php echo $arUser['email'] ?>" tabindex="1" disabled>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <a href="updateuser.php"><button type="button" class="btn btn-secondary"
                                        name="updateuser">Update</button></a>
                            </form>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>