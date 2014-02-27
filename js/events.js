$(document).ready(function() {
	$.ajax({
		url: 'json/events_json.php', 
		data: { content:'featured' },
		method:'GET',
		dataType:'json',
		success: function(data)	{
					
		}
	});
});