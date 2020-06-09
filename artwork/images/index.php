<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="description" content="Artwork" />
<meta name="author" content="Alex Taylor Swan" />
<title>AlexSwan.com | Artwork</title>
<style type="text/css" media="screen">
@import url("css/ps-artwork.css");
</style>
<style type="text/css" media="screen">
.ui-jcoverflip {
	position:relative;
}
.ui-jcoverflip--item {
	position:absolute;
	display:block;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js" type="text/javascript" charset="utf-8"></script>
<script src=" https://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
<script src="scripts/jquery.jcoverflip.js" type="text/javascript" charset="utf-8"></script>
<script>
  $(function(){
    $('#flip').jcoverflip();
  });
</script>
</head>

<body>
<banner>Artwork</banner>
<div id="flip">
    <p><a href="http://www.google.com"><img src="images/and.jpg"><span class="title">And</span></a></p>
    <p><a href="http://www.google.com"><img src="images/animatedegg.jpg"><span class="title">Animated egg</span></a></p>
</div>
</body>
</html>
