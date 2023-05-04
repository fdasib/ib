<?php

require 'functions.php';

$id = $_GET["id"];
$kd = $_GET["kd"];

if (hapus($id, $kd) > 0) {
    echo "
        <script>
            alert('data berhasil dihapus!');
            document.location.href = 'dashboard.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('data gagal dihapus!');
            document.location.href = 'dashboard.php';
        </script>
    ";
}
