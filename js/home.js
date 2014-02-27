$(document).ready(function() {
	$.ajax({
		url: 'json/home.php', 
		data: { content: 'f_art' },
		method:'GET',
		dataType:'json',
		success: function(data)	{
			var c;
			for(c=0;c<=3;c++) {
				var artlink = "./artwork.php?id="+data[c][0];
				var al = "./artist.php?id="+data[0][7];
				
				$('#f_artist'+(c+1)).html(data[c][6]);
				$('#f_artist'+(c+1)).attr('href',al);
				$('#f_artt'+(c+1)).html(data[c][12]);		
				$('#artw'+(c+1)).attr('src',data[c][8]);
				$('#f_artwl'+(c+1)).attr('src',artlink);
				$('#f_art_name'+(c+1)).html(data[c][1]);
				$('#f_art_name'+(c+1)).attr('href',artlink);
				$('#f_art_info'+(c+1)).html(data[c][9]);
			}
		}
	});
	
	$.ajax({
		url: 'json/home.php', 
		data: { content: 'f_gallery' },
		method:'GET',
		dataType:'json',
		success: function(data)	{
			var c;
			for(c=0;c<=3;c++) {
				var glink = "./gallery.php?id="+data[c][0];
				
				$('#f_g_name'+(c+1)).attr('href',glink);
				//$('#gimg'+(c+1)).attr('src',data[c][]);
				$('#f_g_name'+(c+1)).html(data[c][1]);
				$('#f_g_info'+(c+1)).html(data[c][4]);
			}
		}
	});
	
	$.ajax({
		url: 'json/home.php', 
		data: { content: 'f_event' },
		method:'GET',
		dataType:'json',
		success: function(data)	{
			var c;
			for(c=0;c<=3;c++) {
				$('#f_e_name'+(c+1)).html(data[c][1]);
				$('#f_e_info'+(c+1)).html(data[c][11]+' to '+data[c][12]);
			}
		}
	});
});