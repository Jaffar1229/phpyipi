<?php
include 'db.php';

$error = '';
if (isset($_POST['submit'])) {
    // Ambil dan bersihkan input
    $nama = trim($_POST['nama']);
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $kelas = $_POST['kelas'];

    // Validasi sederhana
    if ($nama === '' || !in_array($jenis_kelamin, ['Laki-laki', 'Perempuan']) || !in_array($kelas, ['X', 'XI', 'XII'])) {
        $error = 'Mohon isi semua field dengan benar.';
    } else {
        // Prepared statement untuk keamanan
        $stmt = mysqli_prepare($conn, "INSERT INTO siswa (nama, jenis_kelamin, kelas) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sss", $nama, $jenis_kelamin, $kelas);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            header("Location: index.php");
            exit;
        } else {
            $error = "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tambah Siswa - CRUD PHP</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body style="background-color: #f8f9fa;">
    <div class="container mt-5" style="max-width: 600px;">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Tambah Siswa</h4>
            </div>
            <div class="card-body">
                <?php if ($error): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>
                <form method="POST" novalidate>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" required value="<?= isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="" disabled <?= !isset($_POST['jenis_kelamin']) ? 'selected' : '' ?>>Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" <?= (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] === 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="Perempuan" <?= (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] === 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <select class="form-select" id="kelas" name="kelas" required>
                            <option value="" disabled <?= !isset($_POST['kelas']) ? 'selected' : '' ?>>Pilih Kelas</option>
                            <option value="X" <?= (isset($_POST['kelas']) && $_POST['kelas'] === 'X') ? 'selected' : '' ?>>X</option>
                            <option value="XI" <?= (isset($_POST['kelas']) && $_POST['kelas'] === 'XI') ? 'selected' : '' ?>>XI</option>
                            <option value="XII" <?= (isset($_POST['kelas']) && $_POST['kelas'] === 'XII') ? 'selected' : '' ?>>XII</option>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan
                    </button>
                    <a href="index.php" class="btn btn-secondary ms-2">Kembali ke List</a>
                </form>
            </div>
        </div>
    </div>

    <!-- FontAwesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>