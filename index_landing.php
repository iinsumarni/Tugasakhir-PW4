<?php
require 'functions.php';
if(is_logged_in()){
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Enhypen Contact Manager - Landing Page</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-purple-300 via-purple-400 to-purple-500 font-sans">


<nav class="fixed top-0 w-full bg-white shadow-md z-50">
    <div class="max-w-7xl mx-auto flex justify-between items-center p-6">
        <h1 class="text-2xl font-bold text-purple-700">Enhypen Contact</h1>
        <div class="space-x-4">
            <a href="#features" class="text-purple-700 font-semibold hover:text-purple-900 transition">Fitur</a>
            <a href="login.php" class="bg-purple-700 text-white px-6 py-2 rounded-full font-semibold hover:bg-purple-800 transition">Login</a>
        </div>
    </div>
</nav>


<section class="text-center mt-28 px-6 md:px-0 py-20 bg-gradient-to-r from-purple-300 via-purple-400 to-purple-500">
    <h2 class="text-5xl font-bold text-white mb-4">Kelola Kontak Anda dengan Cerdas</h2>
    <p class="text-purple-100 text-lg mb-8 max-w-2xl mx-auto">Enhypen Contact Manager membantu Anda mengorganisir, menambahkan, dan memantau kontak dengan mudah. Profesional, modern, dan efisien.</p>
</section>


<section id="features" class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-6">
  
        <h3 class="text-3xl font-bold text-purple-700 text-center mb-12">Fitur Utama</h3>

   
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center mb-16">
            <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition border">
                <h4 class="text-xl font-semibold text-purple-700 mb-2">Dashboard Interaktif</h4>
                <p class="text-gray-600">Lihat semua kontak, aktivitas terbaru, dan statistik dengan mudah.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition border">
                <h4 class="text-xl font-semibold text-purple-700 mb-2">Tambah & Edit Kontak</h4>
                <p class="text-gray-600">Form modern untuk menambah, mengubah, dan menghapus kontak dengan cepat.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition border">
                <h4 class="text-xl font-semibold text-purple-700 mb-2">Aktivitas & Log</h4>
                <p class="text-gray-600">Pantau semua aktivitas perubahan kontak secara realtime.</p>
            </div>
        </div>

        <div class="text-center">
            <h3 class="text-3xl font-bold text-purple-700 mb-4">Siap Memulai?</h3>
            <p class="text-gray-600 mb-6 max-w-xl mx-auto">Login sekarang dan kelola kontak Anda dengan efisien seperti profesional.</p>
            <a href="login.php" class="bg-purple-700 text-white px-8 py-3 rounded-full font-semibold text-lg hover:bg-purple-800 transition">Mulai Sekarang</a>
        </div>
    </div>
</section>

</body>
</html>
