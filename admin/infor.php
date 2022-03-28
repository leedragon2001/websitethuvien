<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('inc/head.php') ?>
</head>

<body class="sb-nav-fixed">
    <div class="d-md-block d-lg-none">
        <?php include('inc/header.php') ?>
    </div>
    <div id="layoutSidenav">
        <div class="d-md-none d-lg-block">
            <?php include('inc/menu.php') ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">UPDATE INFORMATION</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                            <?php if (isset($_GET['msg']) && ($_GET['msg'] = 1)) { ?>
                            <div class="alert alert-success">
                                <strong>Update successfully</strong>
                            </div>
                            <?php }  ?>
                        </div>
                        <div class="card-body">
                            <?php
                            $ids = $_SESSION['id'];
                            $query = "SELECT * FROM user WHERE id = '{$ids}'";
                            $result = mysqli_query($connect, $query);
                            $arUser = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            ?>
                            <form method="POST" action="function.php" class="register-form" id="register-form">
                                <div class="row" style="justify-content:space-around !important">
                                    <div class="col-3">
                                        <input type="text" class="form-control" value="Change Name" disabled />
                                    </div>
                                    <div class="col-4">
                                        <input type="text" class="form-control" name="tenhienthi"
                                            value="<?php echo $arUser['fullname'] ?>" required>
                                        <input type="hidden" class="form-control" name="id"
                                            value="<?php echo $arUser['id'] ?>" required>
                                    </div>
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-success" name="edittenht">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <form method="POST" action="function.php" class="register-form" id="register-form"
                                style="margin-top : 50px !important">
                                <div class="row" style="justify-content:space-around !important">
                                    <div class="col-3">
                                        <input type="text" class="form-control" value="Change Password" disabled />
                                    </div>
                                    <div class="col-4">
                                        <input type="text" class="form-control" name="matkhau"
                                            value="<?php echo $arUser['password'] ?>" required>
                                        <input type="hidden" class="form-control" name="id"
                                            value="<?php echo $arUser['id'] ?>" required>
                                    </div>
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-success" name="editmk">
                                            Update
                                        </button>
                                    </div>
                                </div>
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