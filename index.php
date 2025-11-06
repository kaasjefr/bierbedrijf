<?php
require __DIR__ . '/config.php';
 
$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $gebruikersnaam = $_POST['gebruikersnaam'] ?? '';
    if ($email === '' || $password === '') {
        $err = 'Vul e-mail en wachtwoord in.';
    } else {
        $stmt = $pdo->prepare('SELECT id, gebruikersnaam, email, wachtwoord FROM gebruikers WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();
 
        if ($user && password_verify($password, $user['wachtwoord'])) {
            session_regenerate_id(true);
            $_SESSION['gebruikers'] = [
                'id' => (int)$user['id'],
                'bedrijfsnaam' => $user['bedrijfsnaam'],
                'email' => $user['email'],
                'rol' => $user['rol']
            ];
 
            if ($user['rol'] === 'beheerder') {
                header('Location: adminhomepagina.php');
            } else {
                header('Location: bierbestellen.php');
            }
            exit;
        } else {
            $err = 'Onjuiste inloggegevens.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="utf-8">
  <title>Inloggen</title>
</head>
<body>
  <h1>Inloggen</h1>
  <?php if ($err): ?>
    <p><?php echo htmlspecialchars($err, ENT_QUOTES, 'UTF-8'); ?></p>
  <?php endif; ?>
  <form method="post" action="auth_check.php" autocomplete="off">
    <label>E-mail<br>
      <input type="email" name="email" required>
    </label>
    <br><br>
    <label>Wachtwoord<br>
      <input type="password" name="password" required>
    </label>
    <br><br>
    <button type="submit">Log in</button>
  </form>
</body>
</html>
