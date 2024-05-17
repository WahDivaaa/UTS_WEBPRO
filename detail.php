<?php
require_once "app.php";

$id = $_GET["id"];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengikut</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .card {
            margin-top: 10px;
            width: 900px;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background-image: url('img/Screenshot\ 2024-05-17\ 215102.png');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="card mx-auto">
        <div class="card-body">
            <div class="card-header text-white bg-secondary">
                Detail Pengikut
            </div>
            <table class="table">
                <thead>
                    <?php
                    $sql3 = "SELECT * FROM anggota WHERE id='$id'";
                    $q3 = mysqli_query($koneksi, $sql3);
                    $urut = 1;
                    while ($r3 = mysqli_fetch_array($q3)) {
                        $id = $r3['id'];
                        $no_anggota = $r3['no_anggota'];
                        $nama = $r3['nama'];
                        $alamat = $r3['alamat'];
                        $jabatan = $r3['jabatan'];
                        $no_telp = $r3['no_telp'];
                        $email = $r3['email'];
                        $created_at = $r3['created_at'];
                        $updated_at = $r3['updated_at'];
                    ?>
                        <tr>
                            <td scope="col">No. Anggota:</td>
                            <td scope="row"><?php echo $no_anggota ?></td>
                        </tr>
                        <tr>
                            <td scope="col">Nama:</td>
                            <td scope="row"><?php echo $nama ?></td>
                        </tr>
                        <tr>
                            <td scope="col">Alamat:</td>
                            <td scope="row"><?php echo $alamat ?></td>
                        </tr>
                        <tr>
                            <td scope="col">Jabatan:</td>
                            <td scope="row"><?php echo $jabatan ?></td>
                        </tr>
                        <tr>
                            <td scope="col">No. Telepon:</td>
                            <td scope="row"><?php echo $no_telp ?></td>
                        </tr>
                        <tr>
                            <td scope="col">Email:</td>
                            <td scope="row"><?php echo $email ?></td>
                        </tr>
                        <td scope="col">Created at:</td>
                        <td scope="row"><?php echo $created_at ?></td>
                        </tr>
                        <td scope="col">Updated_at:</td>
                        <td scope="row"><?php echo $updated_at ?></td>
                        </tr>
                </thead>
            <?php
                    }
            ?>
            </table>
            <a href="show.php"><button type="button" class="btn btn-success">Kembali</button>
            </a>
        </div>
    </div>

</body>

</html>