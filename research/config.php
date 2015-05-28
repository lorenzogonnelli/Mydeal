<?php  $conn = mysql_connect("HOST", "USER", "PASSWORD");


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
