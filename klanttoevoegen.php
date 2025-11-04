<?php
require __DIR__ . '/config.php';
require __DIR__ . '/auth_check.php';
require_role('admin');
 
$errors = [];
$success = '';
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = strtolower(trim($_POST['email'] ?? ''));
    $password = $_POST['password'] ?? '';
    $role = ($_POST['role'] ?? 'klant') === 'admin' ? 'admin' : 'klant';
 
    // Alleen klanten krijgen extra velden
    $bedrijfsnaam = ($role === 'klant') ? trim($_POST['bedrijfsnaam'] ?? '') : null;
    $straat = ($role === 'klant') ? trim($_POST['straatnaam_nummer'] ?? '') : null;
    $postcode = ($role === 'klant') ? trim($_POST['postcode'] ?? '') : null;
    $plaats = ($role === 'klant') ? trim($_POST['plaats'] ?? '') : null;
 
    // Validatie
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Voer een geldig e-mailadres in.';
    if (strlen($password) < 6) $errors[] = 'Wachtwoord moet minimaal 6 tekens zijn.';
    if ($role === 'klant') {
        if ($bedrijfsnaam === '') $errors[] = 'Bedrijfsnaam is verplicht voor klanten.';
        if ($plaats === '') $errors[] = 'Plaats is verplicht voor klanten.';
    }
 
    if (empty($errors)) {
        // Controleer of email al bestaat
        $stmt = $pdo->prepare('SELECT id FROM users WHERE email = ?');
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $errors[] = 'Dit e-mailadres bestaat al.';
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            if ($role === 'klant') {
                $ins = $pdo->prepare('INSERT INTO users (bedrijfsnaam, email, password_hash, straatnaam_nummer, postcode, plaats, role) VALUES (?, ?, ?, ?, ?, ?, ?)');
                $ins->execute([$bedrijfsnaam, $email, $hash, $straat, $postcode, $plaats, 'klant']);
            } else {
                $ins = $pdo->prepare('INSERT INTO users (email, password_hash, role) VALUES (?, ?, ?)');
                $ins->execute([$email, $hash, 'admin']);
            }
            $success = 'Gebruiker succesvol toegevoegd.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="utf-8">
  <title>Gebruiker toevoegen (Admin)</title>
  <script>
  function toggleFields() {
      const role = document.getElementById('role').value;
      const klantFields = document.getElementById('klantFields');
      klantFields.style.display = (role === 'klant') ? 'block' : 'none';
  }
  </script>
</head>
<body>
  <h1>Gebruiker toevoegen</h1>
 
  <p>Ingelogd als: <?php echo htmlspecialchars($_SESSION['user']['email']); ?> (<?php echo htmlspecialchars($_SESSION['user']['role']); ?>)</p>
 
  <?php if ($errors): ?>
    <div style="color:red;">
      <ul>
        <?php foreach ($errors as $e): ?>
          <li><?php echo htmlspecialchars($e); ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>
 
  <?php if ($success): ?>
    <div style="color:green;"><?php echo htmlspecialchars($success); ?></div>
  <?php endif; ?>
 
  <form method="post" action="klanttoevoegen.php" autocomplete="off">
    <label>E-mailadres:<br>
      <input type="email" name="email" required>
    </label><br><br>
 
    <label>Wachtwoord:<br>
      <input type="password" name="password" required>
    </label><br><br>
 
    <label>Rol:<br>
      <select name="role" id="role" onchange="toggleFields()">
        <option value="klant">Klant</option>
        <option value="admin">Admin</option>
      </select>
    </label><br><br>
 
    <div id="klantFields">
      <label>Bedrijfsnaam:<br>
        <input type="text" name="bedrijfsnaam">
      </label><br><br>
 
      <label>Straatnaam en nummer:<br>
        <input type="text" name="straatnaam_nummer">
      </label><br><br>
 
      <label>Postcode:<br>
        <input type="text" name="postcode">
      </label><br><br>
 
      <label>Plaats:<br>
        <input type="text" name="plaats">
      </label><br><br>
    </div>
 
    <button type="submit">Gebruiker aanmaken</button>
  </form>
 
  <p><a href="adminhomepagina.php">Terug   naar admin home</a> | <a href="logout.php">Uitloggen</a></p>
</body>
</html>