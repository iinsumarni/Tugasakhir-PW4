<?php
require 'functions.php';
check_login();
$contacts=get_contacts();
$total_contacts=count($contacts);
$total_emails=count(array_unique(array_column($contacts,'email')));
$latest_contact=end($contacts);
$activities = file_exists('activity.log') ? array_reverse(file('activity.log')) : [];
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard - Tech Contact</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-purple-200 via-purple-300 to-purple-400 min-h-screen p-6 font-sans">
<header class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold text-purple-700">Halo, <?= htmlspecialchars($_SESSION['user']) ?>!</h1>
    <a href="logout.php" class="bg-purple-400 text-white px-4 py-2 rounded hover:bg-purple-700 transition text-2xl font-bold">Logout</a>
</header>

<!-- Feature Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl transition">
        <h2 class="text-gray-400">Total Kontak</h2>
        <p class="text-3xl font-bold text-purple-700"><?= $total_contacts ?></p>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl transition">
        <h2 class="text-gray-400">Email Unik</h2>
        <p class="text-3xl font-bold text-purple-700"><?= $total_emails ?></p>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl transition">
        <h2 class="text-gray-400">Kontak Terbaru</h2>
        <p class="text-2xl font-semibold text-purple-700"><?= htmlspecialchars($latest_contact['name'] ?? '-') ?></p>
    </div>
</div>

<!-- Search -->
<div class="mb-4">
    <input type="text" id="searchInput" placeholder="Cari kontak..." class="w-full p-3 rounded-xl border focus:outline-none focus:ring-2 focus:ring-purple-500">
</div>

<!-- Tabel Kontak -->
<div class="bg-white p-6 rounded-2xl shadow overflow-x-auto relative">
    <a href="add.php" class="fixed bottom-8 right-8 bg-purple-600 text-white p-4 rounded-full shadow-lg hover:bg-purple-700 transition text-xl">＋</a>
    <table class="w-full table-auto border-collapse" id="contactsTable">
        <thead class="bg-purple-600 text-white rounded-t-xl">
            <tr>
                <th class="p-3 text-left">Nama</th>
                <th class="p-3 text-left">Email</th>
                <th class="p-3 text-left">Telepon</th>
                <th class="p-3 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($contacts as $c): ?>
            <tr class="border-b hover:bg-purple-50">
                <td class="p-3"><?= htmlspecialchars($c['name']) ?></td>
                <td class="p-3"><?= htmlspecialchars($c['email']) ?></td>
                <td class="p-3"><?= htmlspecialchars($c['phone']) ?></td>
                <td class="p-3 space-x-2">
                    <a href="edit.php?id=<?= $c['id'] ?>" class="bg-purple-400 text-white px-2 py-1 rounded hover:bg-purple-500 transition">Edit</a>
                    <a href="delete.php?id=<?= $c['id'] ?>" onclick="return confirm('Hapus kontak ini?')" class="bg-purple-500 text-white px-2 py-1 rounded hover:bg-purple-600 transition">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Recent Activity -->
<div class="mt-6 bg-white p-6 rounded-2xl shadow overflow-auto max-h-40">
    <h2 class="text-purple-700 font-bold mb-2">Aktivitas Terbaru</h2>
    <ul class="text-gray-600 text-sm space-y-1">
        <?php foreach($activities as $a) echo "<li>$a</li>"; ?>
    </ul>
</div>

<script>
const input = document.getElementById('searchInput');
input.addEventListener('keyup', function(){
    const filter = input.value.toLowerCase();
    const rows = document.querySelectorAll('#contactsTable tbody tr');
    rows.forEach(row=>{
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(filter) ? '' : 'none';
    });
});
</script>
</body>
</html>
