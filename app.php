<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "pengikut";

$koneksi = mysqli_connect($host, $username, $password, $dbname);
if (!$koneksi) {
    die("Tidak bisa terkoneksi");
}

$no_anggota = "";
$nama = "";
$alamat = "";
$jabatan = "";
$no_telp = "";
$email = "";
$sukses = "";
$error = "";
 ?>