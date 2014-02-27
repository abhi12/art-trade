<!doctype html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/general.css" />
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
	<script src="js/general.js" type="text/javascript"></script>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/home.css" />	
</head>

<body>
<?php include 'header.php' ?>

<div id="slideshow">
	<div id="wowslider-container1">
		<div class="ws_images">
			<ul>
			<li><img src="data1/images/movingimagelondon_hero_img.jpg" alt="Moving Image London" title="Moving Image London" id="wows1_0"/></li>
			<li><img src="data1/images/art_3.jpg" alt="Mother Earth" title="Mother Earth" id="wows1_1"/></li>
			<li><img src="data1/images/art_4.jpg" alt="finger Painting" title="finger Painting" id="wows1_2"/></a></li>
			</ul>
		</div>
		<div class="ws_bullets">
			<div>
				<a href="#" title="Moving Image London"><img src="data1/tooltips/movingimagelondon_hero_img.jpg" alt="Moving Image London"/>1</a>
				<a href="#" title="Mother Earth"><img src="data1/tooltips/art_3.jpg" alt="Mother Earth"/>2</a>
				<a href="#" title="finger Painting"><img src="data1/tooltips/art_4.jpg" alt="finger Painting"/>3</a>
			</div>
		</div>
		<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>
</div>
<hr/>
<div id="main">
<div class="f_art">
	<center>
	<b id="f_art_title">Featured Artworks</b>
	</center>
	<div class="f_art_content">
	<ul>
		<li id="f_art1" class="f_arts"><a href="./artwork.php?id=5" id="f_artwl1"><img id="artw1" src="" width="200" height="200"/></a><div><center><a href=""id="f_art_name1" class="f_art_name"></a><br/><a href="" id="f_artist1" class="f_artist"></a><br/><span class="f_artt" id="f_artt1"></span></center><p id="f_art_info1" style="max-width:200px;"></p></div></li>
		<li id="f_art1" class="f_arts"><a href="./artwork.php?id=6" id="f_artwl2"><img id="artw2" src="" width="200" height="200"/></a><div><center><a href=""id="f_art_name2" class="f_art_name"></a><br/><a href="" id="f_artist2" class="f_artist"></a><br/><span class="f_artt" id="f_artt2"></span></center><p id="f_art_info2" style="max-width:200px;"></p></div></li>
		<li id="f_art1" class="f_arts"><a href="./artwork.php?id=7" id="f_artwl3"><img id="artw3" src="" width="200" height="200"/></a><div><center><a href=""id="f_art_name3" class="f_art_name"></a><br/><a href="" id="f_artist3" class="f_artist"></a><br/><span class="f_artt" id="f_artt3"></span></center><p id="f_art_info3" style="max-width:200px;"></p></div></li>
		<li id="f_art1" class="f_arts"><a href="./artwork.php?id=9" id="f_artwl4"><img id="artw4" src="" width="200" height="200"/></a><div><center><a href=""id="f_art_name4" class="f_art_name"></a><br/><a href="" id="f_artist4" class="f_artist"></a><br/><span class="f_artt" id="f_artt4"></span></center><p id="f_art_info4" style="max-width:200px;"></p></div></li>
	</ul>
	</div>	
</div><br/><br/><br/><br/><br/><br/>
<div class="f_gallery">
	<center>
		<strong id="f_gallery_title">Featured Galleries</strong>
	</center>
	<div class="f_gallery_content">
	<ul>
		<li id="f_gallery1" class="f_galleries"><a id="gpath1" href="" class="gpath"><img id="gimg1" src="./images/art_9.jpg" width="200" height="200"/></a><div><center><a id="f_g_name1">Gallery 1</a><p id="f_g_info1" style="text-overflow:ellipsis;max-width:200px;"></p></center></div></li>
		<li id="f_gallery1" class="f_galleries"><a id="gpath2" href="" class="gpath"><img id="gimg2" src="./images/art_4.jpg" width="200" height="200"/></a><div><center><a id="f_g_name2">Gallery 2</a><p id="f_g_info2" style="text-overflow:ellipsis;max-width:200px;"></p></center></div></li>
		<li id="f_gallery1" class="f_galleries"><a id="gpath3" href="" class="gpath"><img id="gimg3" src="./images/art_5.jpg" width="200" height="200"/></a><div><center><a id="f_g_name3">Gallery 3</a><p id="f_g_info3" style="text-overflow:ellipsis;max-width:200px;"></p></center></div></li>
		<li id="f_gallery1" class="f_galleries"><a id="gpath4" href="" class="gpath"><img id="gimg4" src="./images/art_6.jpg" width="200" height="200"/></a><div><center><a id="f_g_name4">Gallery 4</a><p id="f_g_info4" style="text-overflow:ellipsis;max-width:200px;"></p></center></div></li>
	</ul>
	</div>
</div><br/><br/><br/><br/><br/><br/>
<div class="f_events">
	<center>
	<b id="f_events_title">Featured Events</b>
	</center>
	<div class="f_events_content">
	<ul>
		<li id="f_events1" class="f_event"><a id="f_eventl1" class="f_eventl" href=""><img id="e_img1" src="images/event_1.jpg" width="200" height="200"/></a><div><center><p id="f_e_name1" style="overflow:hidden;text-overflow:ellipsis;max-width:200px;">Event 1</p><p id="f_e_info1" style="overflow:hidden;text-overflow:ellipsis;max-width:200px;"></p></center></div></li>		
		<li id="f_events2" class="f_event"><a id="f_eventl2" class="f_eventl" href=""><img id="e_img2" src="images/event_2.jpeg" width="200" height="200"/></a><div><center><p id="f_e_name2" style="overflow:hidden;text-overflow:ellipsis;max-width:200px;">Event 2</p><p id="f_e_info2" style="overflow:hidden;max-width:220px;"></p></center></div></li>		
		<li id="f_events3" class="f_event"><a id="f_eventl3" class="f_eventl" href=""><img id="e_img3" src="images/event_3.jpg" width="200" height="200"/></a><div><center><p id="f_e_name3" style="overflow:hidden;text-overflow:ellipsis;max-width:200px;">Event 3</p><p id="f_e_info3" style="overflow:hidden;text-overflow:ellipsis;max-width:200px;"></p></center></div></li>		
		<li id="f_events4" class="f_event"><a id="f_eventl4" class="f_eventl" href=""><img id="e_img4" src="images/event_4.jpg" width="200" height="200"/></a><div><center><p id="f_e_name4" style="overflow:hidden;text-overflow:ellipsis;max-width:200px;">Event 4</p><p id="f_e_info4" style="overflow:hidden;text-overflow:ellipsis;max-width:200px;"></p></center></div></li>		
	</ul>
	</div>
</div>
</div>
<?php include 'footer.php' ?>

<script src="js/home.js" type="text/javascript"></script>
</body>
</html>
