<?php
session_start();
include 'koneksi.php';

// Ambil data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk mencari pengguna dengan username yang sesuai menggunakan prepared statement
$query = "SELECT * FROM Tabel_pegawai WHERE username = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Verifikasi password
    if (password_verify($password, $row['password'])) {
        // Jika login berhasil, buat session
        $_SESSION['username'] = $row['username'];
        header("Location: dashboard.php");
        exit();
    } else {
        
        echo "<p>Password salah!</p>";
    }
} else { 
    echo "<p>Username tidak ditemukan!</p>";
}

$stmt->close();
$connection->close();
?>
