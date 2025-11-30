<?php
session_start();
include "config.php";

$id   = $_POST['id'];
$nama = $_POST['nama'];
$nim  = $_POST['nim'];

$sql = "UPDATE mahasiswa SET nama=?, nim=? WHERE id=?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssi", $nama, $nim, $id);
mysqli_stmt_execute($stmt);

$_SESSION['notif'] = "Data mahasiswa berhasil diupdate!";
header("Location: mahasiswa.php");
exit;
