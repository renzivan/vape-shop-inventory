
$(document).ready(function(){
	$('.sidebar-nav li:nth-child(1n+3)').click(function(){
		$('.sidebar-nav li').removeClass('nav-active');
		$(this).addClass('nav-active');
		console.log(this);
	});
});0