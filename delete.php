<?php
require 'functions.php';
check_login();

$id = $_GET['id'] ?? '';
if ($id) {
    delete_contact($id);
}
header('Location: index.php');
exit;
?>
