<?php
require_once 'config.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM blogs WHERE id = ?");
$stmt->execute([$id]);
header("Location: index.php");
exit;
?>