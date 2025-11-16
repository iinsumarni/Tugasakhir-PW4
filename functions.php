<?php
session_start();
define('DB_FILE', 'contacts.json');
define('LOG_FILE', 'activity.log');

function is_logged_in() { return isset($_SESSION['user']); }
function check_login() { if (!is_logged_in()) header("Location: login.php"); }

function get_contacts() {
    if (!file_exists(DB_FILE)) return [];
    $data = file_get_contents(DB_FILE);
    return json_decode($data, true) ?? [];
}

function save_contacts($contacts) { file_put_contents(DB_FILE, json_encode($contacts, JSON_PRETTY_PRINT)); }

function log_activity($action, $contact_name) {
    $user = $_SESSION['user'] ?? 'Guest';
    $line = "[".date('Y-m-d H:i:s')."] $user $action $contact_name\n";
    file_put_contents(LOG_FILE, $line, FILE_APPEND);
}

function add_contact($name, $email, $phone) {
    $contacts = get_contacts();
    $contacts[] = ['id'=>uniqid(), 'name'=>$name, 'email'=>$email, 'phone'=>$phone, 'created_at'=>date('Y-m-d H:i:s')];
    save_contacts($contacts);
    log_activity('Menambahkan', $name);
}

function get_contact($id) {
    foreach(get_contacts() as $c) if($c['id']===$id) return $c;
    return null;
}

function update_contact($id, $name, $email, $phone) {
    $contacts = get_contacts();
    foreach($contacts as &$c) { if($c['id']===$id){ $c['name']=$name; $c['email']=$email; $c['phone']=$phone; $c['updated_at']=date('Y-m-d H:i:s'); } }
    save_contacts($contacts);
    log_activity('Mengedit', $name);
}

function delete_contact($id) {
    $contacts = get_contacts();
    foreach($contacts as $c){ if($c['id']===$id){ log_activity('Menghapus', $c['name']); break; } }
    $contacts = array_filter($contacts, fn($c)=>$c['id']!==$id);
    save_contacts($contacts);
}
?>
