<?php
include 'koneksi.php'; // Koneksi ke database

// Cek apakah pengguna sudah login
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id']; // Ambil ID dari URL

$query = "DELETE FROM Tabel_pegawai WHERE id = $id";

if ($connection->query($query) === TRUE) {
    echo "Data berhasil dihapus!";
    header("Location: tampil_data.php"); // Redirect ke halaman tampil_data
} else {
    echo "Error: " . $connection->error;
}
?>
