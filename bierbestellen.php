<!DOCTYPE html>
<html lang="nl">
<body>

  <h1>Bestelling plaatsen</h1>

  <div class="bestel-box">
    <label for="flesjesAantal">Aantal flesjes (minimaal 10):</label>
    <input type="number" id="flesjesAantal" min="10" value="10">
    <button onclick="bestelFlesjes()">Bestel Flesjes</button>
  </div>

  <div class="bestel-box">
    <label for="krattenAantal">Aantal kratten:</label>
    <input type="number" id="krattenAantal" min="0" value="0">
    <button onclick="bestelKraten()">Bestel Kratten</button>
  </div>

  <div class="bestel-box">
    <label for="palletsAantal">Aantal pallets:</label>
    <input type="number" id="palletsAantal" min="0" value="0">
    <button onclick="bestelPallets()">Bestel Pallets</button>
  </div>

  <div class="bestel-box">
    <label for="leverdatum">Kies een leverdatum:</label>
    <input type="date" id="leverdatum">
  </div>

 
  <button><a href="intotaal.php">Verder met bestellen</a></p></button>


  <script>
    function bestelFlesjes() {
      const aantal = parseInt(document.getElementById('flesjesAantal').value);
      if (aantal < 10) {
        alert("Je moet minimaal 10 flesjes bestellen.");
      } else {
        alert(`Je hebt ${aantal} flesjes besteld.`);
      }
    }

    function bestelKraten() {
      const aantal = parseInt(document.getElementById('krattenAantal').value);
      alert(`Je hebt ${aantal} krat${aantal === 1 ? '' : 'ten'} besteld.`);
    }

    function bestelPallets() {
      const aantal = parseInt(document.getElementById('palletsAantal').value);
      alert(`Je hebt ${aantal} pallet${aantal === 1 ? '' : 's'} besteld.`);
    }

    function verderMetBestellen() {
      const flesjes = parseInt(document.getElementById('flesjesAantal').value);
      const kratten = parseInt(document.getElementById('krattenAantal').value);
      const pallets = parseInt(document.getElementById('palletsAantal').value);
      const datum = document.getElementById('leverdatum').value;

      if (flesjes < 10) {
        alert("Je moet minimaal 10 flesjes bestellen.");
        return;
      }

      if (!datum) {
        alert("Kies een leverdatum voordat je verder gaat.");
        return;
      }

      alert(`Bestelling geplaatst:\n- ${flesjes} flesjes\n- ${kratten} kratten\n- ${pallets} pallets\n- Leverdatum: ${datum}`);
    }
  </script>

</body>
</html>