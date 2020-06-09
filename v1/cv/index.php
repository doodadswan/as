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
$query_displayQuote = "SELECT artists.Quotes, artists.Name FROM artists WHERE Quotes NOT LIKE 'No quotes currentl%' ORDER BY RAND() Limit 1";
$displayQuote = mysql_query($query_displayQuote, $artists) or die(mysql_error());
$row_displayQuote = mysql_fetch_assoc($displayQuote);
$totalRows_displayQuote = mysql_num_rows($displayQuote);mysql_select_db($database_artists, $artists);
$query_displayQuote = "SELECT artists.Quotes, artists.Name FROM artists WHERE Quotes NOT LIKE 'No quotes currentl%' ORDER BY RAND() Limit 1";
$displayQuote = mysql_query($query_displayQuote, $artists) or die(mysql_error());
$row_displayQuote = mysql_fetch_assoc($displayQuote);
$totalRows_displayQuote = mysql_num_rows($displayQuote);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>AlexSwan.com - Curriculum Vitae</title>
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
<link href="ps.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
	<div id="header">
   		<div id="quote">
            <div id="qText">
            <p><?php echo $row_displayQuote['Quotes']; ?></p><br />
            <p class="name"><?php echo $row_displayQuote['Name']; ?></p>
            </div>
       </div>
</div>
	<div id="menu"><?php include("../menu.php"); ?></div>
	<div id="content">
    	<div id="resume"><a href="pdf/Alex_Swan_Resume.pdf" target="_blank">click here to download resume in PDF format</a></div>
	  <p><strong>CONTACT INFORMATION</strong></p>
	  <p>&nbsp;</p>
      <p>Alex Swan</p>
            <p><a href="mailto:as@alexswan.com?subject=CV">as@alexswan.com</a></p>
            <p>&nbsp;</p>
    	<p><strong>PERSONAL INFORMATION</strong></p>
    	<p>&nbsp;</p>
      <p>Born: Augusta, Georgia</p>
            <p><br />
            </p>
    	<p><strong>EMPLOYMENT HISTORY</strong></p>
    	<p>&nbsp;</p>
          <p>Dalton State College - Webmaster</p>
        <p>Georgia Blue Imaging - Graphics Specialist</p>
        <p>The Augusta Chronicle - Graphic Artist</p>
            <p>&nbsp;</p>
   	  <p><strong>EDUCATION</strong></p>
   	  <p><strong>&nbsp;</strong></p>
      <p>North Metro Technical College - 2006</p>
        <p><em>Internet Specialist</em></p>
            <p>&nbsp;</p>
        <p>Georgia Southern University - 1997<br />
        <em>B.F.A. </em>in <em>Painting </em></p>
            <p><br /></p>
    	<p><strong>PROFESSIONAL QUALIFICATIONS</strong></p>
    	<p>&nbsp;</p>
        <p>XHTML and HTML5</p>
      <p>CSS</p>
        <p>JavaScript</p>
        <p>PHP</p>
            <p>MySQL</p>
      <p>Adobe Creative Suite</p>
      <p>Proficient in a multiple platform, production environment</p>
            <p>&nbsp;</p>
   	  <p><strong>AWARDS</strong></p>
   	  <p>&nbsp;</p>
      <p>Robert J. Focht Memorial Drawing Scholarship - 1997</p>
            <p>&nbsp;</p>
   	  <p><strong>INTERESTS</strong></p>
   	  <p>&nbsp;</p>
      <p>Painting</p>
            <p>The Outdoors</p>
            <p>Music</p>
            <p>Golf</p>
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
mysql_free_result($displayQuote);
?>
