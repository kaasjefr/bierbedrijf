<?php
require __DIR__ . '/config.php';
 
// Admin gegevens
$email = 'admin@bier.test';
$password = 'admin123';
 
// Hash het wachtwoord
$hash = password_hash ($password, PASSWORD_DEFAULT);
 
// Check of admin al bestaat
$stmt = $pdo->prepare("SELECT id FROM gebruikers WHERE gebruikersnaam = ?");
$stmt->execute([$email]);
 
if ($stmt->fetch()) {
    echo "❗ Admin bestaat al: $email";
} else {
    // Voeg gebruiker toe
    $insert = $pdo->prepare("
        INSERT INTO gebruikers (gebruikersnaam, wachtwoord)
        VALUES (?, ?)
    ");
    $insert->execute([$email, $password]);
    
    // Haal het nieuwe gebruiker ID op
    $userId = $pdo->lastInsertId();
    
    // Voeg beheerder rol toe
    $roleInsert = $pdo->prepare("
        INSERT INTO gebruikersrollen (gebruiker_id, rol_id)
        SELECT ?, id FROM rollen WHERE rolnaam = 'beheerder'
    ");
    $roleInsert->execute([$userId]);
    
    echo "✅ Admin account aangemaakt:<br>";
    echo "Gebruikersnaam: $email<br>";
    echo "Wachtwoord: $password";
}
?>



