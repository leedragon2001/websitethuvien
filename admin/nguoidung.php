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
                    <h1 class="mt-4">LIBRARIANS LIST</h1>


                    <div class="card mb-4">
                        <div class="card-header">
                            <?php if (isset($_GET['msg']) && ($_GET['msg'] = 1)) { ?>
                            <div class="alert alert-success">
                                <strong>Successful</strong>
                            </div>
                            <?php }  ?>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#exampleModalAdd">
                                Add new librarian
                            </button>

                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr style="background-color : #6D6D6D">
                                        <th>No.</th>
                                        <th>Full Name</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $query = "SELECT * FROM user WHERE role = 2 ORDER BY id DESC";
                                    $result = mysqli_query($connect, $query);
                                    $stt = 1;
                                    while ($arUser = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        $idModelDel = "exampleModalDel" . $arUser["id"];
                                        $idModelEdit = "exampleModalEdit" . $arUser["id"];
                                    ?>
                                    <tr>
                                        <td><?php echo $stt ?></td>
                                        <td><?php echo $arUser["fullname"] ?></td>
                                        <td><?php echo $arUser["username"] ?></td>
                                        <td><?php echo $arUser["password"] ?></td>

                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#<?php echo $idModelEdit ?>">
                                                Update
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#<?php echo $idModelDel ?>">
                                                Delete
                                            </button>
                                            <!--Dele-->
                                            <div class="modal fade" id="<?php echo $idModelDel ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure
                                                                ?</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            Librarian: <?php echo $arUser["fullname"] ?>
                                                            <form action="function.php" method="post">
                                                                <input type="hidden" class="form-control" id="id"
                                                                    name="id" value="<?php echo $arUser["id"] ?>">
                                                                <div class="modal-footer" style="margin-top: 20px">
                                                                    <button style="width:100px" type="button"
                                                                        class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        Close
                                                                    </button>
                                                                    <button style="width:100px" type="submit"
                                                                        class="btn btn-danger" name="deletenguoidung">
                                                                        Delete</button>

                                                                </div>

                                                            </form>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!--Dele-->
                                        </td>

                                    </tr>
                                    <!-- Modal Update-->
                                    <div class="modal fade" id="<?php echo $idModelEdit ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">UPDATE</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="function.php" method="POST">
                                                        <input type="hidden" class="form-control" id="id" name="id"
                                                            value="<?php echo $arUser["id"] ?>">
                                                        <div class="mb-3">
                                                            <label for="category-film" class="col-form-label"> Full
                                                                Name:</label>
                                                            <input type="text" class="form-control" id="category-film"
                                                                name="hoten" value="<?php echo $arUser["fullname"] ?>"
                                                                required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="category-film" class="col-form-label">
                                                                Username:</label>
                                                            <input type="text" class="form-control" id="category-film"
                                                                name="taikhoan"
                                                                value="<?php echo $arUser["username"] ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="category-film" class="col-form-label">
                                                                Password:</label>
                                                            <input type="text" class="form-control" id="category-film"
                                                                name="matkhau" value="<?php echo $arUser["password"] ?>"
                                                                required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary"
                                                                name="editnguoidung">Save</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Update-->
                                    <?php $stt++;
                                    } ?>
                                    <!-- Modal Add-->
                                    <div class="modal fade" id="exampleModalAdd" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">ADD NEW LIBRARIAN
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="function.php" method="POST">
                                                        <div class="mb-3">
                                                            <label for="category-film" class="col-form-label"> Full
                                                                Name:</label>
                                                            <input type="text" class="form-control" id="category-film"
                                                                name="hoten" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="category-film" class="col-form-label">
                                                                Username:</label>
                                                            <input type="text" class="form-control" id="category-film"
                                                                name="taikhoan" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="category-film" class="col-form-label"> Password:
                                                            </label>
                                                            <input type="text" class="form-control" id="category-film"
                                                                name="matkhau" required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary"
                                                                name="addnguoidung"> Add </button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Update-->


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
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>