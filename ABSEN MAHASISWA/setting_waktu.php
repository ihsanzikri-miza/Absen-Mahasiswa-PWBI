<?php
session_start();
include "config.php";

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$sql = "SELECT * FROM setting_waktu LIMIT 1";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Setting Waktu Absen</title>
    <style>
        body {
            font-family: Arial;
            background: #f0f0f0;
        }
        .container {
            width: 1200px;
            margin: 40px auto;
            background: white;
            padding: 35px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        input {
            width: 250px;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #aaa;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        button {
            padding: 12px 20px;
            background: #0066ff;
            color: white;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }
        .info{
            color: green;
            font-weight: bold;
        }
    </style>
</head>

<body>
<div class="container">
    <h2>Setting Waktu Absen</h2>

    <?php if (isset($_SESSION['notif'])) { ?>
        <p class="info"><?= $_SESSION['notif']; ?></p>
        <?php unset($_SESSION['notif']); ?>
    <?php } ?>

    <form action="setting_waktu_proses.php" method="POST">
        
        <label>Jam Masuk</label>
        <input type="time" name="jam_masuk" value="<?= $data['jam_masuk']; ?>" required>

        <label>Jam Pulang</label>
        <input type="time" name="jam_pulang" value="<?= $data['jam_pulang']; ?>" required>

        <label>Tanggal Mulai Absen</label>
        <input type="date" name="tgl_mulai" value="<?= $data['tgl_mulai']; ?>" required>

        <label>Tanggal Akhir Absen</label>
        <input type="date" name="tgl_akhir" value="<?= $data['tgl_akhir']; ?>" required>

        <button type="submit">Simpan Perubahan</button>
    </form>
</div>
</body>
</html>
