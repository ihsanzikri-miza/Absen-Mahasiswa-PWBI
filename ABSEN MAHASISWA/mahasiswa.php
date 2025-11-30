<?php
session_start();
include "config.php";

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$sql = "SELECT * FROM mahasiswa ORDER BY nama ASC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <style>
        body { font-family: Arial; background: #f0f0f0; }
        .container {
            width: 1200px; margin: 40px auto; background: #fff;
            padding: 30px; border-radius: 10px; box-shadow: 0 0 10px #ccc;
        }
        table {
            width: 100%; border-collapse: collapse; margin-top: 20px;
        }
        th, td {
            border: 1px solid #aaa; padding: 10px; text-align: center;
        }
        th { background: #eee; }
        a.button {
            padding: 8px 12px; background: #0066ff; color: white;
            text-decoration: none; border-radius: 5px;
        }
        .delete {
            background: red !important;
        }
        .top {
            display: flex; justify-content: space-between; align-items: center;
        }
        .notif { color: green; font-weight: bold; }
    </style>
</head>

<body>
<div class="container">

    <div class="top">
        <h2>Data Mahasiswa</h2>
        <a class="button" href="mahasiswa_tambah.php">+ Tambah Mahasiswa</a>
    </div>

    <?php if (isset($_SESSION['notif'])) { ?>
        <p class="notif"><?= $_SESSION['notif']; ?></p>
        <?php unset($_SESSION['notif']); ?>
    <?php } ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Aksi</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['nim']; ?></td>
            <td>
                <a class="button" href="mahasiswa_edit.php?id=<?= $row['id']; ?>">Edit</a>
                <a class="button delete" href="mahasiswa_delete.php?id=<?= $row['id']; ?>" 
                   onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

</div>
</body>
</html>
