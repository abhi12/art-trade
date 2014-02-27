$(document).ready(function() {
	var id = getURLParameter('id');
	
	$.ajax({
		url: 'json/artist_json.php', 
		data: { content: 'a_1',id:id },
		method:'GET',
		dataType:'json',
		success: function(data)	{
			$('#a_content').html("");
			$('#a_title').html(data[1]);
			
			var ah = $('<div/>',{
				"class":"a_home"
			});
			
			$('#a_content').append(ah);
			
			var a_desc = "<div class=a_des><p>Born: "+data[4]+"</p><p>Education: "+data[3]+"</p><p>Hometown: "+data[5]+"</p><p>Living and Working at: "+data[6]+"</p><p class=a_desc width=100% >"+data[7]+"</p></div>";
			
			$('.a_home').append(a_desc);			
		}
	});
	
	$('#a_home').click(function(){
		$.ajax({
		url: 'json/artist_json.php', 
		data: { content: 'a_1',id:id },
		method:'GET',
		dataType:'json',
		success: function(data)	{
			$('#a_content').html("");
			$('#a_title').html(data[1]);
			
			var ah = $('<div/>',{
				"class":"a_home"
			});
			
			$('#a_content').append(ah);
			
			var a_desc = "<div class=a_des><p>Born: "+data[4]+"</p><p>Education: "+data[3]+"</p><p>Hometown: "+data[5]+"</p><p>Living and Working at: "+data[6]+"</p><p class=a_desc width=100% >"+data[7]+"</p></div>";
			
			$('.a_home').append(a_desc);
			
			var a_img = $('<img />',{
				"class":"a_img",
				"src":data[0][10]							
			});
			
			var a_image = $('<div />',{
				"class":"a_image"
			});
			
			//$('.a_home').append(a_image);
			$('.a_image').append(a_img);			
			
			
			$('#a_content').append(ah);
		}
	});
	});
	
	$('#a_art').click(function(){
		$.ajax({
			url: 'json/artist_json.php', 
			data: { content: 'a_art',id:id },
			method:'GET',
			dataType:'json',
			success: function(data)	{
				$('#a_content').html("");
				
				var x;
				var a_artul = $('<ul />',{
					"class":"a_artul"
				});
				
				$('#a_content').append(a_artul);
				
				for(var x=0;x<data.length;x++) {
					var path = "./artwork.php?id="+data[x][0];
					var img = "<img height=200 width=200 src="+data[x][8]+"></img>";
					var art = data[x][1];
					
					$('#a_content').append("<li class=a_artli><a href="+path+">"+img+"</a><br /><center><a class=a_art_name href="+path+">"+art+"</a></center></li>");
				}
			}
		});
	});
	
	$('#a_events').click(function() {
		$.ajax({
			url: 'json/artist_json.php', 
			data: { content: 'a_event',id:id },
			method:'GET',
			dataType:'json',
			success: function(data)	{
				$('#a_content').html("");
				var set='d';
				
				if(set=='d') {
				var a_event = $('<div />',{
					"class":"a_event"
				});
				
				$('#a_content').append(a_event);
				
				var a_curr = $('<div />',{
					"class":"a_curr"
				});
				
				$('.a_event').append(a_curr);
				
				$('.a_curr').append("<p id=a_currt>Current Events</p>");
				
				var a_currul = $('<ul />',{
					"class":"a_currul"
				});
				
				$('.a_curr').append(a_currul);
				
				for(var r =0; r<data[1].length;r++) {
					var cel = "./event.php?id="+data[1][r][0];
					var ce_name = data[1][r][1];
					var ce_img = data[1][r][2];
					
					$('.a_currul').append("<li><a href="+cel+"><img width=200 height=200 src="+ce_img+"></img></a><br/><a align=center href="+cel+">"+ce_name+"</a></li>");
				}				
				set='c';			
				}	
				//upcoming events
				if(set=='c') {
				var a_up = $('<div />',{
					"class":"a_up"
				});
				
				$('.a_event').append(a_up);
				
				$('.a_up').append("<p id=a_upt>Upcoming Events</p>");
				
				var a_upul = $('<ul />',{
					"class":"a_upul"
				});
				
				$('.a_up').append(a_upul);
				
				for(var u =0; u<data[0].length;u++) {
					var uel = "./event.php?id="+data[0][u][0];
					var ue_name = data[0][u][1];
					var ue_img = data[0][u][2];
					
					$('.a_upul').append("<li><a href="+uel+"><img width=200 height=200 src="+ue_img+"></img></a><br/><a href="+uel+">"+ue_name+"</a></li>");
				}				
				set='u';
				}
				//past events
				if(set=='u') {
				var a_past = $('<div />',{
					"class":"a_past"
				});
				
				$('.a_event').append(a_past);
				
				$('.a_past').append("<p id=a_pastt>Past Events</p>");
				
				var a_pastul = $('<ul />', {
					"class":"a_pastul"
				});
				
				$('.a_past').append(a_pastul);
				
				for(var p =0; p<data[2].length;p++) {
					var pel = "./event.php?id="+data[2][p][0];
					var pe_name = data[2][p][1];
					var pe_img = data[2][p][2];
					
					$('.a_pastul').append("<li><a href="+pel+"><img width=200 height=200 src="+pe_img+"></img></a><br/><a href="+pel+">"+pe_name+"</a></li>");
				}				
				}
			}
		});
	});
});

function getURLParameter(name) {
	return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null
}