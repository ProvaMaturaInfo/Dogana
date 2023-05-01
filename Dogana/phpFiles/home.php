<?php
include("../htmlFiles/head2.html");
session_start();
if(!isset($_SESSION["login"])){
	header("location: ../index.php");
}
?>
<body>
	
	<center>
		<div id="font">
			<?php
			echo "<span style=font-size:60px>Benvenuto ".$_SESSION["nome"]."</span>";
			?>
		</div>
	</center>
</body>