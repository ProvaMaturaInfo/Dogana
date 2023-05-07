<?php
require("../conf/conf_db.php");
//inserisco i dati del passeggero nel db
$query = $conn->prepare("INSERT INTO passeggeri (Nome, Cognome, Sesso, DataNascita, Nazione, CartaIde, Passaporto) VALUES (?, ?, ?, ?, ?, ?, ?)");
$query->bind_param("sssssss", $_POST["nome"], $_POST["cognome"], $_POST["sesso"], $_POST["data"], $_POST["stato"], $_POST["carta"], $_POST["passaporto"]);
$query->execute();
$query->close();
session_start();
$_SESSION["passeggero"] = $_POST["carta"];

header("location: ../phpFiles/datiPasseggeroCompleto.php?msg=OK&carta=".$_POST["carta"]);
?>