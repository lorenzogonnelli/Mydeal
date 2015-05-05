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
		$_SESSION['last_login']=$row['last_login'];
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
<?php echo "Ultimo Login: ".$_SESSION['last_login']; ?>
<p>&nbsp;</p>
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
	$query="INSERT INTO `users`(`guid`, `name`, `username`, `email`, `last_action`, `prev_last_action`, `last_login`, `prev_last_login`)
			 VALUES ( '$guid' , '$name' , '$username' , '$email' , '$last_action' , '$prev_last_action' , '$last_login' , '$prev_last_login') ";
	mysql_query($query) or die( "Errore nella query. Query non eseguita.");
}
?>
<br />
<?php
   //aggiunto trigger
$minimo_partecipanti=50;
$select3="SELECT count(*) FROM `users`;";
$risult1=mysql_query($select3)  or die( "Errore nella query. Query count non eseguita.");
 $num=mysql_result($risult1, 0);
echo 'ci sono ' . $num . 'utenti iscritti al gioco';       
if($num > $minimo_partecipanti) {
echo 'Puoi Giocare';
}
else {
$mancanti = $minimo_partecipanti - $num;
echo 'Si sono registrate' . $num . 'ne mancano' . $mancanti . 'per iniziare il gioco'; 
echo 'Ti arriverà una mail appena parte il gioco';
$trigger=0;
}
?>
<p><b>Leggi le regole:</b></p>
<br />
<p>
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

