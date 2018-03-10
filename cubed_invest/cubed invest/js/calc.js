$(function()
{
	$('.box-oper-psys label').on('change, click',function()
    {
        $('.box-oper-psys label').removeClass('current');
        $('.in-account-span').html('<small>'+$(this).attr('rel')+'</small>');
        $('.depo-curr-label').text($(this).attr('rel'));
        $('.calc-select a, .calc-select label').removeClass('active').removeClass('prev');
        $('.calc-select a[rel=1], .calc-select label[rel=1]').addClass('active');
        $(this).addClass('current');
        $('.drag').animate({'left': '0px'},400);
		$('.p_before').animate({'width': '0'},400);
        calc();
	});

	calc();
	$( "#drag" ).draggable(
	{
		cursor: "e-resize", axis: "x" ,containment: "parent",
		drag: function(event, ui)
		{
				var plan=$('.calc-select .active').attr('rel');
				var data = sw(plan);
				var c=ui.position.left;
				var e=parseFloat(data.min)+c*(data.max-data.min)/($(this).parent().width()-$(this).width());
				var output=Math.round(e*Math.pow(10, data.pow)).toFixed(0)/Math.pow(10, data.pow);
				$('.p_before').css({'width': c});
	 				if (output>data.max)
	 				{
	 						output=data.max;
	 						$('.drag').css({'left': '654px !important'});
	 				}
					//$(this).children('span').text(output);
	 				$('.cal-amount-val').val(output);
				calc(data, output);
		},
		 stop: function(event, ui)
		{
		 	var check=$(this).parent().width()-$(this).width()-ui.position.left;
		 	var wdth=$(this).parent().width()-$(this).width();
		 	if (check<0)
					{
						//console.log(ui.position.left);
						$(this).css('left',wdth+'px');
					}
		}
	});
	$('.calc-select a, .calc-select label').on('click',function(){
		$('.calc-select a, .calc-select label').removeClass('active').removeClass('prev');
		$(this).addClass('active');
		$(this).prev().addClass('prev');
		var plan=$(this).attr('rel');
		var data = sw(plan);
		$('.cal-amount-val').val(data.min);
		$('.drag').animate({'left': '0px'},400);
		$('.p_before').animate({'width': '0'},400);
		calc(data,data.min);
	})
	$('.cal-amount-val').on('change keyup', function()
	{
		var amount=$(this).val();
		var plan=$('.calc-select .active').attr('rel');
		var data = sw(plan);
		if (amount>data.max) amount=data.max;
		$(this).val(amount);
		var position=Math.round((amount-data.min)*($( ".drag" ).parent().width()-$(".drag" ).width())/(data.max-data.min));
		if (position<0) position=0;
		$('.p_before').animate({'width': position},400);
		$(".drag").animate({'left': position+'px'},400);
		calc(data, amount);
	}).on('keypress', isNumber);

	function isNumber(event)
	{
		var charCode = (event.which) ? event.which : event.keyCode;
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}
	function calcCurrs(data)
	{
		curr=Number($('.box-oper-psys > label.current').data('curr'));
		data.min=data.min/curr;
		data.max=data.max/curr;
		data.pow=Number($('.box-oper-psys > label.current').data('pow'));
		return data;
	}
	function sw(plan)
	{
			data=[];
			data.min=10;
			data.max=999;
			data.duration=60;
			data.percent=102.5;
			data.period=1;

			data.pow=0;
			switch (plan)
			{
			case '1':
					data.min = 10;
					data.max = 999;
					data.duration=60;
					percent=150;
					data.daily=1;
					data.period=1;
					data.percent=percent;
					break;
			case '2':
					data.min = 1000;
					data.max = 10000;
					data.duration=60;
					percent=180;
					data.period=1;
					data.daily=1;
					data.percent=percent;

					break;
			case '3':
					data.min = 301;
					data.max = 1000;
					data.duration=20;
					percent=210;
					data.period=1;
					data.daily=1;
					data.percent=percent;
					break;
			case '4':
					data.min = 1001;
					data.max = 5000;
					data.duration=25;
					percent=250;
					data.period=1;
					data.daily=1;
					data.percent=percent;
					break;
			}
		data=calcCurrs(data);
		$('.min-value > span').text(data.min);
		$('.max-value > span').text(data.max);
		//console.log(data);
		return data;
	}
	function calc(data, amount)
	{
		if (jQuery.isEmptyObject(data))
		{
			data = sw();
			amount = data.min;
			$('.cal-amount-val').val(data.min);
			calculate(amount,data.percent,data.pow,data.period,data.duration);
		}
		calculate(amount,data.percent,data.pow,data.period,data.duration);
	}
	function calculate(amount,percent,pow,period,duration)
	{
	 	var amount=Number(amount);
	 	var percent=Number(percent);
	 	var period=Number(period);
	 	var duration=Number(duration);
	 	var divider=duration/period;
	 	$('i.period2').html(duration);
	 	if (period==1)
	 	{
	 		$('i.period').html('24 '+$('.small-2').data('caption-first'));
	 	}
	 	else
	 	{
	 		$('i.period').html(period+' '+$('.small-2').data('caption'));
	 	}


		var total=Math.round(amount*percent*Math.pow(10, pow)).toFixed(0)/Math.pow(10, pow+2);
		var profit =Math.round(amount*percent*Math.pow(10, pow)/divider).toFixed(0)/Math.pow(10, pow+2);
		$('.total > span').html(total);
		$('.profit > span').html(profit);
	}
});

