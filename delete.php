<?php
require_once"app.php";

// DELETE DATA
if ($op == 'delete') {
    $id = $_GET['id'];
    $sql1 = "DELETE FROM anggota WHERE id = $id";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses = "Berhasil delete data";
    } else {
        $error = "Gagal delete data";
    }
}
?>