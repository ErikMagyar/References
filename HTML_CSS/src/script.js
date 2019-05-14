$(document).ready(function()
{
	//Parallax Header
	
	var parallaxHeight = $('header').height();
	var parallaxStep = 0.4;
	
	$('header')
		.css( 'background-position', "center 0px" );
	
	$(window).scroll(function()
	{
		var wTop = $(window).scrollTop();
		var backY = wTop*parallaxStep;
		
		$('header')
			.css( 'background-position', "center "+backY+"px" );
	});
	
	//Scroll To
	
	function scrollTo( id, time )
	{
		var pos = $( '#'+id ).position();
		
		$('html, body').animate( 
			{ scrollTop: pos.top }, 
			time 
		);
	}
	
	$('header nav ul a').click(function(e)
	{
		e.preventDefault();
		
		var dst = $(this).attr('data-dst');
		
		scrollTo( dst, 2000 );
	});
});