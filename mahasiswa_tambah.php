<?php
session_start();
include "config.php";
if (!isset($_SESSION['login'])) { header("Location: login.php"); exit; }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
    <style>
        body { font-family: Arial; background: #f0f0f0; }
        .container {
            width: 1200px; margin: 40px auto; background: white;
            padding: 30px; border-radius: 10px; box-shadow: 0 0 10px #ccc;
        }
        input {
            width: 400px; padding: 10px; margin-bottom: 15px;
            border: 1px solid #aaa; border-radius: 5px;
        }
        button {
            padding: 10px 20px; background: #0066ff;
            color: white; border: none; border-radius: 5px; cursor: pointer;
        }
    </style>
</head>

<body>
<div class="container">
    <h2>Tambah Mahasiswa</h2>

    <form action="mahasiswa_tambah_proses.php" method="POST">
        <label>Nama</label><br>
        <input type="text" name="nama" required><br>

        <label>NIM</label><br>
        <input type="text" name="nim" required><br>

        <button type="submit">Simpan</button>
    </form>
</div>
</body>
</html>
