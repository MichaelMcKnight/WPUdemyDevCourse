<?php
/**
 * Welcome Page Class
 *
 * @package     QUADS
 * @subpackage  Admin/Welcome
 * @copyright   Copyright (c) 2015, René Hermenau
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       2.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * quads_Welcome Class
 *
 * A general class for About and Credits page.
 *
 * @since 1.4
 */
class quads_Welcome {

	/**
	 * @var string The capability users should have to view the page
	 */
	public $minimum_capability = 'manage_options';

	/**
	 * Get things started
	 *
	 * @since 1.0.1
	 */
	public function __construct() {
		add_action( 'admin_init', array( $this, 'welcome'    ) );
		add_filter( 'mce_external_plugins', array( $this, 'quads_add_plugin' ) );
		add_filter( 'mce_buttons', array( $this, 'quads_register_buttons' ) );

	}

	

	/**
	 * Sends user to the Settings page on first activation of QUADS as well as each
	 * time QUADS is upgraded to a new version
	 *
	 * @access public
	 * @since 1.0.1
	 * @return void
	 */
	public function welcome() {
		// Bail if no activation redirect
		if ( false === get_transient( 'quads_activation_redirect' ) ){
			return;
                }

		// Delete the redirect transient
		delete_transient( 'quads_activation_redirect' );

		// Bail if activating from network, or bulk
		if ( is_network_admin() || isset( $_GET['activate-multi'] ) ){
			return;
                }

		$upgrade = get_option( 'quads_version_upgraded_from' );

			wp_safe_redirect( admin_url( 'admin.php?page=quads-addons' ) ); exit;

	}

	/**
	 * Add the plugin to array of external TinyMCE plugins
	 *
	 * @param array $plugin_array array with TinyMCE plugins.
	 *
	 * @return array
	 */
		public function quads_add_plugin( $plugin_array ) {
			global $quads_options;

		if ( ! is_array( $plugin_array ) ) {
			$plugin_array = array();
		}
		if(isset($quads_options['ad_blocker_support']) && $quads_options['ad_blocker_support']){
			$upload_dir = wp_upload_dir();
			$content_url = $upload_dir['basedir'].'/wpquads/tinymce_shortcode.js';
			$plugin_array['quads_shortcode'] = $upload_dir['baseurl'].'/wpquads/tinymce_shortcode.js';
			wp_mkdir_p($upload_dir['basedir'].'/wpquads', 755, true);
                  $sourc = QUADS_PLUGIN_URL . 'assets/js/tinymce_shortcode_uploads.js';
                  if (!file_exists($content_url)) {
                    copy($sourc,$content_url);
                  }
                  $sourc = QUADS_PLUGIN_URL . 'admin/assets/js/src/images/wpquads_classic_icon.png';
                  $content_url = $upload_dir['basedir'].'/wpquads/wpquads_classic_icon.png';
                  if (!file_exists($content_url)) {
                    copy($sourc,$content_url);
                  }	  
		}else{
			$plugin_array['quads_shortcode'] = QUADS_PLUGIN_URL . 'assets/js/tinymce_shortcode.js';
		}
		return $plugin_array;
	}
	/**
	 * Add button to tinyMCE window.
	 *
	 * @param array $buttons array with existing buttons.
	 *
	 * @return array
	 */
	public function quads_register_buttons( $buttons ) {
		if ( ! is_array( $buttons ) ) {
			$buttons = array();
		}
		$buttons[] = 'quads_shortcode_button';
		return $buttons;
	}
}
new quads_Welcome();
