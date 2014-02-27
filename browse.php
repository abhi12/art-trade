<?php 
	session_start();
	$_SESSION['f']=NULL;
	$_SESSION['p']=NULL;
	$_SESSION['s']=NULL;
	$_SESSION['t']=NULL;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
<link rel="stylesheet" type="text/css" href="css/general.css" />
<link rel="stylesheet" type="text/css" href="css/browse.css" />
<script src="js/general.js" type="text/javascript"></script>
<script type="text/javascript" src="engine1/jquery.js"></script>
<link rel="stylesheet" href="./js/ui/ui.css" />
  <script src="./js/ui/ui.js" type="text/javascript"></script>
  <script src="./js/imgLiquid.js" type="text/javascript"></script>
  
  	<script>
	$(window).bind('hashchange', function() {
		$.ajax({
			url:'json/unset.php',
			data:{cl:"u"},
			method: 'GET',
			success: function(data) {
				if(data=="hrishi_abhi") {
					//unset
				}
			}  
		});
	});
	</script>
	
  <script>
	$(document).ready(function() {
		$.ajax({
			url: 'json/fil.php',
			method:'GET',
			dataType:'json',
			beforeSend: function() {
				var loader = $('<img/>', {
					"class" :"loader", 
					"src":"images/newloader.gif"
				});		
				$("#filter_artworks").html(loader);
			},
			success: function(data)	{
				$(".loader").remove();
				// var sess = <?php echo $_SESSION['f'];?>;
				// $("#sess").html(sess);
				$("#num_fil_art").html(data.length);
				for(var x = 0;x<data.length;x++) {
					var path = "./artwork.php?id="+data[x][0];
					var al = "./artist.php?id="+data[x][7];
					var img_path = data[x][8];
					var an = data[x][1];
					var price = "Rs. "+data[x][11];
					var artist = data[x][6];
					
					var res = "<li class=fil_arts style='margin-top:10px;margin-bottom:10px;'><a href="+path+" class=fil_link><img src="+img_path+" width=200 height=200 /></a><div><center><a class=fil_name href="+path+">"+an+"</a><br/><a class=fil_artist href="+al+">"+artist+"</a><br/><span class=fil_price>"+price+"</span></center></div></li>";
					
					$("#filter_artworks").append(res);
				}
			}
		});
	});
  
  </script>
  <script>
  $(function() {
    $( "#slider-range" ).slider({
		range: true,
		min: 0,
		max: 1000000,
		values: [ 5000, 500000 ],
		slide: function( event, ui ) {
			$( "#price_value" ).html( "Rs." + ui.values[ 0 ] + " - Rs." + ui.values[ 1 ] );
		}		
    });
    $( "#price_value" ).html( "Rs." + $( "#slider-range" ).slider( "values", 0 ) +
      " - Rs." + $( "#slider-range" ).slider( "values", 1 ) );
	
	$( "#slider-range" ).on( "slidestop", function( event, ui ) {
		$('.price_clear').hide();
		var p1 = ui.values[ 0 ];
		var p2 = ui.values[ 1 ];
		var pr = p1+","+p2;
		
		$.ajax({
			url: 'json/fil.php', 
			data: { price_range:pr },
			method:'GET',
			dataType:'json',
			beforeSend: function() {
				var loader = $('<img/>', {
					"class" :"loader", 
					"src":"images/newloader.gif"
				});		
				$("#filter_artworks").html(loader);
			},
			success: function(data)	{
				$(".loader").remove();
				// var sess = <?php echo $_SESSION['f'];?>;
				// $("#sess").html(sess);
				//alert(data);
				$("#num_fil_art").html(data.length);
				for(var x = 0;x<data.length;x++) {
					var path = "./artwork.php?id="+data[x][0];
					var al = "./artist.php?id="+data[x][7];
					var img_path = data[x][8];
					var an = data[x][1];
					var price = "Rs. "+data[x][11];
					var artist = data[x][6];
					
					var res = "<li class=fil_arts style='margin-top:10px;margin-bottom:10px;'><a href="+path+" class=fil_link><img src="+img_path+" width=200 height=200 /></a><div><center><a class=fil_name href="+path+">"+an+"</a><br/><a class=fil_artist href="+al+">"+artist+"</a><br/><span class=fil_price>"+price+"</span></center></div></li>";
					
					$("#filter_artworks").append(res);
				}
			}
		});
	});
});	
  </script>
  <script>
  $(function() {
    $( '#size_slider1' ).slider({
		min: 0,
		max: 500,
		step:20,
		value: 100,
		slide: function( event, ui ) {
			$( "#size_l" ).html( ui.value + " cm." );
		}		
    });
    $( "#size_l" ).html($( "#size_slider1" ).slider( "value" ) + " cm." );
	$( "#size_slider1" ).on( "slidestop", function( event, ui ) {
		$("#size_clear").show();
		var l1 = ui.value;
		var b1 = $( "#size_slider2" ).slider( "value" );
		var sr = l1+","+b1;
		
		$.ajax({
			url: 'json/fil.php', 
			data: { size_range:sr},
			method:'GET',
			dataType:'json',
			beforeSend: function() {
				var loader = $('<img/>', {
					"class" :"loader", 
					"src":"images/newloader.gif"
				});		
				$("#filter_artworks").html(loader);
			},
			success: function(data)	{
				$(".loader").remove();
				// var sess = <?php echo $_SESSION['f'];?>;
				// $("#sess").html(sess);
				$("#num_fil_art").html(data.length);
				//alert(data);
				for(var x = 0;x<data.length;x++) {
					var path = "./artwork.php?id="+data[x][0];
					var al = "./artist.php?id="+data[x][7];
					var img_path = data[x][8];
					var an = data[x][1];
					var price = "Rs. "+data[x][11];
					var artist = data[x][6];
					
					var res = "<li class=fil_arts style='margin-top:10px;margin-bottom:10px;'><a href="+path+" class=fil_link><img src="+img_path+" width=200 height=200 /></a><div><center><a class=fil_name href="+path+">"+an+"</a><br/><a class=fil_artist href="+al+">"+artist+"</a><br/><span class=fil_price>"+price+"</span></center></div></li>";
					
					$("#filter_artworks").append(res);
				}
			}
		});
	});
		
	$( '#size_slider2' ).slider({
		min: 0,
		max: 500,
		step:5,
		value: 100,
		slide: function( event, ui ) {
			$( "#size_b" ).html( ui.value + " cm.");
		}
	});
	$( "#size_b" ).html($( "#size_slider2" ).slider( "value" ) + " cm." );
	$( "#size_slider2" ).on( "slidestop", function( event, ui ) {
		$("#size_clear").show();
		var l2 = $( "#size_slider1" ).slider( "value" );
		var b2 = ui.value;
		var sr1 = l2+","+b2;
		
		$.ajax({
			url: 'json/fil.php', 
			data: { size_range:sr1},
			method:'GET',
			dataType:'json',
			beforeSend: function() {
				var loader = $('<img/>', {
					"class" :"loader", 
					"src":"images/newloader.gif"
				});		
				$("#filter_artworks").html(loader);
			},
			success: function(data)	{
				$(".loader").remove();
				// var sess = <?php echo $_SESSION['f'];?>;
				// $("#sess").html(sess);
				$("#num_fil_art").html(data.length);
				//alert(data);
				for(var x = 0;x<data.length;x++) {
					var path = "./artwork.php?id="+data[x][0];
					var al = "./artist.php?id="+data[x][7];
					var img_path = data[x][8];
					var an = data[x][1];
					var price = "Rs. "+data[x][11];
					var artist = data[x][6];
					
					var res = "<li class=fil_arts style='margin-top:10px;margin-bottom:10px;'><a href="+path+" class=fil_link><img src="+img_path+" width=200 height=200 /></a><div><center><a class=fil_name href="+path+">"+an+"</a><br/><a class=fil_artist href="+al+">"+artist+"</a><br/><span class=fil_price>"+price+"</span></center></div></li>";
					
					$("#filter_artworks").append(res);
				}
			}
		});		
	} );
  });
 </script>
