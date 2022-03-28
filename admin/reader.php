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
                    <h1 class="mt-4">MANAGE READER</h1>

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
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $query = "SELECT * FROM docgia ORDER BY id DESC";
                                    $result = mysqli_query($connect, $query);
                                    while ($arUser = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $arUser["madocgia"] ?></td>
                                        <td><?php echo $arUser["tendocgia"] ?></td>
                                        <td><?php echo $arUser["nganhdocgia"] ?></td>
                                        <td><?php echo $arUser["sodienthoai"] ?></td>
                                        <td><?php echo $arUser["username"] ?></td>
                                        <td><?php echo $arUser["password"] ?></td>
                                        <td><?php echo $arUser["email"] ?></td>
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