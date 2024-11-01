var ajaxNonce = Ced_market_action_handler.ajax_nonce;
jQuery( document.body ).on(
	'click',
	'button#ced_cwsm_send_mail',
	function(event){
		event.stopPropagation(); // Stop stuff happening
		event.preventDefault(); // Totally stop stuff happening

		jQuery( '#ced_cwsm_send_loading' ).show();

		var suggestionTitle  = jQuery( '#ced_cwsm_suggestion_title' ).val().trim();
		var suggestionDetail = jQuery( '#ced_cwsm_suggestion_detail' ).val().trim();

		if (suggestionTitle == "" || suggestionDetail == "") {
			jQuery( '#ced_cwsm_send_loading' ).hide();
			jQuery( "div#ced_cwsm_mail_empty" ).show().delay( 2000 ).fadeOut(
				function(){
				}
			);
			return;
		}

	}
);
