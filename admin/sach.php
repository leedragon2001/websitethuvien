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
                    <h1 class="mt-4">BOOK IN LIBRARY</h1>

                    <div class="card mb-4">
                        <div class="card-header">
                            <?php if (isset($_GET['msg'])) {
                                if ($_GET['msg'] == 1) { ?>
                            <div class="alert alert-success">
                                <strong>Successful</strong>
                            </div>
                            <?php } else { ?>
                            <div class="alert alert-danger">
                                <strong>This is book is borrowing can not delete</strong>
                            </div>
                            <?php }  ?>
                            <?php }  ?>
                            <?php if (isset($_GET['fail'])) { ?>
                            <div class="alert alert-danger">
                                <strong>ID Book already exists in the system!</strong>
                            </div>
                            <?php }  ?>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#exampleModalAdd">
                                Add New Book
                            </button>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>ID Book</th>
                                        <th>Book Name</th>
                                        <th>Category</th>
                                        <th>Author</th>
                                        <th>Publishing Company</th>
                                        <th>Quantity</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $query = "SELECT * FROM book WHERE status = 1 ORDER BY id DESC";
                                    $result = mysqli_query($connect, $query);
                                    $stt = 1;
                                    while ($arUser = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        $idModelDel = "exampleModalDel" . $arUser["id"];
                                        $idModelEdit = "exampleModalEdit" . $arUser["id"];

                                    ?>
                                    <tr>
                                        <td><?php echo $stt ?></td>
                                        <td><?php echo $arUser["masach"] ?></td>
                                        <td><?php echo $arUser["ten"] ?></td>
                                        <td><?php echo $arUser["nganh"] ?></td>
                                        <td><?php echo $arUser["tacgia"] ?></td>
                                        <td><?php echo $arUser["nhaxb"] ?></td>
                                        <td><?php echo $arUser["soluong"] ?></td>
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
                                                                to delete ?</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            Book Name : <?php echo $arUser["ten"] ?>
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
                                                                        class="btn btn-danger" name="deletesach">
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
                                                            <label for="category-film" class="col-form-label">ID
                                                                Book:</label>
                                                            <input type="text" class="form-control" id="category-film"
                                                                name="masach" value="<?php echo $arUser["masach"] ?>"
                                                                required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="category-film" class="col-form-label">Book
                                                                Name:</label>
                                                            <input type="text" class="form-control" id="category-film"
                                                                name="tensach" value="<?php echo $arUser["ten"] ?>"
                                                                required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Category:</label>
                                                            <input type="text" class="form-control" id="category-film"
                                                                name="nganh" value="<?php echo $arUser["nganh"] ?>"
                                                                required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Author:</label>
                                                            <input type="text" class="form-control" id="category-film"
                                                                name="tacgia" value="<?php echo $arUser["tacgia"] ?>"
                                                                required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="category-film" class="col-form-label">Publishing
                                                                Company:</label>
                                                            <input type="text" class="form-control" id="category-film"
                                                                name="nhaxb" value="<?php echo $arUser["nhaxb"] ?>"
                                                                required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Quantity:</label>
                                                            <input type="number" class="form-control" id="category-film"
                                                                name="soluong" value="<?php echo $arUser["soluong"] ?>"
                                                                required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary"
                                                                name="editsach">Save</button>
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
                                                    <h5 class="modal-title" id="exampleModalLabel">Add New Book</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="function.php" method="POST">
                                                        <div class="mb-3">
                                                            <label for="category-film" class="col-form-label">ID
                                                                Book:</label>
                                                            <input type="text" class="form-control" id="category-film"
                                                                name="masach" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="category-film" class="col-form-label">Book
                                                                Name:</label>
                                                            <input type="text" class="form-control" id="category-film"
                                                                name="tensach" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Category:</label>
                                                            <input type="text" class="form-control" id="category-film"
                                                                name="nganh" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Author:</label>
                                                            <input type="text" class="form-control" id="category-film"
                                                                name="tacgia" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="category-film" class="col-form-label">Publishing
                                                                Company:</label>
                                                            <input type="text" class="form-control" id="category-film"
                                                                name="nhaxb" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Quantity:</label>
                                                            <input type="number" class="form-control" id="category-film"
                                                                name="soluong" required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary"
                                                                name="addsach">Add </button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Update-->
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