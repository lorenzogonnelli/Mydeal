<?php
session_start();
  require_once("header.php"); 
  require_once("config.php"); //login al db
?>
<!--*********************************************************************-->
<table width="100%" cellpadding="5">
<tr><td width="50%"><p align="center"><b>Visualizza</b></p>
<center>
<p> Studenti che partecipano a MyTito fino ad oggi:   
<?php   
$sel = "SELECT * FROM elgg_users_entity WHERE last_login <> 0;";
$risult = mysql_query($sel);
$data=mysql_num_rows($risult);
echo $data;
?>
 </p>
<p><form action="accessi.php">
	<input type="submit" value="Visualizza Accessi Settimana">
</form></p>
<p><form action="accessimese.php">
	<input type="submit" value="Visualizza Accessi mese">
</form></p>
</center>
</td>
<td width="50%">
<p align="center"><b>MyDeal</b></p>
<center>
<p> Alunni iscritti al MyDeal ad ora:    
<?php   
$sel = "SELECT * FROM users WHERE last_login <> 0;";
$risult = mysql_query($sel);
$data=mysql_num_rows($risult);
if(!$data)
   echo 'zero';
echo $data;
?>
</p>
    
    
    

    
    
<p><form action="accessimy.php">
	<input type="submit" value="Accessi MyDeal">
</form></p>
</center>
</td></tr>
</table>
<center>
<p> &nbsp; </p>
<p> &nbsp; </p>
<b>IMPOSTA TRIGGER</b>
<p> &nbsp; </p>
<p> &nbsp; </p>
idgame
<p> &nbsp; </p>   
<?php
$select="SELECT * FROM `games`";
$risultato=mysql_query($select); // il risultato della funzione

if ( !$risultato)                            // controllo query di selezione
{
    echo ("Errore nella query");
    exit();
}
$numero = mysql_num_rows($risultato); // funzione che conta i record estratti
if ($numero == 0)                          // controllo che ci siano record
{
    echo ("Database vuoto");
    exit();
}
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
Scegli l'id del games: <br />
<select name="idgame">
<?php
while ($riga=mysql_fetch_array($risultato))                  
{
   echo "<option value=\"" . $riga['idgames'] . "\"></option> \n";
}
?>
</select>
<input type="submit" name="invia" value="Invia" />
</form>
?>
    
    
 
    
    

    

    
    
    
    
</center>
<!--**********************************************************************************-->
<?php

  /*<form action="trigger.php" method="GET">
   <input type="text" name="idgame"/>
<p> &nbsp; </p>
<p> &nbsp; </p>
gamename
<p> &nbsp; </p>
<input type="text" name="gamename" />
<p> &nbsp; </p>
<p> &nbsp; </p>
trigger
<p> &nbsp; </p>
      <select name="trigger">
         <option value="0">0</option>
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option>
      </select>
<p> &nbsp; </p>
         <input type="submit" value="Imposta Trigger">
   </form>*/



  require_once("footer.php"); 
?>
</body>
</html>
