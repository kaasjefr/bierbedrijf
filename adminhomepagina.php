<?php
require __DIR__ . '/config.php';
//require __DIR__ . '/auth_check.php';
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="utf-8">
  <title>Admin Home</title>
</head>
<body>
  <h1>Admin Home</h1>
  <p>Ingelogd als: <?php echo htmlspecialchars($_SESSION['gebruikers']['email']); ?> (<?php echo $_SESSION['gebruikers']['rol']; ?>)</p>
  <ul>
    <li><a href="bestellingbekijken.php">Bestellingen</a></li>
    <li><a href="bestellingbekijken.php">Bestelling bekijken</a></li>
  </ul>
  <!--<p><a href="index.php">Uitloggen</a></p>-->
</body>
</html>

