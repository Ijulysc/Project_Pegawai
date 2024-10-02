<?php
include 'koneksi.php';

// Ambil data dari form
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$no_tlp = $_POST['no_tlp'];
$jabatan = $_POST['jabatan'];
$username = $_POST['username'];
$password = $_POST['password'];  // Hashing password

// Query untuk menambahkan data pegawai
$query = "INSERT INTO Tabel_pegawai (Nik, Nama, Alamat, Jenis_kelamin, No_tlp, Jabatan_id, username, password) 
          VALUES ('$nik', '$nama', '$alamat', '$jenis_kelamin', '$no_tlp', '$jabatan', '$username', '$password')";

if ($connection->query($query) === TRUE) {
    echo "Data pegawai berhasil ditambahkan.";
    header("Location: tampil_data.php");  // Redirect ke halaman tampil data pegawai
} else {
    echo "Error: " . $query . "<br>" . $connection->error;
}

$connection->close();
?>
