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
        <input type="radio" name="unita" value="kg" checked> kg
        <input type="radio" name="unita" value="g"> g
        <input type="radio" name="unita" value="L">L
        <input type="radio" name="unita" value="ml">Mml
        <input type="radio" name="unita" value="Pz">Pz
</div>
<div class="form-group">
  <input type="radio" name="esito" value="Ammetti" checked> Ammetti
  <input type="radio" name="esito" value="Confisca"> Confisca
</div>
<div class="form-group">
<input type="number" min="0" class="form-control"  placeholder="Dazio in €" name="dazio">
</div>
<button type="submit" class="btn btn-primary">Carica</button>
</form>
<a href="./checkStatoPasseggero.php" class="btn btn-primary">Fine Merce</a>
<?php
  if (isset($_GET["msg"])&& $_GET["msg"]=="OK") {
    echo "<h2>Merce caricatta correttamente... procedere.</h2>";
  }
  ?>
</body>
</html>
