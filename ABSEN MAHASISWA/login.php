<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Admin - Absen Mahasiswa</title>
    <style>
        body {
            font-family: Arial;
            background: #f0f0f0;
        }
        .container {
            width: 1200px;
            margin: 50px auto;
            background: white;
            padding: 40px;
            box-shadow: 0 0 10px #ccc;
            border-radius: 10px;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        form {
            width: 400px;
            margin: auto;
        }
        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #aaa;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #0066ff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>

<body>
<div class="container">

    <h2>Login Admin</h2>

    <?php if (isset($_SESSION['error'])) { ?>
        <p class="error"><?= $_SESSION['error']; ?></p>
        <?php unset($_SESSION['error']); ?>
    <?php } ?>

    <form action="login_proses.php" method="POST">
        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>

</div>
</body>
</html>
