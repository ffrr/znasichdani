$(document).ready(function(){
	
	$('a[href^=#]').click(function() {
		return false;
	});
	
	$('#toggle-menu').click(function() {
		$('header ul').slideToggle(100);
		$(this).toggleClass('active');
	});
	
	/*$('#results .expand a').click(function() {
		$(this).parent().toggleClass('active');
	});*/
	
	$('.toggle').each(function() {
		$(this).text($(this).data('label_0'));
	});
	$('.toggle').click(function() {
		$(this).toggleClass('active');
		$(this).parent().find('span').toggle();
		var label_0 = $(this).data('label_0');
		var label_1 = $(this).data('label_1');
		$(this).text(function(i,text){ return text === label_0 ? label_1 : label_0; });
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
		$(newID).closest('section').addClass('active');
		newID.fadeIn(100);
		moveHelp(newID);
		scrollTo(newID);
		// navigate tour blocks
		if($('.dim').length) {
			$('header, footer, section').addClass('dim');
			$(newID).closest('section').removeClass('dim');
		}
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
	
	// start tour
	$('header .menu-help, #overlay .button').click(function() {
		$('.help>div,#overlay').hide();
		$('.help.tour').addClass('pulse');
		$('#help-0').fadeIn(100);
		scrollTo($('#help-0'));
		$('header, footer, section').addClass('dim');
		$('#help-0').closest('section').removeClass('dim');
		var firstTooltip = $('.help.tour').first();
		var lastTooltip = $('.help.tour').last();
		$(firstTooltip).find('.prev').hide();
		$(lastTooltip).find('.next').hide();
		$(lastTooltip).find('.end').show();
	});
	// show individual tooltip
	$('.help>span').click(function() {
		$('.help>div').hide();
		moveHelp($(this).next('div'));
		$(this).next('div').fadeIn(100);
		$(this).next('div').find('.end').hide();
	});
	// navigate tooltips
	$('.help div span a').click(function() {
		var count = $('.tour').length;
		var thisID	= $(this).parent().parent().attr('id');
		var id		= thisID.split('-');
		if($(this).hasClass('end')) {
		} else {
			if($(this).hasClass('prev')) { var move = -1; } else { var move = 1; }
			var newID	= parseInt(id[1]) + move;
			if(newID == -1) { newID = count - 1; }
			if(newID == 3) { newID = 0; }
			switchHelp(thisID,newID);
		}
	});
	// close tooltip
	$('.help .close').click(function() {
		$(this).parent().fadeOut(100);
		$('*').removeClass('dim');
	});
	$('.help .end').click(function() {
		$(this).parent().parent().fadeOut(100);
		$('html, body').animate({scrollTop:0},500);
		$('*').removeClass('dim');
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