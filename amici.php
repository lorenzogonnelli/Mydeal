  session_start();
  require_once("header.php"); 
  require_once("config.php"); //login al db
  ?>
<div id="box_regole">
<?php
  $guid=$_SESSION['guid'];
  $query="SELECT * FROM `detgame` WHERE `guid`='$guid'";
  $result=mysql_query($query) or die("Errore nel prendere dati da det game");
  while($row=mysql_fetch_array($result))
  		$type=$row['type'];
	echo "ciao" .$guid;
  if($type==0){
  		//metto le azioni che puo fare un receiver
  }
  else
  {
  		//metto le azioni che puo fare un sender
  }
?>
<!--*********************************************************************-->

<p> &nbsp;</p>
<p>Hai x amici nel gioco</p>
<p>Hai x amici degli amici nel gioco</p>
<p>Hai x sconosciutii nel gioco</p>
<p> &nbsp;</p>
<p>A chi vuoi donare gettoni?:</p>
<p><form method="post" action="gioca.php">
Amico: <input type="radio" name="scelta" value="amico"><br />
Amico dell'amico: <input type="radio" name="scelta" value="amicoamico"><br />
Sconosciuto: <input type="radio" name="scelta" value="sconosciuto"><br />
<p>Quanti?
<select name="gettoni">
  <option value="0" selected>0</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
</select>
</p>
<input type="submit" value="Invia gettoni">
</form></p>
</div>
<?php
  require_once("footer.php"); 
?>


