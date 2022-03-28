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
                    <h1 class="mt-4">MANAGE HISTORY</h1>

                    <div class="card mb-4">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr style="background-color : #6D6D6D">
                                        <th>ID Reader</th>
                                        <th>Full Name</th>
                                        <th>Major</th>
                                        <th>Phone Number</th>
                                        <th>ID Book</th>
                                        <th>Book Name</th>
                                        <th>Author</th>
                                        <th>Branch</th>
                                        <th>Publishing Company</th>
                                        <th>Borrow Date</th>
                                        <th>Return Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $query = "SELECT a.*,b.ten,b.masach,b.nganh,b.nhaxb,b.tacgia FROM phieumuon as a,book as b WHERE a.book_id = b.id AND a.status != 3 ORDER BY a.id DESC";
                                    $result = mysqli_query($connect, $query);

                                    while ($arUser = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        $idModelUpdate = "exampleModalUpdate" . $arUser["id"];
                                    ?>
                                    <tr>
                                        <td><?php echo $arUser["madocgia"] ?></td>
                                        <td><?php echo $arUser["tendocgia"] ?></td>
                                        <td><?php echo $arUser["nganhdocgia"] ?></td>
                                        <td><?php echo $arUser["sodienthoai"] ?></td>
                                        <td><?php echo $arUser["masach"] ?></td>
                                        <td><?php echo $arUser["ten"] ?></td>
                                        <td><?php echo $arUser["tacgia"] ?></td>
                                        <td><?php echo $arUser["nganh"] ?></td>
                                        <td><?php echo $arUser["nhaxb"] ?></td>
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
                                        <td style="width: 100px !important">
                                            <?php if ($arUser["status"] == 1) { ?>
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#<?php echo $idModelUpdate ?>"
                                                style="width: 94px !important;margin-bottom : 5px">
                                                Return
                                            </button>
                                            <?php } else { ?>

                                            <?php } ?>
                                            <div class="modal fade" id="<?php echo $idModelUpdate ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">CONFIRM</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            Reader <strong><?php echo $arUser["tendocgia"] ?></strong>
                                                            return book : <strong><?php echo $arUser["ten"] ?></strong>
                                                            <form action="function.php" method="post">
                                                                <input type="hidden" class="form-control" id="id"
                                                                    name="id" value="<?php echo $arUser["id"] ?>">
                                                                <input type="hidden" class="form-control" id="id"
                                                                    name="idsach"
                                                                    value="<?php echo $arUser["book_id"] ?>">
                                                                <div class="modal-footer" style="margin-top: 20px">
                                                                    <button style="width:100px" type="button"
                                                                        class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        Close
                                                                    </button>
                                                                    <button style="width:100px" type="submit"
                                                                        class="btn btn-success" name="trasach">
                                                                        Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
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