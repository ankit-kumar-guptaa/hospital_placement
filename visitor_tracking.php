<?php
require 'include/db.php';

$ip_address = $_SERVER['REMOTE_ADDR'];

// Fetch country from IP using ip-api.com
$ip_api_url = "http://ip-api.com/json/{$ip_address}?fields=country";
$ip_data = json_decode(file_get_contents($ip_api_url), true);
$country = $ip_data['country'] ?? 'Unknown';

// Check if this IP has visited today
$stmt_check = $pdo->prepare("SELECT COUNT(*) FROM visitors WHERE ip_address = :ip AND DATE(visit_date) = DATE(NOW())");
$stmt_check->execute(['ip' => $ip_address]);
$exists = $stmt_check->fetchColumn();

if ($exists == 0) {
    $stmt = $pdo->prepare("INSERT INTO visitors (visit_date, ip_address, country) VALUES (NOW(), :ip, :country)");
    $stmt->execute(['ip' => $ip_address, 'country' => $country]);
}
?>