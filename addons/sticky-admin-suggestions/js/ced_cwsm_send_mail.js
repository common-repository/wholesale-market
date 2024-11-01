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
			jQuery( "div#ced_cwsm_mail_empty_msg" ).show().delay( 2000 ).fadeOut(
				function(){
				}
			);
			jQuery( "div#ced_cwsm_mail_empty_msg" ).css( 'border-left','3px solid #ED5565' );
			return;
		}

	}
);

jQuery( document.body ).on(
	'click',
	'h3.ced_cwsm_suggestion_sticky_header',
	function(){
		jQuery( this ).next( "div" ).slideToggle();
		if (jQuery( this ).find( "span" ).html() == '+') {
			jQuery( this ).find( "span" ).html( '-' );
		} else {
			jQuery( this ).find( "span" ).html( '+' );
		}
	}
);
jQuery( document.body ).on(
	'click',
	'.suggest_uus',
	function(){

		jQuery( '.ced_cwsm_suggestion_sticky_header' ).next( "div" ).show();
		if (jQuery( '.ced_cwsm_suggestion_sticky_header' ).find( "span" ).html() == '+') {
			jQuery( '.ced_cwsm_suggestion_sticky_header' ).find( "span" ).html( '-' );
		}

		jQuery( '#ced_cwsm_suggestion_title' ).val( jQuery( this ).data( 'num' ) );
	}
);
