<?php
include 'koneksi.php';

// Mendapatkan ID dari URL
$id = $_GET['id'];

// Mengambil data pegawai berdasarkan ID
$query = "
    SELECT 
        p.Nik, p.Nama, p.Alamat, p.Jenis_kelamin, p.No_tlp, p.Jabatan_id, p.username
    FROM 
        Tabel_pegawai p
    WHERE 
        p.id = ?
";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

// Mengambil daftar jabatan untuk dropdown
$queryJabatan = "SELECT id, Nama_jabatan FROM Tabel_Jabatan";
$resultJabatan = $connection->query($queryJabatan);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 class="my-4">Ubah Data Pegawai</h2>
    <form action="proses_ubah.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" value="<?php echo htmlspecialchars($data['Nik']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($data['Nama']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" required><?php echo htmlspecialchars($data['Alamat']); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
               <option value="Laki-laki" <?php if ($data['Jenis_kelamin'] === 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                <option value="Perempuan" <?php if ($data['Jenis_kelamin'] === 'Perempuan') echo 'selected'; ?>>Perempuan</option>
</select>
        </div>
        <div class="mb-3">
            <label for="no_tlp" class="form-label">No Telepon</label>
            <input type="text" class="form-control" id="no_tlp" name="no_tlp" value="<?php echo htmlspecialchars($data['No_tlp']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <select class="form-select" id="jabatan" name="jabatan" required>
                <?php while ($jabatan = $resultJabatan->fetch_assoc()): ?>
                    <option value="<?php echo htmlspecialchars($jabatan['id']); ?>" <?php if ($jabatan['id'] == $data['Jabatan_id']) echo 'selected'; ?>>
                        <?php echo htmlspecialchars($jabatan['Nama_jabatan']); ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</body>
</html>
