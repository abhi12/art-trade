$(document).ready(function() {
	var id = getURLParameter('id');
	
	$.ajax({
		url: 'json/event_json.php', 
		data: { id:id },
		method:'GET',
		dataType:'json',
		success: function(data)	{
			//alert(data);
			$('#event_name').html(data[0][1]);
			$('#event_date').html(data[0][11]+" to "+data[0][12]);
			$('#event_venue').html(data[0][5]);
			// alert(data[1]);
			// $('#event_cat').html(data[0][1]);
			// $('#event_text').html(data[0][1]);
			for(var c=0;c<data[1].length;c++) {
				var path = "<a href=./gallery.php?id="+data[1][c][0]+">"+data[1][c][1]+"</a>&nbsp;&nbsp;&nbsp;";
				$('#event_g').append(path);
			};
			//alert(data[2][0][1]);
			for(var d=0;d<data[2].length;d++) {
				var a_path = "<a href=./artist.php?id="+data[2][d][0]+">"+data[2][d][1]+"</a>&nbsp;&nbsp;&nbsp;";
				//alert(a_path);
				$('#event_artists').append(a_path);
			}
			
			for(var e = 0;e<data[3].length;e++) {
				var a_path = "./artwork.php?id="+data[3][e][0];
				var al = "./artist.php?id="+data[3][e][4];
				
				var list = "<li><a href="+a_path+"><img width=200px height=200px class=e_art_img src="+data[3][e][2]+" /></a><br/><a class=e_art_name href="+a_path+">"+data[3][e][1]+"</a><br/><a class=e_artist href="+al+">"+data[3][e][3]+"</a><br/></li>";
				
				$('#event_art').append(list);
			}
		}
	});
});

function getURLParameter(name) {
	return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null
}