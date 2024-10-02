<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-header {
            background-color: #007bff;
            color: #fff;
            padding: 15px;
            border-radius: 8px 8px 0 0;
        }
        .form-footer {
            text-align: right;
        }
        .btn-back {
            background-color: #6c757d;
            color: #fff;
            border: none;
        }
        .btn-back:hover {
            background-color: #5a6268;
        }
        .btn-view-data {
            background-color: #17a2b8;
            color: #fff;
            border: none;
        }
        .btn-view-data:hover {
            background-color: #138496;
        }
    </style>
</head>
<body>
<div class="container my-5">
    <div class="form-container">
        <div class="form-header">
            <h2 class="mb-0">Tambah Pegawai</h2>
        </div>
        <form action="proses_tambah_pegawai.php" method="post">
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat"></textarea>
            </div>
            <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
<select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
    <option value="LakiLaki">Perempuan </option>
    <option value="Perempuan">Laki - laki</option>
</select>
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <select class="form-select" id="jabatan" name="jabatan"> 
                <?php
                    $query = "SELECT id, nama_jabatan FROM tabel_jabatan";
                    $result = $connection->query($query);
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['nama_jabatan']}</option>";
                    }
                ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="no_tlp" class="form-label">No Telepon</label>
                <input type="text" class="form-control" id="no_tlp" name="no_tlp">
            </div>
            <div class="form-footer">
            <a href="tampil_data.php" class="btn btn-view-data me-2">Lihat Data</a>
                <a href="index.php" class="btn btn-back me-2">Kembali ke Dashboard</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
