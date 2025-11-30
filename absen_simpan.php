<?php
session_start();
include "config.php";

foreach ($_POST['absen'] as $id_mahasiswa => $pertemuan) {

    $cek = mysqli_query($conn, "SELECT * FROM absen WHERE mahasiswa_id = $id_mahasiswa");

    if (mysqli_num_rows($cek) == 0) {
        $sql_insert = "INSERT INTO absen (mahasiswa_id) VALUES ($id_mahasiswa)";
        mysqli_query($conn, $sql_insert);
    }

    $update = "UPDATE absen SET ";
    foreach ($pertemuan as $p => $value) {
        $update .= "$p = '$value',";
    }
    $update = rtrim($update, ",");
    $update .= " WHERE mahasiswa_id = $id_mahasiswa";

    mysqli_query($conn, $update);
}

$_SESSION['notif'] = "Absen berhasil disimpan!";
header("Location: absen.php");
exit;