<script>
	$(document).ready(function(){
		var pr1;
		var med;
		
		$('.price_r').click(function(){
			if($(this).attr('id')=='price_r1') {
				$('.price_clear').hide();
				$('#price_clear1').show();				
				pr1 = "0,10000";
			}else if($(this).attr('id')=='price_r2') {
				$('.price_clear').hide();
				$('#price_clear2').show();
				pr1 = "10000,50000";
			}else if($(this).attr('id')=='price_r3') {
				$('.price_clear').hide();
				$('#price_clear3').show();
				pr1 = "50000,100000";
			}else if($(this).attr('id')=='price_r4') {
				$('.price_clear').hide();
				$('#price_clear4').show();
				pr1 = "100000,500000";
			}else if($(this).attr('id')=='price_r5') {
				$('.price_clear').hide();
				$('#price_clear5').show();
				pr1 = "500000,1000000";
			}
			
			$.ajax({
				url: 'json/fil.php', 
				data: { price_range:pr1},
				method:'GET',
				dataType:'json',
				beforeSend: function() {
					var loader = $('<img/>', {
						"class" :"loader", 
						"src":"images/newloader.gif"
					});		
					$("#filter_artworks").html(loader);
				},
				success: function(data)	{
					$(".loader").remove();
					// var sess = <?php echo $_SESSION['f'];?>;
					// $("#sess").html(sess);
					$("#num_fil_art").html(data.length);
					//alert(data);
					for(var x = 0;x<data.length;x++) {
						var path = "./artwork.php?id="+data[x][0];
						var al = "./artist.php?id="+data[x][7];
						var img_path = data[x][8];
						var an = data[x][1];
						var price = "Rs. "+data[x][11];
						var artist = data[x][6];
						
						var res = "<li class=fil_arts style='margin-top:10px;margin-bottom:10px;'><a href="+path+" class=fil_link><img src="+img_path+" width=200 height=200 /></a><div><center><a class=fil_name href="+path+">"+an+"</a><br/><a class=fil_artist href="+al+">"+artist+"</a><br/><span class=fil_price>"+price+"</span></center></div></li>";
						
						$("#filter_artworks").append(res);
					}
				}
			});
			return false;
		});
		
		$('.price_clear').click(function(){
			$(this).hide();
			
			$.ajax({
				url: 'json/fil.php', 
				data: { cl:"p"},
				method:'GET',
				dataType:'json',
				beforeSend: function() {
					var loader = $('<img/>', {
						"class" :"loader", 
						"src":"images/newloader.gif"
					});		
					$("#filter_artworks").html(loader);
				},
				success: function(data)	{
					$(".loader").remove();
					// var sess = <?php echo $_SESSION['f'];?>;
					// $("#sess").html(sess);
					$("#num_fil_art").html(data.length);
					//alert(data);
					for(var x = 0;x<data.length;x++) {
						var path = "./artwork.php?id="+data[x][0];
						var al = "./artist.php?id="+data[x][7];
						var img_path = data[x][8];
						var an = data[x][1];
						var price = "Rs. "+data[x][11];
						var artist = data[x][6];
						
						var res = "<li class=fil_arts style='margin-top:10px;margin-bottom:10px;'><a href="+path+" class=fil_link><img src="+img_path+" width=200 height=200 /></a><div><center><a class=fil_name href="+path+">"+an+"</a><br/><a class=fil_artist href="+al+">"+artist+"</a><br/><span class=fil_price>"+price+"</span></center></div></li>";
						
						$("#filter_artworks").append(res);
					}
				}
			});
			return false;
		});
		
		$('.med_f').click(function(){
			if($(this).attr('id')=='med_f1') {
				$('.med_clear').hide();
				$('#med_clear1').show();
				med = 1;
			}else if($(this).attr('id')=='med_f2') {
				$('.med_clear').hide();
				$('#med_clear2').show();
				med = 2;
			}else if($(this).attr('id')=='med_f3') {
				$('.med_clear').hide();
				$('#med_clear3').show();
				med = 3;
			}else if($(this).attr('id')=='med_f4') {
				$('.med_clear').hide();
				$('#med_clear4').show();
				med = 4;				
			}else if($(this).attr('id')=='med_f5') {
				$('.med_clear').hide();
				$('#med_clear5').show();
				med = 5;
			}else if($(this).attr('id')=='med_f6') {
				$('.med_clear').hide();
				$('#med_clear6').show();
				med = 6;
			}else if($(this).attr('id')=='med_f7') {
				$('.med_clear').hide();
				$('#med_clear7').show();
				med = 7;
			}
			
			$.ajax({
				url: 'json/fil.php', 
				data: { type_range:med },
				method:'GET',
				dataType:'json',
				beforeSend: function() {
					var loader = $('<img/>', {
						"class" :"loader", 
						"src":"images/newloader.gif"
					});		
					$("#filter_artworks").html(loader);
				},
				success: function(data)	{
					$(".loader").remove();
					// var sess = <?php echo $_SESSION['f'];?>;
					// $("#sess").html(sess);
					$("#num_fil_art").html(data.length);
					//alert(data);
					for(var x = 0;x<data.length;x++) {
						var path = "./artwork.php?id="+data[x][0];
						var al = "./artist.php?id="+data[x][7];
						var img_path = data[x][8];
						var an = data[x][1];
						var price = "Rs. "+data[x][11];
						var artist = data[x][6];
						
						var res = "<li class=fil_arts style='margin-top:10px;margin-bottom:10px;'><a href="+path+" class=fil_link><img src="+img_path+" width=200 height=200 /></a><div><center><a class=fil_name href="+path+">"+an+"</a><br/><a class=fil_artist href="+al+">"+artist+"</a><br/><span class=fil_price>"+price+"</span></center></div></li>";
						
						$("#filter_artworks").append(res);
					}
				}
			});
			return false;
		});
		
		$('.med_clear').click(function(){
			$(this).hide();
			
			$.ajax({
				url: 'json/fil.php', 
				data: { cl:"t"},
				method:'GET',
				dataType:'json',
				beforeSend: function() {
					var loader = $('<img/>', {
						"class" :"loader", 
						"src":"images/newloader.gif"
					});
					$("#filter_artworks").html(loader);
				},
				success: function(data)	{
					$(".loader").remove();
					// var sess = <?php echo $_SESSION['f'];?>;
					// $("#sess").html(sess);
					$("#num_fil_art").html(data.length);
					//alert(data);
					for(var x = 0;x<data.length;x++) {
						var path = "./artwork.php?id="+data[x][0];
						var al = "./artist.php?id="+data[x][7];
						var img_path = data[x][8];
						var an = data[x][1];
						var price = "Rs. "+data[x][11];
						var artist = data[x][6];
						
						var res = "<li class=fil_arts style='margin-top:10px;margin-bottom:10px;'><a href="+path+" class=fil_link><img src="+img_path+" width=200 height=200 /></a><div><center><a class=fil_name href="+path+">"+an+"</a><br/><a class=fil_artist href="+al+">"+artist+"</a><br/><span class=fil_price>"+price+"</span></center></div></li>";
						
						$("#filter_artworks").append(res);
					}
				}
			});
			return false;
		});
		
		$('#size_clear').click(function(){
			$(this).hide();
			
			$.ajax({
				url: 'json/fil.php', 
				data: { cl:"s"},
				method:'GET',
				dataType:'json',
				beforeSend: function() {
					var loader = $('<img/>', {
						"class" :"loader", 
						"src":"images/newloader.gif"
					});		
					$("#filter_artworks").html(loader);
				},
				success: function(data)	{
					$(".loader").remove();
					// var sess = <?php echo $_SESSION['f']; ?>;
					// alert(sess);
					//$("#sess").html(sess);
					$("#num_fil_art").html(data.length);
					//alert(data);
					for(var x = 0;x<data.length;x++) {
						var path = "./artwork.php?id="+data[x][0];
						var al = "./artist.php?id="+data[x][7];
						var img_path = data[x][8];
						var an = data[x][1];
						var price = "Rs. "+data[x][11];
						var artist = data[x][6];
						
						var res = "<li class=fil_arts style='margin-top:10px;margin-bottom:10px;'><a href="+path+" class=fil_link><img src="+img_path+" width=200 height=200 /></a><div><center><a class=fil_name href="+path+">"+an+"</a><br/><a class=fil_artist href="+al+">"+artist+"</a><br/><span class=fil_price>"+price+"</span></center></div></li>";
						
						$("#filter_artworks").append(res);
					}
				}
			});
			return false;
		});
	});
