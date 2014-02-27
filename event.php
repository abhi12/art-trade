<?php
	if(!isset($_GET['id'])) {
		header("Location:./events.php");
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css/general.css" />
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
	<script src="js/general.js" type="text/javascript"></script>
	<script src="js/event.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="css/event.css" />
	<link href='http://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css' />
</head>
<body>

<?php include 'header.php'; ?>

<div id="cover">
	<img src="images/event_cover.jpg" width="80%" height="450px"/>
</div>
<div id="content">	
	<div id="event_desc">
		<!--<b align="center" style="color:#444">About the Event</b><br/><br/>-->
		<!--<label>Name:</label>--><b><span id="event_name"></span></b><br/><br/>
		<!--<label>Date:</label>--><span id="event_date"></span><br/><br/>
		<!--<label>Venue:</label>--><span id="event_venue"></span><br/><br/>
		<label>Galleries Associated: </label><span id="event_g"></span><br/><br/>
		<label>Artists Associated: </label><span id="event_artists"></span><br/><br/>
		<label>Categories: </label><span id="event_cat"> </span><br/><br/>
		<!--<label>Description:</label><span id="event_text"></span><br/><br/>-->
	</div><br/><br/><br/><br/><br/>
	<div id="events_artworks">
		<b align="center">Artworks Available</b>
		<div>
			<ul id="event_art">
			</ul>
		</div>
	</div>
</div>	

<?php include 'footer.php' ?>
</body>
</html>