$(document).ready(function() {
	var id = getURLParameter('id');
	var set;
	
	$.ajax({
		url: 'json/gallery_json.php', 
		data: { content: 'g_1',id:id },
		method:'GET',
		dataType:'json',
		success: function(data)	{
			$('#g_content').html("");
			$('#g_t').html(data[0][1]);
			$('.g_logo').attr('src',data[0][11]);
			
			var gh = $('<div/>',{
				"class":"g_home"
			});
			
			$('#g_content').append(gh);
			
			var g_desc = "<div class=g_des><p class=g_desc width=100% >"+data[0][2]+"</p></div>";
			
			$('.g_home').append(g_desc);
			
			var g_img = $('<img />',{
				"class":"g_img",
				"src":data[0][10]							
			});
			
			var g_image = $('<div />',{
				"class":"g_image"
			});
			
			$('.g_home').append(g_image);
			$('.g_image').append(g_img);			
			
			$('#g_content').append(gh);
			// $('.gdes').append(g_desc);
			set = 'd';
		}
	});
	
	$.ajax({
		url: 'json/gallery_json.php', 
		data: { content: 'g_event',id:id },
		method:'GET',
		dataType:'json',
		success: function(data)	{
			//current events
		if(set=='d') {
			var g_event = $('<div />',{
				"class":"g_event"
			});
			
			$('#g_content').append(g_event);
			
			var g_curr = $('<div />',{
				"class":"g_curr"
			});
			
			$('.g_event').append(g_curr);
			
			$('.g_curr').append("<p align=center id=g_currt>Current Events</p>");
			
			var g_currul = $('<ul />',{
				"class":"g_currul"
			});
			
			$('.g_curr').append(g_currul);
			
			for(var r =0; r<data[1].length;r++) {
				var cel = "./event.php?id="+data[1][r][0];
				var ce_name = data[1][r][1];
				var ce_img = data[1][r][2];
				
				$('.g_currul').append("<li><a href="+cel+"><img width=200 height=200 src="+ce_img+"></img></a><br/><a href="+cel+">"+ce_name+"</a></li>");
			}
			$('.g_curr').append(g_currul);
			set='c';			
		}	
			//upcoming events
		if(set=='c') {
			var g_up = $('<div />',{
				"class":"g_up"
			});
			
			$('.g_event').append(g_up);
			
			$('.g_up').append("<p align=center id=g_upt>Upcoming Events</p>");
			
			var g_upul = $('<ul />',{
				"class":"g_upul"
			});
			
			$('.g_up').append(g_upul);
			
			for(var u =0; u<data[0].length;u++) {
				var uel = "./event.php?id="+data[0][u][0];
				var ue_name = data[0][u][1];
				var ue_img = data[0][u][2];
				
				$('.g_upul').append("<li><a href="+uel+"><img width=200 height=200 src="+ue_img+"></img></a><br/><a href="+uel+">"+ue_name+"</a></li>");
			}
			$('.g_up').append(g_upul);
			set='u';
		}
			//past events
		if(set=='u') {
			var g_past = $('<div />',{
				"class":"g_past"
			});
			
			$('.g_event').append(g_past);
			
			$('.g_past').append("<p align=center id=g_pastt>Past Events</p>");
			
			var g_pastul = $('<ul />', {
				"class":"g_pastul"
			});
			
			$('.g_past').append(g_pastul);
			
			for(var p =0; p<data[2].length;p++) {
				var pel = "./event.php?id="+data[2][p][0];
				var pe_name = data[2][p][1];
				var pe_img = data[2][p][2];
				
				$('.g_pastul').append("<li><a href="+pel+"><img width=200 height=200 src="+pe_img+"></img></a><br/><a href="+pel+">"+pe_name+"</a></li>");
			}
			$('.g_past').append(g_pastul);			
		}
		}
	});
	
	$('#g_home').click(function(){
		$.ajax({
		url: 'json/gallery_json.php', 
		data: { content: 'g_1',id:id },
		method:'GET',
		dataType:'json',
		success: function(data)	{
			$('#g_content').html("");
			$('#g_t').html(data[0][1]);
			$('.g_logo').attr('src',data[0][11]);
			
			var gh = $('<div/>',{
				"class":"g_home"
			});
			
			$('#g_content').append(gh);
			
			var g_desc = "<div class=g_des><p class=g_desc width=100% >"+data[0][2]+"</p></div>";
			
			$('.g_home').append(g_desc);
			
			var g_img = $('<img />',{
				"class":"g_img",
				"src":data[0][10]							
			});
			
			var g_image = $('<div />',{
				"class":"g_image"
			});
			
			$('.g_home').append(g_image);
			$('.g_image').append(g_img);			
			
			
			$('#g_content').append(gh);
			// $('.gdes').append(g_desc);
			set = 'd';
		}
		});
	
		$.ajax({
			url: 'json/gallery_json.php', 
			data: { content: 'g_event',id:id },
			method:'GET',
			dataType:'json',
			success: function(data)	{
				//current events
			if(set=='d') {
				var g_event = $('<div />',{
					"class":"g_event"
				});
				
				$('#g_content').append(g_event);
				
				var g_curr = $('<div />',{
					"class":"g_curr"
				});
				
				$('.g_event').append(g_curr);
				
				$('.g_curr').append("<p align=center id=g_currt>Current Events</p>");
				
				var g_currul = $('<ul />',{
					"class":"g_currul"
				});
				
				$('.g_curr').append(g_currul);
				
				for(var r =0; r<data[1].length;r++) {
					var cel = "./event.php?id="+data[1][r][0];
					var ce_name = data[1][r][1];
					var ce_img = data[1][r][2];
					
					$('.g_currul').append("<li><a href="+cel+"><img width=200 height=200 src="+ce_img+"></img></a><br/><a href="+cel+">"+ce_name+"</a></li>");
				}
				$('.g_curr').append(g_currul);
				set='c';			
			}
				//upcoming events
			if(set=='c') {
				var g_up = $('<div />',{
					"class":"g_up"
				});
				
				$('.g_event').append(g_up);
				
				$('.g_up').append("<p align=center id=g_upt>Upcoming Events</p>");
				
				var g_upul = $('<ul />',{
					"class":"g_upul"
				});
				
				$('.g_up').append(g_upul);
				
				for(var u =0; u<data[0].length;u++) {
					var uel = "./event.php?id="+data[0][u][0];
					var ue_name = data[0][u][1];
					var ue_img = data[0][u][2];
					
					$('.g_upul').append("<li><a href="+uel+"><img width=200 height=200 src="+ue_img+"></img></a><br/><a href="+uel+">"+ue_name+"</a></li>");
				}
				$('.g_up').append(g_upul);
				set='u';
			}
				//past events
			if(set=='u') {
				var g_past = $('<div />',{
					"class":"g_past"
				});
				
				$('.g_event').append(g_past);
				
				$('.g_past').append("<p align=center id=g_pastt>Past Events</p>");
				
				var g_pastul = $('<ul />', {
					"class":"g_pastul"
				});
				
				$('.g_past').append(g_pastul);
				
				for(var p =0; p<data[2].length;p++) {
					var pel = "./event.php?id="+data[2][p][0];
					var pe_name = data[2][p][1];
					var pe_img = data[2][p][2];
					
					$('.g_pastul').append("<li><a href="+pel+"><img width=200 height=200 src="+pe_img+"></img></a><br/><a href="+pel+">"+pe_name+"</a></li>");
				}
				$('.g_past').append(g_pastul);			
			}
			}
		});
	});
	
	$('#g_art').click(function() {
		$.ajax({
			url: 'json/gallery_json.php', 
			data: { content: 'g_art',id:id },
			method:'GET',
			dataType:'json',
			success: function(data)	{
				$('#g_content').html("");
				for(var x=0;x<data.length;x++) {
					var artistl = "./artist.php?id="+data[x][0];
					var artist = data[x][1];
					var g_artul = $('<ul/>', {
						"class" :"g_artul",
						"id":"g_artul"+(x+1)
					});
					
					var g_artd = $('<div/>', {				
						"class" :"g_contentd",
						"id":"g_contentd"+(x+1)
					});
					
					$('#g_content').append(g_artd);
					
					$('#g_contentd'+(x+1)).append("<p class=g_artist><a href="+artistl+">"+artist+"</a></p>");
					$('#g_contentd'+(x+1)).append(g_artul);
					
					for(var y=0; y<data[x][2].length; y++) {						
						var a_link = "./artwork.php?id="+data[x][2][y][0];
						var img = "<img height=200 width=200 src="+data[x][2][y][8]+"></img>";
						var art_name = data[x][2][y][1];
						
						var list = "<li class=g_artli><a class=g_artl href="+a_link+">"+img+"</a><br/><center><a class=g_art_name href="+a_link+">"+art_name+"</a></center></li>";
						
						$('#g_artul'+(x+1)).append(list);
					}
					//$('#g_content').append("<br/>");
				}
			}
		});
	});
	
	$('#g_artist').click(function(){
		$.ajax({
			url: 'json/gallery_json.php', 
			data: { content: 'g_artist',id:id },
			method:'GET',
			dataType:'json',
			success: function(data)	{
				$('#g_content').html("");
				var g_artist = $('<div />',{
					"class":"g_artist",
					"width":"80%"
				});
				
				for(var c =0; c<data.length; c++) {
					var artistl = "./artist.php?id="+data[c][7];
					var artist = data[c][6];
					//alert(artist);
					$('#g_content').append("<div class=g_artistc><a class=g_artistl href="+artistl+">"+artist+"</a></div>");
				}
			}
		});
	});
});

function getURLParameter(name) {
	return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null
}