<?php
/**
 * Admin View: Settings
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="wrap woocommerce">
	<!-- Display Wholesale Market Settings Tab -->
	<form method="<?php echo esc_attr( apply_filters( 'woocommerce_settings_form_method_tab_' . $ced_cwsm_current_tab, 'post' ) ); ?>" id="mainform" action="" enctype="multipart/form-data">
		<?php wp_nonce_field( 'filter_add_new_settings', 'filter_add_new_settings_submit' ); ?>
		<div class="ced-container">
			<div class="ced_header_content">
				<div class="ced_header_content_left"><img src="<?php echo esc_html( CED_CWMAD_PRODUCT_ADDON_PLUGIN_DIR_URL . 'assets/images/cedcommerce.png' ); ?>"><?php esc_html_e( 'Wholesale Market', 'wholesale-market' ); ?></div> 
				<div class="ced_header_content_right"><a href="https://woocommerce.com/document/wholesale-market-for-woocommerce/" target="_blank">Documentation</a></div>
			</div>
		<div class="ced_wholesale_content_wrapper">
		<div class="ced_wholesale_content_wrapper_left">
		<div class="ced-nav-tab-main">
		<nav class="nav-tab-wrapper woo-nav-tab-wrapper">
			<?php
			foreach ( $tabs as $name => $label ) {
				echo '<a href="' . esc_url( admin_url( 'admin.php?page=' . $ced_cwsm_page . '&tab=' . $name ) ) . '" class="nav-tab ' . ( $ced_cwsm_current_tab == $name ? 'nav-tab-active' : '' ) . '">' . esc_attr( $label ) . '</a>';
			}
				do_action( 'woocommerce_settings_tabs' );
			?>
		</nav>
		</div>
		<h1 class="screen-reader-text"><?php echo esc_html( $tabs[ $ced_cwsm_current_tab ] ); ?></h1>
		<?php
			self::output_sections();

			// Save settings if data has been posted
		if ( ! empty( $_POST ) ) {
			if ( ! isset( $_POST['filter_add_new_settings_submit'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['filter_add_new_settings_submit'] ) ), 'filter_add_new_settings' ) ) {
				return;
			}
			self::save();
		}
			// Add any posted errors

			$wc_error = isset( $_GET['wc_error'] ) ? sanitize_text_field( $_GET['wc_error'] ) : '';
		if ( ! empty( $wc_error ) ) {
			self::add_error( stripslashes( $wc_error ) );
		}
			// Add any posted messages
			$wc_message = isset( $_GET['wc_message'] ) ? sanitize_text_field( $_GET['wc_message'] ) : '';
		if ( ! empty( $wc_message ) ) {
			self::add_message( stripslashes( $wc_message ) );
		}

			self::show_messages();

			self::output_settings();
		?>
		<p class="submit">
			<?php if ( empty( $GLOBALS['hide_save_button'] ) ) : ?>
				<!-- Save settings -->
				<input name="save" class="button-primary woocommerce-save-button" type="submit" value="<?php esc_attr_e( 'Save changes', 'wholesale-market' ); ?>" />
			<?php endif; ?>
			<?php wp_nonce_field( 'woocommerce-settings' ); ?>
		</p>
		<p class="ced_wholesale_wrap_nedded"></p>
	</div>
</div>		
	<div class="ced_wholesale_content_wrapper_right">
			<div class="ced_pro_advertisment">
				<!-- <div class="ced_pro_advertisment_top_div">
					CedCommerce Other Products
				</div> -->
				<div class="ced_pro_advertisment_banner_section">
					<a href="https://cedcommerce.com/woocommerce-extensions" target="_blank"><img src="<?php echo esc_html( CED_CWMAD_PRODUCT_ADDON_PLUGIN_DIR_URL . 'assets/images/promotional.gif' ); ?>"></a>
				</div>
				<div class="ced_pro_advertisment_footer_div">
					<p class="ced_heading">CedCommerce Expertise</p>
			<div class="ced_expertise_content_wrap">
					<p class="ced_expertise_content">1. Redesigning & Revamping Websites.</p>
					<p class="ced_expertise_content">2. Custom plugin development </p>
					<p class="ced_expertise_content">3. Additional Feature enhancement</p>
					<p class="ced_expertise_content">4. Marketplace Integration.</p>
					<p class="ced_expertise_content">5. WooCommerce Store customization. </p>
					<p class="ced_expertise_content">6. Speed & performance optimization </p>
				<div class="ced_pro_advertisment_org_section">
					<a href="https://wordpress.org/plugins/search/cedcommerce/" target="_blank">Our Free Plugins - Wordpress.Org</a>
				</div>
			</div>
				</div>
				
			</div>

</div>
</div>
	</form>
</div>
