<?php
require("../conf/conf_db.php");

//cerco se i dati del passeggero sono già presenti nel db tramite la carta d'identità
$query = $conn->prepare("SELECT * FROM Passeggeri WHERE CartaIde=?");
$query->bind_param("s", $_POST["carta"]);
$query->execute();
$result = $query->get_result();
$query->close();

//se il passaporto non è presente nel db, lo inserisco
if ($result->num_rows > 0) {
	if(isset($_POST["passaporto"])&& $_POST["passaporto"]!=""){
		$query = $conn->prepare("UPDATE Passeggeri SET Passaporto=? WHERE CartaIde=?");
		$query->bind_param("ss", $_POST["passaporto"], $_POST["carta"]);
		$query->execute();
		$query->close();
	}
	session_start();
	$_SESSION["passeggero"] = $_POST["carta"];

	header("location: ../phpFiles/datiPasseggero.php?msg=OK");
}else{
	// se non ci sono risultati, inserisco i dati del passeggero
	header("location: ../phpFiles/datiPasseggeroCompleto.php?carta=".$_POST["carta"]);
}
?>