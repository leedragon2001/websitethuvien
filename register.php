<?php
include('admin/inc/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register</title>
    <link href="admin/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
</head>
<?php
if (isset($_GET['msg'])) { ?>
<script>
function Redirect() {
    window.location = 'index.php';
}
alert('Register Successfully !')
Redirect()
</script>
<?php } ?>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">REGISTER</h3>
                                </div>
                                <div class="card-body">
                                    <?php if (isset($_GET['fail'])) { ?>
                                    <div class="alert alert-danger">
                                        <strong>Username or ID already exists in the system!</strong>
                                    </div>
                                    <?php }  ?>
                                    <form action="checklogin.php" method="POST">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="text" placeholder=""
                                                name="madocgia" required />
                                            <label for="inputEmail">ID Reader</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="text" placeholder=""
                                                name="tendocgia" required />
                                            <label for="inputEmail">Full Name</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="text" placeholder=""
                                                name="nganhhoc" required />
                                            <label for="inputEmail">Major</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="number" placeholder=""
                                                name="sdt" required />
                                            <label for="inputEmail">Phone Number</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="email" placeholder=""
                                                name="email" required />
                                            <label for="inputEmail">Email</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="text" placeholder=""
                                                name="taikhoan" required />
                                            <label for="inputEmail">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password"
                                                placeholder="" name="matkhau" required minlength="8" maxlength="15" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a href="index.php" class="btn btn-secondary" type="cancel"
                                                name="back">Back</a>
                                            <button class="btn btn-primary" type="submit"
                                                name="register">Register</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="admin/js/scripts.js"></script>
</body>

</html>