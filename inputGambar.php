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
    if (tambahGambar($_POST) > 0) {
        echo "
            <script>
                alert('gambar berhasil ditambahkan!');
                document.location.href = 'dashboard.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('gambar gagal ditambahkan!');
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
    <title>Input Gambar</title>
</head>

<body onload="removeSummernote();showGambar();showTime()">
    <div class="container-ib">
        <div class="banner">
            <img src="asset/img/img2.jpg" alt="banner" />
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">INPUT GAMBAR</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="namaGambar">Nama Gambar</label>
                                        <input type="text" name="namaGambar" class="form-control" id="namaGambar" name="namaGambar" placeholder="Masukkan Nama Gambar" />
                                    </div>
                                    <div class="form-group">
                                        <label for="gambar">Gambar</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                                <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                                            </div>
                                        </div>
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

        <footer>
            <div class="footer">
                <div class="info">
                    <p class="info-jam"></p>
                    <p class="tgl"></p>
                </div>
                <div class="runtext">
                    <marquee>Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Repudiandae, molestias?</marquee>
                </div>
            </div>
        </footer>
    </div>
    <!-- jQuery -->
    <script src="asset/js/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="asset/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="asset/js/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- Summernote -->
    <script src="asset/js/summernote/summernote-bs4.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
    <!-- pribadi -->
    <script src="asset/js/script.js"></script>
</body>

</html>