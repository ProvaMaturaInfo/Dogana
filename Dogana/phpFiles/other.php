<?php
include( "../htmlFiles/head3.html" );
session_start();
if ( !isset( $_SESSION[ "login" ] ) ) {
  header( "location: ../index.php" );
}
?>

<body>

<div class="form-group">

  <?php
  require( "../conf/conf_db.php" );
  $query = $conn->prepare("SELECT * FROM passeggeri , controlli , merci WHERE merci.codMerce = controlli.CodMerce AND passeggeri.codPasseggero = merci.codPasseggero and Esito = 'Confisca';");
  $query->execute();
  $result = $query->get_result();
  $rows = $result->fetch_all();
  $query->close();
  echo"<table id='form'>
  <th >Merce confiscata</th>
  <tr>
    <th>Nome</th>
    <th>Cognome</th>
    <th>Merce</th>
    <th>Data</th>
    <th>Stato</th>
    <th>Contestato</th>
  </tr>";
  foreach($rows as $row){
    echo '<tr>
    <td>'.$row[1].'</td>
    <td>'.$row[2].'</td>
    <td>'.$row[21].'</td>
    <td>'.$row[13].'</td>
    <td>'.$row[8].'</td>
    <td>'.$row[9].'</td>
  </tr>';
  }
  ?>
</div>

<div class="form-group">

  <?php
  require( "../conf/conf_db.php" );
  $query = $conn->prepare("SELECT * FROM turni,addetti,punticontrollo where turni.Addetto = addetti.CodAddetto and punticontrollo.CodPuntoControllo=turni.PuntoControllo limit 10;");
  $query->execute();
  $result = $query->get_result();
  $rows = $result->fetch_all();
  $query->close();
  echo"<table id='form'>
  <th >Turni</th>
  <tr>
    <th>Nome</th>
    <th>Cognome</th>
    <th>Postazone</th>
  </tr>";
  foreach($rows as $row){
    echo '<tr>
    <td>'.$row[6].'</td>
    <td>'.$row[7].'</td>
    <td>'.$row[3].'</td>
  </tr>';
  }
  ?>
</div>
</html>