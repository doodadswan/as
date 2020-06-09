<?php require_once('../Connections/artists.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_artists, $artists);
$query_displayQuotes = "SELECT artists.Quotes, artists.Name FROM artists WHERE Quotes NOT LIKE 'No quotes currentl%' ORDER BY RAND() Limit 1";
$displayQuotes = mysql_query($query_displayQuotes, $artists) or die(mysql_error());
$row_displayQuotes = mysql_fetch_assoc($displayQuotes);
$totalRows_displayQuotes = mysql_num_rows($displayQuotes);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>AlexSwan.com</title>
<link href="../styles/as.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
@import url("../styles/reset.css");
-->
</style>
<link href="../styles/typeset.css" rel="stylesheet" type="text/css" />
<link href="../styles/menu.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-color: #EEE;
}
-->
</style>
<?php include("../google.analytics.php"); ?>
<link href="styles/ps.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
	<div id="header">
   		<div id="quote">
            <div id="qText">
            <p><?php echo $row_displayQuotes['Quotes']; ?></p>
            <br />
            <p class="name"><?php echo $row_displayQuotes['Name']; ?></p>
    		</div>
    	</div>
  	</div>	<div id="menu"><?php include("../menu.php"); ?></div>
	<div id="content">
		<p><a href="http://www.alexswan.com/visual-artist-database/a.php">The new visual artist database can be found here.</a></p>
	</div>
	<div id="footer">
  <p class="copyright">&copy; 2002-<?php echo(date("Y")) ?> Alex Swan</p>
		<ul id="social">
          <li><a href="http://alexswan.com/blog/?feed=rss2" target="_blank" class="rss"><img src="../images/social_icons/rss.png" /></a></li>
          <li><a href="http://www.twitter.com/doodadswan" target="_blank" class="twitter"><img src="../images/social_icons/twitter.png" /></a></li>
          <li><a href="http://www.linkedin.com/in/alexswan" target="_blank" class="linkedin"><img src="../images/social_icons/linkedin.png" /></a></li>
		</ul>
	</div>
</div>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($displayQuotes);
?>
