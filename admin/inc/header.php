<?php include('inc/connect.php'); ?>
<?php
if (empty($_SESSION['taikhoan'])) {
    header("Location: login.php");
} ?>

<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">
        <a class="navbar-brand text-light" href="index.php">LIBRARY MANAGEMENT SYSTEM</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item ">
                    <div class="nav-link disabled text-light ">
                        <?php
                        if ($_SESSION['role'] == 1) { ?>
                        <span>Hello Admin</span>
                        <?php } else { ?>
                        <span>Hello Librarian:
                            <?php echo $_SESSION['hoten'] ?></span>
                        <?php } ?>
                    </div>
                </li>
                <li class="nav-item"> <a class="nav-link active text-light" href="index.php">Home</a></li>
                <?php if ($_SESSION['role'] == 1) { ?>
                <li class="nav-item "><a class="nav-link active text-light" href="infor.php">Profile</a></li>
                <li class="nav-item "><a class="nav-link active text-light" href="nguoidung.php">Manage Librarian</a>
                </li>
                <li class="nav-item "><a class="nav-link active text-light" href="sach.php">Manage Book</a></li>
                <li class="nav-item "><a class="nav-link active text-light" href="phieumuon.php">Manage History</a></li>
                <li class="nav-item "><a class="nav-link active text-light" href="phieumuon.php">Manage Reader</a></li>
                <?php } else { ?>
                <li class="nav-item "><a class="nav-link active text-light" href="infor.php">Profile</a></li>
                <li class="nav-item "><a class="nav-link active text-light" href="sach.php">Manage Book</a></li>
                <li class="nav-item "><a class="nav-link active text-light" href="phieumuon.php">Manage History</a></li>
                <li class="nav-item"> <a class="nav-link active text-light" href="reader.php">Manage Reader</a></li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link active text-light" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
</nav>