<?php
session_start();
include "config.php";

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

$_SESSION['notif'] = "Mahasiswa berhasil dihapus!";
header("Location: mahasiswa.php");
exit;
