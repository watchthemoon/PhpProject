function openWindow(url,data){
	$('#popup_window').css({
		width:$('body').width(),
		height:$('.website').height()+$('footer').height(),
		display: 'block'
	}).animate({
		opacity: 1
	},250,'linear',function(){
		$( "#popup_form" ).load(url,data);
	})
}

function closeWindow(){
	$("#popup_window").animate({
		opacity: 0
	},250,function(){
		$("#popup_window").hide();
		$("#popup_form").html('');
	});
}

function liveCheck(restaurantid,date){
	$.post( "/reserve/check", { restaurantid: restaurantid,date: date }).done(function( data ) {
		$('#tables .reserved').remove();
		$('#tables .free').show();
		$.each( data, function( key, val ) {
			$('#block' + val.coordinates).append('<div class="reserved"></div>');
			$('#block' + val.coordinates + ' .free').hide();
			$('#block' + val.coordinates + ' .reserved').attr("title", "Deze tafel is al gereserveerd.");
		});
	});
}

function liveCheckBackEnd(restaurantid,date){
	$.post( "/admin/reservations/check", { restaurantid: restaurantid,date: date }).done(function( data ) {
		$('#tables .reservedBackEnd').hide();
		$('#tables .free').show();
		$.each( data, function( key, val ) {
			$('#block' + val.coordinates + ' .reservedBackEnd').show();
			$('#block' + val.coordinates + ' .free').hide();
			$('#block' + val.coordinates + ' .reservedBackEnd').attr("title", "Deze tafel is al gereserveerd.");
		
		});
	});
}