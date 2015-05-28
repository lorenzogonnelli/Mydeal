<?php 
session_start();
  require_once("header.php"); 
  require_once("config.php"); //login al db
?>

 <!--********************************************************************************-->
 <!--Codice pagina da modificare
***********************************************************************************-->
<p> <strong> Studenti che si son collegati almeno una volta a mytito: <br /></strong></p>			
<?php

  $sel = "SELECT name FROM elgg_users_entity WHERE last_login <> 0;";
  $risult = mysql_query($sel);
  if (!$risult) 
  {
    echo ("Niente news");
    exit();
  }
        echo '<div>';
        echo ' <p>';
  while($riga = mysql_fetch_array($risult))
  {
echo ' <font color="#0000ff">' . $riga["name"] . '</font>, &nbsp;';
  }
        echo'</p>';
        echo '</div>';
   mysql_close($conn);
  require_once("footer.php");
?>


</p>
<!-- ************************************************************************************
End Codice pagina da modificare
****************************************************************************************  -->	
