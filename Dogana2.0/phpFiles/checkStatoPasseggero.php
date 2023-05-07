<?php
include( "../htmlFiles/head3.html" );
session_start();
if ( !isset( $_SESSION[ "login" ] ) ) {
  header( "location: ../index.php" );
}
?>
<form method="POST" action="./addStatoPasseggero.php" id="form">
    <div>
        <label for="stato">Stato</label>
        <select name="stato" id="stato">
            <option value="Ammesso">Ammesso</option>
            <option value="Fermo">Fermo</option>
        </select>
    </div>
    <div>
        <label for="contestazione">Contestazione</label>
        <select name="contestazione">
            <option value="no">Nessuna</option>
            <option value="si">Contestazione</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Procedi</button>
</form>
<?php
  if (isset($_GET["msg"])&& $_GET["msg"]=="OK") {
    echo "<h2>Stato caricato correttamente... procedere.</h2>";
    echo "<a href='./datiPasseggero.php' class='btn btn-primary'>Nuovo Passeggero</a>";
  }
  ?>
</body>
</html>