</script>
<script>
	$(function() {
    
    $(".fil_link").imgLiquid({
        fill: true,
        horizontalAlign: "center",
        verticalAlign: "top"
    });  
    
});
  </script>

</head>
<body>
<?php include 'header.php' ?>
<div id="wrapper">
<div id="filter_controls" >
<div id="price_filter">
<label for="amount" align="right"><u>Price range:</u></label>
<div class="price_ranges">
	<ul class="price_list">
		<li><a href="" id="price_r1" class="price_r">Rs. 0 to 10000 </a><a href="" id="price_clear1" class="price_clear">X</a></li>
		<li><a href="" id="price_r2" class="price_r">Rs. 10000 to 50000</a><a href="" id="price_clear2" class="price_clear">X</a></li>
		<li><a href="" id="price_r3" class="price_r">Rs. 50000 to 100000</a><a href="" id="price_clear3" class="price_clear">X</a></li>
		<li><a href="" id="price_r4" class="price_r">Rs. 100000 to 500000</a><a href="" id="price_clear4" class="price_clear">X</a></li>
		<li><a href="" id="price_r5" class="price_r">More than 500000</a><a href="" id="price_clear5" class="price_clear">X</a></li>
	</ul>
</div>

<p>  
  <span id="price_value" style="color: #777; font-weight: bold;"></span>
