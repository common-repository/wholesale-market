<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Adds wholesale-price in Price column on product listing pages.
 *
 * @class    CED_CWSM_Sticky_Send_Suggestions
 * @version  2.0.8
 * @package  wholesale-market/adminSide
 * @package Class
 */
class CED_CWSM_Sticky_Send_Suggestions {
	/**
	 * This is construct of class
	 *
	 * @link plugins@cedcommerce.com
	 */
	public function __construct() {
		if ( is_admin() ) {
			$this->add_hooks_and_filters();
		}
	}

	/**
	 * This function adds hooks and filter.
	 *
	 * @name add_hooks_and_filters()
	 *
	 * @link  http://www.cedcommerce.com/
	 */
	public function add_hooks_and_filters() {
		add_action( 'ced_cwsm_send_suggetion_sticky_form', array( $this, 'ced_cwsm_send_suggetion_sticky_form' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'ced_cwsm_sticky_suggestions_admin_enqueue_scripts' ) );

	}

	/**
	 * This function is used to enqueque the scripts.
	 *
	 * @name ced_cwsm_sticky_suggestions_admin_enqueue_scripts()
	 *
	 * @link  http://www.cedcommerce.com/
	 */
	public function ced_cwsm_sticky_suggestions_admin_enqueue_scripts() {
		$req_uri = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( $_SERVER['REQUEST_URI'] ) : '';
		if ( ! strpos( $req_uri, 'page=wholesale_market&tab=ced_cwsm_basic&section=ced_cwsm_admin_suggestions_module' ) && strpos( $req_uri, 'page=wholesale_market' ) ) {
			wp_enqueue_script( 'ced_cwsm_send_mail', plugin_dir_url( __FILE__ ) . 'js/ced_cwsm_send_mail.js', array( 'jquery' ), '1.0', true );
			wp_localize_script(
				'ced_cwsm_send_mail',
				'ced_cwsm_send_mail_js_ajax',
				array(
					'ajax_url' => admin_url( 'admin-ajax.php' ),
				)
			);
			wp_enqueue_style( 'ced_cwsm_send_mail_css', plugin_dir_url( __FILE__ ) . 'css/ced_cwsm_send_mail.css', array(), '1.0.1', true );
		}
	}

	/**
	 * This function is used to display the suggestions form in settings tab.
	 *
	 * @name ced_cwsm_send_suggetion_sticky_form()
	 *
	 * @link  http://www.cedcommerce.com/
	 */
	public function ced_cwsm_send_suggetion_sticky_form() {
		$req_uri = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( $_SERVER['REQUEST_URI'] ) : '';
	}
}
// Create instance of class
new CED_CWSM_Sticky_Send_Suggestions();

