<?php
session_start();
include "config.php";

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$sql = "SELECT m.id, m.nama, m.nim, a.* 
        FROM mahasiswa m 
        LEFT JOIN absen a ON m.id = a.mahasiswa_id";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tabel Absen 16 Pertemuan</title>
    <style>
        body { 
            font-family: Arial; 
            background: #f0f0f0; 
        }
        .container {
            width: 1200px;
            margin: 40px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 14px;
        }
        th, td {
            border: 1px solid #aaa;
            padding: 7px;
            text-align: center;
        }
        th { background: #e8e8e8; }
        select {
            padding: 5px;
        }
        button {
            padding: 10px 20px;
            margin-top: 15px;
            background: #0066ff;
            color: white;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        h2 { text-align: center; }
    </style>
</head>

<body>
<div class="container">
    <h2>Absen Mahasiswa - 16 Pertemuan</h2>

    <form action="absen_simpan.php" method="POST">
        <table>
            <tr>
                <th>Nama</th>
                <th>NIM</th>

                <!-- Buat header P1 - P16 -->
                <?php for ($i = 1; $i <= 16; $i++): ?>
                    <th>P<?= $i ?></th>
                <?php endfor; ?>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['nim']; ?></td>

                    <?php for ($i = 1; $i <= 16; $i++):
                        $kolom = "p$i";
                    ?>
                        <td>
                            <select name="absen[<?= $row['id']; ?>][p<?= $i ?>]">
                                <option value="">-</option>
                                <option value="Hadir" <?= ($row[$kolom] == "Hadir") ? "selected" : ""; ?>>Hadir</option>
                                <option value="Sakit" <?= ($row[$kolom] == "Sakit") ? "selected" : ""; ?>>Sakit</option>
                                <option value="Alpa"  <?= ($row[$kolom] == "Alpa")  ? "selected" : ""; ?>>Alpa</option>
                            </select>
                        </td>
                    <?php endfor; ?>

                </tr>
            <?php endwhile; ?>
        </table>

        <button type="submit">Simpan Absen</button>
    </form>
</div>
</body>
</html>