</p>
<div id="slider-range">
</div>
</div>
<div id="size_filter">
	<p><u>Size:</u></p>
	<label>Length - </label><span id="size_l" style="color: #777; font-weight: bold;"></span><br/><br/>
	<div id="size_slider1"></div><br/>
	<label>Breadth - </label><span id="size_b" style="color: #777; font-weight: bold;"></span><br/><br/>
	<div id="size_slider2"></div>
	<a href="" id="size_clear">Remove Selection</a>
</div>
	
<div id="medium_filter">
	<p><u>Medium:</u></p>
	<ul class="med_list">
		<li><a href="" id="med_f1" class="med_f">Print</a><a href="" id="med_clear1" class="med_clear">X</a></li>
		<li><a href="" id="med_f2" class="med_f">Photography</a><a href="" id="med_clear2" class="med_clear">X</a></li>
		<li><a href="" id="med_f3" class="med_f">Painting</a><a href="" id="med_clear3" class="med_clear">X</a></li>
		<li><a href="" id="med_f4" class="med_f">Sculptures</a><a href="" id="med_clear4" class="med_clear">X</a></li>
		<li><a href="" id="med_f5" class="med_f">Drawings</a><a href="" id="med_clear5" class="med_clear">X</a></li>
		<li><a href="" id="med_f6" class="med_f">Mixed Media</a><a href="" id="med_clear6" class="med_clear">X</a></li>
		<li><a href="" id="med_f7" class="med_f">Micelleneous</a><a href="" id="med_clear7" class="med_clear">X</a></li>	
	</ul>
</div>
</div>
<div id="filter_artworks_wrapper">
<center><span style="font-size:1.2em;">Showing <span id="num_fil_art"></span> artworks...</span></center><br/>
<div id="filter_artworks">
	<ul id="fil_r">
		
	</ul>
</div>
</div>
</div>
<?php include 'footer.php' ?>

</body>
</html>