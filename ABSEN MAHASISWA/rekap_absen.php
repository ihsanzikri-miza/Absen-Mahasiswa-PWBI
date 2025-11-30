<?php
session_start();
include "config.php";

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// Ambil data mahasiswa + absen
$sql = "SELECT m.id, m.nama, m.nim, a.*
        FROM mahasiswa m
        LEFT JOIN absen a ON m.id = a.mahasiswa_id
        ORDER BY m.nama ASC";

$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Rekap Absen Mahasiswa</title>
    <style>
        body { font-family: Arial; background: #f0f0f0; }
        .container {
            width: 1200px; margin: 30px auto; background: white;
            padding: 25px; border-radius: 10px; box-shadow: 0 0 10px #ccc;
        }
        table {
            width: 100%; border-collapse: collapse; margin-top: 20px;
        }
        th, td {
            border: 1px solid #aaa; padding: 10px; text-align: center;
        }
        th { background: #eee; }
        h2 { text-align: center; }
        .good { color: green; font-weight: bold; }
        .bad { color: red; font-weight: bold; }
    </style>
</head>

<body>
<div class="container">
    <h2>Rekap Absen Mahasiswa</h2>

    <table>
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Hadir</th>
            <th>Sakit</th>
            <th>Alpa</th>
            <th>Persentase Kehadiran</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <?php
            // Hitung jumlah hadir/sakit/alpa dari p1-p16
            $hadir = 0; $sakit = 0; $alpa = 0;

            for ($i = 1; $i <= 16; $i++) {
                $kolom = "p$i";
                if ($row[$kolom] == "Hadir") $hadir++;
                if ($row[$kolom] == "Sakit") $sakit++;
                if ($row[$kolom] == "Alpa")  $alpa++;
            }

            $total = 16;
            $persen = ($hadir / $total) * 100;
        ?>

        <tr>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['nim']; ?></td>
            <td class="good"><?= $hadir; ?></td>
            <td><?= $sakit; ?></td>
            <td class="bad"><?= $alpa; ?></td>
            <td>
                <?= number_format($persen, 1); ?>%
            </td>
        </tr>

        <?php endwhile; ?>
    </table>

</div>
</body>
</html>
