<?php

session_start();

if (isset($_SESSION["login"])) {
    header("Location: dashboard.php");
    exit;
}

require "functions.php";

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // set session
            $_SESSION["login"] = true;

            header("Location: dashboard.php");
            exit;
        } else {
            echo "<script>
                alert('Maaf password anda salah');
            </script>";
        }
    } else {
        echo "<script>
                alert('Maaf Username tidak ditemukan');
            </script>";
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="asset/css/font-awesome/css/all.min.css" />
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="asset/css/icheck-bootstrap/icheck-bootstrap.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="asset/css/adminlte/adminlte.min.css" />
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h1>Login</h1>
            </div>
            <div class="card-body">
                <form action="" method="post" class="mb-4">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username" />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12 mt-2">
                            <button type="submit" class="btn btn-primary btn-block" name="login">
                                Login
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <a href="registrasi.php" class="text-center">Belum punya akun</a>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>