<?php
require '../include/db.php';

// Fetch visitors without country
$stmt = $pdo->query("SELECT DISTINCT ip_address FROM visitors WHERE country IS NULL OR country = 'Unknown'");
$visitors = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($visitors as $visitor) {
    $ip = $visitor['ip_address'];
    $ip_api_url = "http://ip-api.com/json/{$ip}?fields=country,lat,lon";
    $ip_data = json_decode(file_get_contents($ip_api_url), true);
    $country = $ip_data['country'] ?? 'Unknown';
    $lat = $ip_data['lat'] ?? null;
    $lon = $ip_data['lon'] ?? null;

    // Update visitor record
    $stmt_update = $pdo->prepare("UPDATE visitors SET country = :country, latitude = :lat, longitude = :lon WHERE ip_address = :ip");
    $stmt_update->execute(['country' => $country, 'lat' => $lat, 'lon' => $lon, 'ip' => $ip]);
    echo "Updated IP: $ip with Country: $country<br>";
}
?>