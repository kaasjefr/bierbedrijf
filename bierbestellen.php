<!DOCTYPE html>
<html lang="nl">

<body>

  <h1>Bestelling plaatsen</h1>
  <form action="intotaal.php" method="post">
    <div class="bestel-box">
      <label for="flesjes_aantal">Aantal flesjes (minimaal 10):</label>
      <input type="number" name="flesjes_aantal" id="flesjes_aantal" min="0" value="0" max="23">
    </div>

    <div class="bestel-box">
      <label for="kratten_aantal">Aantal kratten (24 flesjes):</label>
      <input type="number" name="kratten_aantal" id="kratten_aantal" min="0" value="0" max="23">
    </div>

    <div class="bestel-box">
      <label for="pallets_aantal">Aantal pallets (24 kratten):</label>
      <input type="number" name="pallets_aantal" id="pallets_aantal" min="0" value="0">
    </div>

    <div class="bestel-box">
      <label for="leverdatum">Kies een leverdatum:</label>
      <input type="date" id="leverdatum">
    </div>


    <button><a href="intotaal.php">Verder met bestellen</a></p></button>
  </form>

</body>

</html>