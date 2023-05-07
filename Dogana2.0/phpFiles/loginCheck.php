<?php
require( "../conf/conf_db.php" );

$query = $conn->prepare( "SELECT * FROM ADDETTI WHERE CodAddetto = ? AND Password=?" );
$query->bind_param( "is", $_POST[ "CodUtente" ], $_POST[ "psw" ]);
$query->execute();

$result = $query->get_result();
$row = $result->fetch_assoc();
$query->close();

if ( $row[ "CodAddetto" ] == $_POST[ "CodUtente" ] && $row[ "Password" ] == $_POST[ "psw" ] ) {
  //data = CURRENT_TIME()
  $data = new DateTime();
  $data = $data->format('Y-m-d H:i:s');
  $query = $conn->prepare("INSERT INTO TURNI (Addetto, PuntoControllo, Data) VALUES (?, ?, ?)");
  $query->bind_param("iis", $_POST["CodUtente"], $_POST["punto"],$data);
  $query->execute();
  $query->close();
  
	session_start();
    $_SESSION[ "login" ] = "ok";
    $_SESSION["codAddetto"] = $_POST[ "CodUtente" ];
    $_SESSION["nome"] = $row[ "Nome" ];
    $_SESSION["cognome"] = $row[ "Cognome" ];
	  $_SESSION["punto"] = $_POST["punto"];

    $query = $conn->prepare("SELECT codTurno FROM TURNI WHERE Addetto = ? AND Data = ?");
    $query->bind_param("is", $_POST["CodUtente"], $data);
    $query->execute();
    $result = $query->get_result();
    $row = $result->fetch_assoc();
    $query->close();
    $_SESSION["turno"] = $row["codTurno"];

    header( "location: ./home.php" ); 
} else {
  header( "location: ../index.php?msg=ERR" );
}
?>