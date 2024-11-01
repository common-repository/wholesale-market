<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Render setting to send suggestion to plugin author.
 *
 * @class    CED_CWSM_Admin_Suggestions
 * @version  2.0.8
 * @package Class
 */
class CED_CWSM_Admin_Suggestions {

	/**
	 * This is construct of class
	 *
	 * @link plugins@cedcommerce.com
	 */
	public function __construct() {
		$this->ced_cwsm_admin_suggestions_module_hooks_and_filters_function();
	}

	/**
	 * This function uses necessary hooks and filter for module to work
	 *
	 * @name ced_cwsm_admin_suggestions_module_hooks_and_filters_function()
	 *
	 * @link  http://www.cedcommerce.com/
	 */
	public function ced_cwsm_admin_suggestions_module_hooks_and_filters_function() {

	}
}
// Create instance of class
new CED_CWSM_Admin_Suggestions();
