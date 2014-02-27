function getURLParameter(name) {
	return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null
}

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