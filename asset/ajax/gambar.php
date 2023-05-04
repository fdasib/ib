<?php

require '../../functions.php';
$data = [];
$data["gmb"] = tampil("SELECT * FROM gambar");
$data["runtext"] = tampil("SELECT * FROM runtext");

$data_json = json_encode($data);
echo $data_json;
