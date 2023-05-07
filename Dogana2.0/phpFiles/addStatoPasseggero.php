<?php 
require("../conf/conf_db.php");
session_start();
$query = $conn->prepare("UPDATE Passeggeri SET StatoControllo=?, Contestazione=? WHERE CartaIde=?");
$query->bind_param("sss", $_POST["stato"], $_POST["contestazione"], $_SESSION["passeggero"]);
$query->execute();
$query->close();
header("location: ../phpFiles/checkStatoPasseggero.php?msg=OK");
?>



