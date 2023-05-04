<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


require 'functions.php';
// cek apakah tombol submit sudah ditekan / belum
if (isset($_POST["submit"])) {
    // cek apakah data berhasil diUbah / tidak
    if (ubahInformasi($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diUbah!');
                document.location.href = 'dashboard.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diUbah!');
                document.location.href = 'dashboard.php';
            </script>
        ";
    }
}

// ambil id diURL
$id = $_GET["id"];

// query data informasi berdasarkan id
$informasi = tampil("SELECT * FROM informasi WHERE id = $id")[0];

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
                                <h3 class="card-title">INPUT DATA INFORMASI</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="" method="post">
                                <div class="card-body">
                                    <input type="hidden" id="id" name="id" value="<?= $informasi['id']; ?>" />
                                    <div class="form-group">
                                        <label for="judul">Judul</label>
                                        <input type="text" name="judul" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Baru" value="<?= $informasi["judul"]; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="isi">Isi</label>
                                        <textarea id="summernote" name="isi">
                                            <?= $informasi['isi']; ?>
                                        </textarea>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-success">Simpan</button>
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