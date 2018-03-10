(function () {
    "use strict";

    //check correct value pay
    $(document).on("click", ".transfer_button", function (event) {
        event.preventDefault();
        var $form = $(".transfer_button").closest('form');

	function makePostRequest(url, data) {
		var jForm = $('<form></form>');
		jForm.attr('action', url);
		jForm.attr('method', 'post');
		for (var name in data) {
		    var jInput = $("<input>");
		    jInput.attr('name', name);
		    jInput.attr('value', data[name]);
		    jForm.append(jInput);
		}
		jForm.appendTo('body').submit();
	}
	
	//if ($("#paysystem_payment").val() === 'payeer') {
	if ($("#payeer").prop('checked')) {
		$.ajax({
		    type: "post",
		    url: 'pay/payeer/generic.php',
		    data: $form.serialize(),
		    success: function (data) {
		        if (typeof(data) === "object" && !data.error && data.link) {
		            window.location = data.link;
		        } else if (typeof(data) === "object" && data.error && data.message) {
		            window.alert(data.message);
		        } else {
		            window.alert(data);
		        }
		    },
		    error: function () {
		        window.alert("Ошибка запроса формирования платежа!");
		    }});
	//} else if ($("#paysystem_payment").val() === 'perfect') {
	} else if ($("#perfect").prop('checked')) {
		$.ajax({
		    type: "post",
		    url: 'pay/perfectmoney/generic.php',
		    data: $form.serialize(),
		    success: function (data) {
		        if (typeof(data) === "object" && !data.error && data.link && data.params) {
		            //window.location = data.link;
		            makePostRequest(data.link, data.params);
		        } else if (typeof(data) === "object" && data.error && data.message) {
		            window.alert(data.message);
		        } else {
		            window.alert(data);
		        }
		    },
		    error: function () {
		        window.alert("Ошибка запроса формирования платежа!");
		    }});
	} else {
		$form.submit();
		return false;	
	}
        return false;
    });
}());


