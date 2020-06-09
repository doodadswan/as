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
$query_getO = "SELECT * FROM artists WHERE artists.LastName LIKE 'O%' ORDER BY artists.LastName";
$getO = mysql_query($query_getO, $artists) or die(mysql_error());
$row_getO = mysql_fetch_assoc($getO);
$totalRows_getO = mysql_num_rows($getO);
?>

<!DOCTYPE html>
<html lang="en-us">
<head>
<meta charset="utf-8" />
<meta name="description" content="Visual Artist Database" />
<meta name="author" content="Alex Taylor Swan" />
<title>Visual Artist Database | O</title>
<style type="text/css" media="screen">
@import url("css/style.css");
</style>
<meta name="google-translate-customization" content="f91f6b59f687e07-728df0675eb22298-gf4646ea128908eee-c"></meta>
<!--Google AdSense Begins-->
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-5819410559836745",
    enable_page_level_ads: true
  });
</script>
<!--Google Adsense Ends-->
</head>

<body>
<a href="index.php"><img src="../images/home-icon.png" alt="Home" border="0" id="home"></a>
<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<div id="wrapper">
<header role="banner"><h1>Visual Artist Database</h1></header>
  <nav>
  	<ul>
    	<li><a href="a.php">A</a></li>
    	<li><a href="b.php">B</a></li>
    	<li><a href="c.php">C</a></li>
    	<li><a href="d.php">D</a></li>
    	<li><a href="e.php">E</a></li>
   	    <li><a href="f.php">F</a></li>
    	<li><a href="g.php">G</a></li>
    	<li><a href="h.php">H</a></li>
    	<li><a href="i.php">I</a></li>
    	<li><a href="j.php">J</a></li>
    	<li><a href="k.php">K</a></li>
    	<li><a href="l.php">L</a></li>
    	<li><a href="m.php">M</a></li>
    	<li><a href="n.php">N</a></li>
    	<li><a href="o.php">O</a></li>
    	<li><a href="p.php">P</a></li>
    	<li><a href="q.php">Q</a></li>
    	<li><a href="r.php">R</a></li>
    	<li><a href="s.php">S</a></li>
    	<li><a href="t.php">T</a></li>
    	<li><a href="u.php">U</a></li>
    	<li><a href="v.php">V</a></li>
    	<li><a href="w.php">W</a></li>
    	<li><a href="x.php">X</a></li>
    	<li><a href="y.php">Y</a></li>
    	<li><a href="z.php">Z</a></li>
    </ul>
  </nav>
  <section role="main">
  	<table width="100%" border="0" cellspacing="0" cellpadding="2">
  	  <thead>
      <th>Artist</th>
  	    <th>Movement</th>
  	    <th>Year of Birth</th>
  	    <th>Year of Death</th>
  	    <th>Birthplace</th>
  	    <th>Similar Artists</th>
      </thead>
      <tbody>
      	<?php do { ?>
      	  <tr>
      	    <td><?php echo $row_getO['Name']; ?></td>
      	    <td><?php echo $row_getO['Movement']; ?></td>
      	    <td>
				<?php if ($row_getO['YearBirth']==0) {
					echo('Unknown'); }
						else {
							echo $row_getO['YearBirth']; } ?>
            </td>
      	    <td>
				<?php if ($row_getO['YearDeath']==0) {
					echo('Living'); }
						else {
							echo $row_getO['YearDeath']; } ?>
            </td>
      	    <td><?php echo $row_getO['CityBirth']; ?></td>
      	    <td><?php echo $row_getO['SimilarArtists']; ?></td>
   	      </tr>
      	  <?php } while ($row_getO = mysql_fetch_assoc($getO)); ?>
    </tbody>
    </table>
  </section>
<footer><p>&copy; 2003-<?php echo(date("Y")) ?> <a href="http://www.alexswan.com" target="_blank">Alex Swan</a> and <a href="http://www.geminigraphix.com" target="_blank">GeminiGraphix</a></p></footer>
<script type="text/javascript" src="scripts/modernizr.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="scripts/zebra-stripes.js"></script>
<script type="text/javascript" src="http://use.typekit.com/vgp4idm.js"></script>
<script type="text/javascript">
try{Typekit.load();}catch(e){}
</script>
</html>
<?php
mysql_free_result($getO);
?>
<?php require_once('../google.analytics.php'); ?>