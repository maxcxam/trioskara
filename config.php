<?php
$linkid = mysql_connect('localhost','root','Ghbdtngh1') or die (mysql_error());
mysql_set_charset('utf8',$linkid);
//$charset = mysql_client_encoding($linkid);
mysql_select_db('kli');
$text=file_get_contents("congratulations.ini");




?>
