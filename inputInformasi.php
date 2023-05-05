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
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'dashboard.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
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
    <!-- summernote -->
    <link rel="stylesheet" href="asset/js/summernote/summernote-bs4.min.css" />
    <!-- style pribadi -->
    <link rel="stylesheet" href="asset/css/style.css" />
    <title>Judul Halaman</title>
</head>

<body onload="removeSummernote();">
    <div class=" container-ib">
        <div class="banner">
            <img src="asset/img/banner.jpg" alt="banner" />
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">INPUT DATA INFORMASI</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="judul">Judul</label>
                                        <input type="text" name="judul" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Baru" />
                                    </div>
                                    <div class="form-group">
                                        <label for="isi">Isi</label>
                                        <textarea id="summernote" name="isi">
                                            <i>Tuliskan</i> <u>Isi</u> <b>Informasi</b>
                                        </textarea>
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
    <!-- Summernote -->
    <script src="asset/js/summernote/summernote-bs4.min.js"></script>
    <script>
        $(function() {
            // Summernote
            $("#summernote").summernote();
        });
    </script>
    <!-- pribadi -->
    <script src="asset/js/script.js"></script>
</body>

</html>