<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


require 'functions.php';
$informasi = tampil("SELECT * FROM informasi");
$gambar = tampil("SELECT * FROM gambar");
$runtext = tampil("SELECT * FROM runtext");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="asset/css/adminlte/adminlte.min.css">
    <link rel="stylesheet" href="asset/css/font-awesome/css/all.min.css">
    <title>Dashboard</title>
    <style>
        img {
            width: 50px;
            height: 50px;
        }

        .fa-pen,
        .fa-trash {
            font-size: 25px;
        }

        .fa-trash {
            color: red;
        }

        .fa-trash:hover {
            color: #b10000;
        }

        th:first-child {
            width: 10px;
        }

        tbody td:first-child {
            text-align: center;
        }

        .aksi {
            width: 70px;
        }
    </style>
</head>

<body>
    <section class="content mt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="logout.php">
                        <button type="button" class="float-sm-right btn btn-danger">
                            Logout
                            <i class="nav-icon fa fa-sign-out-alt"></i>
                        </button>
                    </a>
                </div>
            </div>
    </section>

    <section class="content mt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1>Informasi</h1>
                            <a href="inputInformasi.php">
                                <button type="button" class="btn btn-primary">
                                    Tambah Informasi
                                    <i class="nav-icon fa fa-plus-square"></i>
                                </button>
                            </a>
                        </div>
                        <div class="card-body">
                            <table border="1" class="table table-hover table-dark" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Judul</th>
                                        <th>Isi</th>
                                        <th class="aksi">Ubah</th>
                                        <th class="aksi">Hapus</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if ($informasi) : ?>
                                        <?php $i = 1; ?>
                                        <?php foreach ($informasi as $row) : ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $row["judul"]; ?></td>
                                                <td><?= $row["isi"]; ?></td>
                                                <td>
                                                    <a href="ubahInformasi.php?id=<?= $row["id"]; ?>">
                                                        <i class="fa fa-pen"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="hapus.php?id=<?= $row["id"]; ?>&kd=1" onclick="return confirm('yakin?')">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan=" 4">
                                                <h2 align="center">Maaf data kosong!</h2>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content mt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1>Gambar</h1>
                            <a href="inputGambar.php">
                                <button type="button" class="btn btn-primary">
                                    Tambah Gambar
                                    <i class="nav-icon fa fa-plus-square"></i>
                                </button>
                            </a>
                        </div>
                        <div class="card-body">
                            <table border="1" class="table table-hover table-dark" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Gambar</th>
                                        <th class="aksi">Ubah</th>
                                        <th class="aksi">Hapus</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if ($gambar) : ?>
                                        <?php $i = 1; ?>
                                        <?php foreach ($gambar as $row) : ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $row["nama_gambar"]; ?></td>
                                                <td><img src="asset/img/<?= $row["gambar"]; ?>"></td>
                                                <td>
                                                    <a href="ubahGambar.php?id=<?= $row["id"]; ?>"><i class="fa fa-pen"></i></a>
                                                </td>
                                                <td>
                                                    <a href="hapus.php?id=<?= $row["id"]; ?>&kd=2" onclick="return confirm('yakin?')"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>

                                    <?php else : ?>
                                        <tr>
                                            <td colspan="4">
                                                <h2 align="center">Maaf data kosong!</h2>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content mt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1>Run Text</h1>
                            <a href="inputRunText.php">
                                <button type="button" class="btn btn-primary">
                                    Tambah Run Text
                                    <i class="nav-icon fa fa-plus-square"></i>
                                </button>
                            </a>
                        </div>
                        <div class="card-body">
                            <table border="1" class="table table-hover table-dark" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Text</th>
                                        <th class="aksi">Ubah</th>
                                        <th class="aksi">Hapus</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if ($runtext) : ?>
                                        <?php $i = 1; ?>
                                        <?php foreach ($runtext as $row) : ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $row["text"]; ?></td>
                                                <td>
                                                    <a href="ubahRunText.php?id=<?= $row["id"]; ?>"><i class="fa fa-pen"></i></a>
                                                </td>
                                                <td>
                                                    <a href="hapus.php?id=<?= $row["id"]; ?>&kd=3" onclick="return confirm('yakin?')"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="3">
                                                <h2 align="center">Maaf data kosong!</h2>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>