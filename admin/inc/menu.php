<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark bg-info" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="nav-link disabled text-light">
                    <?php
                    if ($_SESSION['role'] == 1) { ?>
                    <span>HELLO ADMIN</span>

                    <?php } else { ?>
                    <span class="nav-item ">HELLO LIBRARIAN:
                        <?php echo $_SESSION['hoten'] ?></span>
                    <?php } ?>
                </div>

                <a class="nav-link text-light" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    HOME
                </a>
                <?php if ($_SESSION['role'] == 1) { ?>
                <a class="nav-link text-light" href="infor.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    PROFILE
                </a>
                <a class="nav-link text-light" href="nguoidung.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    MANAGE LIBRARIAN
                </a>
                <a class="nav-link text-light" href="sach.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    MANAGE BOOK
                </a>
                <a class="nav-link text-light" href="phieumuon.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    MANAGE HISTORY
                </a>
                <a class="nav-link text-light" href="reader.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    MANAGE READER
                </a>
                <a class="nav-link text-light" href="logout.php">LOGOUT</a>
                <?php } else { ?>
                <a class="nav-link text-light" href="infor.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    PROFILE
                </a>
                <a class="nav-link text-light" href="sach.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    MANAGE BOOK
                </a>
                <a class="nav-link text-light" href="phieumuon.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    MANAGE HISTORY
                </a>
                <a class="nav-link text-light" href="reader.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    MANAGE READER
                </a>
                <a class="nav-link text-light" href="logout.php">LOGOUT</a>
                <?php } ?>
            </div>
        </div>

    </nav>
</div>