<?php
require_once "app.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 900px;
        }

        .card {
            margin-top: 10px;
        }

        #font-show {
            font-family: 'poppins', sans-serif;
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
    <!-- SHOW DATA -->
    <div id="font-show" class="card mx-auto">
        <div class="card-header text-black">
            Data Pengikut
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">No. Anggota</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql2 = "SELECT * FROM anggota ORDER BY no_anggota AND id DESC";
                    $q2 = mysqli_query($koneksi, $sql2);
                    $urut = 1;
                    while ($r2 = mysqli_fetch_array($q2)) {
                        $id = $r2['id'];
                        $no_anggota = $r2['no_anggota'];
                        $nama = $r2['nama'];
                        $alamat = $r2['alamat'];
                        $jabatan = $r2['jabatan'];
                    ?>
                        <tr>
                            <th scope="row"><?php echo $urut++  ?></th>
                            <td scope="row"><?php echo $no_anggota ?></td>
                            <td scope="row"><?php echo $nama ?></td>
                            <td scope="row"><?php echo $alamat ?></td>
                            <td scope="row"><?php echo $jabatan ?></td>
                            <td scope="row" class="text-center">
                                <a href="create.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button>
                                </a>
                                <a href="create.php?op=delete&id=<?php echo $id ?>"><button type="button" class="btn btn-danger" onclick="return confirm('Yakin delete data?')">Delete</button>
                                </a>
                                <a href="detail.php?op=detail&id=<?php echo $id ?>"><button type="button" class="btn btn-primary">Detail</button>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
            <a href="tampilan.php"><button type="button" class="btn btn-success">Kembali</button>
            </a>
        </div>
    </div>
    </div>
    <!-- SHOW DATA End -->
</body>

</html>