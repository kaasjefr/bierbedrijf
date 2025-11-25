<!DOCTYPE html>
<html lang="nl">

<body>

  <h1>Bestelling plaatsen</h1>
  <form action="intotaal.php" method="post">

      <label for="flesjes_aantal">
      Aantal flesjes (minimaal 10):
        <input type="number" name="flesjes_aantal" id="flesjes_aantal" min="0" value="0" max="23">
      </label><br><br>


      <label for="kratten_aantal">Aantal kratten (24 flesjes):
        <input type="number" name="kratten_aantal" id="kratten_aantal" min="0" value="0" max="23">
      </label><br><br>


      <label for="pallets_aantal">Aantal pallets (24 kratten):
        <input type="number" name="pallets_aantal" id="pallets_aantal" min="0" value="0">
      </label><br><br>


      <label for="leverdatum">Kies een leverdatum:
        <input type="date" min="<?= date(format: "Y-m-d")?>">
      </label><br><br><br><br>



    <button><a href="intotaal.php">Verder met bestellen</a></p></button>
  </form>

</body>

</html>