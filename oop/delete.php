<?php
require_once 'Database.php';
require_once 'User.php';

$db = (new Database())->connect();
$user = new User($db);

$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $db->prepare("DELETE FROM student_tb WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: index.php?msg=Record deleted successfully");
    exit;
}
?>