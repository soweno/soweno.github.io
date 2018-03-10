$(window).scroll(function()
{
    var a = $(window).scrollTop();
    var block=$('.block-cross');
    if (a>0)
    {
        block.removeClass("open");
        block.css( {"opacity":"0"});
    }
    else
    {
        block.css( {"opacity":"1"});
	}
});

$(function(){



	$('.bxslider').bxSlider({});
	$('.bxslider1').bxSlider({});
	$('.bxslider-plans').bxSlider({
		mode: 'vertical'
	});
	$(document).on('click', '.box-oper .info', function(event) {

		$(this).slideUp(400);
		event.preventDefault();
	});

	$(document).on('click', '.block-lang > ul > i', function(event) {

		if ($(this).parent().hasClass('open'))
		{
			$(this).parent().removeClass('open');
			$(this).parent().css({'height': '22px'});
		}
		else
		{
			$(this).parent().addClass('open');
			$(this).parent().css({'height': '114px'});
		}
		event.preventDefault();
	});

	$(document).on('change', '.field-checkbox > label', function(event)
	{
	  $(this).toggleClass('checked');
	});


	$(document).on('click', '.block-cross', function(event) {

		if ($(this).hasClass('open'))
		{
			$(this).removeClass('open');

		}
		else
		{
			$(this).addClass('open');
		}
		event.preventDefault();
	});
});

