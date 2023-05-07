<?php
include("../htmlFiles/head2.html");
session_start();
if(!isset($_SESSION["login"])){
	header("location: ../index.php");
}
?>
<body class="sfondo">
	<center>
		<div id="font">
			<?php
				echo "<span style='font-size:40px; color:white;'>Benvenuto " . $_SESSION["nome"] . "</span>";
			?>
		</div>
	</center>
</body>