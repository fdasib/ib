<?php

// Create connection
$conn = mysqli_connect("localhost", "root", "");
// Check connection
if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}

// Mengecek apakah database "mydatabase" sudah ada
$result = mysqli_query($conn, "SHOW DATABASES LIKE 'display_informasi'");
$database_exists = mysqli_num_rows($result);

// Menampilkan pesan jika database sudah ada atau belum
if ($database_exists) {
    echo "Database display_informasi sudah ada<br>";
    die;
} else {
    // Membuat Database
    $sql = "CREATE DATABASE display_informasi";
    if (mysqli_query($conn, $sql)) {
        echo "Database display_informasi Berhasil Dibuat<br>";
    } else {
        echo "Error membuat database display_informasi: " . mysqli_error($conn);
    }
}

// Menambahkan database
$conn = mysqli_connect("localhost", "root", "", "display_informasi");

require 'functions.php';

// sql to create table
$sql = "CREATE TABLE informasi (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
judul VARCHAR(50) NOT NULL,
isi text NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

table($conn, $sql, "Informasi");

$sql = "CREATE TABLE gambar (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
gambar VARCHAR(20) NOT NULL,
nama_gambar VARCHAR(20) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

table($conn, $sql, "Gambar");

$sql = "CREATE TABLE runtext (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
text text NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

table($conn, $sql, "Runtext");

$sql = "CREATE TABLE user (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(60) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

table($conn, $sql, "User");

mysqli_close($conn);
