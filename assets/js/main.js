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