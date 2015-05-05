<?php  $conn = mysql_connect("localhost", "sarrox", "Sql34869");


  if(!$conn)
   { echo("Errore connessione database");
     exit();
   }
  $db=mysql_select_db("mytitox");
  if(!$db)
   { echo("Errore apertura database");
     exit();
   }
?>
