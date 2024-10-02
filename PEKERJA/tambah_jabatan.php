<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jabatan</title>
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
            <h2 class="mb-0">Tambah Jabatan</h2>
        </div>
        <form action="proses_tambah_jabatan.php" method="post">
            <div class="mb-3">
                <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" required>
            </div>
            <div class="mb-3">
                <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                <input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok" required>
            </div>
            <div class="mb-3">
                <label for="tunjangan" class="form-label">Tunjangan</label>
                <input type="number" class="form-control" id="tunjangan" name="tunjangan">
            </div>
            <div class="form-footer">
                <a href="index.php" class="btn btn-back me-2">Kembali ke Dashboard</a>
                <a href="tampil_data.php" class="btn btn-view-data me-2">Lihat Data</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
