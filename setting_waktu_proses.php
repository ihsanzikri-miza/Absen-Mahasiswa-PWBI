<?php
session_start();
include "config.php";

$jam_masuk = $_POST['jam_masuk'];
$jam_pulang = $_POST['jam_pulang'];
$tgl_mulai = $_POST['tgl_mulai'];
$tgl_akhir = $_POST['tgl_akhir'];

$sql = "UPDATE setting_waktu SET 
            jam_masuk = ?, 
            jam_pulang = ?, 
            tgl_mulai = ?, 
            tgl_akhir = ?
        WHERE id = 1";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssss", $jam_masuk, $jam_pulang, $tgl_mulai, $tgl_akhir);
mysqli_stmt_execute($stmt);

$_SESSION['notif'] = "Setting waktu berhasil diperbarui!";
header("Location: setting_waktu.php");
exit;
