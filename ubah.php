<?php
require 'functions.php';
// cek apakah tombol submit sudah ditekan / belum
if (isset($_POST["submit"])) {
    // cek apakah data berhasil ditambahkan  / tidak
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diubah!');
                document.location.href = 'dashboard.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Diubah!');
                document.location.href = 'dashboard.php';
            </script>
        ";
    }
}

// ambil data diURL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
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

        <main>
            <div class="kiri">
                <h1 class="judul">INPUT DATA INFORMASI</h1>

                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $informasi["id"]; ?>">

                    <table>
                        <tr>
                            <td>Judul</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="judul" class="input-judul" value="<?= $informasi['judul'] ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>Isi</td>
                            <td>:</td>
                            <td>
                                <div>
                                    <textarea id="summernote" name="isi">
                                        <?= $informasi['isi']; ?>
                                    </textarea>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="button-simpan">
                                    <button type="submit" name="submit" class="simpan">
                                        Simpan
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>

            <div class="kanan">
                <div class="gambar">
                    <img src="asset/img/img1.jpg" alt="" />
                    <div class="text-gmb"></div>
                </div>
            </div>
        </main>

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