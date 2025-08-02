<?php
if (isset($_POST['save'])) {
    include_once('config.php');
    $grade = $_POST['grade'];
    $room = $_POST['room'];
    $capacity = $_POST['capacity'];
    $fill = $_POST['fill'];

    $sql = "INSERT INTO grades SET grade='$grade', room='$room', capacity='$capacity', fill='$fill'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ?ms=kelas&s=view");
    } else {
        echo "<script>alert('Data gagal disimpan');window.location='?ms=kelas&s=add';</script>";     
    }
} else {
    echo "jangan langsung buka file ini.Tambah data <a href='?ms=kelas&s=add'> klik disini</a>";
}