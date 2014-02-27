<?php
if(!isset($_GET['id'])) {
	header("Location:./partners.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css/general.css" />
	<link rel="stylesheet" type="text/css" href="css/gallery.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
	<script language="javascript" type="text/javascript" src="js/general.js"></script>
	<script type="text/javascript" src="js/gallery.js"></script>
</head>
<body>
<?php include 'header.php' ?>

<div id="container">
	<div id="g_heading">
		<center style="position:absolute;left:35%"><img class="g_logo" src="" height="100px" width="100px"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div style="font-family:'Open Sans',sans-serif;display:inline;font-size:1.5em;font-weight:bold;position:absolute;top:30px;width:300px;" id="g_t"></div></center>
	</div>
	<div id="g_main">
		<div id="g_nav">
			<ul>
				<li style="border-top:1px solid black;"><a href="#" id="g_home">Gallery Home</a></li>
				<li><a href="#" id="g_art">Artworks</a></li>
				<li><a href="#" id="g_artist">Artists</a></li>				
			</ul>
		</div>
		<div id="g_content">
			
		</div>	
	</div>
</div>
<br/><br/>

<?php include 'footer.php' ?>

</body>
</html>