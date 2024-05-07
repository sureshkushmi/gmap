<?php
$host = 'localhost';
$dbname = 'ypnepal_database';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query('SELECT name, description, add1, cityId, phone1, phone2, email, url, latitude,longitude FROM listings');
    $locations = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($locations);
} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    die();
}
?>