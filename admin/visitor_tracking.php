<?php
require '../include/db.php';

$ip_address = $_SERVER['REMOTE_ADDR'];

// Check if this IP has visited today
$stmt_check = $pdo->prepare("SELECT COUNT(*) FROM visitors WHERE ip_address = :ip AND DATE(visit_date) = DATE(NOW())");
$stmt_check->execute(['ip' => $ip_address]);
$exists = $stmt_check->fetchColumn();

if ($exists == 0) {
    // Insert new visit record if IP hasn't visited today
    $stmt = $pdo->prepare("INSERT INTO visitors (visit_date, ip_address) VALUES (NOW(), :ip)");
    $stmt->execute(['ip' => $ip_address]);
}
?>