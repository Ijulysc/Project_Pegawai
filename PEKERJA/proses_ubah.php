<?php
include 'koneksi.php';

// Mendapatkan data dari form
$id = $_POST['id'];
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$no_tlp = $_POST['no_tlp'];
$jabatan_id = $_POST['jabatan'];

// Menggunakan prepared statements untuk menghindari SQL Injection
$query = "UPDATE Tabel_pegawai SET 
          Nik = ?, Nama = ?, Alamat = ?, Jenis_kelamin = ?, No_tlp = ?, Jabatan_id = ? 
          WHERE id = ?";
$stmt = $connection->prepare($query);

// Adjust type definitions to match the number of parameters
$stmt->bind_param("ssssssi", $nik, $nama, $alamat, $jenis_kelamin, $no_tlp, $jabatan_id, $id);

if ($stmt->execute()) {
    header("Location: tampil_data.php");
    exit();
} else {
    echo "Error updating record: " . $stmt->error;
}

$stmt->close();
$connection->close();
?>
