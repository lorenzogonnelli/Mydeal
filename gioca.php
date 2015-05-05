<?php
  session_start();
  require_once("header.php"); 
  require_once("config.php"); //login al db
  ?>
<div id="box_regole">
<p> &nbsp;</p>
<p>Hai appena inviato
 <?php 
$gettoni=$_POST['gettoni'];
 echo $gettoni;
?>
 gettoni a 
<?php 
$amico=$_POST['scelta'];
if($amico == 'amico') echo(" un amico.");
if($amico == 'amicoamico') echo(" un amico di un amico.");
if($amico == 'sconosciuto') echo(" uno sconosciuto.");
?>
.</p>
</div>
<?php
  require_once("footer.php"); 
?>

