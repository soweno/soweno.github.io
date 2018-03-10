$(function(){
/* modal wondow */
$(document).on('click','.box-modal',function(event)
{
		$this=$(this);
		$('.wrap').remove();
		//$('#main').addClass('grey');
		var style=$this.data('style');
		var url=$this.attr('href');
		var datahref=$this.data('href');
		//var active=$this.data('active');
		$('.wrap').animate({'opacity':'0'},200).remove();
		if (datahref==undefined)
		{
			closeval="<div class='close'></div>";
		}
		else
		{
			closeval="<a href='/"+datahref+"' class='close'></a>";
		}
			if (style==undefined)
				{
				style='';
				}

			if (url==undefined)
				{
				var block=$this.attr('rel');
				var inner=$('#'+block).html();
				var inner_size=$this.data('width');
				}
			else
				{
				var inner='';
				var inner_size=$this.data('width');
				}

			var html="<div class='wrap' style='opacity:0;'  >"+
			"<div class='modal_block animated zoomIn ui-widget-content "+style+"' id='draggable' style='width:"+inner_size+"px; '>"+closeval+
			"<div class='inset ajax_modal'>"+
			inner+
			"</div>"+
			"</div>"+
			"</div>";
			$('body').prepend(html);
			if (url!=undefined)
				{
						$('.wrap').delay(1000).css({'opacity':'1','filter':'alpha(opacity=100)'});
						$(".modal_block > .inner").load(url,function() {
						});
				}
			else {
					$('.wrap').delay(1000).css({'opacity':'1','filter':'alpha(opacity=100)'});
				}
			$( "#draggable" ).draggable({cursor: "move", handle: ".title"});
		event.preventDefault();
		/* Act on the event */
});






});

