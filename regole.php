<?php
  session_start();
  require_once("header.php"); 
  require_once("config.php"); //login al db
  ?>
<div id="box_regole">
<b>
<?php
  $guid=$_SESSION['guid'];
  $comando="SELECT * FROM `users` WHERE `guid`='$guid'";
  $result=mysql_query($comando) or die("Errore query users");
  while($row=mysql_fetch_array($result)){
  	$iduser=$row['idusers'];
  }
  

$mittente = 'From: "Mydeal game" <help@mytito.it> \r\n'; 
$destinatario = "team@mytito.it";
$oggetto = "email di prova";
$corpo="funziona";
//$mittente=$guid." @mytito.it";
$result=mail($destinatario,$oggetto,$corpo,$mittente);
if ($result){
	echo "mail inviata con successo da ".$mittente; 
}  
else
{
	echo "errore nell'inviare la mail";
}

$query2="SELECT * FROM `detgame` WHERE `guid`='$guid';";
$result2=mysql_query($query2) or die("Errore query detgame");
  if($iduser%2==0){
	$sender=0;
	if(mysql_num_rows($result)==0){
		
		$query="INSERT INTO `detgame`(`guid`, `type`) VALUES ($guid,$sender)";
		mysql_query($query) or die("Erorre inserimento sender in detgame");	
	}
   //QUA IL CODICE
   ?>
   <?php
	echo "SEI UN RECEIVER";
   ?>
   </b>
   <?php
 	//require_once("regole_receiver.php");
  }
  else{
	$receiver=1;
	if(mysql_num_rows($result)==0){
		
		$query="INSERT INTO `detgame`(`guid`, `type`) VALUES ($guid,$receiver)";
		mysql_query($query) or die("Erorre inserimento receiver in detgame");
	}
   //QUA IL CODICE
	echo "SEI UN SENDER";
  }
?>
</b>
<!--*********************************************************************-->
<p>&nbsp;</p>
<p>Ecco le <b>regole:</b></p>
<p>Il sistema ti assegnerà automaticamente un ruolo su MyDeal, potrai essere un <b>SENDER</b> o un <b>RECEIVER</b>, in seguito il sistema ti accoppierà automaticamente con un altro giocatore registrato a MyDeal, in modo anonimo. </p>
Potrai essere accoppiato in modo casuale con “<b>un amico</b>”, “<b>un amico di amico</b>” o “<b>uno sconosciuto</b>”. L'ammontare dei gettoni finali quindi sarà determinato dalle decisioni di entrambi i giocatori effettuate durante la partita.</p>
<p>Se sei stato assegnato ai <b>SENDER</b> riceverai 10 gettoni. La prima cosa che dovrai fare sarà decidere quanti gettoni dare all’altro giocatore. Tale numero sarà moltiplicato per 3</p>
<p> &nbsp;&nbsp;&nbsp&nbsp;</p>es. “SENDER” dà <b>5 gettoni</b> a “RECEIVER”. “RECEIVER” riceve <b>15 gettoni</b>. </p>
<p>Ricordiamo che puoi decidere anche di non dare niente oppure di dare tutti i gettoni disponibili. Il tuo partner attenderà fino a che tu non avrai effettuato la tua decisione.</p>
<p>Se sei stato assegnato ai <b>RECEIVERS</b> riceverai i gettoni che ti saranno inviati dal SENDERS moltiplicati per 3: </p>
<p> &nbsp;&nbsp;&nbsp&nbsp;</p>es. “SENDER” dà <b>5 gettoni</b> a “RECEIVER”. “RECEIVER” riceve <b>15 gettoni</b>.  </p>
<p>Adesso deciderai quanti gettoni tenerti ed eventualmente quanti gettoni dare indietro all’altro giocatore. Potrai dare indietro al tuo partner quanti gettoni vuoi, naturalmente puoi decidere anche di non dare indietro niente oppure di dare indietro tutti i gettoni ricevuti.</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><form action="amici.php">
	<input type="submit" value="Partecipanti">
</form></p>
</div>
<?php
  require_once("footer.php"); 
?>


