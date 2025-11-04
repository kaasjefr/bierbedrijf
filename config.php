<?php
// DB connectie met PDO. Pas deze 3 aan als jouw omgeving anders is.
$DB_HOST = '127.0.0.1';
$DB_NAME = 'bierbrouwerij';
$DB_USER = 'root';
$DB_PASS = 'ServBay.dev'; // zet je wachtwoord hier als je die hebt in ServBay/XAMPP/MAMP
 
$dsn = "mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4";
 
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
 
try {
    $pdo = new PDO($dsn, $DB_USER, $DB_PASS, $options);
} catch (PDOException $e) {
    http_response_code(500);
    echo "Database connectie failed.";
    exit;
}
 
if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.use_strict_mode', '1');
    session_start();
}
 