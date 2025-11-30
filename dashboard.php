<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Admin</title>
<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: "Segoe UI", Arial, sans-serif;
    }

    body {
        background: #eef1f5;
    }

    .layout {
        width: 1200px;
        margin: auto;
        display: flex;
        margin-top: 40px;
    }

    /* SIDEBAR */
    .sidebar {
        width: 250px;
        background: #1f2937;
        padding: 20px;
        border-radius: 12px;
        color: white;
        min-height: 500px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    .sidebar h3 {
        margin-bottom: 20px;
        font-size: 22px;
        text-align: center;
    }

    .menu a {
        display: block;
        background: #374151;
        margin-bottom: 10px;
        padding: 12px;
        text-decoration: none;
        border-radius: 8px;
        color: white;
        transition: 0.2s;
        font-size: 15px;
    }

    .menu a:hover {
        background: #4b5563;
        padding-left: 20px;
    }

    /* CONTENT */
    .content {
        flex: 1;
        background: white;
        margin-left: 20px;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }

    .content h2 {
        margin-bottom: 10px;
    }

    .welcome-box {
        background: #f3f4f6;
        padding: 20px;
        border-left: 5px solid #3b82f6;
        border-radius: 8px;
        margin-top: 10px;
    }
</style>
</head>
<body>

<div class="layout">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h3>Admin Panel</h3>

        <div class="menu">
            <a href="setting_waktu.php">⏰ Setting Waktu</a>
            <a href="mahasiswa.php">🎓 Kelola Mahasiswa</a>
            <a href="absen.php">📋 Tabel Absen</a>
            <a href="rekap.php">📊 Rekap Absen</a>
            <a href="logout.php">🚪 Logout</a>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="content">
        <h2>Selamat datang, <?= $_SESSION['admin']; ?> 👋</h2>

        <div class="welcome-box">
            Anda berada di halaman dashboard.  
            Silakan pilih menu di sebelah kiri untuk mengelola absensi mahasiswa.
        </div>
    </div>

</div>

</body>
</html>
