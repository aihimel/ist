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
	 * @function __construct Constructor function of the current class
	 *
	 * */
	public function __construct($name){

		$this->name = $name; // Assigning plugin name
		$this->prefix = str_replace(' ', '-', strtolower(trim($this->name))); // Prefix assignment for the plugin
		$this->version = '1.0.0'; // Version number assignment for this plugin
		
	}
	
}

global $ist; // Can be accessed from anywhere
$ist = new IST('IST');
