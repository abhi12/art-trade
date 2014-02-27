<?php
if(!isset($_GET['id'])) {
	header("Location:./index.php");
}

?>

<!doctype html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/general.css" />
	<link rel="stylesheet" type="text/css" href="css/artwork.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
	<script src="js/general.js" type="text/javascript"></script>
	<script src="js/artwork.js" type="text/javascript"></script>
	<link href='http://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>
</head>

<body>
<?php include 'header.php' ?>

<div id="main">
<div id="art_info">
	<h1 id="art_name"></h1>
	<p><a id="artist_name"></a></p>
	<p>Size: <span id="art_size"></span></p>
	<p>Price: Rs. <span id="art_price"></span></p>
	<p>To buy this art:</p>
	<a href="#" id="art_buy_button" style="text-decoration:none;"><span id="art_buy">Contact Gallery</span></a>
</div>
<center>
<img src="" height="500" width="400" id="artwork_image"/>
<p id="status">Status: <span id="art_stat"></span></p>
</center>
<!--<div id="art_desc">
	<center><h2>Description</h2><br/></center>
	<p id="art_detail">	Gallagher's video of a three-dimensional model of an 18th-century miniature Kangra painting addresses the blending of human and divine love. Filmed in one shot, the constructed set, complete with hand-painted walls and bonsai plants, is slowly engulfed in flames
	</p>
</div>-->
</div>
<hr/>
<div id="other_art">
	<center>
	<b id="oart_title"><u>Related Artworks</u></b><br/><br/>
	</center>	
	<div class="oart_content">
	<ul>
		<li id="oart1" class="oarts"><a class="oartl" id="oartl1"><img src="" width="200" height="200" id="oart_img1"/></a><center><div><a class="oart_name" id="oart_name1"></a><br/><a class="oartist" id="oartist1"></a></div></center></li>	
		<li id="oart2" class="oarts"><a class="oartl" id="oartl2"><img src="" width="200" height="200" id="oart_img2"/></a><center><div><a class="oart_name" id="oart_name2"></a><br/><a class="oartist" id="oartist2"></a></div></center></li>	
		<li id="oart3" class="oarts"><a class="oartl" id="oartl3"><img src="" width="200" height="200" id="oart_img3"/></a><center><div><a class="oart_name" id="oart_name3"></a><br/><a class="oartist" id="oartist3"></a></div></center></li>		
		<li id="oart4" class="oarts"><a class="oartl" id="oartl4"><img src="" width="200" height="200" id="oart_img4"/></a><center><div><a class="oart_name" id="oart_name4"></a><br/><a class="oartist" id="oartist4"></a></div></center></li>		
	</ul>
	</div>
</div>
<div class="backdrop"></div>
<div class="box"><div class="close"></div>
<form>
<label>To have more information about price, shipping, artist etc. type in your message below.</label><span class="close" >X</span><br/><br/>
<label>Name: </label><input type="text" class="msg_text" id="msg_name"/><br/><br/>
<label>E-mail: </label><input type="email" class="msg_text" id="msg_email"/><br/><br/>
<textarea autofocus rows="20" cols="100%" id="msg_main" placeholder="Type your message here.."></textarea>
<center><a href="#" id="msg_button" style="text-decoration:none;"><span>SEND</span></a></center>
</form>
</div>

<?php include 'footer.php' ?>

</body>
</html>