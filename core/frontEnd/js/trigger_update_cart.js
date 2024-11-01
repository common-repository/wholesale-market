jQuery( document ).ready(
	function(){
		jQuery( document.body ).trigger( 'updated_wc_div' );
	}
);

jQuery( document.body ).on(
	'click',
	'div.cwsm_cross_div',
	function(){
		jQuery( 'div.custom-msg-wrapper' ).hide();
	}
);
jQuery( document ).on(
	'click',
	'.woocommerce-cart-form__cart-item .product-remove .remove',
	function(){
		jQuery( document ).ajaxStop(
			function() {
				window.location.replace( window.location.href );
			}
		);
	}
);
jQuery( document ).on(
	'click',
	'input[name="update_cart"]',
	function(){
		jQuery( document ).ajaxStop(
			function() {
				window.location.replace( window.location.href );
			}
		);
	}
);
jQuery( document ).on(
	'click',
	'button[name="update_cart"]',
	function(){
		jQuery( document ).ajaxStop(
			function() {
				window.location.replace( window.location.href );
			}
		);
	}
);
