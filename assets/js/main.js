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

function liveCheck(restaurantid, tableid){
	$.post( "/reserve/check", { restaurantid: restaurantid, tableid: tableid})
		.done(function( data ) {
			alert( "Data Loaded: " + data );
		});
}