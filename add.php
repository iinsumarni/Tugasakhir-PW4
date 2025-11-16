<?php
require 'functions.php';
check_login();

$is_edit = isset($_GET['id']);
$contact = $is_edit ? get_contact($_GET['id']) : null;

$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);

    if (!$name) $errors[] = "Nama wajib diisi!";
    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email tidak valid!";
    if (!$phone) $errors[] = "Telepon wajib diisi!";

    if (!$errors) {
        if ($is_edit) {
            update_contact($_GET['id'], $name, $email, $phone);
        } else {
            add_contact($name, $email, $phone);
        }
        header('Location: index.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title><?= $is_edit ? 'Edit Kontak' : 'Tambah Kontak' ?></title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-purple-200 via-purple-300 to-purple-400 min-h-screen flex items-center justify-center">
<div class="bg-white w-96 p-8 rounded-2xl shadow-xl">
    <h2 class="text-2xl font-bold mb-2 text-purple-700"><?= $is_edit ? 'Edit Kontak' : 'Tambah Kontak' ?></h2>
    <p class="text-gray-500 mb-6"><?= $is_edit ? 'Ubah informasi kontak Anda' : 'Masukkan detail kontak baru' ?></p>

    <?php if($errors): ?>
        <ul class="text-red-500 mb-4">
            <?php foreach($errors as $e) echo "<li>$e</li>"; ?>
        </ul>
    <?php endif; ?>

    <form method="POST" class="space-y-4">
        <input type="text" name="name" placeholder="Nama" class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500" value="<?= htmlspecialchars($_POST['name'] ?? $contact['name'] ?? '') ?>" required>
        <input type="email" name="email" placeholder="Email" class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500" value="<?= htmlspecialchars($_POST['email'] ?? $contact['email'] ?? '') ?>" required>
        <input type="text" name="phone" placeholder="Telepon" class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500" value="<?= htmlspecialchars($_POST['phone'] ?? $contact['phone'] ?? '') ?>" required>
        <div class="flex justify-between">
            <button type="submit" class="bg-purple-600 text-white px-6 py-3 rounded-xl hover:bg-purple-700 transition"><?= $is_edit ? 'Update' : 'Tambah' ?></button>
            <a href="index.php" class="bg-gray-300 text-gray-700 px-6 py-3 rounded-xl hover:bg-gray-400 transition">Batal</a>
        </div>
    </form>
</div>
</body>
</html>
