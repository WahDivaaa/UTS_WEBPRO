<?php
require_once "app.php";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

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


// EDIT DATA
if ($op == 'edit') {
    $id = $_GET['id'];
    $sql1 = "SELECT * FROM anggota WHERE id='$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $no_anggota = $r1['no_anggota'];
    $nama = $r1['nama'];
    $alamat = $r1['alamat'];
    $jabatan = $r1['jabatan'];
    $no_telp = $r1['no_telp'];
    $email = $r1['email'];

    if ($no_anggota == '') {
        $error = "Data tidak ditemukan";
    }
}

//FOR CREATE
if (isset($_POST['simpan'])) {
    $no_anggota = $_POST['no_anggota'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jabatan = $_POST['jabatan'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];


    //FOR UPDATE
    if ($no_anggota && $nama && $alamat && $jabatan) {
        if ($op == 'edit') {
            $sql1 = "UPDATE anggota SET no_anggota = '$no_anggota', nama = '$nama', alamat = '$alamat', jabatan = '$jabatan', no_telp = '$no_telp',
email = '$email', updated_at = NOW() WHERE id = $id";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error = "Data gagal diupdate";
            }
        } else { //FOR INSERT

            $sql1 = "INSERT INTO anggota (no_anggota, nama, alamat, jabatan, no_telp, email, created_at, updated_at)
VALUES('$no_anggota', '$nama', '$alamat', '$jabatan', '$no_telp', '$email', NOW(), NOW())";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Berhasil memasukkan data";
            } else {
                $error = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silahkan masukkan data";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 900px;
        }

        .card {
            margin-top: 10px;
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
    <!-- CREATE DATA -->
    <div class="mx-auto">

        <div class="card">
            <div class="card-header">
                Create / Edit data
            </div>

            <div class="card-body">
                <!-- Pop Up apabila Sukses -->
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                }
                ?>

                <!-- Pop Up apabila Error -->
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                }
                ?>

                <!-- Form Create Data -->
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="no_anggota" class="col-sm-2 col-form-label">No. Anggota</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_anggota" name="no_anggota" value="<?php echo $no_anggota ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="no_telp" class="col-sm-2 col-form-label">No. Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?php echo $no_telp ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $email ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="jabatan" id="jabatan">
                                <option value="">- Pilih Jabatan -</option>
                                <option value="Ketua" <?php if ($jabatan == "Ketua") echo "selected" ?>>Ketua</option>
                                <option value="Wakil" <?php if ($jabatan == "Wakil") echo "selected" ?>>Wakil</option>
                                <option value="Sekretaris" <?php if ($jabatan == "Sekretaris") echo "selected" ?>>Sekretaris</option>
                                <option value="Bendahara" <?php if ($jabatan == "Bendahara") echo "selected" ?>>Bendahara</option>
                                <option value="Anggota" <?php if ($jabatan == "Anggota") echo "selected" ?>>Anggota</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="simpan data" class="btn btn-primary">
                        <a href="show.php"><button type="button" class="btn btn-success">Kembali</button>
                        </a>
                    </div>
                </form>
                <!-- Form Create Data End -->
            </div>
        </div>
        <!-- CREATE DATA END -->
</body>

</html>