<?php
include 'db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = (int) $_GET['id'];

// Ambil data siswa
$stmt = mysqli_prepare($conn, "SELECT * FROM siswa WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$siswa = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$siswa) {
    // Jika data tidak ditemukan, redirect ke index
    header("Location: index.php");
    exit;
}

$error = '';
if (isset($_POST['update'])) {
    $nama = trim($_POST['nama']);
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $kelas = $_POST['kelas'];

    // Validasi sederhana
    if ($nama === '' || !in_array($jenis_kelamin, ['Laki-laki', 'Perempuan']) || !in_array($kelas, ['X', 'XI', 'XII'])) {
        $error = 'Mohon isi semua field dengan benar.';
    } else {
        $updateStmt = mysqli_prepare($conn, "UPDATE siswa SET nama = ?, jenis_kelamin = ?, kelas = ? WHERE id = ?");
        mysqli_stmt_bind_param($updateStmt, "sssi", $nama, $jenis_kelamin, $kelas, $id);

        if (mysqli_stmt_execute($updateStmt)) {
            mysqli_stmt_close($updateStmt);
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
    <title>Edit Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body style="background-color: #f8f9fa;">
    <div class="container mt-5" style="max-width: 600px;">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Edit Data Siswa</h4>
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
                        <input type="text" class="form-control" id="nama" name="nama" required
                            value="<?= isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : htmlspecialchars($siswa['nama']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="Laki-laki" <?= ((isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] === 'Laki-laki') || (!isset($_POST['jenis_kelamin']) && $siswa['jenis_kelamin'] === 'Laki-laki')) ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="Perempuan" <?= ((isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] === 'Perempuan') || (!isset($_POST['jenis_kelamin']) && $siswa['jenis_kelamin'] === 'Perempuan')) ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <select class="form-select" id="kelas" name="kelas" required>
                            <option value="X" <?= ((isset($_POST['kelas']) && $_POST['kelas'] === 'X') || (!isset($_POST['kelas']) && $siswa['kelas'] === 'X')) ? 'selected' : '' ?>>X</option>
                            <option value="XI" <?= ((isset($_POST['kelas']) && $_POST['kelas'] === 'XI') || (!isset($_POST['kelas']) && $siswa['kelas'] === 'XI')) ? 'selected' : '' ?>>XI</option>
                            <option value="XII" <?= ((isset($_POST['kelas']) && $_POST['kelas'] === 'XII') || (!isset($_POST['kelas']) && $siswa['kelas'] === 'XII')) ? 'selected' : '' ?>>XII</option>
                        </select>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Update
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