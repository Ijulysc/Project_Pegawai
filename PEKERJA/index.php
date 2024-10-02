<?php
include 'koneksi.php';

// Memeriksa apakah pengguna sudah login
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background: linear-gradient(135deg, #f7f8f9, #d9e2ec);
            font-family: Arial, sans-serif;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .card {
            margin-bottom: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            color: #007bff;
            font-weight: bold;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            border-radius: 20px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #0056b3;
            color: white;
            transform: translateY(-5px);
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            padding: 10px;
            background-color: #343a40;
            color: white;
            border-radius: 0 0 15px 15px;
        }
        .container h1 {
            color: #343a40;
            font-weight: bold;
        }
        .container p {
            color: #6c757d;
        }
        .card-text {
            color: #495057;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom border-primary">
        <a class="navbar-brand" href="#">Dashboard</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <button class="btn btn-custom" data-toggle="modal" data-target="#logoutModal">Logout</button>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="container mt-5">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p>You are now logged in to the dashboard.</p>
        
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Pegawai</h5>
                        <p class="card-text">Add new employee information here.</p>
                        <a href="tambah_pegawai.php" class="btn btn-custom">Go to Form</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Jabatan</h5>
                        <p class="card-text">Add new job titles here.</p>
                        <a href="tambah_jabatan.php" class="btn btn-custom">Go to Form</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Lihat Data Pegawai</h5>
                        <p class="card-text">View and manage employee data.</p>
                        <a href="tampil_data.php" class="btn btn-custom">View Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2024 Your Company. All Rights Reserved.</p>
    </footer>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Logout Options</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Do you want to switch accounts or log out?</p>
                </div>
                <div class="modal-footer">
                    <a href="login.php" class="btn btn-secondary">Switch Account</a>
                    <a href="logout.php" class="btn btn-primary">Log Out</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
