<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


require 'functions.php';
// cek apakah tombol submit sudah ditekan / belum
if (isset($_POST["submit"])) {
    // cek apakah data berhasil ditambahkan  / tidak
    if (runtext($_POST) > 0) {
        echo "
            <script>
                alert('run text berhasil ditambahkan!');
                document.location.href = 'dashboard.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('run text gagal ditambahkan!');
                document.location.href = 'dashboard.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="shortcut icon" href="logo.jpg" type="image/x-icon"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="asset/css/adminlte/adminlte.min.css" />
    <!-- style pribadi -->
    <link rel="stylesheet" href="asset/css/style.css" />
    <title>Input Run Text</title>
</head>

<body onload="removeSummernote();">
    <div class="container-ib">
        <div class="banner">
            <img src="asset/img/banner.jpg" alt="banner" />
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">INPUT RUN TEXT</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="runtext">Text</label>
                                        <input type="text" name="runtext" class="form-control" id="runtext" name="runtext" placeholder="Masukkan Nama Gambar" />
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- jQuery -->
    <script src="asset/js/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="asset/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- pribadi -->
    <script src="asset/js/script.js"></script>
</body>

</html>