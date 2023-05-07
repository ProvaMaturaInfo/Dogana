<?php
require("../conf/conf_db.php");

session_start();
//prendo il codice del passeggero 
$query = $conn->prepare("SELECT CodPasseggero FROM Passeggeri WHERE CartaIde=?");
$query->bind_param("s", $_SESSION["passeggero"]);
$query->execute();
$result = $query->get_result();
$carta = $result->fetch_assoc();
$query->close();

//inserisco i dati della merce nel db
$query = $conn->prepare("INSERT INTO Merci (Nome, Categoria, Note, Qt, Unita, codPasseggero) VALUES (?, ?, ?, ?, ?, ?)");
$query->bind_param("sisdss", $_POST["nome"], $_POST["categoria"], $_POST["note"], $_POST["qt"], $_POST["unita"], $carta["CodPasseggero"]);
$query->execute();
$query->close();

//seleziono l'ultima merce inserita
$query = $conn->prepare("SELECT CodMerce FROM Merci WHERE codPasseggero=? order by CodMerce desc limit 1");
$query->bind_param("s", $carta["CodPasseggero"]);
$query->execute();
$result = $query->get_result();
$codMerce = $result->fetch_assoc();
$query->close();

//inserisco i dati della merce in controlli
$query = $conn->prepare("INSERT INTO Controlli (CodAddetto ,CodMerce, Data, Ora, OraFine, Esito, ImportoDazio) VALUES (?, ?, CURRENT_DATE(), ?, CURRENT_TIMESTAMP(),?,?)");
$query->bind_param("iissd", $_SESSION["codAddetto"], $codMerce["CodMerce"],$_SESSION["inizioControllo"] , $_POST["esito"], $_POST["dazio"]);
$query->execute();
$query->close();

header("location: ../phpFiles/mercePasseggero.php?msg=OK")
?>