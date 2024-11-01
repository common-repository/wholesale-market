<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/**
 * Handles Tax Settings For User Addon In Wholesale Environment.
 *
 * @class    CED_CWSM_User_Addon_Hook_Into_Tax_Settings_Module
 * @version  1.0.0
 * @package  wholesale-market-user-addon/addons/hook-into-tax-setting
 */
?>
<?php
class CED_CWSM_User_Addon_Hook_Into_Tax_Settings_Module {

	public function __construct() {
		$this->add_hooks_and_filters();
	}

	/**
	 * This function hooks into all filters and actions available in core plugin.
	 *
	 * @name add_hooks_and_filters()

	 * @link  http://www.cedcommerce.com/
	 */
	public function add_hooks_and_filters() {
		add_filter( 'ced_cwsm_ced_wura_wholesale_tax_module_setting', array( $this, 'ced_cwsm_ced_wura_wholesale_tax_module_setting' ), 10, 1 );
		add_filter( 'woocommerce_product_is_taxable', array( $this, 'woocommerce_product_is_taxable' ), 10, 2 );
	}

	public function woocommerce_product_is_taxable( $taxable, $product ) {
		$current_user_id = get_current_user_id();
		if ( $current_user_id > 0 ) {
			global $globalCWSM;
			if ( $globalCWSM->isCurrentUserIsWholesaleUser() ) {
				$currentWholesaleUserRole = $globalCWSM->getCurrentWholesaleUserRole();
				$current_user_info        = get_userdata( $current_user_id );
				$current_user_role        = $current_user_info->roles;
				if ( in_array( $currentWholesaleUserRole, $current_user_role ) ) {
					$enable = get_option( 'ced_cwsm_wholesale_tax_exclude_' . $currentWholesaleUserRole, false );
					if ( isset( $enable ) && ! empty( $enable ) ) {
						if ( 'yes' === $enable ) {
							$taxable = false;
						}
					}
				}
			}
		}
		return $taxable;
	}


	public function ced_cwsm_ced_wura_wholesale_tax_module_setting( $settings ) {

		$wholesale_tax_section_end = $settings['wholesale_tax_section_end'];
		unset( $settings['wholesale_tax_section_end'] );

		$wholesaleRolesArray = array();
		$previousRoles       = get_option( 'ced_cwsm_wholesaleRolesArray', false );
		if ( is_array( $previousRoles ) && ! empty( $previousRoles ) ) {
			$wholesaleRolesArray = $previousRoles;
		}

		foreach ( $wholesaleRolesArray as $key => $value ) {
			$settings[ 'ced_cwsm_wholesale_tax_exclude_' . $key ] = array(
				'title'   => __( 'Exclude Tax For ' . $value['name'], 'CED_CWSM_PRODUCT_ADDON_PLUGIN_TEXT_DOMAIN' ),
				'desc'    => __( 'Exclude Tax For ' . $value['name'], 'CED_CWSM_PRODUCT_ADDON_PLUGIN_TEXT_DOMAIN' ),
				'id'      => 'ced_cwsm_wholesale_tax_exclude_' . $key,
				'default' => 'no',
				'type'    => 'checkbox',
			);
		}

		$settings['wholesale_tax_section_end'] = $wholesale_tax_section_end;
		return $settings;
	}
}
new CED_CWSM_User_Addon_Hook_Into_Tax_Settings_Module();

