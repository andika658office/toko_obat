<?php
session_start();
include 'config/app.php';

if (isset($_POST['login'])) {
   $u = $_POST['username'];
   $p = $_POST['password'];

   $q = mysqli_query($db, "SELECT * FROM user WHERE username='$u' AND password='$p'");
   if (mysqli_num_rows($q) == 1) {
        $d = mysqli_fetch_assoc($q);
        $_SESSION['login'] = true;
        $_SESSION['role']  = $d['role'];
        header("Location: home.php");
        exit;
   } else {
        $error = true;
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Toko Obat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex justify-content-center align-items-center vh-100">
    <form method="post" class="border p-4 rounded" style="width:350px;">
        <h4 class="text-center mb-3">Login Toko Obat</h4>

        <?php if(isset($error)): ?>
            <div class="alert alert-danger text-center">
                Username atau Password salah
            </div>
        <?php endif; ?>

        <input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
        <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

        <button name="login" class="btn btn-success w-100">Login</button>
    </form>
</body>
</html>
