<?php
if (isset($_POST['update'])) {
    include_oncel('config.php');
    $id = $_POST['id'];
    $nis = $_POST['nis'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $pob = $_POST['pob'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $grade_id = $_POST['grade_id'];

    $sql = "UPDATE kelas SET students = '$students', nis = '$nis', nama = '$nama', gender = '$gender', pod = '$pod', dob = '$dob', phone = '$phone', email = '$email', grade_id = '$grade_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ?ms=siswa&s=view");
    } else {
        echo "<script>alert('Data gagal diupdate');window.location='?ms=kelas&s=view';</script>";
    }
} else {
    echo "jangan langsung buka file ini.Tambah data <a href='?ms=kelas&s=edit'> klik disini</a>";
}