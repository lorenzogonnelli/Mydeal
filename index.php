<?php
session_start();
  require_once("header.php"); 
  require_once("config.php"); //login al db
?>
<!--inizio pagina-->
<!--**************************************************************-->
<?php //proviamo se tiene la sessione di elgg
$session = $_GET['guid'];

	$comando="SELECT `guid`, `name`, `username`, `email`, `last_login` , 'last_action' , 'prev_last_action', 'prev_last_login' FROM `elgg_users_entity` WHERE `guid`=$session";

    $final=mysql_query($comando);
    while($row=mysql_fetch_array($final)){
       //echo "Benvenuto ".$row['name']
		$_SESSION['name']=$row['name'];
		$_SESSION['email']=$row['email'];
		$timestamp=$row['last_login'];
      $data = date('d-m-Y H:i',$timestamp);
      $_SESSION['last_login'] = $data;
		$_SESSION['username']=$row['username']; 
		$_SESSION['last_action']=$row['last_action'];
		$_SESSION['prev_last_login']=$row['prev_last_login'];
		$_SESSION['prev_last_action']=$row['prev_last_action'];
}
$_SESSION['guid']=$session;
?>
<div id="box">
<p>&nbsp;</p>
<br />
<?php echo "Ciao " . $_SESSION['name']; ?>
<p>&nbsp;</p>
<?php echo "Email: " . $_SESSION['email']; ?>
<p>&nbsp;</p>
<?php echo "Ultimo Login: ".$data; ?>
<p>&nbsp;</p>
<hr>
<?php
$primocarattere=substr($_SESSION['email'], 0 , 1);
if($primocarattere == '1' || $primocarattere == '2' || $primocarattere=='3' || $primocarattere=='0'){
   echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Errore Inserisci un email valida!')
    window.location.href='http://mytito.it/profile/';
    </SCRIPT>");
}
else{
	$name=$_SESSION['name'];
	$guid=$_SESSION['guid'];
	$email=$_SESSION['email'];
	$last_login=$_SESSION['last_login'];
	$username=$_SESSION['username'];
	$last_action=$_SESSION['last_action'];
	$prev_last_action=$_SESSION['prev_last_action'];
	$prev_last_login=$_SESSION['prev_last_login'];
	//$queryprova="INSERT INTO `users`(`guid`) VALUES ($idutente)";
	$verifica="SELECT * FROM `users` WHERE `guid`=$guid";
	$risultato=mysql_query($verifica) or die("errore nel prendere dati ");
	if(mysql_num_rows($risultato)==0){ //controllo se l'utente è già presente oppure no
		$query="INSERT INTO `users`(`guid`, `name`, `username`, `email`, `last_action`, `prev_last_action`, `last_login`, `prev_last_login`)
				 VALUES ( '$guid' , '$name' , '$username' , '$email' , '$last_action' , '$prev_last_action' , '$last_login' , '$prev_last_login') ";
		mysql_query($query) or die( "Errore nella query. Query non eseguita.");
	}
	else
	{
		$queryupdate="UPDATE `users` SET `email`='$email',`last_action`='$last_action',`prev_last_action`='$prev_last_action',`last_login`='$last_login',`prev_last_login`='$prev_last_login' WHERE 'guid'='$guid'";
		mysql_query($queryupdate) or die("errore nell'aggiornamento dati");
	}
}
?>
<br />
<?php
//TRIGGER
$minimo_partecipanti=50;
$select3="SELECT count(*) FROM `users`;"; //SELEZIONA TUTTA UNA COLONNA E LA CONTA
$risult1=mysql_query($select3)  or die( "Errore nella query. Query count non eseguita."); //LANCIA LA QUERY
$num=mysql_result($risult1, 0); //CONTA IL NUM. DI UTENTI TRAMITE LE RIGHE  
if($num > $minimo_partecipanti) { //GUARDA IL NUMERO DI PARTECIPANTI, SE INFERIORE AL MINIMO LO REGISTRA E POI MANDEREMO EMAIL ALLA PARTENZA
echo 'Puoi Giocare';
$trigger=1;
}
else {
$mancanti = $minimo_partecipanti - $num;
echo 'Utenti registrati: ' . $num
?>
<p>&nbsp;</p>
<?php
echo 'Utenti mancanti per iniziare il gioco: ' . $mancanti; 
?>
<p>&nbsp;</p>
<b>
<font color="red">
<?php
echo 'Ti arriverà una mail appena parte il gioco.';
?>
</b>
<p>&nbsp;</p>
</font>
<?php
$trigger=0;
}
$_SESSION['trigger'] = $trigger;  //VARIABILE SESSIONE TRIGGER PER PORTARLA IN ALTRE PAGINE.
?>
<p><b>Leggi le regole:</b></p>
<br />
<p>&nbsp;</p>
<form action="regole.php">
<input type="submit" value="Regole">
</form>
</p>
</div>
<!--fine pagina-->
<!--**************************************************************-->

<!--inizio footer-->
<!--**************************************************************-->
<?php
  require_once("footer.php"); 
?>

