<?php
require 'functions.php';
$informasi = tampil("SELECT * FROM informasi");
$gmb = tampil("SELECT gambar FROM gambar");

if (!$_GET) {
    $informasi = $informasi[0];
} else {
    $id = $_GET['id'];
    $informasi = $informasi[$id];
}

if (!$informasi) {
    die;
}

$isi = htmlspecialchars_decode($informasi['isi']);

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
    <title>Judul Halaman</title>
</head>

<body onload="showTime();">
    <div class="container-ib">
        <div class="banner">
            <img src="asset/img/banner.jpg" alt="Banner" />
        </div>
        <main>
            <div class="kiri">
                <h1 class="judul" id="judul"><?= $informasi['judul']; ?></h1>

                <div class="isi" id="isi">
                    <?= $isi; ?>
                </div>
            </div>

            <div class="kanan">
                <div class="gambar">
                    <img src="asset/img/<?= $gmb[0]["gambar"]; ?>" alt="" />
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
                    <marquee></marquee>
                </div>
            </div>
        </footer>
    </div>

    <script src="asset/js/script.js"></script>
    <script>
        let xhr = new XMLHttpRequest();

        // mengecek kesiapan AJAX
        // kita harus yakin ajax nya siap, dengan menentukan sumber datanya, sumbernya harus siap merespon
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Ambil data ajax
                let data = JSON.parse(this.responseText);

                // data ajax gambar
                let gmb = data['gmb'];

                // Eksekusi untuk gambar yang ditampilkan
                let n = 0;

                (function showGambar() {
                    if (document.querySelector(".gambar img")) {
                        document.querySelector(
                            ".gambar img"
                        ).src = `asset/img/${gmb[n].gambar}`;
                        document.querySelector(".gambar .text-gmb").innerHTML = gmb[n].nama_gambar;
                        n++;
                        if (n == gmb.length) n = 0;
                        setTimeout(showGambar, 2000);
                    }
                })();

                // data ajax runtext
                let runtext = data["runtext"];
                let tampilRuntext = "";
                // menampilkan runtext ke marquee
                console.log(runtext.length);
                for (let i = 0; i < runtext.length; i++) {
                    tampilRuntext += runtext[i].text;
                    if (i == runtext.length - 1) {
                        break;
                    }
                    tampilRuntext += ` | `;
                }
                document.querySelector('.runtext marquee').innerHTML = tampilRuntext;
            }
        }

        // eksekusi ajax
        xhr.open('GET', 'asset/ajax/gambar.php', true);
        xhr.send();
    </script>
</body>

</html>