<?php
include( "../htmlFiles/head3.html" );
session_start();
if ( !isset( $_SESSION[ "login" ] ) ) {
  header( "location: ../index.php" );
}
?>

<center>
		<div id="font">
			<?php
			echo "<span style=font-size:30px>Iniziamo un nuovo controllo"."</span>";
			?>
		</div>
	</center>


<body>
<form method="POST" action="./addPasseggero.php" id="form">
  <div class="form-group">
    <input type="text" class="form-control"  placeholder="Carta Identità" name="carta" pattern="^.{1,12}$" required>
  </div>
  <div class="form-group">
    <input type="text" class="form-control"  placeholder="Passaporto" name="passaporto">
  </div>
  <center>
    <input type="submit" class="btn btn-primary" value="Carica"/>
    <input type="submit" class="btn btn-primary" onclick="location.href='home.php'" value="Indietro"/>
  </center>
</form>
	<?php
    if (isset($_GET["msg"])&& $_GET["msg"]=="OK") {
      header("location:./mercePasseggero.php");
    }
	elseif (isset($_GET["msg"])&& $_GET["msg"]=="ERR") {
      echo "<h2>INSERIRE PASSAPORTO O CARTA IDE.</h2>";
    }
    ?>
</body>
</html>