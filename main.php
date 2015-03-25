<?php
/*
Plugin Name: Expand Coming Soon
Version: 1.0
Plugin URI: http://wpexpand.com/item/expand-coming-soon
Author: WP Expand
Author URI: http://wpexpand.com/
Description: A simple maintenance mode plugin for WordPress
*/

if(!defined('ABSPATH')) exit;
if(!class_exists('EXPAND_MAINTENANCE'))
{
    class EXPAND_MAINTENANCE
    {
        var $plugin_version = '1.0.1';
        var $plugin_url;
        var $plugin_path;
        function __construct()
        {
            define('EXPAND_MAINTENANCE_VERSION', $this->plugin_version);
            define('EXPAND_MAINTENANCE_SITE_URL',site_url());
            define('EXPAND_MAINTENANCE_URL', $this->plugin_url());
            define('EXPAND_MAINTENANCE_PATH', $this->plugin_path());
            $this->plugin_includes();
        }
        function plugin_includes()
        {
            add_action('template_redirect', array( &$this, 'expand_redirect_mm'));
        }
        function plugin_url()
        {
            if($this->plugin_url) return $this->plugin_url;
            return $this->plugin_url = plugins_url( basename( plugin_dir_path(__FILE__) ), basename( __FILE__ ) );
        }
        function plugin_path(){ 	
            if ( $this->plugin_path ) return $this->plugin_path;		
            return $this->plugin_path = untrailingslashit( plugin_dir_path( __FILE__ ) );
        }
        function is_valid_page() {
            return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
        }
        function expand_redirect_mm()
        {
            if(is_user_logged_in()){
                //do not display maintenance page
            }
            else
            {
                if( !is_admin() && !$this->is_valid_page()){  //show maintenance page
                    $this->load_sm_page();
                }
            }
        }
        function load_sm_page()
        {
            header('HTTP/1.0 503 Service Unavailable');
            include_once("expand-coming-soon-slide.php");
            exit();
        }
    }
    $GLOBALS['expand_maintenance'] = new EXPAND_MAINTENANCE();
}

require_once("includes/settings-api/class.settings-api.php");
require_once("includes/settings-api/wecomingsoon-options.php");

add_action( 'init', 'wecomingsoon_plugin_custom_post' );
function wecomingsoon_plugin_custom_post() {
	register_post_type( 'coming-slide',
		array(
			'labels' => array(
				'name' => __( 'Slides' ),
				'singular_name' => __( 'Slide' ),
				'add_new_item' => __( 'Add New Slide' )
			),
			'public' => true,
			'supports' => array('title', 'thumbnail', 'page-attributes'),
			'has_archive' => true,
		)
	);
	
}