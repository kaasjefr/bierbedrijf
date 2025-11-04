<<<<<<< HEAD
<?php
require __DIR__ . '/config.php';
 
// Admin gegevens
$email = 'admin@bier.test';
$password = 'admin123';
 
// Hash het wachtwoord
$hash = password_hash($password, PASSWORD_DEFAULT);
 
// Check of admin al bestaat
$stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
$stmt->execute([$email]);
 
if ($stmt->fetch()) {
    echo "❗ Admin bestaat al: $email";
} else {
    $insert = $pdo->prepare("
        INSERT INTO users (email, password_hash, role)
        VALUES (?, ?, 'admin')
    ");
    $insert->execute([$email, $hash]);
    echo "✅ Admin account aangemaakt:<br>";
    echo "Email: $email<br>";
    echo "Wachtwoord: $password";
}
=======
<?php 



>>>>>>> ed9899adc0a0f455b8b2454e3c08d679610624b3
