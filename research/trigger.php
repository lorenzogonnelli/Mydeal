<?php
session_start();
require_once('config.php');

###### 

$idgame=$_GET['idgame'];
$namegame=$_GET['gamename'];
$trigger=$_GET['trigger'];

$query1="SELECT * FROM `games` WHERE  'gamename'='$namegame'";
$result=mysql_query($query1) or die("errore nel prendere dati");
if((mysql_num_rows($result))==0){
	$query="INSERT INTO `games`(`idgames`, `gamename`, `trigger`) VALUES	                              ('$idgame','$namegame','$trigger')";
    mysql_query($query) or die("Errore Query");

}
else
{
	$queryupdate="UPDATE `games` SET `trigger`='$trigger' WHERE 'gamename'='$namegame'";
	mysql_query("$queryupdate") or die("errore nell'aggiornare dati");
}


#####
echo "Il namegame Ë stato impostato a: ".$namegame."\n";
echo "Il trigger Ë stato impostato a: ".$trigger."\n";
?>