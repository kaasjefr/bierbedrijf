<!DOCTYPE html>
<html lang="nl">

<body>

  <h1>Bestelling plaatsen</h1>
  <form action="intotaal.php" method="post">
    <div class="bestel-box">
      <label for="flesjesAantal">Aantal flesjes (minimaal 10):</label>
      <input type="number" name="flesjesAantal" id="flesjesAantal" min="0" value="0" max="23">
    </div>

    <div class="bestel-box">
      <label for="krattenAantal">Aantal kratten (24 flesjes):</label>
      <input type="number" name="krattenAantal" id="krattenAantal" min="0" value="0" max="23">
    </div>

    <div class="bestel-box">
      <label for="palletsAantal">Aantal pallets (24 kratten):</label>
      <input type="number" name="palletsAantal" id="palletsAantal" min="0" value="0">
    </div>

    <div class="bestel-box">
      <label for="leverdatum">Kies een leverdatum:</label>
      <input type="date" id="leverdatum">
    </div>


    <button><a href="intotaal.php">Verder met bestellen</a></p></button>
  </form>

</body>

</html>