<?php 
// if(!isset($_GET['id'])) {
	// header("Location:./galleries.php");
// }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css/general.css" />
	<link rel="stylesheet" type="text/css" href="css/artist.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
	<script language="javascript" type="text/javascript" src="js/general.js"></script>
	<script type="text/javascript" src="js/artist.js"></script>
</head>
<body>
<?php include 'header.php' ?>

<div id="container">
	<div id="a_heading">
		<p id="a_title" align="center"></p>
	</div>
	<div id="a_main">
		<div id="a_nav">
			<ul>
				<li style="border-top:1px solid black;"><a href="#" id="a_home">Artist Home</a></li>
				<li><a href="#" id="a_art">Artworks</a></li>
				<li><a href="#" id="a_events">Events</a></li>
				<!--<li><a href="#" id="g_home">Contact</a></li><br/>-->
			</ul>
		</div>
		<div id="a_content">
		</div>	
	</div>
</div>
<br/><br/>

<?php include 'footer.php' ?>

</body>
</html>