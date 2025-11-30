<?php
session_start();
include "config.php";

$nama = $_POST['nama'];
$nim  = $_POST['nim'];

$sql = "INSERT INTO mahasiswa (nama, nim) VALUES (?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $nama, $nim);
mysqli_stmt_execute($stmt);

$id_mhs = mysqli_insert_id($conn);

mysqli_query($conn, "INSERT INTO absen (mahasiswa_id) VALUES ($id_mhs)");

$_SESSION['notif'] = "Mahasiswa berhasil ditambahkan!";
header("Location: mahasiswa.php");
exit;
