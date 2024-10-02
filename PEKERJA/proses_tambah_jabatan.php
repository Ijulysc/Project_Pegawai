<?php
include 'koneksi.php';

$nama_jabatan = $_POST['nama_jabatan'];
$gaji_pokok = $_POST['gaji_pokok'];
$tunjangan = $_POST['tunjangan'];

$query = "INSERT INTO Tabel_Jabatan (Nama_jabatan, Gaji_pokok, Tunjangan) 
          VALUES ('$nama_jabatan', '$gaji_pokok', '$tunjangan')";

if ($connection->query($query) === TRUE) {
    echo "Jabatan berhasil ditambahkan!";
} else {
    echo "Error: " . $query . "<br>" . $connection->error;
}
$connection->close();
?>
