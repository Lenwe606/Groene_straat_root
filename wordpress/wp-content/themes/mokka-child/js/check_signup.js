// $(document).ready(function() {
jQuery(document).ready(function($) {

	/*
		Confirm Javascript works
	*/
	$('#javacheck').val('1');
	
	// $('body').css('background-image', 'url(wp-content/themes/mokka-child/img/img1.jpg)');

	$(':input').keypress(function (evt) {
		var charCode = evt.charCode || evt.keyCode;
		if (charCode  == 13) {
			return false;
		}
	});

	$('#submit-subscribe_site').click( function(event){
		event.preventDefault();
		$(".sub-fail").remove();
		$(".sub-info").remove();
		$(".sub-success").remove();
		if ( formValidateInvite() ) {
			$('#subscribe-site').submit();
			return;
		} else {
			return false;
		}
	});
	
	function formValidateInvite() {
		var hasError = false;

		if ( $('#user_firstname').val().length == 0 || $('#user_firstname').val().length > 30 ) {
			$('#user_firstname').before('<span class="sub-fail sub-alert-inline">' + signup_object.voornaam + '<br /></span>');
			hasError = true;
		}
	
		if ( $('#user_lastname').val().length == 0 || $('#user_lastname').val().length > 100 ) {
			$('#user_lastname').before('<span class="sub-fail sub-alert-inline">' + signup_object.naam + '<br /></span>');
			hasError = true;
		}

		if ( $('#captcha_code').val().length == 0 || $('#captcha_code').val().length > 30 ) {
			$('#captcha_code').before('<span class="sub-fail sub-alert-inline"><br />' + signup_object.captcha + '<br /></span>');
			hasError = true;
		}

		if ( $('#user_email').val().length == 0 || $('#user_email').val().length > 100 ) {
			$('#user_email').before('<span class="sub-fail sub-alert-inline sub-mail">' + signup_object.mail + '<br /></span>');
			hasError = true;
		} else {
			var x =  $('#user_email').val();
			var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if (!filter.test(x)) {
				$('#user_email').before('<span class="sub-fail sub-alert-inline sub-mail">' + signup_object.invalidmail + '<br /></span>');
				hasError = true;
			}
		}

		if (!($('#user_terms').is(':checked'))) {
			$('#user_terms').before('<span class="sub-fail sub-alert-inline">' + signup_object.user_terms + '<br /></span>');
			hasError = true;
		}	
		
		if(hasError == true) { 
			return false;
		} else {
			return true;
		}
	};
	
});
