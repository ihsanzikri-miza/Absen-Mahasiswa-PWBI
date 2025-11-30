<?php
session_start();
include "config.php";

if (!isset($_SESSION['login'])) { header("Location: login.php"); exit; }

$id = $_GET['id'];
$sql = "SELECT * FROM mahasiswa WHERE id = $id";
$data = mysqli_fetch_assoc(mysqli_query($conn, $sql));
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
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
            padding: 10px 20px; background: green;
            color: white; border: none; border-radius: 5px;
        }
    </style>
</head>

<body>
<div class="container">
    <h2>Edit Mahasiswa</h2>

    <form action="mahasiswa_edit_proses.php" method="POST">
        <input type="hidden" name="id" value="<?= $data['id']; ?>">

        <label>Nama</label><br>
        <input type="text" name="nama" value="<?= $data['nama']; ?>" required><br>

        <label>NIM</label><br>
        <input type="text" name="nim" value="<?= $data['nim']; ?>" required><br>

        <button type="submit">Update</button>
    </form>
</div>
</body>
</html>
