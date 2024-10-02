<?php
include 'koneksi.php'; // Menghubungkan ke file koneksi

// Cek apakah pengguna sudah login
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 30px;
        }
        .table-container {
            background-color: #f9f9f9;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .btn-back {
            background-color: #343a40;
            color: #fff;
            border-radius: 12px;
        }
        .btn-back:hover {
            background-color: #23272b;
        }
        .btn-add, .btn-add-position {
            border-radius: 12px;
            color: #fff;
        }
        .btn-add {
            background-color: #28a745;
        }
        .btn-add:hover {
            background-color: #218838;
        }
        .btn-add-position {
            background-color: #007bff;
        }
        .btn-add-position:hover {
            background-color: #0056b3;
        }
        table {
            margin-top: 20px;
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
        }
        thead {
            background-color: #007bff;
            color: #fff;
        }
        th {
            text-align: center;
            padding: 15px;
            border-bottom: 3px solid #0056b3;
        }
        tbody tr {
            transition: background-color 0.3s ease;
        }
        tbody tr:hover {
            background-color: #e9ecef;
        }
        td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #dee2e6;
        }
        .btn-action {
            border-radius: 50%;
            padding: 8px 12px;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .btn-action:hover {
            transform: scale(1.1);
        }
        .btn-warning {
            background-color: #ffc107;
            color: #212529;
        }
        .btn-warning:hover {
            background-color: #e0a800;
        }
        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .btn-icon {
            padding: 8px;
            font-size: 16px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="table-container">
        <div class="d-flex justify-content-between mb-3">
            <h2 class="text-primary">Data Pegawai</h2>
            <div>
                <a href="tambah_pegawai.php" class="btn btn-add-position me-2">Tambah Pegawai</a>
                <a href="tambah_jabatan.php" class="btn btn-add me-2">Tambah Jabatan</a>
                <a href="index.php" class="btn btn-back">Kembali ke Dashboard</a>
            </div>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>NIK</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>No Telepon</th>
                <th>Jabatan</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // Query untuk menampilkan data pegawai
            $query = "SELECT Tabel_pegawai.*, Tabel_Jabatan.Nama_jabatan FROM Tabel_pegawai 
                      JOIN Tabel_Jabatan ON Tabel_pegawai.Jabatan_id = Tabel_Jabatan.id";
            $result = $connection->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['nik']}</td>";
                    echo "<td>{$row['nama']}</td>";
                    echo "<td>{$row['alamat']}</td>";
                    echo "<td>{$row['jenis_kelamin']}</td>"; // Menampilkan jenis kelamin
                    echo "<td>{$row['no_tlp']}</td>";
                    echo "<td>{$row['Nama_jabatan']}</td>";
                    echo "<td>
                            <a href='ubah.php?id={$row['id']}' class='btn btn-warning btn-action' title='Ubah'><i class='fas fa-edit'></i></a>
                            <a href='hapus.php?id={$row['id']}' class='btn btn-danger btn-action' title='Hapus' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'><i class='fas fa-trash-alt'></i></a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
