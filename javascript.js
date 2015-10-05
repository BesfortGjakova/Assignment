function showPHP(){
	var title  = $('#movieTitle').val();
	if (title.length == 0) {
		 $('#movieTitle')[0].style.backgroundColor = "red" 
	}
	else {
	 $('#movieTitle')[0].style.backgroundColor = "white"
	}

	var rating = $("#movieRatings").val(); 
	if (rating == 0) {
		 $('#movieRatings')[0].style.backgroundColor = "red"		
    }
	else {
	 $('#movieRatings')[0].style.backgroundColor = "white"
	}
	
	var linkImdb = $("#linkImdb").val(); 
	if (linkImdb.length == 0) {
		 $('#linkImdb')[0].style.backgroundColor = "red"
	}
	else {
	 $('#linkImdb')[0].style.backgroundColor = "white"
	}

	var linkImg = $("#linkImg").val(); 
	if (linkImg.length == 0) {
		 $('#linkImg')[0].style.backgroundColor = "red"
	}
	else {
	 $('#linkImg')[0].style.backgroundColor = "white"
	}
	
	var plot = $("#plot").val(); 
	if (plot.length == 0) {
		 $('#plot')[0].style.backgroundColor = "red"
	}
	else {
	 $('#plot')[0].style.backgroundColor = "white"
	}
	
	if (rating != 0 && title.length != 0 && linkImdb.length != 0 && linkImg.length != 0 && plot.length != 0) {
	$('#movieTitle')[0].style.backgroundColor = "white"
	$('#movieRatings')[0].style.backgroundColor = "white"
	$('#linkImdb')[0].style.backgroundColor = "white"
	$('#linkImg')[0].style.backgroundColor = "white"
	$('#plot')[0].style.backgroundColor = "white"
	
	return ( true );
	
	$('#movieTitle').val('');

	$('#movieRatings').val(0);
	
	$('#linkImdb').val('');
	
	$('#linkImg').val('');
	
	$('#plot').val('');
	
	}
	
	return false;
}
		
function startSlideShow()
{
	var image = 1;
	slideShow(image);
	
	setInterval(function(){
		if(image == 5)
		{image = 1}
		else
		{image++}
		slideShow(image)
	}, 5000);

}

function slideShow(id)
{
	$('#img-'+id).fadeIn(500);
	$('#img-'+id).delay(4000).fadeOut(500);
}

function init()
{
	$('#bannerImage img').hide();
	startSlideShow();
	
	
	//ajax
	$('#formGb').hide();
	
	$('#newInsert').click(function() {
	$('#formGb').show();
	})
	
	$('#createNewmessage').bind("click", function(){
		
		var gb = $('#nameGuestbook').val();
		var gbMessage = $('#messageGuestbook').val();
		
		if (gb == 0) {
		 $('#nameGuestbook')[0].style.backgroundColor = "red"		
			}
		else {
			$('#nameGuestbook')[0].style.backgroundColor = "white"
		}
		
		if (gbMessage == 0) {
		 $('#messageGuestbook')[0].style.backgroundColor = "red"		
			}
		else {
			$('#messageGuestbook')[0].style.backgroundColor = "white"
		}
		
		if (gb != 0 && gbMessage) {
		$('#nameGuestbook')[0].style.backgroundColor = "white"
		$('#messageGuestbook')[0].style.backgroundColor = "white"
		
		
		
		$.ajax ({
		url: "inc/mysql.php?action=nameGuestbook",
		type: "POST",
		data: {gb: gb, gbMessage: gbMessage},
	
		success: function(data) {
			//alert(data);
			if (data == "true"){
				$("#messages").prepend("<li>"+gbMessage+"</li>");
				$("#messages").prepend("<div id='gbName'</li><b>"+gb+"</b></li></div>");
				$("#nameGuestbook").val("");
				$("#messageGuestbook").val("");
				$('#formGb').show();
			}
			else {
				alert("Något gick fel vid sparandet!");
			}
		
		},
		error: function(xhr, error){
			alert("Kunde inte ansluta till server-filen");
		}
		})
		}

	});
}

$(document).ready(init)