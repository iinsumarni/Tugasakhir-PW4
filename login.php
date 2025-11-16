<?php
require 'functions.php';
$err = '';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $username=$_POST['username']; $password=$_POST['password'];
    if($username==='admin' && $password==='123'){
        $_SESSION['user']=$username;
        header('Location: index.php'); exit;
    } else { $err='Username atau password salah!'; }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login - Tech Contact</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-purple-300 via-purple-400 to-purple-500 h-screen flex items-center justify-center">
<div class="bg-white w-96 p-10 rounded-3xl shadow-2xl animate-fadeIn">
    <h2 class="text-3xl font-bold text-purple-700 mb-2 text-center">Selamat Datang!</h2>
    <p class="text-gray-400 text-center mb-6">Masuk untuk mengelola kontak dengan mudah</p>
    <?php if($err): ?><p class="text-red-500 text-center mb-4"><?= $err ?></p><?php endif; ?>
    <form method="POST" class="space-y-5">
        <div class="relative">
            <input type="text" name="username" placeholder="Username" class="w-full p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 peer" required>
            <span class="absolute left-4 top-4 text-gray-400 peer-focus:text-purple-500">👤</span>
        </div>
        <div class="relative">
            <input type="password" name="password" placeholder="Password" class="w-full p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 peer" required>
            <span class="absolute left-4 top-4 text-gray-400 peer-focus:text-purple-500">🔒</span>
        </div>
        <button type="submit" class="w-full bg-purple-600 text-white py-3 rounded-xl hover:bg-purple-700 transition">Login</button>
    </form>
    <p class="text-gray-400 mt-6 text-center text-sm">© 2025 Tech Contact Manager</p>
</div>
</body>
</html>
