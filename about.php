<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<script type="text/javascript" src="engine1/jquery.js"></script>
<style>
body,html {
	padding:0;
	margin:0;
}

body {
	font-family: "myriad pro", myriad pro, Georgia, Times, serif;
	width:100%;		
}

.header {
	position:fixed;
	z-index:1000;
	height:65px;
	width:100%;
	background-color:#000;
	color:#fff;	
}

#nav-left li {
	margin-right:20px;
	list-style-type:none;
	display:inline;
	font-size:1.3em;
}

#nav-right li {
	margin-right:20px;
	list-style-type:none;
	display:inline;
	font-size:1.3em;
}

.header a li:hover {
	box-shadow:5px #fff;
	border-bottom:2px solid #fff;
}

.header a {
	text-decoration: none;
	color:#fff;
}

#nav-left {
	position:absolute;
	top:-2.5px;
	left:7.5%;
}

#logo {
	position:absolute;
	left:40%;
	margin-top:-5px;
}

#nav-right {
	position:absolute;
	left:55%;
	top:-5px;	
}

#search {
	width:300px;
	height:25px;
	border-radius: 5px;
	border:3px solid grey;
}

#autosuggest ul li{
	display:block;
	list-style-type:none;
	background:#fff;
	border:1px solid #ddd;
	border-top:none;
	color:#000;
	width:310px;
	margin-left:130px;
	cursor:pointer;
	font-size:1em;
}

#autosuggest ul li:hover {
	color:#fff;
	background:#000;
}

#main {
	width:80%;
	margin:0 auto;
	padding-top:100px;
}
</style>
<script>
$(document).ready(function(){
	$('#search').keyup(function(){
		var q = $(this).attr('value');
		$.ajax({
			url: 'json/search_json.php', 
			data: { search: q },
			method:'GET',
			dataType:'html',
			success: function(data)	{
				$('#results').html(data);				
			}
		});				
	});
});
</script>
</head>
<body>
<div class="header">
	<div id="nav-left">
		<ul>
			<a href="./index.php"><li>Home &nbsp;</li></a>
			<a href="./browse.php"><li>Browse &nbsp;</li></a>
			<a href="./gallery.php"><li>Gallery &nbsp;</li></a>			
			<a href="./events.php"><li>Events &nbsp;</li></a>			
		</ul>
	</div>
	<div id="logo">
		<img src="Logo.jpg" height="70" width="160"/>
	</div>
	<div id="nav-right">
		<ul>
			<a href="./about.php"><li>About &nbsp;</li></a>
			<li><label style="color:#fff;">Search</li></label>
			<li><input type="text" id="search" placeholder="Search for Artists, Galleries, Events"/>
				<div id="autosuggest">
					<ul id="results">

					</ul>
				</div>
			</li>
		</ul>	
	</div>
</div>
<div id="main">
<center><h1>
About Us
</h1></center>
<div id="about_content">
With the increase in technology at great speed,online market and transactions 
have become the face of current days market.So carrying the same advancement 
in art field Spectra wants to become online face of indian art market by making art work,details about artists,events of the gallery and much more available to the buyers
          at a single click.<br/><br/>


Mission:To transform the indian art market by becoming the online face of it by bringing artists,galleries and enthusiasts together under a single umbrella <br/><br/>
<br/>
Vision: To make the worlds art accessible to everyone with just a click
<br/><br/>
Team<br/>
<br/>
Divyanshu Jain(DJ):<br/>
Divyanshu Jain ,a third year economic student from BITS Pilani , is the main man behind this idea whose vision is to revolutionise Indian online art market and be a part of this revolution .DJ, apart from being  a strong economic strategician , also finds his interest in automobiles.Known for his straightforwardness  in dealing situations he  also puts his pen down to bring out beautiful poems to impress people.He is one of those men result of whose dream and passion is today`s Spectra.<br/>
<br/>
Hrishikesh Mukte:<br/>
With a rare combination of an Electrical engineering and  economics,Hrishikesh Mukte a third year student from BITS Pilani,is one of those important heads behind Spectra.
 Apart from being an awesome Tabla player, Hrishikesh is also a  web developing geek who played vital role in developing website of Spectra.This multi-talented guy has a  great vision of seeing Spectra as a pioneer of Indian online art market very soon.
<br/><br/>
Suraj Doshi:<br/>
A typical socially inclined person, working actively for an NGO,Suraj Doshi also has a vital  part to play in starting Spectra.A third year student from BITS pursuing his M.Sc biology and Chemical engineering ,Suraj is more concerned about problems at grassroot levels and is more social conscious.Known for his inquisitive nature and Questioning behaviour,he defines Spectra as a medium which has potential 
to influence Indian art market in coming days to a great extent by integrating galleries and buyers online.<br/><br/>
Subrahmanyam Pulipaka:<br/>

With a rare combination of Electrical engineer, social activist and a career counsellor,Subrahmanyam Pulipaka also has his role in Spectra.A second year student from BITS Pilani, Subrahmanyam is an all rounder as well as an entrepreneur geek.In his words that Spectra is a weapon in the hands of buyers which enables them to access data of different Genres of art with a single click. And he also believes that there is not much time left for the online art market to completely  dominate  the Indian art market.

</div>

</div>
<div id="footer" style="height:40px; width:100%;margin-top:200px;left:0;background-color:#000;color:#fff;">
<center>
<b>2013 &copy; SPECTRA </b><br/>

</center>
</div>



</body>
</html>