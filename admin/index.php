<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('inc/head.php')?>
</head>

<body class="sb-nav-fixed">
    <div class="d-md-block d-lg-none">
        <?php include('inc/header.php')?>
    </div>

    <div id="layoutSidenav">
        <div class="d-md-none d-lg-block">
            <?php include('inc/menu.php')?>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">

                    <?php
                $today = date("d-m-Y");
                ?>
                    <h2 class="mt-4"> Today is <?php echo $today ?> </h2>
                    <h3 class="mt-4"><strong><?php echo $_SESSION['hoten']?> </strong> have a good day ❤ </h3>
                </div>
            </main>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous">
    </script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <?php 
                    if (isset($_GET['msg'])) {?>
    <script>
    function Redirect() {
        window.location = 'index.php';
    }
    alert('Login Successfully!')
    Redirect()
    </script>
    <?php } ?>
</body>

</html>