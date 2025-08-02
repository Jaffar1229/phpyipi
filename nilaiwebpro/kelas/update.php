<?php
if (isset($_POST['update'])) {
    include_oncel('config.php');
    $id = $_POST['id'];
    $grade = $_POST['grade'];
    $room = $_POST['room'];
    $capacity = $_POST['capacity'];
    $fill = $_POST['fill'];

    $sql = "UPDATE kelas SET grade = '$grade', room = '$room', capacity = '$capacity', fill = '$fill' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ?ms=kelas&s=view");
    } else {
        echo "<script>alert('Data gagal diupdate');window.location='?ms=kelas&s=view';</script>";
    }
} else {
    echo "jangan langsung buka file ini.Tambah data <a href='?ms=kelas&s=edit'> klik disini</a>";
}