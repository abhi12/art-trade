$(document).ready(function(){
	$('#art_buy_button').click(function(){
			$('.backdrop, .box').animate({'opacity':'.50'}, 300, 'linear');
			$('.box').animate({'opacity':'1.00'}, 300, 'linear');
			$('.backdrop, .box').css('display', 'block');
		});

		$('.close').click(function(){
			close_box();
		});

		$('.backdrop').click(function(){
			close_box();
		});
		
	var id = getURLParameter('id');
	var content1 = "art_1";
	$.ajax({
		url: 'json/artwork_json.php', 
		data: ({ content:content1,id: id }),
		method:'GET',
		dataType:'json',
		success: function(data)	{
			var al = "./artist.php?id="+data[0][7];
			
			$('#art_name').html(data[0][1]);
			$('#artist_name').html(data[0][6]);
			$('#artist_name').attr('href',al);
			$('#art_size').html(data[0][3]+' X '+data[0][4]);
			$('#art_price').html(data[0][11]);
			//$('#art_detail').html(data[0][8]);
			$('#artwork_image').attr('src',data[0][8]);
			$('#art_stat').html(data[0][13]);
			$('#art_stat').attr('text-color','red');			
		}
	});
	
	var content2 = "featured_art";
	
	$.ajax({
		url: 'json/artwork_json.php', 
		data: ({ content:content2,id:id }),
		method:'GET',
		dataType:'json',
		success: function(data)	{
			var o = 0;
			for(o = 0; o<data.length; o++) {
				var al1 = "./artist.php?id="+data[o][7];
				var artl = "./artwork.php?id="+data[o][0];
				
				$('#oart_img'+(o+1)).attr('src',data[o][8]);
				$('#oart_name'+(o+1)).html(data[o][1]);
				$('#oartist'+(o+1)).html(data[o][6]);
				$('#oartist'+(o+1)).attr('href',al1);
				$('#oartl'+(o+1)).attr('href',artl);
				$('#oart_name'+(o+1)).attr('href',artl);
				$('#oart_name'+(o+1)).html(data[o][1]);
			}
		}
	});
	
	$('#msg_button').click(function() {
		var msg_name = $('#msg_name').attr('value');
		var msg_email = $('#msg_email').attr('value');
		var msg_main = $('#msg_main').attr('value');
		
		$.ajax({
			url: 'mail.php', 
			data: {id:id,'name':msg_name,'mail':msg_email,'note':msg_main},
			method:'GET',
			dataType:'json',
			success: function(data)	{				
				alert("Your message has been sent successfully !");
			}
		});
	});	
});

function close_box() {
	$('.backdrop, .box').animate({'opacity':'0'}, 300, 'linear', function(){
		$('.backdrop, .box').css('display', 'none');
	});
}

function getURLParameter(name) {
	return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null
}