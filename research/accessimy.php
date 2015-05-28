<?php 
session_start();
  require_once("header.php"); 
  require_once("config.php"); //login al db
?>
<!--**************************************************************-->
<center>
<?php
	$comando="SELECT `name` FROM `users`;";
	$esegui=mysql_query($comando) or die("Errore nella query. Query non eseguita.");
		while($row=mysql_fetch_array($esegui))
			$nome=$row['name'];
			echo $nome;
</center>
<!--**********************************************************************************-->
<?php
  require_once("footer.php"); 
?>
</body>
</html>