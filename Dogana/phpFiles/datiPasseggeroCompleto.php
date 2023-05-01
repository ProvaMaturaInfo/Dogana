<?php
include( "../htmlFiles/head3.html" );
session_start();
if ( !isset( $_SESSION[ "login" ] ) ) {
  header( "location: ../index.php" );
}
?>

<body>
    <form method="POST" action="./addPasseggeroCompleto.php" id="form">
    <h3 style="font-family: 'Times New Roman', Times, serif;">Compila i dati del passeggero</h2>
    <div class="form-group">
        <input type="text" class="form-control"  placeholder="Nome" name="nome" required>
    </div>
    <div class="form-group">
        <input type="text" class="form-control"  placeholder="Cognome" name="cognome" required>
    </div>
    <div class="form">
        <input type="radio" name="sesso" value="M" checked> M
        <input type="radio" name="sesso" value="F"> F
    </div>
    <div>
        <label for="data">Data di nascita:</label>
        <input type="date" class="form-control" placeholder="Data di nascita" name="data" min="1900-01-01"  max="<?php echo date('Y-m-d', strtotime('-1 day')); ?>" required>
    </div>
    <div class="form-group">
        <input type="text" class="form-control"  placeholder="Stato nazionalità" name="stato" required>
    </div>
    <div class="form-group">
        <label for="carta">Carta d'identità:</label>
        <input type="text" class="form-control"  placeholder=<?php echo $_GET["carta"]; ?> name="carta" pattern="^.{1,12}$" value=<?php echo $_GET["carta"]; ?>   required>
    </div>
    <div class="form-group">
        <input type="text" class="form-control"  placeholder="Passaporto" name="passaporto" pattern="^.{1,12}$">
    </div>
    <button type="submit" class="btn btn-primary">Carica</button>
    </form>
    <?php
    if (isset($_GET["msg"])&& $_GET["msg"]=="OK") {
      echo "<h2>Dati inseriti correttamente!</h2>";
      header("location: ./mercePasseggero.php");
    }
    ?>
</body>
</html>
