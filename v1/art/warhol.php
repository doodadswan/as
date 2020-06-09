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
<title>AlexSwan.com - Artwork - Warhol Room</title>
<link href="../styles/as.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
@import url("../styles/reset.css");
-->
</style>
<link href="../styles/typeset.css" rel="stylesheet" type="text/css" />
<link href="styles/ps.css" rel="stylesheet" type="text/css" />
<link href="styles/lightbox.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="scripts/prototype.js"></script>
<script type="text/javascript" src="scripts/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="scripts/lightbox.js"></script>
<link href="../styles/menu.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-color: #EEE;
}
-->
</style>
<?php include("../google.analytics.php"); ?>
<meta name="Keywords" content="Alex Swan, Artist, Designer, Artwork, Paintings, Blue/Gray, The Battle of New Orleans, Drifting, Egyptian Pyramid, Mayan Pyramid, Communication, Flying Fish, Thinking of the Southwest" />
</head>

<body>
<div id="container">
	<div id="header">
   		<div id="quote">
            <div id="qText">
            <p><?php echo $row_displayQuotes['Quotes']; ?></p><br />
            <p class="name"><?php echo $row_displayQuotes['Name']; ?></p>
    	</div>
    </div>
    </div>
	<div id="menu"><?php include("../menu.php"); ?></div>
	<div id="gcontent">
    <div id="gallery">
        	<ul id="thumbs">
            	<li><a href="../images/art/bluegray_500.jpg" rel="lightbox" title="Blue/Gray"><img src="../images/art/thumbs/bluegray_200.jpg" alt="Blue/Gray" width="200" height="200" /></a></li>
            	<li><a href="../images/art/battle_500.jpg" rel="lightbox" title="The Battle of New Orleans"><img src="../images/art/thumbs/battle_200.jpg" width="200" height="200" alt="The Battle of New Orleans" /></a></li>
            	<li><a href="../images/art/drifting_500.jpg" rel="lightbox" title="Drifting"><img src="../images/art/thumbs/drifting_200.jpg" width="200" height="200" alt="Drifting" /></a></li>
            	<li><a href="../images/art/egyptianpyramid_500.jpg" rel="lightbox" title="Egyptian Pyramid"><img src="../images/art/thumbs/egyptianpyramid_200.jpg" width="200" height="200" alt="Egyptian Pyramid" /></a></li>
            	<li><a href="../images/art/mayanpyramid_500.jpg" rel="lightbox" title="Mayan Pyramid"><img src="../images/art/thumbs/mayanpyramid_200.jpg" width="200" height="200" alt="Mayan Pyramid" /></a></li>
            	<li><a href="../images/art/communication_500.jpg" rel="lightbox" title="Communication"><img src="../images/art/thumbs/communication_200.jpg" width="200" height="200" rel="lightbox" title="Communication" /></a></li>
            	<li><a href="../images/art/flyingfish_500.jpg" rel="lightbox" title="Flying Fish"><img src="../images/art/thumbs/flyingfish_200.jpg" width="200" height="200" alt="Flying Fish" /></a></li>
            	<li><a href="../images/art/thinkingsouthwest_500.jpg" rel="lightbox" title="Thinking of the Southwest"><img src="../images/art/thumbs/thinkingsouthwest_200.jpg" width="200" height="200" alt="Thinking of the Southwest" /></a></li>
            </ul>
        </div>
    </div>
	<div id="footer">
		<p class="copyright">&copy; 2003-<?php echo(date("Y")) ?> Alex Swan</p>
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
