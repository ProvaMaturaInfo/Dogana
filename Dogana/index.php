<?php
include("./htmlFiles/head.html");
require("./conf/conf_db.php");

session_start();
if(isset($_SESSION["login"])){
	//insert into turni the end time
	$query = $conn->prepare("UPDATE TURNI SET DataFine = CURRENT_TIME() WHERE codTurno = ?");
	$query->bind_param("i", $_SESSION["turno"]);
	$query->execute();
	$query->close();
	session_unset();
	session_destroy();
}
?>

<html>
	<body>
		<center>
			<div id="font">
				
				<form action="./phpFiles/loginCheck.php" method="POST" id="form">
				<h1 style="">Login</h1>
					<?php
					if (isset($_GET["msg"])) {
					echo "<p style=color:red> USER O PASSWORD ERRATI!</p>";
					}
					?>
				
					<input placeholder="Codice Utente" type="text"  name="CodUtente" required>
					<br>
					<input placeholder="Password"   type="password" name="psw" required>
					<br>
					<div>
					<?php
						$query = $conn->prepare("SELECT CodPuntoControllo, nome FROM puntiControllo");
						$query->execute();
						$result = $query->get_result();
						$rows = $result->fetch_all(); 
						$query->close();
						echo '<select name="punto">';
						foreach ($rows as $row) {
							print_r ($row);
							echo '<option id="input-select" value="' . $row[0] . '">' . $row[1] . '</option>';
						}
						echo '</select>';
						?>
					</div>
					<br>
					<input type="submit" class="btn btn-primary" name="login" value="Login">
				</form>
			</div>
		</center>
	</body>
</html>