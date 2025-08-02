<?php
include_once('config.php');
 
// Validasi input
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID tidak valid");
}
 
$id = (int)$_GET['id'];
 
// Gunakan prepared statement
$sql = "DELETE FROM grades WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
$result = mysqli_stmt_execute($stmt);
 
if ($result) {
    header("Location: ?ms=kelas&s=view");
} else {
    echo "<script>alert('Data gagal dihapus');window.location='?ms=kelas&s=view';</script>";
}