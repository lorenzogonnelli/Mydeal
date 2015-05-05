<?php
    session_start();
    //require_once("header.php");
    require_once("config.php");
    $ciao=$_GET['ciao'];
    $comando="SELECT name,username,email,last_action,prev_last_action,last_login,prev_last_login FROM `elgg_users_entity` WHERE guid=$ciao";
    $final=mysql_query($comando);
    while($row=mysql_fetch_array($final)){
       echo "Benvenuto ".$row['name'];
    }
?>