$(document).ready(function(){
	
	$('a[href^=#]').click(function() {
		return false;
	});
	
	$('#toggle-menu').click(function() {
		$('header ul').slideToggle(100);
		$(this).toggleClass('active');
	});
	
	$('#results .expand a').click(function() {
		$(this).parent().toggleClass('active');
	});
	
	$('#data h3 a').click(function() {
		$(this).parent().next('div').slideToggle(100);
		$(this).parent().parent().toggleClass('active');
	});
	
	$('#data table').tablesorter( {sortList:[[0,0]]} );
	
	$('.fancybox').fancybox({
		padding:		10,
		openEffect:		'none',
		closeEffect:	'none',
		helpers: {
			media:		{},
			overlay:	{css: {'background' : 'rgba(255, 255, 255, 0.8)'}}
		}
	});
	
	
	// PIE
	
	$('#pie .active input').prop('checked',true);
	
	function stripe() {
		var total = 0;
		$('#pie .active input').each(function() {
			total	= total + parseInt($(this).data('sum'));
		});
		$('#pie label input').each(function() {
			var id	= $(this).attr('name');
			if($(this).parent().parent().hasClass('active')) {
				var sum	= parseInt($(this).data('sum'));
				var w	= sum / total * 100;
			} else {
				var w	= 0;
			}
			$('#part-' + id).css({width: w + '%'});
		});
		$('#total').text(total + ' €');
	}
	
	stripe();
	
	$('#pie input').change(function() {
		$(this).parent().parent().toggleClass('active');
		stripe();
	});
	
	$('#join-group').hide();
	$('#break-group').click(function() {
		$('#pie .group').removeClass('active').hide();
		$('#pie .hidden').addClass('active').fadeIn();
		$('#pie a').toggle();
		stripe();
	});
	$('#join-group').click(function() {
		$('#pie .group').addClass('active').show();
		$('#pie .hidden').removeClass('active').hide();
		$('#pie a').toggle();
		stripe();
	});
	
	
	// HELP
	function switchHelp(thisID,newID) {
		thisID	= $('#' + thisID);
		newID	= $('#help-' + newID);
		thisID.fadeOut(100);
		newID.fadeIn(100);
		moveHelp(newID);
		scrollTo(newID);
	}
	function moveHelp(target) {
		var pos		= target.parent().offset().left;
		var win		= $(window).width();
		var w		= target.width();
		if((win - pos) < 250) {
			target.css({right:'auto',left:- w - 40 + 'px'}).addClass('alt');
		} else {
			target.removeClass('alt');
		}
	}
	function scrollTo(target) {
		$('html, body').animate({scrollTop:target.offset().top - 100},500);
	}
	
	
	$('header .menu-help').click(function() {
		$('.help>div').hide();
		$('#help-0').fadeIn(100);
		scrollTo($('#help-0'));
	});
	$('.help>span').click(function() {
		$('.help>div').hide();
		moveHelp($(this).next('div'));
		$(this).next('div').fadeIn(100);
	});
	$('.help div span a').click(function() {
		var count = $('.help').length;
		var thisID	= $(this).parent().parent().attr('id');
		var id		= thisID.split('-');
		if($(this).hasClass('prev')) { var move = -1; } else { var move = 1; }
		var newID	= parseInt(id[1]) + move;
		if(newID == -1) { newID = count - 1; }
		if(newID == 3) { newID = 0; }
		switchHelp(thisID,newID);
	});
	$('.help .close').click(function() {
		$(this).parent().fadeOut(100);
	});
	
	$('#medal').hover(function() {
		target = $(this).find('div');
		moveHelp(target);
		target.fadeIn(100);
	},function() {
		target.fadeOut();
	});
	//$('#data section').addClass('stickem-container');
	//$('#data section h3').addClass('stickem');
	//$('#data').stickem();

});

$(document).ready(function(){
	
});