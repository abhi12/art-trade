$(document).ready(function() {
	$.ajax({
		url: 'json/partners_json.php', 
		data: { content:'featured' },
		method:'GET',
		dataType:'json',
		success: function(data)	{
			$('.p_title').html("Featured Partners");
			var pul = $('<ul />',{
					"class":"p_ul"
				});

			$('.p_content').append(pul);
			
			for(var p =0;p<data.length;p++) {
				var p_link = "./gallery.php?id="+data[p][0];
				var p_name = data[p][1];
				var p_path = data[p][2];
				
				$('.p_ul').append("<li><a href="+p_link+"><img width=200 height=200 class=p_img src="+p_path+" /></a><br/><a href="+p_link+" class=p_name>"+p_name+"</a></li>");
			}
			
			
		}		
	});
	
	$('.all_pl').click(function() {
		$.ajax({
			url: 'json/partners_json.php', 
			data: { content:'all' },
			method:'GET',
			dataType:'json',
			success: function(data)	{
				$('.p_content').append("<p class=p_title2 >All Partners</p>");
				var apul = $('<ul />',{
						"class":"ap_ul"
					});
				
				$('.p_content').append(apul).slideDown();
				
				for(var a = 0;a<data.length; a++) {
					var pa_link = "./gallery.php?id="+data[a][0];
					var pa_name = data[a][1];
					
					$('.ap_ul').append("<li><a href="+pa_link+">"+pa_name+"</a></li>");
				}
				
				$('.p_content').append(apul).slideDown();				
			}
		});
				
		$(this).remove();
	})
});