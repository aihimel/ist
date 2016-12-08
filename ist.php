<?php
/**
 *
 * Plugin Name: IST
 * Author Name: Aftabul Islam, Muntasir Billa Munna
 * Version: 1.0.0
 * Author Email: toaihimel@gmail.com
 * License: GPLv2
 * Description: Custom functionality for IST websit.
 *
 * */

// Security check
if(!defined('ABSPATH')) die();

// OS independent directory seperator
if(!defined('DS')) PHP_OS == 'WINDOWS' || PHP_OS == 'WINNT' ? define('DS', '\\') : define('DS', '/');

/**
 *
 * @class IST main class for IST custom functionality
 *
 * */
class IST{

	/**
	 *
	 * @var $name Name of the plugin
	 *
	 * */
	public $name;

	/**
	 *
	 * @var $prefix Prefix for the current plugin
	 *
	 * */
	public $prefix;

	/**
	 *
	 * @var $version Version number for the plugin
	 *
	 * */
	public $version;

	/**
	 *
	 * @var $plugin_base_url Current plugin base url
	 *
	 * */
	public $plugin_base_url;
	
	/**
	 *
	 * @function __construct Constructor function of the current class
	 *
	 * */
	public function __construct($name){

		$this->name = $name; // Assigning plugin name
		$this->prefix = str_replace(' ', '-', strtolower(trim($this->name))); // Prefix assignment for the plugin
		$this->version = '1.0.0'; // Version number assignment for this plugin
		$this->plugin_base_url = plugin_dir_url(__FILE__);
		
		add_action('init', array(&$this, 'custom_post')); // Adding custom post action on wordpress initilization

	}

	/**
	 *
	 * @function custom_post Adding three custom post type
	 *
	 * */
	public function custom_post(){

		// Custom post 'ist_notice'
		$ist_notice = array(
			'labels' => array(
				'name' => __('Notices'),
				'singular_name' => __('Notice'),
			),
			'public' => true,
			'has_archive' => true,
		);

		// Custom post 'ist_news'
		$ist_news = array(
			'labels' => array(
				'name' => __('News'),
				'singular_name' => __('News'),
			),
			'public' => true,
			'has_archive' => true,
		);
		
		// Custom post 'ist_event'
		$ist_event = array(
			'labels' => array(
				'name' => __('Events'),
				'singular_name' => __('Event'),
			),
			'public' => true,
			'has_archive' => true,
		);

		// Registering posts
		register_post_type($this->prefix . '_' . 'notice', $ist_notice);
		register_post_type($this->prefix . '_' . 'news', $ist_news);
		register_post_type($this->prefix . '_' . 'event', $ist_event);

		// Adding shortcode
		add_shortcode('ist_notice', array(&$this, 'ist_notice_shortcode'));
		add_shortcode('ist_news', array(&$this, 'ist_news_shortcode'));
		add_shortcode('ist_event', array(&$this, 'ist_event_shortcode'));
	}


	/**
	 *
	 * @function ist_notice IST notices will be rendered here
	 *
	 * */
	public function ist_notice_shortcode($data){
		include(plugin_dir_path(__FILE__) . 'views'. DS . 'shortcode' . DS . 'ist_notice_shortcode.php');
	}

	/**
	 *
	 * @function ist_news IST news will be rendered here
	 *
	 * */
	public function ist_news_shortcode($data){
		include(plugin_dir_path(__FILE__) . 'views'. DS . 'shortcode' . DS . 'ist_news_shortcode.php');
	}
	
	/**
	 *
	 * @function ist_event IST event will be rendered here
	 *
	 * */
	public function ist_event_shortcode($data){
		include(plugin_dir_path(__FILE__) . 'views'. DS . 'shortcode' . DS . 'ist_event_shortcode.php');
	}
}

// Debug function
if(!function_exists('pr')){
function pr($object){
	echo "<pre>";
	print_r($object);
	echo "</pre>";
}
}

global $ist; // Can be accessed from anywhere
$ist = new IST('IST');
