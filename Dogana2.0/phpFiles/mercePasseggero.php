<?php
include( "../htmlFiles/head3.html" );
session_start();
if ( !isset( $_SESSION[ "login" ] ) ) {
  header( "location: ../index.php" );
}

$_SESSION["inizioControllo"] = date("Y-m-d H:i:s");
?>

<body>

<form method="POST" action="./addMerce.php" id="form">
<div class="form-group">
<input type="text" class="form-control"  placeholder="Nome" name="nome" required>
</div>
<div class="form-group">
  <label for="categoria">Categoria</label>
  <?php
  require( "../conf/conf_db.php" );
  $query = $conn->prepare("SELECT CodCategoria, Categoria FROM Categorie");
  $query->execute();
  $result = $query->get_result();
  $rows = $result->fetch_all();
  $query->close();
  echo '<select name="categoria">';
  foreach($rows as $row){
    echo '<option value="'.$row[0].'">'.$row[1].'</option>';
  }
  ?>
</div>
<div class="form-group">
<input type="text" class="form-control"  placeholder="Note" name="note">
</div>
<div class="form-group">
<input type="number" min="0" class="form-control" step="any" placeholder="Quantità" name="qt" required>
</div>
<div class="form-group">
  <label for="unita">Unità di misura</label>
  <select name="unita">
        <option value="Kg">Kg</option>
        <option value="g">g</option>
        <option value="L">L</option>
        <option value="ml">Mml</option>
        <option value="Pz">Pz</option>
</div>
<div class="form-group">
  <input type="radio" name="esito" value="Ammetti" checked> Ammetti
  <input type="radio" name="esito" value="Confisca"> Confisca
</div>
<div class="form-group">
<input type="number" min="0" class="form-control"  placeholder="Dazio in €" name="dazio">
</div>
<button type="submit" class="btn btn-primary">Carica</button>
<a href="./checkStatoPasseggero.php" class="btn btn-primary">Fine Merce</a>
<?php
  if (isset($_GET["msg"])&& $_GET["msg"]=="OK") {
    echo "<h2>Merce caricatta correttamente... procedere.</h2>";
  }
  ?>
</form>

</body>
</html>
