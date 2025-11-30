<?php
session_start();
include "config.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql  = "SELECT * FROM admin WHERE username = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();

    if (password_verify($password, $row['password'])) {
        $_SESSION['login'] = true;
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
        exit;
    }
}

$_SESSION['error'] = "Username atau password salah!";
header("Location: login.php");
exit;