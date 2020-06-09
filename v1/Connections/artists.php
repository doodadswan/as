<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_artists = "doodadswan.db.5021690.hostedresource.com";
$database_artists = "doodadswan";
$username_artists = "doodadswan";
$password_artists = "Verve250";
$artists = mysql_pconnect($hostname_artists, $username_artists, $password_artists) or trigger_error(mysql_error(),E_USER_ERROR); 
?>